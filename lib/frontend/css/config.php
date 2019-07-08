<?php
	$font_family					= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	if ( $font_family ) {
		$font						= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                       = false;
	 }

	$font_size						= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$font_color						= $script->get_parent()->get_setting( 'font_color' )->run_type()->get_data();
	$font_line_height				= $script->get_parent()->get_setting( 'font_line_height' )->run_type()->get_data();

	$background_color				= $script->get_parent()->get_setting( 'background_color' )->run_type()->get_data();
	$background_image				= $script->get_parent()->get_setting( 'background_image' )->run_type()->get_data();
	$background_image_media_size	= $script->get_parent()->get_setting( 'background_image_media_size' )->run_type()->get_data();
	$background_image_position		= $script->get_parent()->get_setting( 'background_image_position' )->run_type()->get_data();
	$background_image_size			= $script->get_parent()->get_setting( 'background_image_size' )->run_type()->get_data();
	$background_image_repeat		= $script->get_parent()->get_setting( 'background_image_repeat' )->run_type()->get_data();
	$background_image_attachment	= $script->get_parent()->get_setting( 'background_image_attachment' )->run_type()->get_data();

	$selection_color				= $script->get_parent()->get_setting( 'selection_color' )->run_type()->get_data();
	$selection_color_background		= $script->get_parent()->get_setting( 'selection_color_background' )->run_type()->get_data();
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
	background-color: <?php echo $selection_color_background; ?>;
	color: <?php echo $selection_color; ?>;
}

html, body {
	margin: 0;
	padding: 0;
	overflow-x: hidden;
}

body {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $font_color; ?>;
	line-height: <?php echo $font_line_height; ?>px;
	background-color: <?php echo $background_color; ?>;

	<?php if ( $background_image ) { ?>
		background-image: url( '<?php echo wp_get_attachment_image_src( $background_image, $background_image_media_size )[0]; ?>' );
		background-position:<?php echo $background_image_position; ?>;
		background-size:<?php echo $background_image_size; ?>;
		background-repeat:<?php echo $background_image_repeat; ?>;
		background-attachment:<?php echo $background_image_attachment; ?>;
	<?php } ?>
}

input, textarea {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
}