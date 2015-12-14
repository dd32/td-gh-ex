<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'objectc_indieave');

/** MySQL database username */
define('DB_USER', 'objectc_bruce');

/** MySQL database password */
define('DB_PASSWORD', 'Drypark09');

/** MySQL hostname */
define('DB_HOST', 'mysql402.ixwebhosting.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        '1&:@S<,& VQx--.O+Q{*udq9yNVCZ1p!>B_Mdo-Gg/4f+7FwCG2nt?JgTdP|{!g7');
define('SECURE_AUTH_KEY', '`Z)6FjT*:s(Q.L)0e=H0#(1G<Y2h4!+0ccq.=|}Sc8D!^<hQJL^L!y.qnKE=b8#|');
define('LOGGED_IN_KEY',   '7<*8`0%J[x9;$6f|rV ~i-1vgxD-4p6sLP3Sh/&0mKF iO]l&`k9:;172.-;L-&Z');
define('NONCE_KEY',       'u)O&]/cRxefCM,sB0Tx=Q%H@+9Il-,$Dgn4jsZUi-8RSwQ+5Je&g(6F{tj4G{xQa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
