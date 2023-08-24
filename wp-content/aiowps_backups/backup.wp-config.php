<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rabq5864_xplab' );

/** MySQL database username */
define( 'DB_USER', 'rabq5864_xplab' );

/** MySQL database password */
define( 'DB_PASSWORD', '6T4!p1@STl' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         'ddwcktffoxcrh7eri4hlpnj6wzvikkcqh26kvj4hszdxzzra2ptwwt9bgrt5yg0w' );
define( 'SECURE_AUTH_KEY',  '1rufypurrsn44vnslnfatbwfhtusy4tsnjkijwtkcwcygouflmnvqo4npubjgonf' );
define( 'LOGGED_IN_KEY',    'zll7t93pjtsodtwmzzmue2yugiqvffx9k0tmvzdxtbdvnws8p2royj8emjbp8aqi' );
define( 'NONCE_KEY',        '9wvm2l61o5zwiucbaos4cjhprwnc6cikjgzeus3nngorxjrn5eamgcz87swxzvva' );
define( 'AUTH_SALT',        't9hvzgpy489gjud43phlkaaobfvjy7dg0begv2cmrxzus6spy3rensvipdyupmqw' );
define( 'SECURE_AUTH_SALT', 'b0xq7msweaksutedk0oslluigqvdnnyk1gc4w9glyvnw9tkz8lmocycsyrg4i2td' );
define( 'LOGGED_IN_SALT',   'ic4xz3adp2sls1s7cvaaof6jtz3e5nmxircyzqx1symtttveplidsiirzu4v9ua0' );
define( 'NONCE_SALT',       'hvuemvvrtrvchrwkyza9dej5xiat9avsvitnlbldaytgyu7tcbgl8igy8mimwmac' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
