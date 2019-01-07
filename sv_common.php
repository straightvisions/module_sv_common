<?php
namespace sv_100;

/**
 * @author			straightvisions
 * @package			sv_100
 * @copyright		2019 Matthias Reuter
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_common extends init {
	static $scripts_loaded						= false;

	public function __construct( $path, $url ) {
		$this->path								= $path;
		$this->url								= $url;
		$this->name								= get_class($this);

		// Enqueues Dependencies
		$this->module_enqueue_scripts(
			true,
			array(
				$this->get_module_name() . '_css_bootstrap',
			),
			array(
				$this->get_module_name() . '_js_bootstrap',
			),
			array(
				'css/bootstrap.min.css'             => false,
			),
			array(
				'js/jquery-3.3.1.min.js'            => false,
				'js/bootstrap.bundle.min.js'        => array( 'jquery' ),
			)
		);

		// Action Hooks
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ), 999999 );
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

		echo "\n\n" . '<!-- This website uses the ' . $theme->get('Name') . ' Theme by ' . $theme->get('Author') . ' (' . $theme->get('AuthorURI') . ') -->' . "\n\n";
	}
}