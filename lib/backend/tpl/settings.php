<?php
	if ( current_user_can( 'activate_plugins' ) ) {
	?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
		
	<h3 class="divider"><?php _e( 'Text Settings', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
    <?php
		echo $module->get_settings_component( 'font_family' )->run_type()->form();
		echo $module->get_settings_component( 'font_size' )->run_type()->form();
		echo $module->get_settings_component( 'text_color' )->run_type()->form();
		echo $module->get_settings_component( 'line_height' )->run_type()->form();
    ?>
	</div>
	
	<h3 class="divider"><?php _e( 'Background Settings', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_color' )->run_type()->form();
			echo $module->get_settings_component( 'bg_image' )->run_type()->form();
			echo $module->get_settings_component( 'bg_media_size' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_position' )->run_type()->form();
			echo $module->get_settings_component( 'bg_size' )->run_type()->form();
			echo $module->get_settings_component( 'bg_fit' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_repeat' )->run_type()->form();
			echo $module->get_settings_component( 'bg_attachment' )->run_type()->form();
		?>
	</div>
	
	<h3 class="divider"><?php _e( 'Selection', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'selection_color' )->run_type()->form();
			echo $module->get_setting( 'selection_color_background' )->run_type()->form();
		?>
	</div>

	<h3 class="divider"><?php _e( 'Spacing', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'padding' )->run_type()->form();
		?>
	</div>
	<?php
	}
?>