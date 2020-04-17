<?php
	namespace sv100;
	
	/**
	 * @version         4.150
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
				->set_section_order(10)
				->get_root()
				->add_section( $this );

			add_filter('sv100_breakpoints', array($this, 'set_breakpoints'));
	
			// Action Hooks
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		}

		public function set_breakpoints(array $breakpoints){
			return array( // number = min width
				'mobile'						=> $this->get_setting( 'breakpoint_mobile' )->get_data(),		// mobile first!
				'mobile_landscape'				=> $this->get_setting( 'breakpoint_mobile_landscape' )->get_data(),
				'tablet'						=> $this->get_setting( 'breakpoint_tablet' )->get_data(),
				'tablet_landscape'				=> $this->get_setting( 'breakpoint_tablet_landscape' )->get_data(),
				'desktop'						=> $this->get_setting( 'breakpoint_desktop' )->get_data(),
			);
		}
		
		protected function load_settings(): sv_common {
			// Breakpoints
			$this->get_setting( 'breakpoint_mobile' )
				->set_title( __( 'Mobile', 'sv100' ) )
				->set_description( __( 'Minimum Size', 'sv100' ) )
				->set_default_value( 0 )
				->set_disabled(true)
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_mobile_landscape' )
				->set_title( __( 'Mobile (Landscape)', 'sv100' ) )
				->set_description( __( 'Small devices like landscape phones and less.', 'sv100' ) )
				->set_default_value( 576 )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet' )
				->set_title( __( 'Tablet', 'sv100' ) )
				->set_description( __( 'Medium devices like tablets and less.', 'sv100' ) )
				->set_default_value( 768 )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_landscape' )
				->set_title( __( 'Tablet (Landscape)', 'sv100' ) )
				->set_description( __( 'Large devices like landscape tablets and up.', 'sv100' ) )
				->set_default_value( 992 )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_desktop' )
				->set_title( __( 'Desktop', 'sv100' ) )
				->set_description( __( 'Desktop Devices', 'sv100' ) )
				->set_default_value( 1200 )
				->load_type( 'number' );

			// Mobile
			$this->get_setting( 'mobile_zoom' )
				 ->set_title( __( 'Mobile Zoom', 'sv100' ) )
				 ->set_description( __( 'Allows user to zoom in the page on mobile devices.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'checkbox' );
			
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
			$this->get_setting( 'font_family' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( '1.5' )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );
			
			// Text Settings (Mobile)
			$this->get_setting( 'font_size_mobile' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 14 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_mobile' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( '1.5' )
				 ->load_type( 'text' );
			
			// Link Settings
			$this->get_setting( 'font_family_link' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'text_color_link' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_link' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );
			
			// Link Settings (Hover/Focus)
			$this->get_setting( 'text_color_link_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_link_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'none' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );
			
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
			
			return $this;
		}

		public function after_setup_theme() {
			global $content_width;
			$content_width = intval($this->get_setting( 'max_width' )->get_data());

			add_image_size(
				'sv100_large',
				$this->get_setting( 'max_width' )->get_data()
			);
			add_image_size(
				'sv100_medium',
				$this->get_setting( 'max_width_text' )->get_data()
			);

			add_image_size(
				'sv100_thumbnail', 400
			);

			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'custom-background' );
			add_theme_support( 'custom-header' );
			add_theme_support( 'align-wide' );
	
			add_post_type_support( 'page', 'excerpt' );

			add_theme_support( 'editor-font-sizes', array(
				array(
					'name' => __( 'Small', 'sv100' ),
					'size' => 14,
					'slug' => 'small'
				),
				array(
					'name' => __( 'Normal', 'sv100' ),
					'size' => 16,
					'slug' => 'normal'
				),
				array(
					'name' => __( 'Medium', 'sv100' ),
					'size' => 24,
					'slug' => 'normal'
				),
				array(
					'name' => __( 'Large', 'sv100' ),
					'size' => 32,
					'slug' => 'large'
				),
				array(
					'name' => __( 'Huge', 'sv100' ),
					'size' => 64,
					'slug' => 'huge'
				)
			) );
		}
	}