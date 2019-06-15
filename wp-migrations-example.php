<?php
/**
 * Plugin Name: WP Migrations Example
 * Plugin URI: https://github.com/Adhik/wp-migrations-example
 * Description: WordPress plugin sample that uses WP_Migrations.
 * Version: 1.0.0
 * Author: Adhi Kerta
 * Author URI: https://balabali.com
 * Text Domain: wp-migrations-example
 * License: GPLv2 or later
 */

// define access to the main plugin file (this) for separate usages later (e.g. hooks)
define( 'WPME_PLUGIN_FILE', __FILE__ );

// separate constants that can be used on uninstall.php as well
require_once 'constants.php';

/**
 * The main class
 *
 * @since 1.0.0
 */
class WP_Migrations_Example {

	// WPME_Install instance
	protected $installer;

	public function __construct() {
		require_once 'class-wpme-install.php';
		$this->installer = new WPME_Install();
	}

	public function init() {
		$this->installer->init();
	}

}

$plugin = new WP_Migrations_Example();
$plugin->init();