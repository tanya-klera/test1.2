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
define('DB_NAME', 'wordpress _1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ctadmin');

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
define('AUTH_KEY',         'Sz:0A.**)gVw&Gq]-QYvl@iGpVWBZn7dbunM<ehHnRrE6Q6}6MI)+e{bF8^~I8N_');
define('SECURE_AUTH_KEY',  '6_]A]HB9JJejCSr>NRB1fW?YyWe5&CfaGgC2I{H>)!d(s],OQxV_Era:xG{8xw92');
define('LOGGED_IN_KEY',    'J!s]Vkom<66(|@OI1rkhMX04o.PVBm]LbdpR_bH~XhDw$$GY=WjZJ>s44dm@!_d4');
define('NONCE_KEY',        '$[OtW:6>)%-~@@|bH{|VoR0{u~1{#K|3o?a?cqO#vm,6~)EP4|aSzuR1?}I0c3p-');
define('AUTH_SALT',        'i1p>g<`{l(kN?6Y:<Oopnn9y&Qw44LM=9zvmD|$!F%~l?.$?[7qeH~>!F&VTBfvw');
define('SECURE_AUTH_SALT', 'E`a?c*0|r!7=jnb-hJ]zwv,LmQdF{|1D8Z[D|!k)7rQe&+yB#t~f6A~tg~umU4f(');
define('LOGGED_IN_SALT',   'R`,Mxc<Mw,Lg3ek)#fX@/K7d5;E.$%cqQsvjp<~<!V8,~.DFc~q?.trqgprRe:FD');
define('NONCE_SALT',       '+|Ko!YY<gp7/vWlJ}EV)aO$F(Nkh&}~, Y} $nJNbHU<#eJ~&Q$b!/,@lS`_=l/`');

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
