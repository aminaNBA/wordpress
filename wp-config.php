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
define( 'DB_NAME', 'npak0382_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'npak0382_aminaNBA' );

/** MySQL database password */
define( 'DB_PASSWORD', 'aminaNBA123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'uX^U~7Zu4?qI{+Jxda6SyjpT]Aw&-xS[VSqC]{1 0&I2A>g6L%y(}:^D,g=lVu64' );
define( 'SECURE_AUTH_KEY',  'o|Y{VKnhzbrILFz8_3umAW)aDZC$NKz RFg!  #[oO5YB]G@<D0AnGo*|lwFf*8*' );
define( 'LOGGED_IN_KEY',    'Ul98avBq+V{M,j[IfCoO%i!6`6-s0s0trP{ N=(aZ_l6tUr|CTm[l|fskdB]:o{9' );
define( 'NONCE_KEY',        '3VCqkfvWkGTZ&?o30ca^<33+>8uWL*|(^/c=~h>Qr>0_~e^#a&`$,^)15YTyHOxL' );
define( 'AUTH_SALT',        '*AEUu,#JW$aU=u%.O+yE07:^] ib&;@<O;F@85gSN&X2@%@,_gBP(a+TUD2a8{v5' );
define( 'SECURE_AUTH_SALT', 'Db)Sc,^K~2@]SBTM|g%ChH93e[h#h,u^FwZy.~xe{.%:.90%^-5q=0?Rj[438wd~' );
define( 'LOGGED_IN_SALT',   'Y&ESDKyVlM.z&y3gHF=]QB~dYR4Cza:hN8joEeLus:xVTIT^LZA}@jb)Oa.Z)Oac' );
define( 'NONCE_SALT',       '-+/s9=5%e}vh|/huQZ,e?L 5AA)_fuHd-12e&6frmnm% *)Bv65YRzwZQcE|]g`$' );

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
