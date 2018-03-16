<?php
$linkedinclude_tablename = $wpdb->prefix . "linkedinclude_posts";

function linkedinclude_install() {
	if(!current_user_can( 'activate_plugins' )) return;
	
	global $wpdb;
	$linkedinclude_tablename = $wpdb->prefix . "linkedinclude_posts";
	
	//housekeeping from older versions
	if($wpdb->get_var("SHOW TABLES LIKE '$linkedinclude_tablename'") == $linkedinclude_tablename){
		//old data?
		$column = $wpdb->get_results( $wpdb->prepare(
			"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = %s ",
			DB_NAME, $linkedinclude_tablename, "li_id"
			));
		//drop first
		if($column) $wpdb->query("DROP TABLE {$linkedinclude_tablename}");
	}
	
	$sql = "CREATE TABLE {$linkedinclude_tablename} (
	urn				varchar(64) CHARACTER SET utf8 NOT NULL,
	image_width		int(10) DEFAULT NULL,
	image_height	int(10) DEFAULT NULL,
	image_caption	varchar(256) NULL,
	image_url		text CHARACTER SET utf8 DEFAULT NULL,
	source			varchar(128) CHARACTER SET utf8 NOT NULL,
	authorurl		text CHARACTER SET utf8 DEFAULT NULL,
	permalink		text CHARACTER SET utf8 NOT NULL,
	title 			varchar(256) CHARACTER SET utf8 NOT NULL,
	url				varchar(256) CHARACTER SET utf8 NOT NULL,
	shares			int(10) DEFAULT '0',
	tracking		varchar(24) DEFAULT NULL,

	content			text,
	display			tinyint(1) NOT NULL DEFAULT '-1',

	UNIQUE KEY urn (urn)

	) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	
	//echo "SQL: $sql";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	return;
}

/**************************************************************************************************
 *	Uninstall Functions - Garbage Cleanup
 **************************************************************************************************/
function linkedinclude_uninstall(){
	if(!current_user_can( 'activate_plugins' )) return;
	
	global $wpdb;
	$linkedinclude_tablename = $wpdb->prefix . "linkedinclude_posts";
	$wpdb->query("DROP TABLE {$linkedinclude_tablename}");
}

/**************************************************************************************************
*	Check for Older Database Schemas
**************************************************************************************************/
function checkIfUpgradeNeeded(){
	global $wpdb, $linkedinclude_tablename;
	//table exists?
	if($wpdb->get_var("SHOW TABLES LIKE '$linkedinclude_tablename'") == $linkedinclude_tablename){
		//column exists?
		$column = $wpdb->get_results( $wpdb->prepare(
			"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = %s ",
			DB_NAME, $linkedinclude_tablename, "urn"
		));
		//drop & re-create
		if(!$column){ if($wpdb->query("DROP TABLE {$linkedinclude_tablename}")){ linkedinclude_install(); }}
	} else {
		//just create
		linkedinclude_install();
	}
}
add_action('init','checkIfUpgradeNeeded');

?>
