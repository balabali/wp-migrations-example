<?php
/**
 * Performs rollback actions during un-installation
 *
 * @since 1.0.0
 *
 */
defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

// additional check if current user has the permission
if ( ! current_user_can( 'activate_plugins' ) ) {
	return;
}

require_once 'constants.php';
require_once 'class-wpme-install.php';

$installer = new WPME_Install();

// we can set the saved plugin version number to avoid calling unnecessary `down()` method:
$saved_version = get_option( WPME_VERSION_KEY, null );
$installer->rollback( $saved_version );

// clear saved plugin version
delete_option( WPME_VERSION_KEY );