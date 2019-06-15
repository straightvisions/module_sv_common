<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions
 * @package			straightvisions_100
 * @copyright		2019 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_common extends init {
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Common' );
		$this->set_module_desc( __( 'This module manages general styles, scripts & dependencies.', 'straightvisions_100' ) );

		// Section Info
		$this->set_section_title( __( 'Common', 'straightvisions_100' ) );
		$this->set_section_desc( __( 'Settings', 'straightvisions_100' ) );
		$this->set_section_type( 'settings' );
		$this->get_root()->add_section( $this );

		$this->load_settings()->register_scripts();

		// Action Hooks
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
	}
	protected function register_scripts(): sv_common {
		$this->scripts_queue['frontend'] =
			static::$scripts->create( $this )
				->set_ID( 'frontend' )
				->set_path( 'lib/css/frontend.css' )
				->set_inline(true)
				->set_is_enqueued();

		return $this;
	}
	public function load_settings(): sv_common{
		$fonts			= array();
		foreach($this->get_root()->sv_webfontloader->get_setting('fonts')->run_type()->get_data() as $font){
			$fonts[$font['family']]		= $font['entry_label'];
		}

		$this->s['font_family'] =
			$this->get_setting()
				->set_ID('font_family')
				->set_title(__('Font Family', 'straightvisions_100'))
				->set_description(__('Base Font Family', 'straightvisions_100'))
				->load_type('select')
				->set_options($fonts);

		$this->s['font_size'] =
			$this->get_setting()
				->set_ID('font_size')
				->set_title(__('Font Size', 'straightvisions_100'))
				->set_description(__('Base Font Size in Pixel', 'straightvisions_100'))
				->set_default_value(16)
				->load_type('number');

		$this->s['font_color'] =
			$this->get_setting()
				->set_ID('font_color')
				->set_title(__('Font Color', 'straightvisions_100'))
				->set_description(__('Base Font Color', 'straightvisions_100'))
				->set_default_value('0,0,0')
				->load_type('text');

		$this->s['font_line_height'] =
			$this->get_setting()
				->set_ID('font_line_height')
				->set_title(__('Font Line Height', 'straightvisions_100'))
				->set_description(__('Base Line Height in Pixel', 'straightvisions_100'))
				->set_default_value(23)
				->load_type('number');

		$this->s['background_color'] =
			$this->get_setting()
				->set_ID('background_color')
				->set_title(__('Background Color', 'straightvisions_100'))
				->set_description(__('Base Background Color', 'straightvisions_100'))
				->set_default_value('45,206,203')
				->load_type('text');

		$this->s['background_image'] =
			$this->get_setting()
				->set_ID('background_image')
				->set_title(__('Background Image', 'straightvisions_100'))
				->set_description(__('Base Background Image', 'straightvisions_100'))
				->load_type('upload');

		$this->s['background_position'] =
			$this->get_setting()
				->set_ID('background_position')
				->set_title(__('Background Position', 'straightvisions_100'))
				->set_description(__('Base Background Position', 'straightvisions_100'))
				->load_type('text');

		$this->s['background_repeat'] =
			$this->get_setting()
				->set_ID('background_repeat')
				->set_title(__('Background Repeat', 'straightvisions_100'))
				->set_description(__('Base Background Repeat', 'straightvisions_100'))
				->load_type('text');

		$this->s['background_attachment'] =
			$this->get_setting()
				->set_ID('background_attachment')
				->set_title(__('Background Attachment', 'straightvisions_100'))
				->set_description(__('Base Background Attachment', 'straightvisions_100'))
				->load_type('text');

		return $this;
	}
	public function after_setup_theme() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_post_type_support( 'page', 'excerpt' );
	}
}