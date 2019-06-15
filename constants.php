<?php
/**
 * These constants are separately defined here so uninstall.php can use it as well.
 */
define( 'WPME_VERSION', '1.0.0' );
define( 'WPME_VERSION_KEY', 'wpme_version' );
define( 'WPME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPME_MIGRATIONS_DIR', WPME_PLUGIN_DIR . 'migrations/' );