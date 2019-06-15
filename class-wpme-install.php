<?php

defined( 'ABSPATH' ) || exit;

require_once WPME_PLUGIN_DIR . 'wp-migrations/WP_Migrations.php';

if ( ! class_exists( 'WPME_Install' ) ) {

	/**
	 * Class WPME_Install executes migration files on plugin's activation.
	 *
	 * @since 1.0.0
	 */
	class WPME_Install extends WP_Migrations {

		/**
		 * Register plugin activation hook to `on_activation` method.
		 */
		public function init() {
			register_activation_hook( WPME_PLUGIN_FILE, array( $this, 'on_activation' ) );
		}

		/**
		 * Fired on register_activation_hook
		 */
		public function on_activation() {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			// perform migrations
			$this->migrate();
		}

		// override migration files directory
		protected $migration_dir = WPME_MIGRATIONS_DIR;

		/**
		 * Return with incremental migration files registration, grouped by their plugin version.
		 *
		 * Register them using the following conditions:
		 *
		 * Each migration file and class inside it must have identical name, e.g.
		 * 'My_Migrate_Users.php' and 'My_Migrate_Users' as class name.
		 *
		 * All migration files must be placed on `$migration_dir` with each class
		 * implements WP_Migration interface.
		 *
		 * Use the plugin version number as array key and migration class names as members,
		 * in ascending order.
		 *
		 * @return array
		 *
		 */
		protected function get_migrations() {
			return array(
				'1.0.0' => array(
					'WPME_Migrate_100',
					'WPME_Migrate_101',
				),
				'1.1.0' => array(
					'WPME_Migrate_110',
					'WPME_Migrate_111',
				),
				'2.0.0' => array(
					'WPME_Migrate_200',
				),
			);
		}

		/**
		 * Return with your plugin's current version.
		 * For example:
		 *
		 * ```
		 * return YOUR_PLUGIN_VERSION_CONSTANT;
		 * ```
		 *
		 * where `YOUR_PLUGIN_VERSION_CONSTANT` is defined already before somewhere on your plugin file.
		 *
		 * @return string
		 */
		protected function get_current_plugin_version() {
			return WPME_VERSION;
		}

		/**
		 * Override this to inform WP_Migrations about your plugin version on database.
		 * Use '0.0.0' as fallback that will be useful for fresh install.
		 * For example:
		 *
		 * ```
		 * return get_option( YOUR_PLUGIN_VERSION_CONSTANT, '0.0.0' );
		 * ```
		 *
		 * @return string
		 */
		protected function get_saved_plugin_version() {
			return get_option( WPME_VERSION_KEY, '0.0.0' );
		}

		/**
		 * Update plugin version on database
		 */
		protected function post_migrate() {
			update_option( WPME_VERSION_KEY, WPME_VERSION );
		}
	}

}