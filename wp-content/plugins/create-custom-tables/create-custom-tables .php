
<?php
   /*
   Plugin Name: Custom Table creator
   Plugin URI: http://my-awesomeness-emporium.com
   description: a plugin to create custom table
   Version: 1.0
   Author: Mr. Awesome
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */
function create_custom_table_func(){
    global $wpdb;
   

    $installed_ver = get_option( "my_db_version" );

    $charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'expereience_now2';
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 $sql = "CREATE TABLE $table_name (
		id int(4) NOT NULL  AUTO_INCREMENT,
        firstname varchar(255) NOT NULL,
        lastname varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        contact_no varchar(15) NOT NULL,
        organization varchar(255) NOT NULL,
        page_name varchar(255) NOT NULL,
        timestamp_user timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY  (id)
       
    ) $charset_collate;";
  
    $wpdb->query($sql);
    // dbDelta($sql);
     // print_r($wpdb);
         // die;
    update_option( "my_db_version", 1.1);

    
}
function myplugin_update_db_check() {
    global $my_db_version;
    if ( get_site_option( 'my_db_version' ) != $my_db_version ) {
        create_custom_table_func();
    }
}
add_action( 'plugins_loaded', 'myplugin_update_db_check' );
register_activation_hook( __FILE__, 'create_custom_table_func' );
//add_action("init", "create_custom_table_func");
?>