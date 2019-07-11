<?php
	// Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                     = false;
	 }

	$font_size					= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$text_color					= $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
	$line_height				= $script->get_parent()->get_setting( 'line_height' )->run_type()->get_data();
	
	// Background Settings
	$bg_color					= $script->get_parent()->get_setting( 'bg_color' )->run_type()->get_data();
	$bg_image					= $script->get_parent()->get_setting( 'bg_image' )->run_type()->get_data();
	$bg_media_size				= $script->get_parent()->get_setting( 'bg_media_size' )->run_type()->get_data();
	$bg_position				= $script->get_parent()->get_setting( 'bg_position' )->run_type()->get_data();
	$bg_size					= $script->get_parent()->get_setting( 'bg_size' )->run_type()->get_data();
	$bg_fit						= $script->get_parent()->get_setting( 'bg_fit' )->run_type()->get_data();
	$bg_repeat					= $script->get_parent()->get_setting( 'bg_repeat' )->run_type()->get_data();
	$bg_attachment				= $script->get_parent()->get_setting( 'bg_attachment' )->run_type()->get_data();
	
	// Selection Settings
	$selection_color			= $script->get_parent()->get_setting( 'selection_color' )->run_type()->get_data();
	$selection_color_bg			= $script->get_parent()->get_setting( 'selection_color_background' )->run_type()->get_data();
?>

/* Global Vars */
:root {
	--sv100_sv_common-padding: <?php echo $script->get_parent()->get_setting( 'padding' )->run_type()->get_data() . 'px' ?>;
	--sv100_sv_common-max-width-lg: 1300px;
	--sv100_sv_common-max-width-dt: 1000px;
	--sv100_sv_common-max-width-mb: 800px;
	--sv100_sv_common-max-width-txt: 620px;
}

/* General */
*,
*::before,
*::after {
	box-sizing: border-box;
	word-break: break-word;
}

*::selection {
	background-color: <?php echo $selection_color_bg; ?>;
	color: <?php echo $selection_color; ?>;
}

html, body {
	margin: 0;
	padding: 0;
	overflow-x: hidden;
	font-size: <?php echo $font_size; ?>px;
}

body {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	color: <?php echo $text_color; ?>;
	line-height: <?php echo $line_height; ?>px;
	background-color: <?php echo $bg_color; ?>;

	<?php
		if ( $bg_image ) {
			$bg_size = $bg_size > 0 ? $bg_size . 'px' : $bg_fit;
			?>
		background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image, $bg_media_size )[0]; ?>' );
		background-position:<?php echo $bg_position; ?>;
		background-size:<?php echo $bg_size; ?>;
		background-repeat:<?php echo $bg_repeat; ?>;
		background-attachment:<?php echo $bg_attachment; ?>;
	<?php } ?>
}

input, textarea {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
}