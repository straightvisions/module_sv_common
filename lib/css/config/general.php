<?php

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper *' : '*', // we need to explicitly define that for form fields, too, to avoid that Chrome will override it with user agent style sheets.
		array_merge(
			$module->get_setting('hyphens')->get_css_data('-webkit-hyphens'),
			$module->get_setting('hyphens')->get_css_data('-moz-hyphens'),
			$module->get_setting('hyphens')->get_css_data('hyphens')
		)
	);

	echo $_s->build_css(
		is_admin() ? 'body .editor-styles-wrapper' : 'body, button, input, select, textarea', // we need to explicitly define that for form fields, too, to avoid that Chrome will override it with user agent style sheets.
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size_normal')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		is_admin() ? '
		.editor-styles-wrapper a' : 'a',
		array_merge(
			$module->get_setting('font_link')->get_css_data('font-family'),
			$module->get_setting('text_color_link')->get_css_data()
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper p:not(.has-text-color) a:hover, .editor-styles-wrapper p:not(.has-text-color) a:focus' : 'a:hover, a:focus',
		array_merge(
			$module->get_setting('text_color_link_hover')->get_css_data()
		)
	);


	// Text Decoration
	$properties			= array();

	$value				= $module->get_setting('text_deco_link')->get_data();
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
		is_admin() ? '.editor-styles-wrapper p a::before, .editor-styles-wrapper p a:visited::before' : 'article p a::before, article p a:visited::before',
		array_merge(
			$properties
		)
	);

	// Text Decoration Hover
	// @todo doubled code
	$properties			= array();

	$value				= $module->get_setting('text_deco_link_hover')->get_data();

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
		is_admin() ? '.editor-styles-wrapper p a:hover::before, .editor-styles-wrapper p a:focus::before' : 'article a:hover::before, article a:focus::before',
		array_merge(
			$properties
		)
	);

	// CSS Classes
	$properties					= array();

	foreach($_s->get_parent()->get_editor_font_sizes() as $font_size){
		$properties['font-size']		= $_s->prepare_css_property_responsive($module->get_setting( 'font_size_'. $font_size['slug'])->get_data(),'','px !important');
		echo $_s->build_css(
			'.has-'.$font_size['slug'].'-font-size, .block-editor .editor-styles-wrapper .has-'.$font_size['slug'].'-font-size',
			$properties
		);
	}

	echo $_s->build_css(
		':root',
		array_merge(
			$module->get_setting( 'spacing' )->get_css_data('--sv100_sv_common-spacing','','px')
		)
	);
?>

/* Global Vars */
:root {
--sv100_sv_common-max-width-alignfull: <?php echo $module->get_setting('max_width_alignfull')->get_data() ? $module->get_setting('max_width_alignfull')->get_data().'px' : '100vw'; ?>;
--sv100_sv_common-max-width-alignwide: <?php echo $module->get_setting('max_width_alignwide')->get_data(); ?>px;
--sv100_sv_common-max-width-text: <?php echo $module->get_setting('max_width_text')->get_data(); ?>px;
}

*::selection {
background-color: rgba(<?php echo $module->get_setting('selection_color_background')->get_data(); ?>);
color: rgba(<?php echo $module->get_setting('selection_color')->get_data(); ?>);
}