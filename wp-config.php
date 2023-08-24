<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
define('WP_CACHE', true);
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'RMGnAqO3HzSQ1v' );

/** Database username */
define( 'DB_USER', 'RMGnAqO3HzSQ1v' );

/** Database password */
define( 'DB_PASSWORD', 'XX4utqsY5tuP83' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nfwgros5u1u0hah0ijtngmnawedhplvrza5tqvpleqcqyybp4bb59ipjnkrgoegh' );
define( 'SECURE_AUTH_KEY',  'f2udskzimmg7stxftor0g5gdqancrvl0pazke9z7hcgybrbf2oohf9xkql7jgmqe' );
define( 'LOGGED_IN_KEY',    'fae7uhcnttvhgckgwpd37jchtyrustywxotlmcaelvnsoiqtbivbwp6e32whmqdi' );
define( 'NONCE_KEY',        'et7ydaynk6zgxt3pc7r9wsrlvogb0oc79nkyuntaevtzgg3wnzy8ng42vkyapsio' );
define( 'AUTH_SALT',        'ou509z3pfqlvapwjxfwe9khjurgoo3fjjto4ffraydso1upk0i6x3nzqwqreuua6' );
define( 'SECURE_AUTH_SALT', 'hlfatej9lycm85hyittbbfeja5fmxufbbhrzegsbpzv7li0j4s3r044hxvwfcf5i' );
define( 'LOGGED_IN_SALT',   'd3d2gqkoggll81idqrmm3i0vfiu0mnnipk21ezby3vfbe0arpxzybxlhzczbk3qb' );
define( 'NONCE_SALT',       'durszb0pveglc8l7p4mddyaifdnkv8ibbttbsl0iw29vebvnhhkrwxf7xii9b5tz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xplab_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
