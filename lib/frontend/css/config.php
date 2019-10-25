<?php
    // Content Settings
    $max_width                  = $script->get_parent()->get_setting( 'max_width' )->run_type()->get_data();
	$max_width_text             = $script->get_parent()->get_setting( 'max_width_text' )->run_type()->get_data();
 
	// Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                     = false;
	 }

	$font_size					= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$font_size_mobile			= $script->get_parent()->get_setting( 'font_size_mobile' )->run_type()->get_data();
	$text_color					= $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
	$line_height				= $script->get_parent()->get_setting( 'line_height' )->run_type()->get_data();
	$line_height_mobile			= $script->get_parent()->get_setting( 'line_height_mobile' )->run_type()->get_data();
	
	
	// Link Settings
	$font_family_link			= $script->get_parent()->get_setting( 'font_family_link' )->run_type()->get_data();
	
	if ( $font_family_link ) {
		$font_link				= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_link );
	} else {
		$font_link              = false;
	}

	$font_size_mobile				= $script->get_parent()->get_setting( 'font_size_mobile' )->run_type()->get_data();
	$text_color_link			= $script->get_parent()->get_setting( 'text_color_link' )->run_type()->get_data();
	$text_deco_link			    = $script->get_parent()->get_setting( 'text_deco_link' )->run_type()->get_data();

	// Link Settings (Hover/Focus)
	$text_color_link_hover		= $script->get_parent()->get_setting( 'text_color_link_hover' )->run_type()->get_data();
	$text_deco_link_hover		= $script->get_parent()->get_setting( 'text_deco_link_hover' )->run_type()->get_data();
	
	// Selection Settings
	$selection_color			= $script->get_parent()->get_setting( 'selection_color' )->run_type()->get_data();
	$selection_color_bg			= $script->get_parent()->get_setting( 'selection_color_background' )->run_type()->get_data();
?>

/* Global Vars */
:root {
	--sv100_sv_common-padding: <?php echo $script->get_parent()->get_setting( 'padding' )->run_type()->get_data() . 'px' ?>;
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
	background-color: <?php echo $selection_color_bg; ?>;
	color: <?php echo $selection_color; ?>;
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
	color: <?php echo $text_color; ?>;
}

body a,
body a:visited {
    <?php echo ( $font_link ? 'font-family: "' . $font_link['family'] . '", sans-serif;' : '' ); ?>
    font-weight: <?php echo ( $font_link ? $font_link['weight'] : '400' ); ?>;
	text-decoration: <?php echo $text_deco_link; ?>;
	color: <?php echo $text_color_link; ?>;
}

body a:hover,
body a:focus {
    text-decoration: <?php echo $text_deco_link_hover; ?>;
    color: <?php echo $text_color_link_hover; ?>;
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
}