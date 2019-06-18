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
		$this->set_section_title( __( 'Common', 'straightvisions_100' ) )
			->set_section_desc( __( 'Base settings for the whole frontend.', 'straightvisions_100' ) )
			->set_section_type( 'settings' )
			->set_section_template_path($this->get_path('lib/backend/tpl/settings.php'));

		$this->get_root()->add_section($this);

		$this->load_settings()->register_scripts();

		// Action Hooks
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
	}
	protected function register_scripts(): sv_common {
		$this->scripts_queue['frontend'] =
			static::$scripts->create( $this )
				->set_ID( 'frontend' )
				->set_path( 'lib/frontend/css/default.css' )
				->set_inline(true)
				->set_is_enqueued();

		return $this;
	}
	public function load_settings(): sv_common{
		$fonts			= array('' => __('choose...', 'straightvisions_100'));

		foreach($this->get_module('sv_webfontloader')->get_setting('fonts')->run_type()->get_data() as $font){
			$fonts[$font['entry_label']]		= $font['entry_label'];
		}

		$this->s['font_family'] =
			$this->get_setting()
				->set_ID('font_family')
				->set_title(__('Font Family', 'straightvisions_100'))
				->set_description(__('Base font for all frontend elements.', 'straightvisions_100'))
				->load_type('select')
				->set_options($fonts);

		$this->s['font_size'] =
			$this->get_setting()
				->set_ID('font_size')
				->set_title(__('Font Size', 'straightvisions_100'))
				->set_description(__('Default Font Size in Pixel', 'straightvisions_100'))
				->set_default_value(16)
				->load_type('number');

		$this->s['font_color'] =
			$this->get_setting()
				->set_ID('font_color')
				->set_title(__('Font Color', 'straightvisions_100'))
				->set_description(__('Default Font Color', 'straightvisions_100'))
				->set_default_value('#000000')
				->load_type('color');

		$this->s['font_line_height'] =
			$this->get_setting()
				->set_ID('font_line_height')
				->set_title(__('Font Line Height', 'straightvisions_100'))
				->set_description(__('Default Line Height in Pixel', 'straightvisions_100'))
				->set_default_value(23)
				->load_type('number');

		$this->s['background_color'] =
			$this->get_setting()
				->set_ID('background_color')
				->set_title(__('Background Color', 'straightvisions_100'))
				->set_description(__('Background Color for Body', 'straightvisions_100'))
				->set_default_value('#FFFFFF')
				->load_type('color');

		$this->s['background_image'] =
			$this->get_setting()
				->set_ID('background_image')
				->set_title(__('Background Image', 'straightvisions_100'))
				->set_description(__('Background Image for Body', 'straightvisions_100'))
				->load_type('upload');

		$this->s['background_image_media_size'] =
			$this->get_setting()
				->set_ID('background_image_media_size')
				->set_title(__('Background Image Media Size', 'straightvisions_100'))
				->set_description(__('Background Image Media Size for Body', 'straightvisions_100'))
				->set_default_value('large')
				->load_type('select')
				->set_options(array_combine(get_intermediate_image_sizes(), get_intermediate_image_sizes()));

		$this->s['background_image_position'] =
			$this->get_setting()
				->set_ID('background_image_position')
				->set_title(__('Background Position', 'straightvisions_100'))
				->set_description(__('Background Image Position Value', 'straightvisions_100'))
				->set_placeholder('center top')
				->set_default_value('center top')
				->load_type('text');

		$this->s['background_image_size'] =
			$this->get_setting()
				->set_ID('background_image_size')
				->set_title(__('Background Size', 'straightvisions_100'))
				->set_description(__('Background Image Size Value', 'straightvisions_100'))
				->set_placeholder('cover')
				->set_default_value('cover')
				->load_type('text');

		$this->s['background_image_repeat'] =
			$this->get_setting()
				->set_ID('background_image_repeat')
				->set_title(__('Background Repeat', 'straightvisions_100'))
				->set_description(__('Background Image Repeat', 'straightvisions_100'))
				->set_default_value('no-repeat')
				->load_type('select')
				->set_options(array(
					'' => __('choose...', 'straightvisions_100'),
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y',
					'no-repeat' => 'no-repeat',
					'space' => 'space',
					'round' => 'round',
					'initial' => 'initial',
					'inherit' => 'inherit'
				));

		$this->s['background_image_attachment'] =
			$this->get_setting()
				->set_ID('background_image_attachment')
				->set_title(__('Background Attachment', 'straightvisions_100'))
				->set_description(__('Background Image Attachment', 'straightvisions_100'))
				->set_default_value('fixed')
				->load_type('select')
				->set_options(array(
					'' => __('choose...', 'straightvisions_100'),
					'scroll' => 'scroll',
					'fixed' => 'fixed',
					'local' => 'local',
					'initial' => 'initial',
					'inherit' => 'inherit'
				));

		$this->s['selection_color'] =
			$this->get_setting()
				->set_ID('selection_color')
				->set_title(__('Selection Color', 'straightvisions_100'))
				->set_description(__('Color of selected text', 'straightvisions_100'))
				->set_default_value('#FFFFFF')
				->load_type('color');

		$this->s['selection_color_background'] =
			$this->get_setting()
				->set_ID('selection_color_background')
				->set_title(__('Selection Background Color', 'straightvisions_100'))
				->set_description(__('Background color of selected text', 'straightvisions_100'))
				->set_default_value('#779a76')
				->load_type('color');

		return $this;
	}
	public function after_setup_theme() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_post_type_support( 'page', 'excerpt' );
	}
}