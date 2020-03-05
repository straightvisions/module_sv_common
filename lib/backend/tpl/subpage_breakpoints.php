<div class="sv_setting_subpage">
	<h2><?php _e('Breakpoints', 'sv100'); ?></h2>
    <p><?php _e( 'Define the breakpoints for the different devices (in pixel).' ); ?></p>

    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'breakpoint_mobile_landscape' )->form();
		echo $module->get_setting( 'breakpoint_tablet' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'breakpoint_tablet_landscape' )->form();
		echo $module->get_setting( 'breakpoint_desktop' )->form();
		?>
    </div>
</div>