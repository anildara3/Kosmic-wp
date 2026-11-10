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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'yoga_site' );

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
define( 'AUTH_KEY',         'Db~S,?W;rF;WCx} u!{mZ|qN/_m~8RN*LL&P#tw(AiygOp2ZcMK6p-Tf6KZ>Whwy' );
define( 'SECURE_AUTH_KEY',  'bWzv]{nQzBa@v7td$O61=A=zMk%;-?fLBoXRmz4tO*DQ@$02yQgBy(O f3_aqRUK' );
define( 'LOGGED_IN_KEY',    '+JeH[U_.7c#?DqcF0UM>2hBm $od{kRC6dVb6*Ur.p@IeZ_5v eQ mGT2a/I}A1=' );
define( 'NONCE_KEY',        ' _M<kei;G:)d}@)_!.+BX9?{pfEw3<Hsx{#:cdgC]HXx57u+^q#Mr_czpekXuEei' );
define( 'AUTH_SALT',        '/_v|[#2!Qmp=@UW(jqb|7EEPporne0Mhw8UR>H@@c~y/0}2q4|tE<(@qwO-,?v/o' );
define( 'SECURE_AUTH_SALT', 'a,3=_w5BHY$8{|=-S]C9A016sl}kS:No!KWM(peYI&~qgO9uTY|Q)r z;%DLY|.X' );
define( 'LOGGED_IN_SALT',   '.0}W(NCEp8f[-L7RGVngzD(.c|C,GckHTcuDRzaM}@c}p*/%vF(;]1EEqs;(E=.j' );
define( 'NONCE_SALT',       '.-7yn@cZnXk;`Hu3?P_w^R#Yds%5ESY,m,ono~(=I_.P-b}W7pG5uJW+YIQRW:Iy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
