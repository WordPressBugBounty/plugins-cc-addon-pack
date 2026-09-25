<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

$ccAddonPack_delete_options = array(
	'ccAddonPack_options',
);

foreach ( $ccAddonPack_delete_options as $ccAddonPack_opt_name ) {
	delete_option( $ccAddonPack_opt_name );
}
