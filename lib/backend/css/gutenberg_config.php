<?php
	$editor_width 				= 1300;
	$editor_padding 			= $script->get_parent()->get_setting( 'padding' )->run_type()->get_data();
	
	// Text Settings
	$title_bg_color				= '#f7f7f7';
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
/* Editor Width */
.block-editor-block-list__layout .wp-block,
.wp-block.editor-post-title__block {
	max-width: <?php echo $editor_width; ?>px;
}

/* Editor Padding */
.editor-block-list__layout.block-editor-block-list__layout {
	padding-left: <?php echo $editor_padding; ?>px;
	padding-right: <?php echo $editor_padding; ?>px;
}

/* Title */
.editor-post-title {
	height: 35vh;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: <?php echo $title_bg_color; ?>;
	margin-bottom: 70px;
}

.wp-block.editor-post-title__block {
	width: 100%;
}

.editor-post-title .editor-post-title__input {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	text-transform: uppercase;
	font-size: 3rem;
	font-weight: 400;
	text-align: center;
}

/* Content */
.edit-post-visual-editor.editor-styles-wrapper {
	padding-top: 0;
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
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

/* Selection */
*::selection {
	background-color: <?php echo $selection_color_bg; ?>;
	color: <?php echo $selection_color; ?>;
}