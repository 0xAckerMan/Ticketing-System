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
define( 'DB_NAME', 'tickets' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '~98qz 7dqz+`xh6B^DF40zbQBx?oo{6(rS A9=hRgNPx{Y{}M8bUEyt2?5BJC7.]' );
define( 'SECURE_AUTH_KEY',  '`EJ5i<T_~fyOk++4G7Tj?%o|At*dr{<eT<?Zcr+Mai,Pwn62JP%&SL>u>34xT# ^' );
define( 'LOGGED_IN_KEY',    'MA6 I%Vb3|_`bj}j;Y3Ko+@M^0qMKBzXeO/nSSllzAP(D4sGxbtNqgL>CZ$V$jkC' );
define( 'NONCE_KEY',        'gZa6X)fq8jSSiFUM4!vQ[u=+M48$sudz{b_f(G=Sh7/}mLsLr{mu@Wf2araSYH1&' );
define( 'AUTH_SALT',        ',;r6Vit.gv}<syWF<[[qgyv*w(Lz&[:1ucJlXrSl3i+!Em[e#&`B%na0qp;CO@!]' );
define( 'SECURE_AUTH_SALT', '#&B1zh-39Di,od6/(ullU?of3,]Q*!VpgCd]t_@+rW5jrf[Gg_~=] <`Wb+ue):K' );
define( 'LOGGED_IN_SALT',   'S,R9iIx43Ar[>^p+=,O^`hG4e6?WD?<D@9jz,1%N2xV,8k@{=I`[N<-vWSCY3heS' );
define( 'NONCE_SALT',       'zp&~a{uZ1{5!S-Uw!3kCE *RgzSK:@w}mShV2}eIQc#mXt4?fFnU^_`XPplO5;1@' );

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
