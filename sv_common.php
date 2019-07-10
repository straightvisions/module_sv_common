<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_common extends init {
		public function init() {
			// Module Info
			$this->set_module_title( 'SV Common' );
			$this->set_module_desc( __( 'This module manages general styles, scripts & dependencies.', 'sv100' ) );
	
			// Section Info
			$this->set_section_title( __( 'Common', 'sv100' ) )
				->set_section_desc( __( 'Base settings for the whole frontend.', 'sv100' ) )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) );
	
			$this->get_root()->add_section( $this );
	
			$this->load_settings()->register_scripts();
	
			// Action Hooks
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		}
		
		protected function register_scripts(): sv_common {
			$this->scripts_queue['frontend'] =
				static::$scripts->create( $this )
								->set_ID( 'frontend' )
								->set_path( 'lib/frontend/css/config.php' )
								->set_inline(true)
								->set_is_enqueued();
			
	
			return $this;
		}
		
		public function load_settings(): sv_common{
			// Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size' );
			$this->get_settings_component( 'line_height','line_height' );
			$this->get_settings_component( 'text_color','text_color' );
			
			/*
			// Link Settings
			$this->get_settings_component( 'font_family_link','font_family' );
			$this->get_settings_component( 'text_color_link','text_color' );
			$this->get_settings_component( 'text_deco_link','text_decoration' );
			$this->get_settings_component( 'text_bg_link','background_color' );
			$this->s['text_bg_active_link'] =
				$this->get_setting()
					 ->set_ID( 'text_bg_active_link' )
					 ->set_title( __( 'Activate Background Color', 'sv100' ) )
					 ->set_default_value( 0 )
					 ->load_type( 'checkbox' );
			
			// Link Settings (Hover/Focus)
			$this->get_settings_component( 'font_family_link_hover','font_family' );
			$this->get_settings_component( 'text_color_link_hover','text_color' );
			$this->get_settings_component( 'text_deco_link_hover','text_decoration' );
			$this->get_settings_component( 'text_bg_link_hover','background_color' );
			$this->s['text_bg_active_link_hover'] =
				$this->get_setting()
					 ->set_ID( 'text_bg_active_link_hover' )
					 ->set_title( __( 'Activate Background Color', 'sv100' ) )
					 ->set_default_value( 0 )
					 ->load_type( 'checkbox' );
			*/
			
			// Background Settings
			$this->get_settings_component( 'bg_color','background_color' );
			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size' );
			$this->get_settings_component( 'bg_position','background_position' );
			$this->get_settings_component( 'bg_size','background_size' );
			$this->get_settings_component( 'bg_fit','background_fit' );
			$this->get_settings_component( 'bg_repeat','background_repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment' );
			
			// Selection Settings
			$this->s['selection_color'] =
				$this->get_setting()
					 ->set_ID( 'selection_color' )
					 ->set_title( __( 'Selection Color', 'sv100' ) )
					 ->set_description( __( 'Color of selected text', 'sv100' ) )
					 ->set_default_value( '#FFFFFF' )
					 ->load_type( 'color' );
	
			$this->s['selection_color_background'] =
				$this->get_setting()
					 ->set_ID( 'selection_color_background' )
					 ->set_title( __( 'Selection Background Color', 'sv100' ) )
					 ->set_description( __( 'Background color of selected text', 'sv100' ) )
					 ->set_default_value( '#779a76' )
					 ->load_type( 'color' );
			
			$this->s['padding'] =
				$this->get_setting()
					 ->set_ID( 'padding' )
					 ->set_title( __( 'Distance to border', 'sv100' ) )
					 ->set_description( __( 'Defines the distance between your content and the window border in pixel.', 'sv100' ) )
					 ->set_default_value( 20 )
					 ->load_type( 'number' );
	
			return $this;
		}
		
		public function after_setup_theme() {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
			add_post_type_support( 'page', 'excerpt' );
		}
	}