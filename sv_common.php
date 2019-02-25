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
		$this->set_module_desc( __( 'This module manages general styles, scripts & dependencies.', $this->get_module_name() ) );

		// Loads Styles
		static::$scripts->create( $this )
		                ->set_ID( 'frontend' )
		                ->set_source( $this->get_file_url( 'lib/css/frontend.css' ), $this->get_file_path( 'lib/css/frontend.css' ) );

		// Loads Scripts
		if ( ! is_admin() ) {
			//add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 11 );  @todo Removed jquery, check if this line is still needed
		}

		$js_jquery = static::$scripts->create( $this )
		                             ->set_ID( 'jquery' )
		                             ->set_type( 'js' )
		                             ->set_no_prefix( true )
		                             ->set_source( $this->get_file_url( 'lib/js/jquery-3.3.1.min.js' ), $this->get_file_path( 'lib/js/jquery-3.3.1.min.js' ) );

		// Action Hooks
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ), 999999 );
	}

	public function wp_enqueue_scripts() {
		wp_deregister_script('jquery');
	}

	public function after_setup_theme() {
		load_theme_textdomain( 'sv_100', get_template_directory() . '/lib/lang' );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_post_type_support( 'page', 'excerpt' );

		register_taxonomy_for_object_type( 'post_tag', 'page' );
	}

	public function wp_footer() {
		$theme = wp_get_theme();

		echo "\n\n" . '<!-- This website uses the ' . $theme->get( 'Name' ) . ' Theme by ' . $theme->get( 'Author' ) . ' (' . $theme->get( 'AuthorURI' ) . ') -->' . "\n\n";
	}
}