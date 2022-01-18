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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'redesigned-giggle' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define('AUTH_KEY',         'tQeA6[3Z|73ShW!tW1GFre=r.!eY$s}VA<)KarI~18_$Ay.<Q?4Pw,E0{h36N|bR');
define('SECURE_AUTH_KEY',  '2bF)-<H}I#mIA)IGi)D YP&}zU}RC}3]by@or!DG8?&2cO8]Ee$/+92Jo-+B66@a');
define('LOGGED_IN_KEY',    'HveI@Gv.|YOWv^z-[TerZ?NR3/VB(J5LD|;h)ef4*>d]O&V<&W-Obv`p1(^/2+M^');
define('NONCE_KEY',        'YxL~r0wFF8TN[Vj(_ou?;_5Z {]RWYILs(r9>LMQF&C]O`{A#F2?:J_DX5b,}2:j');
define('AUTH_SALT',        'j*$JA[EiJ2nYo%J24Fd1i+1pVdNn,|Ild[+tE|5E<M}!09<nqufRP=$&G&gd{Mcx');
define('SECURE_AUTH_SALT', 'WSC :+4+p@-<0%XLP&+fY8!SocJ%?g*M)3YU5.MK,@+$03SzBexr]K42fkl4r6_g');
define('LOGGED_IN_SALT',   '#DnBRz4J;<k1jbGgwMZH+krFe-zJwCaz_kSYn]Hi#.PFH$:8+^r<xTLkhHRz<1#N');
define('NONCE_SALT',       '$~PDKlx(VK-~/OO9vX$hN)&5#$ka+c2$L:vg{}P{K2Xfb?BMD($:V=Y+Ub>Wx[&E');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
