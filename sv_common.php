<?php
	namespace sv_100;
	
	/**
	 * @author			Matthias Reuter
	 * @package			sv_100
	 * @copyright		2017 Matthias Reuter
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

			add_action( 'wp_head', array( $this, 'wp_head' ) );

			add_action( 'wp_logout', function() {
				wp_redirect( home_url() );
				exit();
			});
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
			add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );

			$this->credits();
		}

		public function init(){
			// needed for bt4 support
			add_action( 'wp_enqueue_scripts', function() {
				wp_deregister_script( 'jquery' );
				wp_enqueue_script( 'jquery', $this->get_file_url( 'lib/js/jquery.min.js' ), false, filemtime( $this->get_file_path( 'lib/js/jquery.min.js' ) ), true );
			}, 0, 9999);

			$this->module_enqueue_scripts(
				true,
				array(
					$this->get_module_name() . '_css/bootstrap.min.css'
				),
				array(
					$this->get_module_name() . '_js/bootstrap.bundle.min.js'
				),
				array(
					'css/bootstrap.min.css'                     => false,
					'css/ekko-lightbox.css'                     => 'css/bootstrap.min.css',
					'js/alertify/css/alertify.min.css'          => 'js/alertify/css/alertify.min.css',
					'js/alertify/css/themes/bootstrap.min.css'  => 'js/alertify/css/themes/bootstrap.min.css',
				),
				array(
					'js/alertify/alertify.min.js'		=> array(),
					'js/frontend.js'					=> array('jquery',$this->get_module_name().'_js/bootstrap.bundle.min.js',$this->get_module_name().'_js/alertify/alertify.min.js'),
					'js/tether.min.js'					=> array('jquery'),
					'js/bootstrap.bundle.min.js'		=> array('jquery'),
					'js/ekko-lightbox.min.js'			=> array('jquery',$this->get_module_name().'_js/bootstrap.bundle.min.js',$this->get_module_name().'_js/frontend.js'),
					'js/sv_grid_overrides.js'			=> array($this->get_module_name().'_js/bootstrap.bundle.min.js'),
				)
			);

			add_action( 'wp_print_styles', function() {
				wp_dequeue_style( 'megamenu-fontawesome' );
			}, 100 );
		}
		public function wp_head() {
			echo '
				<meta charset="' . get_bloginfo( 'charset' ) . '" />
				<meta content="width=device-width, initial-scale=1.0" name="viewport" />
				<link rel="icon" href="' . $this->get_url( 'lib/img/favicon.png' ) . '">
			';
		}
		public function after_setup_theme() {
			load_theme_textdomain( 'sv_100', get_template_directory() . '/lib/lang' );
			add_theme_support('post-thumbnails' );
			add_theme_support('title-tag');
			add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
			add_theme_support('woocommerce');
			add_post_type_support('page', 'excerpt');
			register_taxonomy_for_object_type('post_tag', 'page'); // Make the metabox appear on the page editing screen
		}
		public function pre_get_posts($wp_query){
			// When displaying a tag archive, also show pages
			if($wp_query->get('tag')){
				$wp_query->set('post_type', 'any');
			}
		}
		public function credits(){
			add_filter('wp_headers', function($headers){ $headers['X-Website-Developed-By'] = 'straightvisions.com'; return $headers; });
			add_action('wp_footer', function(){ echo "\n\n".'<!-- Website developed by straightvisions.com -->'."\n\n"; }, 999999);
			add_filter('rocket_buffer', function($buffer){ return $buffer."\n\n".'<!-- Website developed by straightvisions.com -->'."\n\n"; }, 999999);
			define('WP_ROCKET_WHITE_LABEL_FOOTPRINT', true);
		}
	}
?>