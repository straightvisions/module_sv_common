<?php
	// ##### SETTINGS #####

	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		if ( $setting->get_type() !== false ) {
			${ $setting->get_ID() } = $setting->get_data();
		}
	}

	$properties					= array();

	// Font
	// @todo: double code
	$value						= $font;
	$font_family				= false;
	$font_weight				= false;
	foreach($value as $breakpoint => $val) {
		if($val) {
			$f							= $setting->get_parent()->get_module('sv_webfontloader')->get_font_by_label($val);
			$font_family[$breakpoint]	= $f['family'];
			$font_weight[$breakpoint]	= $f['weight'];
		}else{
			$font_family[$breakpoint]	= false;
			$font_weight[$breakpoint]	= false;
		}
	}
	if($font_family && (count(array_unique($font_family)) > 1 || array_unique($font_family)['mobile'] !== false)){
		$properties['font-family']	= $setting->prepare_css_property_responsive($font_family,'',', sans-serif');
		$properties['font-weight']	= $setting->prepare_css_property_responsive($font_weight,'','');
	}else{
		$properties['font-family']	= 'sans-serif';
	}

	if($font_size) {
		$properties['font-size']	= $setting->prepare_css_property_responsive($font_size,'','px');
	}

	if($line_height) {
		$properties['line-height']	= $setting->prepare_css_property_responsive($line_height);
	}

	if($text_color){
		$properties['color']		= $setting->prepare_css_property_responsive($text_color,'rgba(',')');
	}

	if($bg_color){
		$properties['background-color']		= $setting->prepare_css_property_responsive($bg_color,'rgba(',')');
	}

	echo $setting->build_css(
		is_admin() ? '.edit-post-visual-editor.editor-styles-wrapper' : 'body',
		$properties
	);

	$properties					= array();

	// Font
	// @todo: double code
	$value						= $font_link;
	$font_family				= false;
	$font_weight				= false;
	foreach($value as $breakpoint => $val) {
		if($val) {
			$f							= $setting->get_parent()->get_module('sv_webfontloader')->get_font_by_label($val);
			$font_family[$breakpoint]	= $f['family'];
			$font_weight[$breakpoint]	= $f['weight'];
		}else{
			$font_family[$breakpoint]	= false;
			$font_weight[$breakpoint]	= false;
		}
	}
	if($font_family){
		$properties['font-family']		= $setting->prepare_css_property_responsive($font_family,'',', sans-serif;');
		$properties['font-weight']		= $setting->prepare_css_property_responsive($font_weight,'','');
	}

	if($text_color_link){
		$properties['color']			= $setting->prepare_css_property_responsive($text_color_link,'rgba(',')');
	}

	if($text_deco_link){
		$properties['text-decoration']	= $setting->prepare_css_property_responsive($text_deco_link,'','');
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper a, .editor-styles-wrapper a:visited' : 'a, a:visited',
		$properties
	);


	$properties					= array();

	if($text_color_link_hover){
		$properties['color']			= $setting->prepare_css_property_responsive($text_color_link_hover,'rgba(',')');
	}

	if($text_deco_link_hover){
		$properties['text-decoration']	= $setting->prepare_css_property_responsive($text_deco_link_hover,'','');
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper a:hover, .editor-styles-wrapper a:focus' : 'a, a:visited',
		$properties
	);

	// Global Font Size Vars
	// CSS Vars
	$properties					= array();

	foreach($setting->get_parent()->get_editor_font_sizes() as $font_size){
		$properties['--sv100_sv_common_font_size_'.$font_size['slug']]		= $setting->prepare_css_property($font_size['size'],'','px');
	}

	echo $setting->build_css(
		':root',
		$properties
	);

	// CSS Classes
	$properties					= array();

	foreach($setting->get_parent()->get_editor_font_sizes() as $font_size){
		$properties['font-size']		= $setting->prepare_css_property($font_size['size'],'','px !important');
		echo $setting->build_css(
			'.has-'.$font_size['slug'].'-font-size',
			$properties
		);
	}
?>

/* Global Vars */
:root {
	--sv100_sv_common-max-width-lg: <?php echo $max_width; ?>px;
	--sv100_sv_common-max-width-txt: <?php echo $max_width_text; ?>px;
}

*::selection {
	background-color: rgba(<?php echo $selection_color_background; ?>);
	color: rgba(<?php echo $selection_color; ?>);
}

body {
	margin: 0;
	padding: 0;
}

*{
box-sizing: border-box;
-webkit-hyphens: auto;
-ms-hyphens: auto;
hyphens: auto;
}

iframe{
	display:block;
}

#wp-toolbar {
    display: flex;
}

@media ( min-width: 782px ) {
    #wp-toolbar {
        display: inherit;
    }
}

/* FIX IMAGE OVERLAPPING PICTURE ELEMENT */
picture img{
	max-width:100%;
	height:auto;
}