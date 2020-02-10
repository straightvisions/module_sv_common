<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->run_type()->get_data();
		
		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}
 
	// Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font					= false;
	}
	
	// Link Settings
	$font_family_link			= $script->get_parent()->get_setting( 'font_family_link' )->run_type()->get_data();
	
	if ( $font_family_link ) {
		$font_link				= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_link );
	} else {
		$font_link              = false;
	}
?>

/* Global Vars */
:root {
	--sv100_sv_common-padding: <?php echo $padding; ?>px;
	--sv100_sv_common-max-width-lg: <?php echo $max_width; ?>px;
	--sv100_sv_common-max-width-dt: 1000px;
	--sv100_sv_common-max-width-mb: 800px;
	--sv100_sv_common-max-width-txt: <?php echo $max_width_text; ?>px;
}

/* General */
*,
*::before,
*::after {
	box-sizing: border-box;
	-webkit-hyphens: auto;
	-ms-hyphens: auto;
	hyphens: auto;
}

*::selection {
	background-color: rgba(<?php echo $selection_color_background; ?>);
	color: rgba(<?php echo $selection_color; ?>);
}

html, body {
	margin: 0;
	padding: 0;
	font-size: <?php echo $font_size_mobile; ?>px;
	line-height: <?php echo $line_height_mobile; ?>;
}

@media ( min-width: 850px ) {
		html, body {
		margin: 0;
		padding: 0;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>;
	}
}

body {
	overflow-x: hidden;
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	color: rgba(<?php echo $text_color; ?>);
}

body a,
body a:visited {
    <?php echo ( $font_link ? 'font-family: "' . $font_link['family'] . '", sans-serif;' : '' ); ?>
    font-weight: <?php echo ( $font_link ? $font_link['weight'] : '400' ); ?>;
	text-decoration: <?php echo $text_deco_link; ?>;
	color: rgba(<?php echo $text_color_link; ?>);
}

body a:hover,
body a:focus {
    text-decoration: <?php echo $text_deco_link_hover; ?>;
    color: rgba(<?php echo $text_color_link_hover; ?>);
}

input, textarea {
	<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
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