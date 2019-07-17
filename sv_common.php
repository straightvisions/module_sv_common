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
			$this->set_module_title( 'SV Common' )
				 ->set_module_desc( __( 'This module manages general styles, scripts & dependencies.', 'sv100' ) )
				 ->load_settings()
				 ->register_scripts()
				 ->set_section_title( __( 'Common', 'sv100' ) )
				 ->set_section_desc( __( 'Base settings for the whole frontend.', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
	
			// Action Hooks
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		}
		
		protected function load_settings(): sv_common {
			// Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'line_height','line_height', 23 );
			$this->get_settings_component( 'text_color','text_color', '#1e1f22' );
			
			// Background Settings
			$this->get_settings_component( 'bg_color','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size', 'large' );
			$this->get_settings_component( 'bg_position','background_position', 'center top' );
			$this->get_settings_component( 'bg_size','background_size', 0 );
			$this->get_settings_component( 'bg_fit','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment', 'fixed' );
			
			// Selection Settings
			$this->get_setting( 'selection_color' )
				 ->set_title( __( 'Selection Color', 'sv100' ) )
				 ->set_description( __( 'Color of selected text', 'sv100' ) )
				 ->set_default_value( '#FFFFFF' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'selection_color_background' )
				 ->set_title( __( 'Selection Background Color', 'sv100' ) )
				 ->set_description( __( 'Background color of selected text', 'sv100' ) )
				 ->set_default_value( '#358ae9' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'padding' )
				 ->set_title( __( 'Distance to border', 'sv100' ) )
				 ->set_description( __( 'Defines the distance between your content and the window border in pixel.', 'sv100' ) )
				 ->set_default_value( 20 )
				 ->load_type( 'number' );
			
			return $this;
		}
		
		protected function register_scripts(): sv_common {
			$this->get_script( 'inline_config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true )
				 ->set_is_enqueued();
			
			$this->get_script( 'gutenberg' )
				 ->set_path( 'lib/backend/css/gutenberg_config.php' )
				 ->set_is_gutenberg()
				 ->set_inline( true )
				 ->set_is_enqueued();
			
			return $this;
		}
		
		public function after_setup_theme() {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
			add_theme_support( 'custom-logo' );
	
			add_post_type_support( 'page', 'excerpt' );
		}
	}