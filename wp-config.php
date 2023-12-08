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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gymphamhy' );

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
define( 'AUTH_KEY',         '>OEh(3vrFNx,B[2%py}v@ ?s{DxBnGHv?~k&NUa(kGiC:vj} M)D&9-CL;q$+3ZI' );
define( 'SECURE_AUTH_KEY',  ',dSV!=.or8UWvJ|t|2q^2c6g0~tBqx,^T_bBr+5[|}cSy^kbb`2#%k<g.7_1!*&5' );
define( 'LOGGED_IN_KEY',    'h[O,pzGnEn#lz$|Q&9I+qsf.GYJX]{%ujvJc9MS_:Btoy1pMi3k&ld$ZZX-EVpQs' );
define( 'NONCE_KEY',        '?[Kl}WsPZf;s)}+Ng!,R@UlS]CM2V%6I.PO=G^+.Z@j?O+/^/K$mcG`BsFG=X<X;' );
define( 'AUTH_SALT',        'huj]bH2bj u_-CPZ(1NKm+^t+oHH4sN:*foc>I{/i`#q?byv:H7!xC*Ld)?y8&jp' );
define( 'SECURE_AUTH_SALT', 'WGHW{:8p4#|4YoioZ;j?9F8v&vVmmHzh~RVKM~mJ`;1VQLv07fs~4 [*o0}?j`?C' );
define( 'LOGGED_IN_SALT',   '=&uT>)]`<Q1{jS^PXd79uA.(TLo-0wgrT]:lsR>=`5[b1Dp$9FVnBkpgK;?Ee)#*' );
define( 'NONCE_SALT',       '>q !3Qq@^v$Sy*GNZe^U/`}3 ]^b_~8<kE{tYeb</S4CP-Rr_%^<2u=XaFStb&Gy' );

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
