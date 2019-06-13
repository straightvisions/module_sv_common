<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions
 * @package			sv_100
 * @copyright		2019 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_common extends init {
	public function __construct() {

	}

	public function init() {
		// Module Info
		$this->set_module_title( 'SV Common' );
		$this->set_module_desc( __( 'This module manages general styles, scripts & dependencies.', 'sv_100' ) );

		// Loads Styles
		static::$scripts->create( $this )
			->set_ID( 'frontend' )
			->set_path( 'lib/css/frontend.css' )
			->set_inline(true)
			->set_is_enqueued();

		// Loads Scripts
		if ( ! is_admin() ) {
			//add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 11 );  @todo Removed jquery, check if this line is still needed
		}

		static::$scripts->create( $this )
			->set_ID( 'jquery' )
			->set_type( 'js' )
			->set_no_prefix( true )
			->set_path( 'lib/js/jquery-3.3.1.min.js' )
			->set_is_enqueued();

		// Action Hooks
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
	}

	public function wp_enqueue_scripts() {
		wp_deregister_script('jquery');
	}

	public function after_setup_theme() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_post_type_support( 'page', 'excerpt' );

		register_taxonomy_for_object_type( 'post_tag', 'page' );
	}
}