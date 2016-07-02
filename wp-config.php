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
define('DB_NAME', 'csharp_timelog');

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
define('AUTH_KEY',         'k>{k5>wv~k{FR_U&i]x&4v_|K1{,]xZHF%AM{E1NSY*u+ISVzbQ)P@oU9~1fz(w3');
define('SECURE_AUTH_KEY',  'U9|T`91DvZP@cATBCuwO:1)qjG1`3Q+/{&D9yzyqh]ih4rclYCW NgbKH+7- |M5');
define('LOGGED_IN_KEY',    'J_8z~</[4:>!4u5.i;B~Ryhb-:9ZOO2O6:0X;$;+O<sppgHe2_VE:WOgJVEF9lw=');
define('NONCE_KEY',        'N8<JA`bY6b,PKD+I$85ooXV}2mI&O2yb,gzQIOpA O/zXB~yg834=Y@lo#}qX(X^');
define('AUTH_SALT',        'wGk~zD$%(8MfLL1UqTz/ko_lco:QcnS)C!?5G`MsN[*U}{YoDA)x[_bLQ)?~Dw<o');
define('SECURE_AUTH_SALT', 'KugL>5!;Rz%XJI@?C^i>xZje On%sNbsH8I`bl{6T%_-qAEC_0Uk 8wy[-N),(eH');
define('LOGGED_IN_SALT',   '<k[cewD1X[n3eSfd_e~v*>Wie*ri}PO{VeK9q[]r(eQ]21N/R2y(jO)h[&qRGPg!');
define('NONCE_SALT',       '(i*LL^CsT._=38KX$9xx1C>zmZoTkWjQRFn7F$HHWK|v 6>_=ZZ@%g!})+deaT=G');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php'); 