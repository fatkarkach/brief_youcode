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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Brief_Plugin' );

/** Database username */
define( 'DB_USER', 'fatma' );

/** Database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         'tc?]i[x>0)v6@v$BR;Kl^,}_kuXekJjBka}B}^:,r@Z3Be,.9Ax8LD^Lw$w,a$oq' );
define( 'SECURE_AUTH_KEY',  ']+}wO=I@eca(YWiqavYkF`JU~Q3oY0wJN@z 6$08 o/BsW}W_he58jZz_Ou`fQo$' );
define( 'LOGGED_IN_KEY',    '0%lK.xH/:q3:7)+~El:wwi$3U>An+DhbS)002<pspB|O.Q`*[WN]kh:ldmC:2>Le' );
define( 'NONCE_KEY',        'NIv$FABsRC>N_nG?g06h=4*T@e5E^t8 j4D8HD}&L<ubmvDHJrdRo#Rd8xPe?N2e' );
define( 'AUTH_SALT',        'R@~s(P`;;U~/u]b`{7q^EkZ9k&fYJcPq,px`j&+xcW_ *JVQZ#~`|TEmtb89lSDQ' );
define( 'SECURE_AUTH_SALT', 'G<Y8<*pr]y7RwFB6i ?talUxuSy|w:>_E?x.fSX>1^/6yvIl8l /ccl3wXQhr_g_' );
define( 'LOGGED_IN_SALT',   ' ,ddzI#_cwc)F9h-qew_-FoklM(gwcgH&ozI/x$;YL=:c_&rw{`SL)/G6=1?Fsw[' );
define( 'NONCE_SALT',       '6q=|;mxIl].TfWq`O>yA@8y2_sGN3N^)>>~X)kIeeaqI*QKg`.1?dPVw|RGp+Dai' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
