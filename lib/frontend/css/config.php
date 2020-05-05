<?php

	echo $_s->build_css(
		is_admin() ? '.edit-post-visual-editor.editor-styles-wrapper' : 'body',
		array_merge(
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data(),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper a, .editor-styles-wrapper a:visited' : 'a, a:visited',
		array_merge(
			$script->get_parent()->get_setting('font_link')->get_css_data('font-family'),
			$script->get_parent()->get_setting('text_color_link')->get_css_data(),
			$script->get_parent()->get_setting('text_deco_link')->get_css_data('text-decoration')
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper a:hover, .editor-styles-wrapper a:focus' : 'a, a:visited',
		array_merge(
			$script->get_parent()->get_setting('text_color_link_hover')->get_css_data(),
			$script->get_parent()->get_setting('text_deco_link_hover')->get_css_data('text-decoration')
		)
	);


	// ##### SETTINGS #####

	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		if ( $setting->get_type() !== false ) {
			${ $setting->get_ID() } = $setting->get_data();
		}
	}

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



	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		if ( $setting->get_type() !== false ) {
			${ $setting->get_ID() } = $setting->get_data();
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