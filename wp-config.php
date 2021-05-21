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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'unclehaig_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
 define('AUTH_KEY',         'lbFERFX7HJo-j3Uqq9Nxjk7WM#OU@AW/y%gVA`5UfmQ&*T._@J<{gLs;3:L7z{>1');
 define('SECURE_AUTH_KEY',  'kQmJA182LBek:BQWEooh<v`]%!yrjc)lQoUlznn:lM!qMx?O!U/MZ,L*EWy3ozPY');
 define('LOGGED_IN_KEY',    '<ZWNO]@?/1arPj)3%g;+wzYmJH/[!@Sb5X?smzu.B&U|UFIc=L5T[/A@SdKW11c3');
 define('NONCE_KEY',        'e<],A,iOpZp{aK#k$b*y6?|c|o=f0`++@I+-Df-0*./Nuz;qnW;9z;B r=|nTM0!');
 define('AUTH_SALT',        'FIdI?0LDn8f]|8K/p++=a} -n`|b|8LfG}B#*11<B-cNx|||*r+{ rt>ulG)m&G/');
 define('SECURE_AUTH_SALT', '<=U(u,B_K!2s/>t]}i{@tbZ6o[(slJjW/3+jy!WhjIqrR5KV&0i%4!>OV^fP=8Ae');
 define('LOGGED_IN_SALT',   'MM;(3qd$Y5j2;Tt9Fw9g BP0Th[1_O@`M#Jrbz#uBL8JKfa|=^Q|/x|dqZPc7 {|');
 define('NONCE_SALT',       'zAm/HA]|Sao-){N-+DF1EF}e1*R]I_q!*TZVM~<!s3^/p=gqq2_l2ei3hq[_+|kW');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
