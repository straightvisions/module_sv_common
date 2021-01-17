<?php
	namespace sv100;

	class sv_common extends init {
		private $editor_font_sizes		= false;

		public function init() {
			$this->set_module_title( __( 'SV Common', 'sv100' ) )
				->set_module_desc( __( 'Common settings for your website', 'sv100' ) )
				->load_settings()
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(1000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 2c1.654 0 3 1.346 3 3v14c0 1.654-1.346 3-3 3h-14c-1.654 0-3-1.346-3-3v-14c0-1.654 1.346-3 3-3h14zm5 3c0-2.761-2.238-5-5-5h-14c-2.762 0-5 2.239-5 5v14c0 2.761 2.238 5 5 5h14c2.762 0 5-2.239 5-5v-14zm-13 12h-2v3h-2v-3h-2v-3h6v3zm-2-13h-2v8h2v-8zm10 5h-6v3h2v8h2v-8h2v-3zm-2-5h-2v3h2v-3z"/></svg>')
				->add_theme_support()
				->get_root()
				->add_section( $this );

			add_filter('sv100_breakpoints', array($this, 'set_breakpoints'));

			// add customizer CSS to Block Editor
			add_action( 'enqueue_block_editor_assets', function() {
				wp_add_inline_style('sv_core_gutenberg_style', wp_get_custom_css());
			});
		}
		public function enqueue_scripts() {
			if(!is_admin()){
				$this->register_scripts();

				foreach($this->get_scripts() as $script){
					$script->set_inline( true )->set_is_enqueued();
				}
			}

			return $this;
		}

		public function set_breakpoints(array $breakpoints){
			return array( // number = min width
				'mobile'						=> $this->get_setting( 'breakpoint_mobile' )->get_data(),		// mobile first!
				'mobile_landscape'				=> $this->get_setting( 'breakpoint_mobile_landscape' )->get_data(),
				'tablet'						=> $this->get_setting( 'breakpoint_tablet' )->get_data(),
				'tablet_landscape'				=> $this->get_setting( 'breakpoint_tablet_landscape' )->get_data(),
				'tablet_pro'					=> $this->get_setting( 'breakpoint_tablet_pro' )->get_data(),
				'tablet_pro_landscape'			=> $this->get_setting( 'breakpoint_tablet_pro_landscape' )->get_data(),
				'desktop'						=> $this->get_setting( 'breakpoint_desktop' )->get_data(),
			);
		}
		
		protected function load_settings(): sv_common {
			$breakpoints = $this->get_breakpoints();
			// Breakpoints
			$this->get_setting( 'breakpoint_mobile' )
				->set_title( __( 'Mobile', 'sv100' ) )
				->set_description( __( 'Minimum Size', 'sv100' ) )
				->set_default_value( $breakpoints['mobile'] )
				->set_disabled(true)
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_mobile_landscape' )
				->set_title( __( 'Mobile (Landscape)', 'sv100' ) )
				->set_description( __( 'Small devices like landscape phones and less.', 'sv100' ) )
				->set_default_value( $breakpoints['mobile_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet' )
				->set_title( __( 'Tablet', 'sv100' ) )
				->set_description( __( 'Medium devices like tablets and less.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_landscape' )
				->set_title( __( 'Tablet (Landscape)', 'sv100' ) )
				->set_description( __( 'Medium devices like landscape tablets and up.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_pro' )
				->set_title( __( 'Tablet Pro', 'sv100' ) )
				->set_description( __( 'Large tablets or less.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_pro'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_pro_landscape' )
				->set_title( __( 'Tablet Pro (Landscape)', 'sv100' ) )
				->set_description( __( 'Large tablets landscape or laptops.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_pro_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_desktop' )
				->set_title( __( 'Desktop', 'sv100' ) )
				->set_description( __( 'Desktop Devices', 'sv100' ) )
				->set_default_value( $breakpoints['desktop'] )
				->load_type( 'number' );

			$this->get_setting( 'hyphens' )
				->set_title( __( 'Hyphens', 'sv100' ) )
				->set_description( __( 'Browser Behavior', 'sv100' ) )
				->set_options( array(
					'none'		=> 'none',
					'manual'	=> 'manual',
					'auto'		=> 'auto'
				) )
				->set_default_value( 'auto' )
				->load_type( 'select' );

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
				->set_default_value( '' )
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

			// Font Sizes
			$this->get_setting( 'font_size_normal' ) // default && normal
				->set_title( __( 'Default', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( 16 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'font_size_small' ) // default
			->set_title( __( 'Small', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( 12 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'font_size_medium' ) // default
			->set_title( __( 'Medium', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( 24 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'font_size_large' ) // default
			->set_title( __( 'Large', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( 32 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'font_size_huge' ) // default
			->set_title( __( 'Huge', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( 64 )
				->set_is_responsive(true)
				->load_type( 'number' );
			
			// Text Settings
			$this->get_setting( 'font' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Set a Font Family', 'sv100' ) )
				 ->set_default_value('sans-serif')
				 ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				 ->set_is_responsive(true)
				 ->load_type( 'select' );

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
				 ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
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
					'none'					=> __( 'None', 'sv100' ),
					'underline'			=> __( 'Underline', 'sv100' ),
					'underline_dashed'	=> __( 'Underline Dashed', 'sv100' ),
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
					'none'					=> __( 'None', 'sv100' ),
					'underline'			=> __( 'Underline', 'sv100' ),
					'underline_dashed'	=> __( 'Underline Dashed', 'sv100' ),
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

			$this->load_settings_editor_font_sizes();
			
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
			$this->editor_font_sizes	= array(
				array(
					'name' => __( 'Small', 'sv100' ),
					'size' => $this->get_setting( 'font_size_small' )->get_data()['desktop'],
					'slug' => 'small'
				),
				array(
					'name' => __( 'Normal', 'sv100' ),
					'size' => $this->get_setting( 'font_size_normal' )->get_data()['desktop'],
					'slug' => 'normal'
				),
				array(
					'name' => __( 'Medium', 'sv100' ),
					'size' => $this->get_setting( 'font_size_medium' )->get_data()['desktop'],
					'slug' => 'medium'
				),
				array(
					'name' => __( 'Large', 'sv100' ),
					'size' => $this->get_setting( 'font_size_large' )->get_data()['desktop'],
					'slug' => 'large'
				),
				array(
					'name' => __( 'Huge', 'sv100' ),
					'size' => $this->get_setting( 'font_size_huge' )->get_data()['desktop'],
					'slug' => 'huge'
				)
			);

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
		public function add_theme_support(): sv_common {
			global $content_width;
			$content_width = intval($this->get_setting( 'max_width_alignwide' )->get_data());

			update_option( 'thumbnail_size_w', 400 );
			update_option( 'thumbnail_size_h', 0 );
			update_option( 'thumbnail_crop', 0 );

			update_option( 'thumb_size_w', 400 );
			update_option( 'thumb_size_h', 0 );
			update_option( 'thumb_crop', 0 );

			update_option( 'medium_size_w', $this->get_setting( 'max_width_text' )->get_data() );
			update_option( 'medium_size_h', 0 );
			update_option( 'medium_crop', 0 );

			update_option( 'medium_large_size_w', $this->get_setting( 'max_width_alignwide' )->get_data());
			update_option( 'medium_large_size_h', 0 );
			update_option( 'medium_large_crop', 0 );

			update_option( 'large_size_w', $this->get_setting( 'max_width_alignwide' )->get_data() * 1.5  );
			update_option( 'large_size_h', 0 );
			update_option( 'large_crop', 0 );

			update_option( 'post-thumbnail_size_w', $this->get_setting( 'max_width_alignwide' )->get_data() );
			update_option( 'post-thumbnail_size_h', 0 );
			update_option( 'post-thumbnail_crop', 0 );

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