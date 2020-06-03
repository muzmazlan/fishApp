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
define( 'DB_NAME', 'freddo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '%RZJZj4z>2k?yCfvp 7wmn;Zi32lDF|@@o@ =l^`J.ul_O|zQ{L2)f*@*MLy0n`<' );
define( 'SECURE_AUTH_KEY',  'DxodU%^xhgV;N3o>aqawCKm76T}d<_:j7)5&qH3w{!RHpS@d=TVFRa|+AMeN-BcN' );
define( 'LOGGED_IN_KEY',    '^) /A<r3rTf{Vg/qQE,D[HDxvs {Uaq%k~=+iST]+tH9uB{+koEh1XuUbRCT$RE?' );
define( 'NONCE_KEY',        'Mn4[xiMh{8oSXPbUT3l;Mj BjK+XI7(5}^K{;2Cy_`&`[3OD2zVa#Vq;{]K.^|(]' );
define( 'AUTH_SALT',        ' ,19;/hI?r^cl?re.,uv EzCaB!g#RS0GX%r.<&)2!<qQ~1mQU}@Y^{y7~,H{zc,' );
define( 'SECURE_AUTH_SALT', '*O8kPWy $m;8x>02gEAaT]hh@uHP;2jd)V7rBk;Q`xgBkxSmhl:1^.q*Re3P?zr3' );
define( 'LOGGED_IN_SALT',   '6-@LB&RyCv#2sj}D{d]Sr?q18Ox2hnKUp71]o$lk8@;<Iqpya/h86Lc `#kRVz 5' );
define( 'NONCE_SALT',       '-_1FZV@UBAsIf0Tya@5Gyj.;5Ov21x!z6i#$AuH5,YVwk9sd8>cflj#(Yr,kA_{6' );

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
