<?php

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'register_required_plugins' );

function register_required_plugins() {

	$plugins = array(

		// Plugins from external sources
		
		array(
			'name'         => 'Elementor Pro', 
			'slug'         => 'elementor-pro',
			'required'     => true,
			'external_url' => 'https://my.elementor.com/subscriptions/',
		),

		array(
			'name'         => 'Advanced Custom Fields PRO',
			'slug'         => 'advanced-custom-fields-pro',
			'required'     => true,
			'external_url' => 'https://www.advancedcustomfields.com/my-account/',
		),

		// Plugins from the WordPress Plugin Repository

		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => true,
		),

		array(
			'name'      => 'WP Pusher',
			'slug'      => 'wppusher',
			'required'  => true,
		),

		array(
			'name'      => 'Redirection',
			'slug'      => 'redirection',
			'required'  => true,
		),

		array(
			'name'      => 'Duplicate Page',
			'slug'      => 'duplicate-page',
			'required'  => true,
		),

		array(
			'name'      => 'LiteSpeed Cache',
			'slug'      => 'litespeed-cache',
			'required'  => true,
		),

	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}