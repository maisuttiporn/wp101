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
define('DB_NAME', 'devmaime');

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
define('AUTH_KEY',         '{#>KzWft {`Qe=W)cV),SH<}^4,!5$R:Odre%a#Q=7>u[mwdtfC}J@7KpNmW.%^?');
define('SECURE_AUTH_KEY',  '>nPo/7K(c)&<@WPT9sx5|DrwWc_BAAI4O4]!Jh)cnnsjzn-RP(cD0aOzZB&3h3zc');
define('LOGGED_IN_KEY',    '-<O}u?8^=[C4Kmz+Jt3tua)&9o^XJ=;P`A/fJ]q( 0klxH<ocNRT<HR7C/ft+i[(');
define('NONCE_KEY',        'IgVFg-[(uXB:uQ4G_~r%`Q+~bn~%y`]XsuF`ev/Xy^3lL4cQR TO4czs/Y)cI~Ri');
define('AUTH_SALT',        'n`Z6+r0BfK58_1qm,Xdr+in!8&/0.Vu @j4E8%:kQT:m8wkc(#McgMb&}4`{N->R');
define('SECURE_AUTH_SALT', '2^j]W^[x1#`f%5dm#sd2^(8Lo7WS4fw@m<2BmNp8)>uowZR2/,x~@4YYC~ai%n0M');
define('LOGGED_IN_SALT',   '{IKe-K%C,m^t2?]HzlTzin-5@*2g2;Vsh~lb<g9]Mv_I,Tbx0v@9{YXp^dg%x=h}');
define('NONCE_SALT',       '`Rb4_#=MZ2tm|}nfgG$5dYE?e]}GSzRjn}p]-)QiPSPFE}yJ[CrcKjQ(z(,OA}gV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpdevmai_';

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


