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
	class sv_common extends init{
		static $scripts_loaded						= false;

		public function __construct($path,$url){
			$this->path								= $path;
			$this->url								= $url;
			$this->name								= get_class($this);

			// needed for bt4 support
			add_action('wp_enqueue_scripts', function(){
				wp_deregister_script('jquery');
				wp_enqueue_script('jquery', $this->get_url('lib/js/jquery.min.js'), false, filemtime($this->get_path('lib/js/jquery.min.js')), true);
			}, 0, 9999);
			
			$this->module_enqueue_scripts(true,
					array($this->get_module_name().'_css/bootstrap.min.css'), 
					array($this->get_module_name().'_js/bootstrap.bundle.min.js'), 
					array('css/bootstrap.min.css' => false,
						'css/ekko-lightbox.css'=>'css/bootstrap.min.css',
						'js/alertify/css/alertify.min.css'=>'js/alertify/css/alertify.min.css',
						'js/alertify/css/themes/bootstrap.min.css'=>'js/alertify/css/themes/bootstrap.min.css',
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
			
			add_action('init', array($this, 'init'));
			
			add_action('wp_print_styles', function(){ wp_dequeue_style( 'megamenu-fontawesome' ); }, 100); // already loaded through bootstrap, so no need to load it again with font awesome
			
			add_action('wp_logout', function(){ wp_redirect(home_url()); exit(); });
		}
		public function init(){
			add_action('wp_head', array($this, 'wp_head'));
		}
		public function wp_head(){
			echo '
				<meta charset="'.get_bloginfo('charset').'" />
				<meta content="width=device-width, initial-scale=1.0" name="viewport" />
				<link rel="icon" href="'.$this->get_url('lib/img/favicon.png').'">
			';
		}
	}
?>