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
define('DB_NAME', 'bigjimlocal');

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
define('AUTH_KEY',         'ijL0DRCT~9Kn>BzUu-D43=%08ij=emX^pPP8<-:+F_MgaS(eVmE{U+T.bc$iE?)/');
define('SECURE_AUTH_KEY',  'MA%C6T@y^i~Y?:or-=Uzd1KV:8]VX/0KD_`K7nA`DV)g*_2(L&b>tQ|w_FPxb om');
define('LOGGED_IN_KEY',    'g??8eiLqRNN{D.I]ef+~/!F`o)97Gpk6?WJ.zH$s@I![3D=P1jw7{>T{uy5FB7XD');
define('NONCE_KEY',        'CvD;B#,Vln!{NqmZPYomZm)s4S^(X>^]B#@qz`j-^L >8g&LWxAD,w*}8ubgJ}Iv');
define('AUTH_SALT',        'wNq}#0;PHuOb)f3opMLhL+Ii^;{1=^KmF^nHg)0Cm=LoJcK5yv]08o<7@[1h-bAV');
define('SECURE_AUTH_SALT', 'rb`9oa37?j!Ro1?}x$Ei5:m)aGOKk2ILvmRfS7.|w+Dpo;$4IK=V&ZT0,]uM>8rv');
define('LOGGED_IN_SALT',   'WZ*ba0)yp=@kpRd$ik!(z,4E`D<.e91Qs 0D)uG>/9(wN`M/09%TLC^X^{CTk`Nf');
define('NONCE_SALT',       '<BL?/Yl:7iOv,=?%42AIv4bm#}8b];-=OS4KrX-BZ%xvI2&Udv)H?. }K4YwFZ s');

//define('WP_HOME','https://bigjimswalk.com');
//define('WP_SITEURL','https://bigjimswalk.com');

/** Custom Definitions */

define('FACEBOOK_PAGE_ID', '195964274191011');
/* define('FACEBOOK_ACCESS_TOKEN', '773919706101955|d-7CxypAjTl33hBstjlXDo_prfw'); */
define('FACEBOOK_ACCESS_TOKEN', '773919706101955|d-7CxypAjTl33hBstjlXDo_prfw');
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

