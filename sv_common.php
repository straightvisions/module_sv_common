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
		private $editor_font_sizes		= false;

		public function init() {
			$this->editor_font_sizes	= array(
				array(
					'name' => __( 'Small', 'sv100' ),
					'size' => 12,
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
					'slug' => 'medium'
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
			);

			$this->set_module_title( __( 'SV Common', 'sv100' ) )
				->set_module_desc( __( 'Manage general styles, scripts & dependencies.', 'sv100' ) )
				->load_settings()
				->load_settings_editor_font_sizes()
				->register_scripts()
				->add_theme_support()
				->set_section_title( __( 'Common', 'sv100' ) )
				->set_section_desc( __( 'Common settings for your website', 'sv100' ) )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(10)
				->get_root()
				->add_section( $this );

			add_filter('sv100_breakpoints', array($this, 'set_breakpoints'));

			// add customizer CSS to Block Editor
			add_action( 'enqueue_block_editor_assets', function() {
				wp_add_inline_style('sv_core_gutenberg_style', wp_get_custom_css());
			});
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
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '255,255,255,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'max_width_alignfull' )
				->set_title( __( 'Full Max Width', 'sv100' ) )
				->set_description( __( 'Sets the max width for the content, in pixel.', 'sv100' ) )
				->set_default_value( '100vw' )
				->load_type( 'number' );

			$this->get_setting( 'max_width_alignwide' )
				 ->set_title( __( 'Wide Max Width', 'sv100' ) )
				 ->set_description( __( 'Sets the max width for the content, in pixel.', 'sv100' ) )
				 ->set_default_value( 1300 )
				 ->load_type( 'number' );
			
			$this->get_setting( 'max_width_text' )
				 ->set_title( __( 'Text Max Width', 'sv100' ) )
				 ->set_description( __( 'Sets the max width for text inside the content, in pixel.', 'sv100' ) )
				 ->set_default_value( 820 )
				 ->load_type( 'number' );
			
			// Text Settings
			$this->get_setting( 'font' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Set a Font Family', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->set_is_responsive(true)
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( '1.5' )
				->set_is_responsive(true)
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '30,30,30,1' )
				->set_is_responsive(true)
				 ->load_type( 'color' );
			
			// Link Settings
			$this->get_setting( 'font_link' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'text_color_link' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '50,140,230,1' )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_link' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				->set_is_responsive(true)
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
				 ->set_default_value( '50,140,230,1' )
				->set_is_responsive(true)
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
				->set_is_responsive(true)
				 ->load_type( 'select' );
			
			// Selection Settings
			$this->get_setting( 'selection_color' )
				 ->set_title( __( 'Selection color', 'sv100' ) )
				 ->set_description( __( 'Color of selected text', 'sv100' ) )
				 ->set_default_value( '255,255,255,1' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'selection_color_background' )
				 ->set_title( __( 'Selection background color', 'sv100' ) )
				 ->set_description( __( 'Background color of selected text', 'sv100' ) )
				 ->set_default_value( '50,140,230,0.5' )
				 ->load_type( 'color' );
			
			return $this;
		}
		public function get_max_width_options(): array{
			$alignfull_value = (is_numeric($this->get_setting( 'max_width_alignfull' )->get_data())) ?
				$this->get_setting( 'max_width_alignfull' )->get_data().'px' :
				$this->get_setting( 'max_width_alignfull' )->get_data();

			$alignwide_value = $this->get_setting( 'max_width_alignwide' )->get_data().'px';
			$text_value = $this->get_setting( 'max_width_text' )->get_data().'px';


			return array(
				'100vw'					=> 'Full Screen Width (100vw)',
				'100%'					=> 'Full Box Width (100%)',
				$alignfull_value		=> 	$this->get_setting( 'max_width_alignfull' )->get_title().' ('.$alignfull_value.')',
				$alignwide_value		=> 	$this->get_setting( 'max_width_alignwide' )->get_title().' ('.$alignwide_value.')',
				$text_value				=> 	$this->get_setting( 'max_width_text' )->get_title().' ('.$text_value.')'
			);
		}
		public function get_editor_font_sizes(): array{
			return apply_filters($this->get_prefix('editor_font_sizes'), $this->editor_font_sizes);
		}
		protected function load_settings_editor_font_sizes(): sv_common{
			$font_sizes					= $this->get_editor_font_sizes();
			$font_sizes_filtered		= array();

			foreach($font_sizes as $font_size) {
				$this->get_setting('editor_font_size_' . $font_size['slug'])
					->set_title(__('Font Size ', 'sv100').$font_size['name'])
					->set_description(__('Font Size in pixel.', 'sv100'))
					->set_default_value($font_size['size'])
					->load_type('number');


				$font_sizes_filtered[]		= array(
					'name'		=> $font_size['name'],
					'slug'		=> $font_size['slug'],
					'size'		=> $this->get_setting('editor_font_size_' . $font_size['slug'])->get_data()
				);
			}

			add_filter($this->get_prefix('editor_font_sizes'), function() use($font_sizes_filtered){ return $font_sizes_filtered; });

			return $this;
		}
		
		protected function register_scripts(): sv_common {
			$this->get_script( 'common' )
				->set_path( 'lib/frontend/css/common.css' )
				->set_inline( true )
				->set_is_enqueued();

			$this->get_script( 'config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true )
				->set_is_gutenberg()
				 ->set_is_enqueued();

			return $this;
		}

		public function add_theme_support(): sv_common {
			global $content_width;
			$content_width = intval($this->get_setting( 'max_width_alignwide' )->get_data());

			add_image_size(
				'sv100_large',
				$this->get_setting( 'max_width_alignwide' )->get_data()
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

			add_theme_support( 'editor-font-sizes', $this->get_editor_font_sizes());

			return $this;
		}
	}