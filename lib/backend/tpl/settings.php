<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
    <div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
    <div class="sv_setting_subpages">
        <ul class="sv_setting_subpages_nav"></ul>
		<?php
		require_once( $module->get_path( 'lib/backend/tpl/subpage_test.php' ) );
		require_once( $module->get_path( 'lib/backend/tpl/subpage_breakpoints.php' ) );
		require_once( $module->get_path( 'lib/backend/tpl/subpage_common.php' ) );
		?>
    </div>
	<?php
}
?>