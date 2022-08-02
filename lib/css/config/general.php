<?php
	
	echo $_s->build_css(
		'.wp-site-blocks, .editor-styles-wrapper',
		array_merge(
			$module->get_setting('hyphens')->get_css_data('-webkit-hyphens'),
			$module->get_setting('hyphens')->get_css_data('-moz-hyphens'),
			$module->get_setting('hyphens')->get_css_data('hyphens'),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);
	
	// we need to explicitly define that for form fields, too,
	// to avoid that Chrome will override it with user agent style sheets.
	echo $_s->build_css(
		'.wp-site-blocks,
		.editor-styles-wrapper,
		.wp-site-blocks button,
		.wp-site-blocks input,
		.wp-site-blocks select,
		.wp-site-blocks textarea,
		.editor-styles-wrapper button,
		.editor-styles-wrapper input,
		.editor-styles-wrapper select,
		.editor-styles-wrapper textarea
		',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data(),
			
		)
	);

	echo $_s->build_css(
		'.wp-site-blocks a',
		array_merge(
			$module->get_setting('font_link')->get_css_data('font-family'),
			$module->get_setting('text_color_link')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.wp-site-blocks a:hover, .wp-site-blocks a:focus',
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
		'
		.wp-site-blocks p > a::before,
		.wp-site-blocks p > a:visited::before,
		.wp-site-blocks li > a::before,
		.wp-site-blocks li > a:visited::before,
		.wp-block-term-description p > a::before,
		.wp-block-term-description p > a:visited::before,
		.wp-block-term-description li > a::before,
		.wp-block-term-description li > a:visited::before
		',
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
		'.wp-site-blocks p > a:hover::before,
		.wp-site-blocks p > a:focus::before,
		.wp-site-blocks li > a:hover::before,
		.wp-site-blocks li > a:focus::before,
		.wp-block-term-description p > a:hover::before,
		.wp-block-term-description p > a:focus::before,
		.wp-block-term-description li > a:hover::before,
		.wp-block-term-description li > a:focus::before
		',
		array_merge(
			$properties
		)
	);

	echo $_s->build_css(
		'body',
		$module->get_setting( 'spacing' )->get_css_data('--wp--custom--sv-spacing', '', ' !important')
	);

	echo $_s->build_css(
		'*::selection',
		array_merge(
			$module->get_setting( 'selection_color_background' )->get_css_data('background-color'),
			$module->get_setting( 'selection_color' )->get_css_data('color'),

		)
	);