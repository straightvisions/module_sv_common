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
			$this->set_module_title( __( 'SV Common', 'sv100' ) )
				 ->set_module_desc( __( 'Manage general styles, scripts & dependencies.', 'sv100' ) )
				 ->load_settings()
				 ->register_scripts()
				 ->set_section_title( __( 'Common', 'sv100' ) )
				 ->set_section_desc( __( 'Common settings for your website', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
	
			// Action Hooks
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		}
		
		protected function load_settings(): sv_common {
			// Content Settings
			$this->get_setting( 'max_width' )
				 ->set_title( __( 'Max width', 'sv100' ) )
				 ->set_description( __( 'Sets the max width for the content, in pixel.', 'sv100' ) )
				 ->set_default_value( 1300 )
				 ->load_type( 'number' );
			
			$this->get_setting( 'max_width_text' )
				 ->set_title( __( 'Max width - Text', 'sv100' ) )
				 ->set_description( __( 'Sets the max width for text inside the content, in pixel.', 'sv100' ) )
				 ->set_default_value( 620 )
				 ->load_type( 'number' );
			
			// Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'line_height','line_height' );
			$this->get_settings_component( 'text_color','text_color', '#1e1e1e' );
			
			// Text Settings (Mobile)
			$this->get_settings_component( 'font_size_mobile','font_size', 14 );
			$this->get_settings_component( 'line_height_mobile','line_height' );
			
			// Link Settings
			$this->get_settings_component( 'font_family_link','font_family' );
			$this->get_settings_component( 'font_size_link','font_size', 16 );
			$this->get_settings_component( 'text_color_link','text_color', '#328ce6' );
			$this->get_settings_component( 'text_deco_link','text_decoration', 'underline' );
			
			// Link Settings (Hover/Focus)
			$this->get_settings_component( 'text_color_link_hover','text_color', '#328ce6' );
			$this->get_settings_component( 'text_deco_link_hover','text_decoration', 'none' );
			
			// Selection Settings
			$this->get_setting( 'selection_color' )
				 ->set_title( __( 'Selection color', 'sv100' ) )
				 ->set_description( __( 'Color of selected text', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'selection_color_background' )
				 ->set_title( __( 'Selection background color', 'sv100' ) )
				 ->set_description( __( 'Background color of selected text', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'padding' )
				 ->set_title( __( 'Distance to border', 'sv100' ) )
				 ->set_description( __( 'The distance between your content and the window border on mobile devices, in pixels.', 'sv100' ) )
				 ->set_default_value( 20 )
				 ->load_type( 'number' );
			
			return $this;
		}
		
		protected function register_scripts(): sv_common {
			$this->get_script( 'required' )
				 ->set_path( 'lib/frontend/css/required.css' )
				 ->set_inline( true )
				 ->set_is_enqueued();
			
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
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'custom-background' );
			add_theme_support( 'custom-header' );
	
			add_post_type_support( 'page', 'excerpt' );
			
			if ( ! isset( $content_width ) ) {
				$content_width = 620;
			}
		}
	}