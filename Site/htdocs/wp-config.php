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
define( 'DB_NAME', 'bobr' );

/** Database username */
define( 'DB_USER', 'bobr' );

/** Database password */
define( 'DB_PASSWORD', 'bobr' );

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
define( 'AUTH_KEY',         'i(V_P,|`YB(|;mkhpSk#0*wTl687VV5;SluT* e/2.Py!zU^Xd*xR;?O-BdP`H=?' );
define( 'SECURE_AUTH_KEY',  'yX6)N^.]HUGAuIL0Q6>V{?9>9nANyK+/b. 7l(}7sVLsR9:p[-@oxBZ3Z.fJa2d9' );
define( 'LOGGED_IN_KEY',    '?whMtp/){?W4$zOk1!;6X&[nGsHH<x,9)oxS~X+{9F{J/}ZSItjE1o? -Gr^x5jn' );
define( 'NONCE_KEY',        'vu0@Rmz&F.&V9ir)oavJR%a2!rlsJ{jJ mm-eAgD(~yN+`_ab}_AWq/,/}l:Jf?-' );
define( 'AUTH_SALT',        '=]/Gl:bcZS;(4T^ai:]6Y4nT/jX`yH(g7l!jsed9!f97a$MNWzx2@53nC0tO1`6S' );
define( 'SECURE_AUTH_SALT', '7&:xIQ|y+)|LIXVx2=q(wp9rTJOYqmKz(eAM<NbR]*Q$$h@zT(}N.LXnTg|4fFhO' );
define( 'LOGGED_IN_SALT',   'E.3A8(t3d*:1n}r%;Aru+m]xc!r3f@?(8+(=7fIxZbShq]}mltbU.vlRf!5}#P7k' );
define( 'NONCE_SALT',       'y/3MJVyqfKypx86N7jqH7j6=g%oxceu}(Fw3/eU79u.MO3G@H*46H#YSpQf9STQy' );

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
