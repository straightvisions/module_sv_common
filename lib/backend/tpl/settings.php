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

    <h3 class="divider"><?php _e( 'Link Settings', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'font_family_link' )->run_type()->form();
            echo $module->get_settings_component( 'font_size_link' )->run_type()->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'text_color_link' )->run_type()->form();
            echo $module->get_settings_component( 'line_height_link' )->run_type()->form();
            echo $module->get_settings_component( 'text_deco_link' )->run_type()->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Link Settings (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'text_color_link_hover' )->run_type()->form();
            echo $module->get_settings_component( 'text_deco_link_hover' )->run_type()->form();
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