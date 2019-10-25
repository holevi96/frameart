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
define('DB_NAME', 'frameart');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6xwaNcLYxn40tKiFrUwaBKERz9LSiQMpEld9jMbvtgx8rlue5fuWKhkNouaPumnc');
define('SECURE_AUTH_KEY',  'xUWpaMsAQAoPvPVfQGMv6N6OBTACb8UAvOFV7dLwUrbwXqX6d3kBon0r7IYkV0Cw');
define('LOGGED_IN_KEY',    'hbw2ntMmUHIMOSctT8kldJY4Ovs4DJG6R8qRO5UKhoPMSUgbNigk598W01wDzjXo');
define('NONCE_KEY',        'XmlLyAnsAuNCevtpsJsgJTwZ1dLRGqulBZign6QBI57bilQRv3Dj7LL5zhEFOaT7');
define('AUTH_SALT',        '3LF00pXyfOr92XjusD6assSF3kdF9gCOvDiRrg8a8WuIOfMhoEHhNvjtkk2G2ivT');
define('SECURE_AUTH_SALT', '5a70d4NqVQZEdZ8eOLJPX0zNLh5TbatsdUrYFJw6KpPXu36Xq7ITdkBb01CYKmqJ');
define('LOGGED_IN_SALT',   'pc08148c1qLWacOjqUMGRHEj9uLkgDWJqr5ISplC00n5k53kPuYEdYFpSwWirg7x');
define('NONCE_SALT',       'hTXwkKLhH0MpR9YY7ZWEX5zLFoJ9x27xRKGJt9C4HprbAyVzavZGTns1CdCmLBJ9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');