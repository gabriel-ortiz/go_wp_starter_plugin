<?php

namespace GO_WP\Admin\Settings\SectionSettings;

 // disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

/**
 * 
 * Set up defaults and run hooks and filters on setup
 * 
 */
 
 function setup(){
    
    $n = function( $function ){
        return __NAMESPACE__ . "\\$function";
    };
    
    //add_action( 'hook_action', $n('this_function') );
    add_action( 'admin_init', $n( 'go_wp_register_settings' ) );
 }
 




// register plugin settings
function go_wp_register_settings() {
	
	register_setting( 
		$option_group = 'go_wp_options', 
		$option_name  = 'go_wp_options'
	); 
	
	
	add_settings_section( 
		$id         = 'go_wp_section_login', 
		$title      = esc_html__('Customize Login Page', 'gp_wp'), 
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_section_login', 
		$page       = 'go_wp'
	);
	
	add_settings_section( 
		$id         = 'go_wp_section_admin', 
		$title      = esc_html__('Customize Admin Area', 'gp_wp'), 
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_section_admin', 
		$page       = 'go_wp'
	);

	
	add_settings_field(
		$id         = 'custom_url',
		$title      = esc_html__('Custom URL', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_text',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_login', 
		$args       = [ 'id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_title',
		$title      = esc_html__('Custom Title', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_text',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_login', 
		$args       = [ 'id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_style',
		$title      = esc_html__('Custom Style', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_radio',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_login', 
		$args       = [ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_message',
		$title      = esc_html__('Custom Message', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_textarea',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_login', 
		$args       = [ 'id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_footer',
		$title      = esc_html__('Custom Footer', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_text',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_admin', 
		$args       = [ 'id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_toolbar',
		$title      = esc_html__('Custom Toolbar', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_checkbox',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_admin', 
		$args       = [ 'id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'go_wp') ]
	);
	
	add_settings_field(
		$id         = 'custom_scheme',
		$title      = esc_html__('Custom Scheme', 'go_wp'),
		$callback   = '\GO_WP\Admin\InputCallbacks\go_wp_callback_field_select',
		$page       = 'go_wp', 
		$section    = 'go_wp_section_admin', 
		$args       = [ 'id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'go_wp') ]
	);
    
} 



