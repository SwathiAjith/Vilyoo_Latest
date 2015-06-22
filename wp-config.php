<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'market');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '7Uz|D=Z-3R;YGGhlQfb^dQ0Bm{Cr^:bBHlv|$@|sC&1J)>WAs|vQcG-xXPj|uaz.');
define('SECURE_AUTH_KEY',  '1qF/|<^ON2W!M#eqAq,W+iUf XoYIl:}s]1-3vQ&^_S>`(lycaR!#_~`WPO^,~eS');
define('LOGGED_IN_KEY',    '/|$9`A:r.HpK]CVG`I/HCv3iEF*Am-s(<txsE@nBr^zzT66+:qe=yd=I2wm{Z]UM');
define('NONCE_KEY',        '3Y )rWS,O&*<o/DxGL9ufN_X8EC5gj]y|wuKK{yls|~u2H,6kL^ VtU{;/_^P^?d');
define('AUTH_SALT',        '.ZR}t/$vy3EwM$4a-Xrt{nw)R1r:lz?5jTZfztT{7tj >RUt;vMXGqE4-Hp?]).}');
define('SECURE_AUTH_SALT', '&dZU7Iy5klVZO#.dTD3.i*qUqX^+cfTwt3r8G,9`^V<x~, o6=G)];!yh}yT<(p%');
define('LOGGED_IN_SALT',   'ULGt5%loC?0=/OJb?UlqS/_g6`|[oOtP/ [Gn*uC:mJ&j6U&C;c+{D#wBKSL2H;f');
define('NONCE_SALT',       '63~C`430.vO$)#c_fn,+CKArIyGT=yN.+G?U)v1oxCuIBn=Sju-4A?G*kfhj-br7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
