<?php
	if ( current_user_can( 'activate_plugins' ) ) {
	?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

    <h3 class="divider"><?php _e( 'General', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings()['padding']->run_type()->form();
        ?>
    </div>
    <?php
        include($module->get_root()->get_path('core_theme/lib/backend/tpl/settings_draft_font.php'));
		include($module->get_root()->get_path('core_theme/lib/backend/tpl/settings_draft_background.php'));
    ?>
	<h3 class="divider"><?php _e( 'Selection', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_settings()['selection_color']->run_type()->form();
			echo $module->get_settings()['selection_color_background']->run_type()->form();
		?>
	</div>
	<?php
	}
?>