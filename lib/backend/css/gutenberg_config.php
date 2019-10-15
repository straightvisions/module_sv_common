<?php
	$editor_width 				= 1300;
	$editor_padding 			= $script->get_parent()->get_setting( 'padding' )->run_type()->get_data();
	
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
	
	// Selection Settings
	$selection_color			= $script->get_parent()->get_setting( 'selection_color' )->run_type()->get_data();
	$selection_color_bg			= $script->get_parent()->get_setting( 'selection_color_background' )->run_type()->get_data();
	
	// ### SV Content - Content Header Settings ###
	// Content Header - Title
	$font_family_title			= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_title' )->run_type()->get_data();
	
	if ( $font_family_title ) {
		$font_title				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_title );
	} else {
		$font_title             = false;
	}
	
	$font_size_title			= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_title' )->run_type()->get_data();
	$font_size_title_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_title_mobile' )->run_type()->get_data();
	$text_color_title			= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_title' )->run_type()->get_data();
	$line_height_title			= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_title' )->run_type()->get_data();
	$line_height_title_mobile	= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_title_mobile' )->run_type()->get_data();
	
	// Content Header - Color Settings
	$bg_color_title				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'bg_color' )->run_type()->get_data();
	
	// ### SV Content - Content Settings ###
	// H1
	$font_family_h1				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h1' )->run_type()->get_data();
	
	if ( $font_family_h1 ) {
		$font_h1				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h1 );
	} else {
		$font_h1                = false;
	}
	
	$font_size_h1				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h1' )->run_type()->get_data();
	$font_size_h1_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h1_mobile' )->run_type()->get_data();
	$text_color_h1				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h1' )->run_type()->get_data();
	$line_height_h1				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h1' )->run_type()->get_data();
	$line_height_h1_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h1_mobile' )->run_type()->get_data();
	
	// H2
	$font_family_h2				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h2' )->run_type()->get_data();
	
	if ( $font_family_h2 ) {
		$font_h2				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h2 );
	} else {
		$font_h2                = false;
	}
	
	$font_size_h2				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h2' )->run_type()->get_data();
	$font_size_h2_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h2_mobile' )->run_type()->get_data();
	$text_color_h2				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h2' )->run_type()->get_data();
	$line_height_h2				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h2' )->run_type()->get_data();
	$line_height_h2_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h2_mobile' )->run_type()->get_data();
	
	// H3
	$font_family_h3				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h3' )->run_type()->get_data();
	
	if ( $font_family_h3 ) {
		$font_h3				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h3 );
	} else {
		$font_h3              	= false;
	}
	
	$font_size_h3				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h3' )->run_type()->get_data();
	$font_size_h3_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h3_mobile' )->run_type()->get_data();
	$text_color_h3				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h3' )->run_type()->get_data();
	$line_height_h3				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h3' )->run_type()->get_data();
	$line_height_h3_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h3_mobile' )->run_type()->get_data();
	
	// H4
	$font_family_h4				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h4' )->run_type()->get_data();
	
	if ( $font_family_h4 ) {
		$font_h4				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h4 );
	} else {
		$font_h4                = false;
	}
	
	$font_size_h4				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h4' )->run_type()->get_data();
	$font_size_h4_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h4_mobile' )->run_type()->get_data();
	$text_color_h4				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h4' )->run_type()->get_data();
	$line_height_h4				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h4' )->run_type()->get_data();
	$line_height_h4_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h4_mobile' )->run_type()->get_data();
	
	// H5
	$font_family_h5				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h5' )->run_type()->get_data();
	
	if ( $font_family_h5 ) {
		$font_h5				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h5 );
	} else {
		$font_h5                = false;
	}
	
	$font_size_h5				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h5' )->run_type()->get_data();
	$font_size_h5_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h5_mobile' )->run_type()->get_data();
	$text_color_h5				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h5' )->run_type()->get_data();
	$line_height_h5				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h5' )->run_type()->get_data();
	$line_height_h5_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h5_mobile' )->run_type()->get_data();
	
	// H6
	$font_family_h6				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_family_h6' )->run_type()->get_data();
	
	if ( $font_family_h6 ) {
		$font_h6				= $script->get_parent()->get_module( 'sv_content' )->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_h6 );
	} else {
		$font_h6                = false;
	}
	
	$font_size_h6				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h6' )->run_type()->get_data();
	$font_size_h6_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'font_size_h6_mobile' )->run_type()->get_data();
	$text_color_h6				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'text_color_h6' )->run_type()->get_data();
	$line_height_h6				= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h6' )->run_type()->get_data();
	$line_height_h6_mobile		= $script->get_parent()->get_module( 'sv_content' )->get_setting( 'line_height_h6_mobile' )->run_type()->get_data();
	
?>
/* Editor Width */
/* // deactivated by MB: incompatible with full-width blocks
.block-editor-block-list__layout .wp-block,
.wp-block.editor-post-title__block {
	max-width: <?php echo $editor_width; ?>px;
}
*/
/* Editor Padding */
.editor-block-list__layout.block-editor-block-list__layout {
	padding-left: <?php echo $editor_padding; ?>px;
	padding-right: <?php echo $editor_padding; ?>px;
}

/* Content Header - (Title) */
.editor-post-title {
	min-height: 35vh;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: <?php echo $bg_color_title; ?>;
	margin-bottom: 70px;
}

.wp-block.editor-post-title__block {
	width: 100%;
}

.editor-post-title .editor-post-title__input {
	font-family: <?php echo ( $font_title ? '"' . $font_title['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_title ? $font_title['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_title_mobile; ?>px;
	color: <?php echo $text_color_title; ?>;
	line-height: <?php echo $line_height_title_mobile; ?>;
	text-transform: uppercase;
	text-align: center;
}

@media ( min-width: 850px ) {
	.editor-post-title .editor-post-title__input {
		font-size: <?php echo $font_size_title; ?>px;
		line-height: <?php echo $line_height_title; ?>;
	}
}

/* Content */
.edit-post-visual-editor.editor-styles-wrapper {
	padding-top: 0;
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '" ' : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $text_color; ?>;
	line-height: <?php echo $line_height; ?>;
	background-color:#<?php echo get_background_color(); ?>;
<?php if(get_background_image()){ ?>
	background-image:url(<?php echo get_background_image(); ?>);
	background-size: <?php echo get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) ); ?>;
	background-position: <?php echo get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) ); ?> <?php echo get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) ); ?>;
	background-repeat: <?php echo get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) ); ?>;
	background-attachment: <?php echo get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) ); ?>;
<?php } ?>
}

@media ( min-width: 850px; ) {
	.edit-post-visual-editor.editor-styles-wrapper {
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>;
	}
}

/* Headings */
#editor .editor-styles-wrapper h1 {
	font-family: <?php echo ( $font_h1 ? '"' . $font_h1['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h1 ?  $font_h1['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h1_mobile; ?>px;
	color: <?php echo $text_color_h1; ?>;
	line-height: <?php echo $line_height_h1_mobile; ?>;
}

#editor .editor-styles-wrapper h2 {
	font-family: <?php echo ( $font_h2 ? '"' . $font_h2['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h2 ?  $font_h2['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h2_mobile; ?>px;
	color: <?php echo $text_color_h2; ?>;
	line-height: <?php echo $line_height_h2_mobile; ?>;
}

#editor .editor-styles-wrapper h3 {
	font-family: <?php echo ( $font_h3 ? '"' . $font_h3['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h3 ?  $font_h3['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h3_mobile; ?>px;
	color: <?php echo $text_color_h3; ?>;
	line-height: <?php echo $line_height_h3_mobile; ?>;
}

#editor .editor-styles-wrapper h4 {
	font-family: <?php echo ( $font_h4 ? '"' . $font_h4['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h4 ?  $font_h4['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h4_mobile; ?>px;
	color: <?php echo $text_color_h4; ?>;
	line-height: <?php echo $line_height_h4_mobile; ?>;
}

#editor .editor-styles-wrapper h5 {
	font-family: <?php echo ( $font_h5 ? '"' . $font_h5['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h5 ?  $font_h5['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h5_mobile; ?>px;
	color: <?php echo $text_color_h5; ?>;
	line-height: <?php echo $line_height_h5_mobile; ?>;
}

#editor .editor-styles-wrapper h6 {
	font-family: <?php echo ( $font_h6 ? '"' . $font_h6['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_h6 ?  $font_h6['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_h6_mobile; ?>px;
	color: <?php echo $text_color_h6; ?>;
	line-height: <?php echo $line_height_h6_mobile; ?>;
}

@media ( min-width: 850px ) {
	#editor .editor-styles-wrapper h1 {
		font-size: <?php echo $font_size_h1; ?>px;
		line-height: <?php echo $line_height_h1; ?>;
	}

	#editor .editor-styles-wrapper h2 {
		font-size: <?php echo $font_size_h2; ?>px;
		line-height: <?php echo $line_height_h2; ?>;
	}

	#editor .editor-styles-wrapper h3 {
		font-size: <?php echo $font_size_h3; ?>px;
		line-height: <?php echo $line_height_h3; ?>;
	}

	#editor .editor-styles-wrapper h4 {
		font-size: <?php echo $font_size_h4; ?>px;
		line-height: <?php echo $line_height_h4; ?>;
	}

	#editor .editor-styles-wrapper h5 {
		font-size: <?php echo $font_size_h5; ?>px;
		line-height: <?php echo $line_height_h5; ?>;
	}

	#editor .editor-styles-wrapper h6 {
		font-size: <?php echo $font_size_h6; ?>px;
		line-height: <?php echo $line_height_h6; ?>;
	}
}

/* Selection */
*::selection {
	background-color: <?php echo $selection_color_bg; ?>;
	color: <?php echo $selection_color; ?>;
}