<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'psijhon.github.io_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r~TR_e/i?|O@MqLz.G*[u6e@o|6`FxOoLM`P3viTfaa_a;bqBbIKV9<}T@0D%>da' );
define( 'SECURE_AUTH_KEY',  'uR,}*g!$c=9z|!sl?sI.Pvwld?!|2KZ=(sZ[i>`5k6<vI$;zDcC![@6Du6KZB*r?' );
define( 'LOGGED_IN_KEY',    '[9yjKXD[2v9)[m,$n_$|9Ob7sSTYnYMM{{<FT&MiCe(C/yVBhWUPWJEAg=b>((k)' );
define( 'NONCE_KEY',        'MWo4Yx]Bf9C-.y`^e9A6|;i>; KOC.xF$20I)J]$H-qE68 yQH-bhirYhRCvmwfC' );
define( 'AUTH_SALT',        'x5^j@s2?ngmk*NU2Ll{zRFC@b?e?g,~LK,k:A6_3nC?2M><@[FrlD?].Ox(E|:?B' );
define( 'SECURE_AUTH_SALT', 'n`H6?vy-H>BDLlUun|=!c]]A5&6u:VhJk^/r#/.aZ1o9V}-,EP<pHJd;9b2)g~s4' );
define( 'LOGGED_IN_SALT',   '![%r}>4zGeQ2C3o/SYB#E=1W-epd*3} qT*,7yJP<>LHCM;smh+pP%wT_[tJ0m;f' );
define( 'NONCE_SALT',       'qT.:QGtDQTN^<:lO`:f:wp{sONU!{f$,:.!leYn`ZNX]}LL)N9-4Q~wS^1xWS!`_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
