<?php

	echo $_s->build_css(
		is_admin() ? '.edit-post-visual-editor.editor-styles-wrapper' : 'body, button, input, select', // we need to explicitly define that for form fields, too, to avoid that Chrome will override it with user agent style sheets.
		array_merge(
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data(),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper p:not(.has-text-color) a, .editor-styles-wrapper p:not(.has-text-color) a:visited' : 'a, a:visited',
		array_merge(
			$script->get_parent()->get_setting('font_link')->get_css_data('font-family'),
			$script->get_parent()->get_setting('text_color_link')->get_css_data()
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper p:not(.has-text-color) a:hover, .editor-styles-wrapper p:not(.has-text-color) a:focus' : 'a:hover, a:focus',
		array_merge(
			$script->get_parent()->get_setting('text_color_link_hover')->get_css_data()
		)
	);


	// Text Decoration
	$properties			= array();

	$value				= $script->get_parent()->get_setting('text_deco_link')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if(strlen($val) > 0) {
				if($val == 'underline'){
					$imploded['width'][$breakpoint] = '100%';
					$imploded['border-bottom'][$breakpoint] = '1px solid';
				}elseif($val == 'underline_dashed'){
					$imploded['width'][$breakpoint] = '100%';
					$imploded['border-bottom'][$breakpoint] = '1px dashed';
				}
			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
		}
	}

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper a::before, .editor-styles-wrapper a:visited::before' : 'article p a::before, article p a:visited::before',
		array_merge(
			$properties
		)
	);

	// Text Decoration Hover
	// @todo doubled code
	$properties			= array();

	$value				= $script->get_parent()->get_setting('text_deco_link_hover')->get_data();

	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if(strlen($val) > 0){
				if($val == 'underline'){
					$imploded['border-bottom'][$breakpoint] = '1px solid';
				}elseif($val == 'underline_dashed'){
					$imploded['border-bottom'][$breakpoint] = '1px dashed';
				}
			}else{
				$imploded['border-bottom'][$breakpoint] = 'none';
			}
		}

		if($imploded) {
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
		}
	}

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper a:hover::before, .editor-styles-wrapper a:focus::before' : 'article p a:hover::before, article p a:focus::before',
		array_merge(
			$properties
		)
	);


	// ##### SETTINGS #####

	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $_s ) {
		if ( $_s->get_type() !== false ) {
			${ $_s->get_ID() } = $_s->get_data();
		}
	}

	// Global Font Size Vars
	// CSS Vars
	$properties					= array();

	foreach($_s->get_parent()->get_editor_font_sizes() as $font_size){
		$properties['--sv100_sv_common_font_size_'.$font_size['slug']]		= $_s->prepare_css_property($font_size['size'],'','px');
	}

	echo $_s->build_css(
		':root',
		$properties
	);

	// CSS Classes
	$properties					= array();

	foreach($_s->get_parent()->get_editor_font_sizes() as $font_size){
		$properties['font-size']		= $_s->prepare_css_property($font_size['size'],'','px !important');
		echo $_s->build_css(
			'.has-'.$font_size['slug'].'-font-size',
			$properties
		);
	}

	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $_s ) {
		if ( $_s->get_type() !== false ) {
			${ $_s->get_ID() } = $_s->get_data();
		}
	}
?>

/* Global Vars */
:root {
	--sv100_sv_common-max-width-alignfull: <?php echo $max_width_alignfull ? $max_width_alignfull.'px' : '100vw'; ?>;
	--sv100_sv_common-max-width-alignwide: <?php echo $max_width_alignwide; ?>px;
	--sv100_sv_common-max-width-text: <?php echo $max_width_text; ?>px;
}

*::selection {
	background-color: rgba(<?php echo $selection_color_background; ?>);
	color: rgba(<?php echo $selection_color; ?>);
}