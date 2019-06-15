<?php

include_once WPME_PLUGIN_DIR . 'wp-migrations/WP_Migration.php';

class WPME_Migrate_200 implements WP_Migration {

	/**
	 * Execute the migration, for example to create or update tables, update plugin options,
	 * insert required data, etc
	 *
	 * @return mixed
	 */
	public function up() {
		error_log( 'commit on WPME_Migrate_200' );
	}

	/**
	 * Perform rollback or revert action against up().
	 *
	 * @return mixed
	 */
	public function down() {
		error_log( 'rollback on WPME_Migrate_200' );
	}
}