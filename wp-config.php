<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'fRc[uAaAerfBhZgBb/XrO7Z7y**23-*V;5e8x,0F,k*8CB]pR^diTC)M+ae8GvYm' );
define( 'SECURE_AUTH_KEY',   'CwmKFk3;f,:;A@#v?jh4Iz&Ud$[zt`IQy9$~==QTAW4?{3y<(:BS`Z:ptGgD0);k' );
define( 'LOGGED_IN_KEY',     'P8!m6!th-Viz*^}+7Moe *r :4Vmq4N)&d9iHj_:kjJM^rFi_w==`oWAJJbH3<!E' );
define( 'NONCE_KEY',         '*SQ+YihFx(Bz*C}S`K{P O9Ii6$S&@POQ0=&`*i~U*???xIO+C@,bq%&I*Y9029v' );
define( 'AUTH_SALT',         '4ro~>As{oU.QMQoZ6ejQ<{[c+jdD9%#(~o-c=pd$|D@=m`nR_Ey@SnkT1uC}O!fd' );
define( 'SECURE_AUTH_SALT',  'TJMpO-,?D8j1CFExg2{ug/5Ip l@zj{Z>g/XPU&rA{6YRZAP~kuet>Mu0zLZZ$69' );
define( 'LOGGED_IN_SALT',    '=h7Bxr1I5h?*xZLI#Y/nu]+XI1$$4YR:m3Pttw9utd@v$)F8.Xcvvbs$%UYJ[7;]' );
define( 'NONCE_SALT',        '`|EFF([Ive,y>obB#nhi~iRmlHi{8tk;H&Hzn}?OxXK$9Ul8CFY%P8YGnTA:=6+v' );
define( 'WP_CACHE_KEY_SALT', 'O=a0o]E!.l/CC9*3m08P3$-r*o^[(i~yK6@|kLB6!AYDl$3h_t)_2a-8B:{ 3)%-' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
