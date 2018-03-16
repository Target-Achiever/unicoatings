<?php
/**
	Theme Name: Paris Limo Express Theme
*/
get_header();
?>
<div id="content_container" class="group inner_content_container">
	<?php if (have_posts()) : ?>		
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="page-title">&#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2 class="page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="page-title">Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="page-title">Archive for <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="page-title">Archive for <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="page-title">Author Archive</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="page-title">Blog Archives</h2>
		<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
				<div class="post group">
					<?php if(function_exists('lacands_wp_filter_content_widget'))lacands_wp_filter_content_widget(); ?> 
					<h1><?php the_title();?></h1>
					<h6><?php echo get_the_date(); ?></h6>
					<a href="<?php echo get_permalink()?>">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('medium');
						}  ?>
					</a>
					<?php 
						$content = "<p>";
							$words_array = explode(" ", get_the_content());
							if (count($words_array)<= 110):
								$content .= strip_tags(get_the_content('Read More..'), '<a><strong><em><i>');
							else:
								array_splice($words_array, 110);
								$content_to_show = implode(" ", $words_array);
								$content .= strip_tags($content_to_show, '<a><strong><em><i>');
								$url_to_show = get_permalink();
								$content .= "<a href='".$url_to_show."'> Read more &#187;</a>";
							endif;
						$content .= "</p>";
						echo $content;
						the_tags('<p class="post_tags"><strong>Post Tags:</strong> ', ', ', '</p>');
						/* echo "<hr class='content_sep'/>"; */
					?>	
				</div>
			<?php  endwhile;?> 
			<span id="previous_link"><?php next_posts_link('&laquo; Older Entries') ?></span>
			<span id="next_link"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
			<br style="clear: both"/>

	<?php endif;  ?>

<?php get_footer(); ?>