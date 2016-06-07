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
define('DB_NAME', 'biofair');

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
define('AUTH_KEY',         'dvP,M#%&I3-E.&/6j!_Ore$P#0XwC$I4GNPc9@,`J3CSvX@td-!tH6T8#1Ff?>Mn');
define('SECURE_AUTH_KEY',  'N7dx.r2^FV/5*0ZxZdI(x=RRot3[HWDHA++uap*}Cm`wlVKEF.7_vGf,YVFRFub%');
define('LOGGED_IN_KEY',    '470*.fzi9`,1yeK ;MBqR,DI|u.Ja+CJ> ZHiwO->ihi1`n}uZI+S1t}I]fZ{SW<');
define('NONCE_KEY',        '`L(tkv^)fD>GJ1Gh#t+8&|Jkc+%dY4N8=#fm$TOUcLARMwO{i$AIiCaK[@zB1=R5');
define('AUTH_SALT',        'jIS|aDRa?DSvM&{EgP-R>e#Yd_3LV dD;34qE5#q>t2km}K;pUPZwu~8Z3:._<-J');
define('SECURE_AUTH_SALT', 'E9<v_Mnu5zq!]n`c^ACBag3}{PIm9YV.2i?PQ(7(4I8x]+[CS.(WL>AL/5xFY#&]');
define('LOGGED_IN_SALT',   'QtxqY:`Sd8mZd^JZ03p:}4V2#z6u1]<L4/X<7Kdea*0< kYUt!9u]o_b~|%L)e*o');
define('NONCE_SALT',       'zp&5F++g:TC+%1QY5_wnTqE|)CJ8 y3430,*x@!7-X1C%UvO>|L)<3{107o)[qB4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
