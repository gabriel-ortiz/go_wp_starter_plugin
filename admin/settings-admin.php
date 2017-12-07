<?php

namespace GO_WP\Admin\Settings;

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
    add_action( 'admin_menu', $n('go_wp_add_sublevel_menu') );
 }
 
 // add sub-level administrative menu
function go_wp_add_sublevel_menu() {
	
	add_submenu_page(
		$parent_slug    = 'options-general.php',
		$page_title     = esc_html__('go_wp Settings', 'go_wp'),
		$menu_title     = esc_html__('go_wp', 'go_wp'),
		$capability     = 'manage_options',
		$menu_slug      = 'go_wp',
		$function       = '\GO_WP\Admin\Settings\go_wp_display_settings_page'
    );

}

// display the plugin settings page
function go_wp_display_settings_page() {
	
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		
		
		<form action="options.php" method="post">
			
			<?php
			
			// output security fields
			settings_fields( $option_group = 'go_wp_options' );
			
			// output setting sections
			do_settings_sections( $page = 'go_wp' );
			
			// submit button
			submit_button();
			
			?>
			
		</form>
	</div>
	
	<?php
	
}