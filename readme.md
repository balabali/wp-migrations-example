# WP Migrations Example

An example WordPress plugin which demonstrates how to use [WP Migrations](https://github.com/balabali/wp_migrations) 
in order to have more structured process during plugin's update or downgrade. It is an alternative solution for 
WordPress `dbDelta()` function.

## Testing

You can test the following scenario, simply by editing the main plugin file: `wp-migrations-example.php`
 
- plugin's version number info,
- `WPME_VERSION` which is a constant for the plugin version number,

and make sure to disable the plugin before changing the plugin's version number.

### 1. Fresh Activation

On fresh plugin's activation (version `1.0.0`), `WP_Migrations` will execute `up()` on `WPME_Migrate_100` and 
`WPME_Migrate_101` class.

### 2. Upgrade

On normal case, it should be possible to overwrite most of your plugin files on upgrade scenario. That includes 
adding more classes in the migrations directory and more entries on `get_migrations()`.

### 3. Downgrade (Rollback)

**Make sure to leave the migrations folder and all the files inside.** 
That means any new migration files as well. `WP_Migrations` will perform rollback via `down()` method 
on specific migration classes, in reverse order, by using the migration rules on `get_migrations()`.

## Known Issues

[See here](https://github.com/balabali/wp-migrations#known-issues)

## License
[GPLv2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)