<?php
// define('WP_HOME','http://nzhl.dev');
// define('WP_SITEURL','http://nzhl.dev');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'tdANt~%0/+]VuYHb|7.=4-h9ywX#K3Xgh|~>5-,pie8tb|JRUU%#p@.5yeZ>1FKL');
define('SECURE_AUTH_KEY',  'BT!cd6~pH:JR5!/C!~n+*XbRiM`?EP-Rwq 7|+Tie:,]|PFJ#*lJ-0%>[-CBp@?+');
define('LOGGED_IN_KEY',    'oAyn0mwQ&;>Xm_/_61e$44x*u agMEv|vdDX)|m+lG8T};y+,li?;?/>]JE)yMGx');
define('NONCE_KEY',        '%-eX$tf^9~KLG_lUwa(~H|f1+Oo#O*SY!80bD+u(@H0yZkOz*kt`VF9GWw4RU.SK');
define('AUTH_SALT',        'cj~@_ZN_@X*%a>-qd!a+ !Vu(;v]^`#^Aa9o#$7Kil>|.#(enMV9g?s|R)2(B$Cx');
define('SECURE_AUTH_SALT', '|~||D=bvR?nH7|WI]CblnUtr!@X>e~|7]Pr@p7HiEOY8bF[fq&4ilHcZmkdzZ~7B');
define('LOGGED_IN_SALT',   'yFzj%g% D=.l_4TYp=gjK;vEbqDETzFS9]RIRKN-h-P>Snd+2-V-T(jAbd-]uY-?');
define('NONCE_SALT',       'sO[XvGHYn5Qc+]~-s!r&nI5F3/@&~u1&&2(9p[XF?3{*ET-+6_wBG$2-51u>ekvD');

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

if($phpEnv == 'production') {
  define('WP_DEBUG', false);
}
else {
  define('WP_DEBUG', true);
  define('WP_DEBUG_LOG', true);
  define('WP_DEBUG_DISPLAY', true);
  @ini_set('display_errors', 0);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
