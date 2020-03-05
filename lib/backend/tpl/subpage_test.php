<?php $common = $module->get_module('sv_common'); ?>
<div class="sv_setting_subpage">
	<h2><?php _e('Test', 'sv100'); ?></h2>

    <div class="sv_setting_subpage_mobile">
        <?php require_once( $module->get_path( 'lib/backend/tpl/subpage_test/mobile.php' ) ); ?>
    </div>
    <div class="sv_setting_subpage_mobile_landscape">
	    <?php
        if ( $common->is_mobile_landscape() ) {
	        require_once( $module->get_path( 'lib/backend/tpl/subpage_test/mobile_landscape.php' ) );
        }
        ?>
    </div>
    <div class="sv_setting_subpage_tablet">
	    <?php
	    if ( $common->is_tablet() ) {
		    require_once( $module->get_path( 'lib/backend/tpl/subpage_test/tablet.php' ) );
	    }
	    ?>
    </div>
    <div class="sv_setting_subpage_tablet_landscape">
	    <?php
	    if ( $common->is_tablet_landscape() ) {
		    require_once( $module->get_path( 'lib/backend/tpl/subpage_test/tablet_landscape.php' ) );
	    }
	    ?>
    </div>
    <div class="sv_setting_subpage_desktop">
	    <?php
	    if ( $common->is_desktop() ) {
		    require_once( $module->get_path( 'lib/backend/tpl/subpage_test/desktop.php' ) );
	    }
	    ?>
    </div>
</div>