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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'empiricus-wp');

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
define('AUTH_KEY',         '74R=fV@t*+DLYg:2KeySvSEkPnI^sQ@p)pOp1R:Hy(O+en,oDGm+3kxi6gqh1Sf|');
define('SECURE_AUTH_KEY',  '37-Y0>qax*abK6ns)-QsvRR1oGZjc|7u:OiF!%,nStzlRf!@;gSvzAO1M^Iu8Cd.');
define('LOGGED_IN_KEY',    'IeRDN!MFOMPj2myVi:!I.E3x*jG:_1<Xyc%&WM?cr5Kpm#[^Lj{Jrqy4mp8z>3_V');
define('NONCE_KEY',        'yy# TR_{HoC^!yZ%7G?xYPFGxp1-,*[z__*&/)MD>gF[Rr%x<6.g[!I>kK4cG+,@');
define('AUTH_SALT',        't}?=_4V3eS?/EUL-)Ok/w$r#=2W]pV%nsN<Y/}&RgB<Om>0:g.7AW-h0`]=iIR>@');
define('SECURE_AUTH_SALT', 'Geb(5}gX+JLvA& m?:f5b*?F03p}?WsW$,-YpMaE#&tw^*61W|6~UF7Zu2I9T+aM');
define('LOGGED_IN_SALT',   'LzT#G(lN<.}$pC5KGF.H<`ZyA9j,@?q53q6s-mc1.a-n$WCFt.I6kzk8W=9{6XO,');
define('NONCE_SALT',       'XPIb=;E^z]~~Y1yy)-vVSy[F:PZD1sEVGw>#maXzSSHa?+wq3_Ws3#%nFP9Z0Lt@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'empiricus_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
