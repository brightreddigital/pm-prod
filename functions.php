<?php

/**
* Functions and definitions
* @link https://developer.wordpress.org/themes/basics/theme-functions/
* @package brightred
*/

if ( ! defined( '_S_VERSION' ) ) {
	// Release number
	define( '_S_VERSION', '0.0.1' );
}

// Includes

$roots_includes = array(
	'/inc/functions/class-tgm-plugin-activation.php',
	'/inc/functions/clean.php',
	'/inc/functions/defaults.php',
	'/inc/functions/plugins.php',
	'/inc/functions/styles.php',
	'/inc/functions/theme-options.php',
);

foreach($roots_includes as $file){
	
	if(!$filepath = locate_template($file)) {
		trigger_error("Error locating `$file` for inclusion!", E_USER_ERROR);
	}

require_once $filepath;
}

// Link to developer resources in admin area

unset($file, $filepath); 

function wpdocs_custom_admin_footer_text() {
    return '<a href="https://drive.google.com/drive/folders/19JpzmZZYlyXYA-SPcdIR21nC7zSYb71k?usp=sharing" target="_blank">Developer Reference</a>';
}
add_filter( 'admin_footer_text', 'wpdocs_custom_admin_footer_text' );

// Shortcodes
function siteURL() {
	echo '<span>' . get_site_url() . '</span>';
}

add_shortcode('siteURL', 'siteURL');


// Remove menu items if not admin



	function remove_menus(){

		 if( !current_user_can( 'administrator' ) ){

			remove_menu_page( 'tools.php' );

		}

	};

	add_action( 'admin_menu', 'remove_menus' );


