<?php
/*
Plugin Name:  go_wp
Description:  Plugin Description
Plugin URI:   http://gabrielortizart.com
Author:       Gabriel Ortiz
Version:      0.1.0
Text Domain:  go_wp
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

//exit if file is called directly
if( ! defined('ABSPATH') ){
    exit;
}

//search and replace for changing plugin prefix
//find ./ -type f -exec sed -i -e 's/GO_WP/FWF/g' {} \;
//find ./ -type f -exec sed -i -e 's/go_wp/fwf/g' {} \; 

// find ./ -type f -exec sed -i 's/go_wp/fw/gI' {} \; 
//  find ./ -type f -exec sed -i -e 's/GO_WP/fw/g' {} \; 

//useful global constants
define( 'GO_WP_VERSION', '0.1.0');
define( 'GO_WP_PATH', plugin_dir_path( __FILE__ ) );
define( 'GO_WP_INC', plugin_dir_path( __FILE__ ).'includes/');
define( 'GO_WP_ADMIN', plugin_dir_path( __FILE__ ).'admin/');
define( 'GO_WP_PUBLIC', plugin_dir_path( __FILE__ ).'public/');
define( 'GO_WP_LANG', plugin_dir_path( __FILE__ ).'languages/');
define( 'GO_WP_LIBRARIES', plugin_dir_path( __FILE__ ).'Libraries/');

//global style urls
define('GO_WP_ASSETS', plugins_url().'/go_wp_plugin/assets/');
define('GO_WP_DIST', plugins_url().'/go_wp_plugin/dist/');

if ( ! defined( 'MINUTE_IN_SECONDS' ) ) {
    define( 'MINUTE_IN_SECONDS',  60 );
}

//LOAD THE INCLUDED FUNCTIONS
//require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';
require_once( GO_WP_LIBRARIES . 'extended-cpts.php' );
require_once( GO_WP_LIBRARIES . 'extended-taxos.php' );


//INCLUDE THE ADMIN FUNCTIONS

require_once GO_WP_ADMIN . 'settings-admin.php';
require_once GO_WP_ADMIN . 'sections-settings-admin.php';
require_once GO_WP_ADMIN . 'input-callbacks-admin.php';
require_once GO_WP_ADMIN . 'settings-notices-admin.php';

//INCLUDE THE PUBLIC FUNCTIONS


//RUN THE SETUP ADMIN FUNCTIONS
if ( is_admin() ) {

	// include dependencies
	GO_WP\Admin\Settings\setup();
	GO_WP\Admin\Settings\SectionSettings\setup();
	
}


//RUN THE PUBLIC FUNCTIONS
//GO_WP\Title\setup();

// default plugin options
// function myplugin_options_default() {

// 	return array(
// 		'custom_url'     => 'https://wordpress.org/',
// 		'custom_title'   => esc_html__('Powered by WordPress','myplugin'),
// 		'custom_style'   => 'enable',
// 		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'myplugin').'</p>',
// 		'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
// 		'custom_toolbar' => false,
// 		'custom_scheme'  => 'default',
// 	);

// }



// load text domain
function go_wp_load_textdomain() {
	
	load_plugin_textdomain( 'go_wp', false, GO_WP_LANG );
	
}
add_action( 'plugins_loaded', 'go_wp_load_textdomain' );



