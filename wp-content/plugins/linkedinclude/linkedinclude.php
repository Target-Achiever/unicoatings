<?php
/*
Plugin Name: LinkedInclude
Plugin URI: http://wordpress.org/plugins/linkedinclude/
Description: Post Importer for LinkedIn
Version: 2.0.0
Author: era404
Author URI: http://www.era404.com
License: GPLv2 or later.
Copyright 2015 ERA404 Creative Group, Inc.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/***********************************************************************************
*     Globals
***********************************************************************************/
global $wpdb;
define('LINKEDINCLUDE_URL', admin_url() . 'admin.php?page=linkedinclude');
define('LINKEDINCLUDE_TABLE', $wpdb->prefix . 'linkedinclude_posts');
use GuzzleHttp\Client;
/***********************************************************************************
 *     Setup Plugin > Create Table
***********************************************************************************/
require_once("linkedinclude_setup.php");
// this hook will cause our creation function to run when the plugin is activated
register_activation_hook( 	__FILE__, 'linkedinclude_install' );
register_deactivation_hook( __FILE__, 'linkedinclude_uninstall' );
register_uninstall_hook(    __FILE__, 'linkedinclude_uninstall' );

/***********************************************************************************
*     Setup Admin Menus
***********************************************************************************/
add_action( 'admin_init', 'linkedinclude_admin_init' );
add_action( 'admin_menu', 'linkedinclude_admin_menu' );
 
function linkedinclude_admin_init() {
	/* Register our stylesheet. */
	wp_register_style( 'linkedinclude-styles', plugins_url('linkedinclude_admin.css', __FILE__) );
	/* and javascripts */
	wp_enqueue_script( 'linkedinclude-script', plugins_url('linkedinclude_admin.js', __FILE__), array('jquery'), 1.0 ); 	// jQuery will be included automatically
	wp_localize_script('linkedinclude-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 	// setting ajaxurl
}
add_action( 'wp_ajax_showhide', 'linkedInArticleDisplay' ); 	//for loading image to refine
//add_action( 'wp_ajax_cropimage', 'linkedinclude_cropimage' ); 	//for refining crop
 
function linkedinclude_admin_menu() {
	/* Register our plugin page */
	$page = add_submenu_page(	'tools.php', 
								'LinkedInclude', 
								'LinkedInclude', 
								'manage_options', 
								'linkedinclude', 
								'linkedinclude_plugin_options');

	/* Using registered $page handle to hook stylesheet loading */
	add_action( 'admin_print_styles-' . $page, 'linkedinclude_admin_styles' );
	add_action( 'admin_print_scripts-'. $page, 'linkedinclude_admin_scripts' );
}
 
function linkedinclude_admin_styles() { wp_enqueue_style( 'linkedinclude-styles' ); wp_enqueue_style( 'thickbox' ); }
function linkedinclude_admin_scripts() { wp_enqueue_script( 'linkedinclude-script' ); wp_enqueue_script( 'thickbox' ); }
 
function linkedinclude_plugin_options() {
	global $wpdb;

	/* Output our admin page */
	echo "<div id='linkedinclude'>
			<h1>LinkedInclude <span>(Experimental)</span></h1>
			<div id='linkedinclude_instructions' data-expanded='0'>
		  		<h1>LinkedInclude <span>(Experimental)</span></h1>
				<p>This version of LinkedInclude attempts to import LinkedIn articles, exploiting the <em>Related Content</em> endpoint
				  still accessible at the time this plugin was rewritten:<br />
				  <strong>https://www.linkedin.com/pulse-fe/api/v1/relatedContent?permalink=[ article permalink ]</strong>.</p>
				  <p>Because LinkedIn does <u>not</u> offer, encourage, or support the replication of articles outside of their network, this
				  automated process is to be considered experimental and not guaranteed to be a permanent solution for importing articles
				  from LinkedIn into WordPress. The popularity of earlier versions of this plugin is the reason we continue to support
				  LinkedInclude, however we cannot guarantee that this rewritten version will continue to function after the operators of
				  LinkedIn discover this exploit.</p>
					
				<p>If you wish to continue, enter a valid permalink to a LinkedIn article above.</p>
					<ol>
					  <li>Click <strong>TEST</strong> to check if related articles are found using the Related Content exploit on LinkedIn.<br />
						If you see <tt style='font-weight:bold;'>reason:&quot;PUBLISHED_POSTS_REASON_DEFAULT&quot;</tt> then LinkedIn is returning your Related Content and this plugin will achieve the desired results.<br />
						If you see <tt style='font-weight:bold;'>reason:&quot;EDITORS_PICK&quot;</tt> then LinkedIn is NOT returning your Related Content.</li>
		 
					  <li>Click <strong>FETCH ARTICLES</strong> to attempt importing all related articles.<br />
						It appears that LinkedIn throttles these types of connections. If you get the desired results only periodically, it's advised you wait 24hrs before trying again.</li>
					</ol>
				<p>Please refer to <a href='https://wordpress.org/plugins/linkedinclude/#installation' title='LinkedInclude on the WordPress Plugin Repository' target='_blank'>LinkedInclude's installation instructions</a> for more information.</p>

		  		<div class='litabs'> 			
		  			<div class='litab' style='float:right;'>Instructions</div>
		  		</div>
		  	</div>";

	//record author posts
	if(!empty($_POST) && isset($_POST['article']) && filter_var($_POST['article'], FILTER_VALIDATE_URL)){
		
		error_reporting(E_ALL); ini_set('display_errors',1);
		
		//transform & clean
		$article = (string) trim($_POST['article']," /");
		$permalink = str_replace("https://www.linkedin.com/pulse/","",$article);
		if(strstr($permalink,"?")) $permalink = substr($permalink,0,strpos($permalink,"?"));
		$permalink_encoded = (string) urlencode($permalink);
		
		$api =  "https://www.linkedin.com/pulse-fe/api/v1/relatedContent".
				"?permalink={$permalink_encoded}&template=templates%2Fwalter%2Farticle%2FrelatedContent".
				"&returnCount=40&start=0&count=20&height=120&width=360&media=t";
		
		//testing url?
		if(isset($_POST['test'])){
			echo "<script>window.open('{$api}');</script>";
		}
		
		//importing
		if(isset($_POST['submit'])) getLinkedInArticles($api);
	}
	
	//get last linkedinarticle, or use default
	$lastarticle = $wpdb->get_var("SELECT url FROM ".LINKEDINCLUDE_TABLE." ORDER BY urn DESC LIMIT 1");
	if(!$lastarticle) $lastarticle = "https://www.linkedin.com/pulse/4-signs-progress-climate-change-bill-gates/";
	
	echo <<<FORM
	<section>
	<form method='post' class='linkedinclude_fetch'>
	LinkedIn Article URL:
		<input type='text' name='article' placeholder='article url'
			value='{$lastarticle}' /> &nbsp;
		<input type='submit' name='test' value='test' />
		<input type='submit' name='submit' value='fetch articles' />
	</form>
	</section>
FORM;
	
	//display all posts, return newest author id
	showLinkedInArticles();

	//display donations form
	$bulcclublogo = plugins_url('linkedinclude/img/bulcclub.png');
	echo <<<PAYPAL
<!-- paypal donations, please -->
<div class="footer">
	<div class="donate" style='display:none;'>	
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="JE3VMPUQ6JRTN">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" class="donate">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		<p>If <b>ERA404's LinkedInclude WordPress Plugin</b> has made your life easier and you wish to say thank you, use the Secure PayPal link above to buy us a cup of coffee.</p>
	</div>
	<div class="bulcclub">
		<a href="https://www.bulc.club/?utm_source=wordpress&utm_campaign=linkedinclude&utm_term=linkedinclude" title="Bulc Club. It's Free!" target="_blank"><img src="{$bulcclublogo}" alt="Join Bulc Club. It's Free!" /></a>
		<p>For added protection from malicious code and spam, use Bulc Club's unlimited 100% free email forwarders and email filtering to protect your inbox and privacy. <strong><a href="https://www.bulc.club/?utm_source=wordpress&utm_campaign=linkedinclude&utm_term=linkedinclude" title="Bulc Club. It's Free!" target="_blank">Join Bulc Club &raquo;</a></strong></p>
	</div>
</div>
</div><!--end donations form -->
PAYPAL;
}

/**************************************************************************************************
*	Helper Functions
/**************************************************************************************************
*	GetLinkedInArticles - Loads the Related Posts (given an article URL)
*	https://www.linkedin.com/pulse-fe/api/v1/relatedContent?permalink=[permalink]&template=templates%2Fwalter%2Farticle%2FrelatedContent&returnCount=3&start=0&count=20&height=120&width=360&media=t
**************************************************************************************************/
function getLinkedInArticles($api){
	require("vendor/autoload.php");
	
	$r = array();			//for results

	try{
		$client = new GuzzleHttp\Client();
		$res = $client->request('GET', $api );
		
		if($res->getStatusCode() == 200){
			$str = $res->getBody();
			$arr = json_decode($str);
/**************************************************************************************************
*	If articles are found, we'll store them to MySQL and fetch/update content afterward
**************************************************************************************************/
			if($arr && !empty($arr)){													global $wpdb;
				//$wpdb->show_errors = true; $wpdb->suppress_errors = false; echo "<pre>";
				$wpdb->show_errors = false; $wpdb->suppress_errors = true;
				
				//do the inserts
				$formats = array(	'%s',	//urn
									'%d',	//image_width
									'%d',	//image_height
									'%s',	//image_caption
									'%s',	//image_url
									'%s',	//source
									'%s',	//permalink
									'%s',	//title
									'%s',	//url
									'%d',	//shares
									'%s'	//tracking
				);
				
/**************************************************************************************************
*	Iterate to INSERT/UPDATE
**************************************************************************************************/
				foreach($arr->elements as $k => $obj){
				
					//check if exists first
					$exists = $wpdb->get_var( 	
						$wpdb->prepare("SELECT count(*) FROM ".LINKEDINCLUDE_TABLE." WHERE urn=%s", array($obj->urn))
					);
										
					//create simple array for each item
					$item = array(	"urn"			=> $obj->urn,
									"image_width"	=> $obj->image->width,
									"image_height"	=> $obj->image->height,
									"image_caption"	=> $obj->image->caption,
									"image_url"		=> $obj->image->url,
									"source"		=> $obj->source,
									"permalink"		=> $obj->permalink,
									"title"			=> $obj->title,
									"url"			=> $obj->url,
									"shares"		=> $obj->totalShares,
									"tracking" 		=> $obj->trackingId );
					//insert
					if($exists < 1){
						if($wpdb->insert(LINKEDINCLUDE_TABLE, $item, $formats)){
							$r['a'][] = $item['title']; } //add success
						else {	$r['f'][] = $item['title']; } //add fail
						
						if($wpdb->show_errors){ //debugging
							print_r($wpdb->last_error);
							print_r($wpdb->last_query);
							print_r($wpdb->last_result);
							print_r($item);
						}
					//update
					} else {
						$op = $wpdb->update(LINKEDINCLUDE_TABLE, $item, array('urn'=>$item['urn']), $formats, array('%s'));
						if(false === $op){
							$r['f'][] = $item['title']; //update fail
						} elseif(0 === $op){
							$r['n'][] = $item['title']; //nothing to update
						} elseif(0 < $op){
							$r['u'][] = $item['title']; //update success
						}
						else {}
					}
				}
			} else { /* array of items was empty, or failed to retrieve */
				echo "<div class='msg err'><strong>No Articles Found</strong></div>";
			}
		} else { /* some other status besides 200 returned trying to retrieve articles */
			echo "<div class='msg err'><strong>Status of {$res->getStatusCode()} returned while trying to fetch articles.</strong></div>";
		}
	} catch (Exception $e) { /* error thrown while trying to fetch related articles */
		echo "<div class='msg err'><strong>".$e->getMessage()."</strong></div>"; var_dump($crawler); echo "</textarea>";
	}

	displayLinkedIncludeResults($r);
	return;
}

/**************************************************************************************************
*	Show the Results of the Scrape
**************************************************************************************************/
function displayLinkedIncludeResults($r){

	if(empty($r)){ echo "<div class='msg'>No posts have been added or updated.</div>"; }
	else {
		$results = "<div class='msg'>";
		if(isset($r['a']) && !empty($r['a'])){
			$results .= "<strong>".count($r['a'])." LinkedIn posts were found and recorded:</strong> <em>";
			$results .= implode(", ", $r['a']). "</em></div>";
		}
		if(isset($r['u']) && !empty($r['u'])){
			$results .= "<strong>".count($r['u'])." LinkedIn posts were found and updated:</strong> <em>";
			$results .= implode(", ", $r['u']). "</em></div>";
		}
		if(isset($r['n']) && !empty($r['n'])){
			$results .= "<strong>".count($r['n'])." LinkedIn posts were found but no updates were necessary:</strong> <em>";
			$results .= implode(", ", $r['n']). "</em></div>";
		}
		if(isset($r['f']) && !empty($r['f'])){
			$results .= "<div class='msg err'><strong>".count($r['f'])." LinkedIn posts were found but were not recorded:</strong> <em>";
			$results .= implode(", ", $r['f']). "</em></div>";
		}
		echo $results;
	}
	return;
}
/**************************************************************************************************
*	Front-End: Organize the Articles into Blocks and Display
**************************************************************************************************/
function linkedinclude_frontend_styles() { 
	wp_enqueue_style( 'linkedinclude', plugins_url('linkedinclude.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'linkedinclude_frontend_styles' );
function showLinkedInArticles(){
	global $wpdb;
	echo "<section>";
	$articles = $wpdb->get_results("SELECT * FROM ".LINKEDINCLUDE_TABLE." ORDER BY urn DESC");
	//echo "<pre>"; print_r($articles); echo "</pre>";
	if(!empty($articles)){
		foreach ( $articles as $article ) {
		$a = (array) $article;
		$needscontent = (""==trim($a['content']));
		if($needscontent){
			$content = "<em>Activate to fetch content.</em>";
		} else {
			$content = substr($a['content'], 0, @strpos($a['content'], ' ', 400))."...";
		}
		echo "<article class='item_{$a['urn']} ".($a['display'] > 0 ? "":"unchecked")."'>".
			 "<aside> {$a['shares']} Shares </aside>".
			 "<h1><input type='checkbox' data-liid='{$a['urn']}' class='li_display' value='1' ".($a['display'] > 0 ? "checked='checked'":"")." title='Show/Hide' autocomplete='Off' />".
			 "<a href='{$a['url']}' title='".esc_attr($a['title'])."' target='_blank'>{$a['title']}</a> ".
			 "<cite>by {$a['source']}</cite></h1>".
			 "<div><img src='{$a['image_url']}' alt='".esc_attr($a['title'])."' height='80' />".
			 "<span class='content'>{$content}</span>".
			 "</div></article>";
		}
	} else { 
		echo "<article>No LinkedIn articles have been imported.</article>"; 
	}
	echo "</section>";
}
/**************************************************************************************************
 *	Ajax Functions
**************************************************************************************************/
function linkedInArticleDisplay(){
	global $wpdb;
	header('Content-type: application/json');
	
	$results = array(	 2 => "Article content saved",
						 1 => "Display state toggled to: ",
						-1 => "Invalid article",
						-2 => "Could not locate article",
						-3 => "Request denied by LinkedIn",
						-4 => "Article content fetched, but could not be parsed properly",
						-5 => "Article content fetched, but could not be stored locally",
						-6 => "Article content fetched, but nothing to update");
						
	//valid article?
	$display = 	(in_array($_POST['lish'], array("true", "false"))  ? (int) ($_POST['lish']=="true"?1:-1) : false);
	$urn = 		(preg_match("/^urn\:li\:article\:([\d]+)$/", $_POST['liid']) ? trim($_POST['liid']) : false);
	if(!$display || !$urn) die(json_encode(array("res"=>-1,"msg"=>$results[-1])));
	
	//article located?
	if(!$obj = $wpdb->get_row( $wpdb->prepare("SELECT url,content FROM ".LINKEDINCLUDE_TABLE." WHERE urn=%s", array($urn)))) die(json_encode(array("res"=>-2,"msg"=>$results[-2])));
	
	//change display state
	$wpdb->query("UPDATE ".LINKEDINCLUDE_TABLE." SET display={$display} WHERE urn='{$urn}'");
	
	//try to fetch the article content
	if($display>0 && ""==$obj->content){
		require("vendor/autoload.php");
		error_reporting(E_ALL); ini_set('display_errors',1);
		
		//scrape article page
		$client = new GuzzleHttp\Client();
		try {
			$res = $client->request('GET', (string) $obj->url );
			//received a response from linkedin
			if($res->getStatusCode()==200){
				
				//parse & clean the content
				if(list($content,$authorurl) = parseContent($res->getBody())){
					$updates = array("content"=>$content,"authorurl"=>$authorurl);
					//store content to the database
					$op = $wpdb->update(LINKEDINCLUDE_TABLE, $updates, array('urn'=>$urn), array('%s','%s'), array('%s'));
					if(false === $op){		die(json_encode(array("res"=>-5,"msg"=>$results[-5])));
					} elseif(0 === $op){	die(json_encode(array("res"=>-6,"msg"=>$results[-6])));
					} elseif(0 < $op){		die(json_encode(array("res"=>2,"msg"=>$results[2],"content"=>substr($content, 0, @strpos($content, ' ', 400))."...")));
					} else {}
				} else { die(json_encode(array("res"=>-4,"msg"=>$results[-4]))); }
			} else {  die(json_encode(array("res"=>-3,"msg"=>$results[-3]))); }
			
		} catch(Exception $e) {
			//silent
			die(json_encode(array("res"=>-3,"msg"=>$results[-3])));
		}
	}
	//toggled
	die(json_encode(array("res"=>1,"msg"=>$results[1].($display>0?"ON":"OFF"),"lish"=>$display)));
}
function parseContent($in){
	//first, attempt to mine author URL
	if(preg_match("/<a href=\\\"([^\\\"]+)\\\"\srel=\\\"author\\\"\>/", $in, $authorarr)){
		$authorurl = $authorarr[1];
	} else {
		$authorurl = false;
	}
	//next, attempt to mine the content
	if(strstr($in,'<div class="entity-content">')){
		$starttag = '<div class="prose" itemprop="articleBody">';
		$endtag = '<div class="article-content-footer">';
		
		//lets explode instead of using regex, which is messy
		$parts = explode($starttag, $in);
		if(count($parts)<2) return(false);
		$parts = explode($endtag, $parts[1]);
		if(count($parts)<2) return(false);
		$content = $parts[0];
		//strip tags except: <p><b><i><strong><em><u>
		$content = strip_tags($content, "<p><b><i><strong><em><u>");
		$content = preg_replace("/\<(p|em|strong|b|i|u)\s([^\>]+)\>/", "<$1>", $content);
		//return
		return(array($content,$authorurl));
	}
	return(false);
}
/**************************************************************************************************
*	Widget Functions
/**************************************************************************************************
 *	Create the Widget
**************************************************************************************************/
class linkedinclude_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'linkedinclude_widget',
			'LinkedInclude Widget',
			array( 'description' => 'Display the Articles from LinkedIn', )
		);
	}
	public function widget( $args, $instance ) {
		//widget title
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'] . (!empty($title) ? $args['before_title'] . $title . $args['after_title'] : "");
		
		//get posts from database
		global $wpdb;

		$where = " WHERE " . ($instance['source']!="all" ? " source='{$instance['source']}' AND " : "")." display>0 ";
		$length = (is_numeric($instance['length']) ? (int) $instance['length'] : 200);
		$articles = $wpdb->get_results("SELECT * FROM ".LINKEDINCLUDE_TABLE." {$where} ORDER BY urn DESC LIMIT {$instance['postcount']}");

		//iterate
		if(!empty($articles)) {
			echo "<ul>";
			$authorurl = false;
			$lastauthor = false;
			foreach( $articles as $article ){
				$a = (array) $article;
				
				if($authorurl && ""!=trim($a['authorurl']) && $authorurl!=$a['authorurl'] && ""!=trim($lastauthor)){
					echo "<li><p><a href='{$authorurl}' title='All Articles on LinkedIn' target='_blank' class='limore'>View All Articles by {$lastauthor} &raquo;</a></p></li>";
				}
				
				$content = substr($a['content'], 0, @strpos($a['content'], ' ', $length));
				if(strlen($content)>0) $content.="...";
				
				echo "<li><a href='{$a['url']}' title='".esc_attr($a['title'])."' target='_blank'>
				<img class='scale-with-grid align-left wp-post-image' 
					alt='".esc_attr((""!=$a['image_caption']?$a['image_caption']:$a['title']))."' 
					src='{$a['image_url']}'>
				</a>
				<h5><a href='{$a['url']}' title='".esc_attr($a['title'])."' target='_blank'>".esc_attr($a['title'])."</a></h5>
				<p>{$content}<a href='{$a['url']}' class='limore' target='_blank' title='".esc_attr($a['title'])."'>Read More &raquo;</a></p></li>";
				
				if(""!=trim($a['authorurl'])) $authorurl = $a['authorurl'];
				$lastauthor = trim($a['source']);
			}
			if($authorurl) echo "<li><p><a href='{$authorurl}' title='All Articles on LinkedIn' target='_blank' class='limore'>View All Articles by {$lastauthor} &raquo;</a></p></li>";
			echo "</ul>";
		}
		//finish
		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		global $wpdb;
		
		$title = 		( isset( $instance[ 'title' ] ) ?  $instance[ 'title' ] : "");
		$source = 		( isset( $instance[ 'source' ] ) ?  $instance[ 'source' ] : "");
		$postcount = 	( isset( $instance[ 'postcount' ] ) ?  $instance[ 'postcount' ] : 5);
		$length = 		( isset( $instance[ 'length' ] ) ?  $instance[ 'length' ] : 200);
		
		//get authors for selector
		$authors = $wpdb->get_results("SELECT DISTINCT source FROM ".LINKEDINCLUDE_TABLE." ORDER BY source ASC");

		//form options
		echo "<p><label for='".$this->get_field_id( 'title' )."'>Title</label>
				<input class='widefat' 
				 id='".$this->get_field_id( 'title' )."' 
				 name='".$this->get_field_name( 'title' )."' type='text' 
				 value='".esc_attr( $title )."' /></p>";
		
		echo "<p><label for='".$this->get_field_id( 'source' )."'>Source</label>
				<select class='widefat'
				 id='".$this->get_field_id( 'source' )."'
				 name='".$this->get_field_name( 'source' )."'>
				 		<option value='all'>All Sources</option>\n";
				foreach($authors as $sources) { 
					echo "<option value='".esc_attr($sources->source)."' ".
						(esc_attr($source)==esc_attr($sources->source)?"selected='selected'":"")
						.">".esc_attr($sources->source)."</option>\n";
				}
				 echo "</select></p>";
		echo "<p><label for='".$this->get_field_id( 'postcount' )."'>Posts to Show</label>
				<input class='widefat'
				 id='".$this->get_field_id( 'postcount' )."'
				 name='".$this->get_field_name( 'postcount' )."' type='text'
				 value='".esc_attr( $postcount )."' /></p>";
		echo "<p><label for='".$this->get_field_id( 'length' )."'>Excerpt Length</label>
				<input class='widefat'
				 id='".$this->get_field_id( 'length' )."'
				 name='".$this->get_field_name( 'length' )."' type='text'
				 value='".esc_attr( $length )."' /></p>";
}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = 	( ! empty( $new_instance['title'])  	? strip_tags( $new_instance['title'] ) : '');
		$instance['source'] = 	( ! empty( $new_instance['source']) 	? strip_tags( $new_instance['source'] ) : '');
		$instance['postcount']= ( ! empty( $new_instance['postcount']) 	? strip_tags( $new_instance['postcount'] ) : '');
		$instance['length']= 	( ! empty( $new_instance['length']) 	? strip_tags( $new_instance['length'] ) : '');
		return $instance;
	}
	
} // Class wpb_widget ends here


// Register and load the widget
function linkedinclude_widget_load_widget() {
	register_widget( 'linkedinclude_widget' );
}
add_action( 'widgets_init', 'linkedinclude_widget_load_widget' );

?>