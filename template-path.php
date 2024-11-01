<?php
/*
* Plugin Name: Template Path
* Plugin URI: 
* Description: This plugin will display current page/post template file path in admin menu bar.
* Version: 1.0.1
* Author: Mithun Raval
* Author URI: http://www.ravalmithun.wordpress.com
* License: GPLv2 or later
* @package template-path
*/

/**
 *  Current user have not an administrator role or admin bar is hide, Hance return it
 * 
 * @return null
 *
 * @since 1.0
 */

function tp_admin_bar_init_method() {	
	if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
		return;
	}
	add_action( 'admin_bar_menu', 'tp_template_path_display_admin_bar_method', 10 );
}

add_action( 'admin_bar_init', 'tp_admin_bar_init_method' );
/**
 * 
 * The Page/post Template path get with wordpress global variable and display in admin bar
 *
 * @since 1.0
 */

function tp_template_path_display_admin_bar_method() {
	global $wp_admin_bar, $template;	
	$url = content_url();
	$template_name = substr( $template, ( strpos( $template, $url ) ) );	
	$wp_admin_bar->add_menu(
		array(
		'title' => $template_name,
		'href'  => false,
		'id'    => 'tp_links',
		'href'  => false
	) );
}