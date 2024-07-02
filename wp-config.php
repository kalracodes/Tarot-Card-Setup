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
 * 
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('FS_METHOD','direct');

define( 'DB_NAME', 'Tarot' );

/** Database username */
define( 'DB_USER', 'aryank' );

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
define( 'AUTH_KEY',         '[au;jV*Ro|]m.kWB(HR]C+] !{ySRVk}e1<Wy?L%~D5k7b~p3#[]?mDJEp)XddLQ' );
define( 'SECURE_AUTH_KEY',  '>WDcC~FeUss~{ub-rD!@!v;.Su&GY:FYgS8)fSk]|*r]f*Ij76y. T`ET2N+cPUq' );
define( 'LOGGED_IN_KEY',    'fEn-fhs;~O:==t5T#6c|$(qY%V]0gBA=2z6gAUoIa%FG.3vK=Q9v=hEc82|UV-Pr' );
define( 'NONCE_KEY',        ':YQ{}9nL7AD}In3+bS [Cd0#C/5X}*y2H&vk$4z%2VfA)-nW{t5|PR~kz:bTo69U' );
define( 'AUTH_SALT',        '5kN_=2=}VJn6B;p6bF[IYQ#%Pq0|Gv`$+f#:kCAavy^3p:[N1=5^V}U5S-4.P4JY' );
define( 'SECURE_AUTH_SALT', 'fesQ}NyQU>]*@Ge3m22c;4v$EcON(lq=Qlzf=zI<~PN0HD9Z:6FYJk]uv|~2qk ?' );
define( 'LOGGED_IN_SALT',   '*,5`.]V0%g9gby6|ugIK5qQXmP6jj|anZj&$i9F@{o-FqyKVQnI*]OY8m{%$L&6W' );
define( 'NONCE_SALT',       'aAQJ4j#;p )UcIa<eLy:(Ab,yya#f::6-apR^%j<=m-^9K<Rb43s$aKY@[D&/S2c' );

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
