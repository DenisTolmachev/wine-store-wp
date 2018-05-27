<?php
/**
 * Admin Class
 *
 * Handles the admin functionality of plugin
 *
 * @package WP Responsive Recent Post Slider
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wpnw_Admin {
	
	function __construct() {
		
		// Action to add admin menu
		add_action( 'admin_menu', array($this, 'wpnw_register_menu'), 12 );
		
	}

	/**
	 * Function to add menu
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wpnw_register_menu() {

		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.WPNW_POST_TYPE, __('Upgrade to PRO - WP News and Scrolling Widgets', 'sp-news-and-widget'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'sp-news-and-widget').'</span>', 'manage_options', 'wpnw-premium', array($this, 'wpnw_premium_page') );
		// Register plugin hire us page
		add_submenu_page( 'edit.php?post_type='.WPNW_POST_TYPE, __('Hire Us', 'sp-news-and-widget'), '<span style="color:#2ECC71">'.__('Hire Us', 'sp-news-and-widget').'</span>', 'manage_options', 'wpnw-hireus', array($this, 'wpnw_hireus_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wpnw_premium_page() {
		include_once( WPNW_DIR . '/admin/settings/premium.php' );		
	}
	function wpnw_hireus_page() {		
		include_once( WPNW_DIR . '/admin/settings/hire-us.php' );
	}
}

$wpnw_Admin = new Wpnw_Admin();