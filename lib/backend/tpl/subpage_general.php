<?php $suffix = (isset($suffix) ) ? $suffix : ''; ?>
<div class="sv_setting_subpage">
	<h2><?php _e('Common', 'sv100'); ?></h2>

    <h3 class="divider"><?php _e( 'Max width', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'max_width' )->form();
		echo $module->get_setting( 'max_width_text' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Mobile Settings', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'mobile_zoom' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Text Settings', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'font' )->form();
		echo $module->get_setting( 'font_size' )->form();
		echo $module->get_setting( 'text_color' )->form();
		echo $module->get_setting( 'line_height' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Link Settings', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'font_link' )->form();
		echo $module->get_setting( 'text_color_link' )->form();
		echo $module->get_setting( 'text_deco_link' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Link Settings (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'text_color_link_hover' )->form();
		echo $module->get_setting( 'text_deco_link_hover' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Selection', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'selection_color' )->form();
		echo $module->get_setting( 'selection_color_background' )->form();
		?>
    </div>
</div>