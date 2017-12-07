<?php

namespace GO_WP\Admin\InputCallbacks;

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
 }
 
 // callback: login section
function go_wp_callback_section_login() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Login screen.', 'go_wp') .'</p>';
	
}



// callback: admin section
function go_wp_callback_section_admin() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Admin Area.', 'go_wp') .'</p>';
	
}



// callback: text field
function go_wp_callback_field_text( $args ) {
	
	$options = get_option( 'go_wp_options' );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="go_wp_options_'. $id .'" name="go_wp_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="go_wp_options_'. $id .'">'. $label .'</label>';
	
}



// radio field options
function go_wp_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'go_wp'),
		'disable' => esc_html__('Disable custom styles', 'go_wp')
		
	);
	
}



// callback: radio field
function go_wp_callback_field_radio( $args ) {
	
	$options = get_option( 'go_wp_options' );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = go_wp_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="go_wp_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}



// callback: textarea field
function go_wp_callback_field_textarea( $args ) {
	
	$options = get_option( 'go_wp_options' );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="go_wp_options_'. $id .'" name="go_wp_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="go_wp_options_'. $id .'">'. $label .'</label>';
	
}



// callback: checkbox field
function go_wp_callback_field_checkbox( $args ) {
	
	$options = get_option( 'go_wp_options' );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="go_wp_options_'. $id .'" name="go_wp_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="go_wp_options_'. $id .'">'. $label .'</label>';
	
}



// select field options
function go_wp_options_select() {
	
	return array(
		
		'default'   => esc_html__('Default',   'go_wp'),
		'light'     => esc_html__('Light',     'go_wp'),
		'blue'      => esc_html__('Blue',      'go_wp'),
		'coffee'    => esc_html__('Coffee',    'go_wp'),
		'ectoplasm' => esc_html__('Ectoplasm', 'go_wp'),
		'midnight'  => esc_html__('Midnight',  'go_wp'),
		'ocean'     => esc_html__('Ocean',     'go_wp'),
		'sunrise'   => esc_html__('Sunrise',   'go_wp'),
		
	);
	
}



// callback: select field
function go_wp_callback_field_select( $args ) {
	
	$options = get_option( 'go_wp_options' );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = go_wp_options_select();
	
	echo '<select id="go_wp_options_'. $id .'" name="go_wp_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="go_wp_options_'. $id .'">'. $label .'</label>';
	
}