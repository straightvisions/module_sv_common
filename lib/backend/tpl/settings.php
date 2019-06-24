<?php
if(current_user_can('activate_plugins')):
	?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
	<h3 class="divider">Font</h3>
	<div class="sv_setting_flex">
		<?php echo $module->get_settings()['font_family']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_size']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_color']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_line_height']->run_type()->form(); ?>
	</div>
	<h3 class="divider">Background</h3>
	<div>
		<div class="sv_setting_flex">
			<?php echo $module->get_settings()['background_color']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image_media_size']->run_type()->form(); ?>
		</div>
		<div class="sv_setting_flex">
			<?php echo $module->get_settings()['background_image_position']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image_size']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image_repeat']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image_attachment']->run_type()->form(); ?>
		</div>
	</div>
	<h3 class="divider">Selection</h3>
	<div class="sv_setting_flex">
		<?php echo $module->get_settings()['selection_color']->run_type()->form(); ?>
		<?php echo $module->get_settings()['selection_color_background']->run_type()->form(); ?>
	</div>
<?php endif; ?>