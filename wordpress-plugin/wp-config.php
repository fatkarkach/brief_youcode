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
define( 'DB_NAME', 'wordpress-plugin' );

/** Database username */
define( 'DB_USER', 'Identifiant' );

/** Database password */
define( 'DB_PASSWORD', 'mot de passe' );

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
define( 'AUTH_KEY',         '&^ZX>(W-ViHn6vVZfEzAUY(Y[KI$M9Q?lIQzz5^85%:>t2b9GCLfg<R64L|1A;%[' );
define( 'SECURE_AUTH_KEY',  '~ZWa+H1$~(^>N7$gkuH,/ZB}!x87sg0xO^7x$@,ARgqz}S]?iPs>Q>U_#^?jT.`W' );
define( 'LOGGED_IN_KEY',    '^VoEKMuk{#%Q=<Wxm!!)x:73$4Teo%(pPx<^L2BLFliI 8Yx:_KGm20A?#n+bbYP' );
define( 'NONCE_KEY',        ' M`e98dyjba&Cu}I_q<Bl8lvH3RS?mwJz~p`*o|9V^Xgtk.2ES@nh`)P}/|L<oo}' );
define( 'AUTH_SALT',        '9SB[ADxs*$vqBuR*3j1f%]#M]zO^8wK1+&~}M+]_F}`X> W.(|&xbzZ~tc{B!|=*' );
define( 'SECURE_AUTH_SALT', 'k87A#W+[^=CWC<+A;<u[/aDedURg$g)_FGI3n^T >M846+(-yu>V>}S(q46Gl0vT' );
define( 'LOGGED_IN_SALT',   '}s!?+]$~)9Wp}/zz_=_}xX;>lK-]PUd]?u_=$8,`{ k$nV7O`WRVd]1z*Sn$rU%>' );
define( 'NONCE_SALT',       'j`UsL.ugg93V*HDk9:aw)+!GR0_^}A[i.O#iVIb4tb03Xmw)(:4l}5$-P4^SAha:' );

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
