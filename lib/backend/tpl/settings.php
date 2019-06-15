<?php
if(current_user_can('activate_plugins')):
	?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
	<h4>Font</h4>
	<div class="sv_setting_flex">
		<?php echo $module->get_settings()['font_family']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_size']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_color']->run_type()->form(); ?>
		<?php echo $module->get_settings()['font_line_height']->run_type()->form(); ?>
	</div>
	<h4>Background</h4>
	<div>
		<div class="sv_setting_flex">
			<?php echo $module->get_settings()['background_color']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_image']->run_type()->form(); ?>
		</div>
		<div class="sv_setting_flex">
			<?php echo $module->get_settings()['background_position']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_size']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_repeat']->run_type()->form(); ?>
			<?php echo $module->get_settings()['background_attachment']->run_type()->form(); ?>
		</div>
	</div>
<?php endif; ?>