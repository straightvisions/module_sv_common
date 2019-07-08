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
								->set_path( 'lib/frontend/css/default.css' )
								->set_inline( true )
								->set_is_enqueued();
	
			return $this;
		}
		
		public function load_settings(): sv_common{
			$fonts			= array( '' => __( 'choose...', 'sv100' ) );
			$font_array 	= $this->get_module( 'sv_webfontloader' )->get_setting( 'fonts' )->run_type()->get_data();
	
			if ( $font_array ) {
				foreach( $font_array as $font ) {
					$fonts[ $font['entry_label'] ]		= $font['entry_label'];
				}
			}
	
			$this->s['font_family'] =
				$this->get_setting()
					 ->set_ID( 'font_family' )
					 ->set_title( __( 'Font Family', 'sv100' ) )
					 ->set_description( __( 'Base font for all frontend elements.', 'sv100' ) )
					 ->load_type( 'select' )
					 ->set_options( $fonts );
	
			$this->s['font_size'] =
				$this->get_setting()
					 ->set_ID( 'font_size' )
					 ->set_title( __( 'Font Size', 'sv100' ) )
					 ->set_description( __( 'Default Font Size in Pixel', 'sv100' ) )
					 ->set_default_value( 16 )
					 ->load_type( 'number' );
	
			$this->s['font_color'] =
				$this->get_setting()
					 ->set_ID( 'font_color' )
					 ->set_title( __( 'Font Color', 'sv100' ) )
					 ->set_description( __( 'Default Font Color', 'sv100' ) )
					 ->set_default_value( '#000000' )
					 ->load_type( 'color' );
	
			$this->s['font_line_height'] =
				$this->get_setting()
					 ->set_ID( 'font_line_height' )
					 ->set_title( __( 'Font Line Height', 'sv100' ) )
					 ->set_description( __( 'Default Line Height in Pixel', 'sv100' ) )
					 ->set_default_value( 23 )
					 ->load_type( 'number' );
	
			$this->s['background_color'] =
				$this->get_setting()
					 ->set_ID( 'background_color' )
					 ->set_title( __( 'Background Color', 'sv100' ) )
					 ->set_description( __( 'Background Color for Body', 'sv100' ) )
					 ->set_default_value( '#FFFFFF' )
					 ->load_type( 'color' );
	
			$this->s['background_image'] =
				$this->get_setting()
					 ->set_ID( 'background_image' )
					 ->set_title( __('Background Image', 'sv100' ) )
					 ->set_description( __( 'Background Image for Body', 'sv100' ) )
					 ->load_type( 'upload' );
	
			$this->s['background_image_media_size'] =
				$this->get_setting()
					 ->set_ID( 'background_image_media_size' )
					 ->set_title( __( 'Background Image Media Size', 'sv100' ) )
					 ->set_description( __( 'Background Image Media Size for Body', 'sv100' ) )
					 ->set_default_value( 'large' )
					 ->load_type( 'select' )
					 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) );
	
			$this->s['background_image_position'] =
				$this->get_setting()
					 ->set_ID( 'background_image_position' )
					 ->set_title( __( 'Background Position', 'sv100' ) )
					 ->set_description( __( 'Background Image Position Value', 'sv100' ) )
					 ->set_placeholder( 'center top' )
					 ->set_default_value( 'center top' )
					 ->load_type( 'text' );
	
			$this->s['background_image_size'] =
				$this->get_setting()
					 ->set_ID( 'background_image_size' )
					 ->set_title( __( 'Background Size', 'sv100' ) )
					 ->set_description( __( 'Background Image Size Value', 'sv100' ) )
					 ->set_placeholder( 'cover' )
					 ->set_default_value( 'cover' )
					 ->load_type( 'text' );
	
			$this->s['background_image_repeat'] =
				$this->get_setting()
					 ->set_ID( 'background_image_repeat' )
					 ->set_title( __( 'Background Repeat', 'sv100' ) )
					 ->set_description( __( 'Background Image Repeat', 'sv100' ) )
					 ->set_default_value( 'no-repeat' )
					 ->load_type( 'select' )
					 ->set_options(
						array(
							'' 			=> __( 'choose...', 'sv100' ),
							'repeat' 	=> 'repeat',
							'repeat-x' 	=> 'repeat-x',
							'repeat-y' 	=> 'repeat-y',
							'no-repeat' => 'no-repeat',
							'space' 	=> 'space',
							'round' 	=> 'round',
							'initial' 	=> 'initial',
							'inherit' 	=> 'inherit'
						)
					);
	
			$this->s['background_image_attachment'] =
				$this->get_setting()
					 ->set_ID( 'background_image_attachment' )
					 ->set_title( __( 'Background Attachment', 'sv100' ) )
					 ->set_description( __( 'Background Image Attachment', 'sv100' ) )
					 ->set_default_value( 'fixed' )
					 ->load_type( 'select' )
					 ->set_options(
						array(
							'' 			=> __('choose...', 'sv100'),
							'scroll' 	=> 'scroll',
							'fixed' 	=> 'fixed',
							'local' 	=> 'local',
							'initial' 	=> 'initial',
							'inherit' 	=> 'inherit'
						)
					);
	
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