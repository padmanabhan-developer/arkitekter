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
define('DB_NAME', 'ldsstnns_arkitekt');

/** MySQL database username */
define('DB_USER', 'ldsstnns_arkitek');

/** MySQL database password */
define('DB_PASSWORD', 'Arkitekt@123');

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
define('AUTH_KEY',         'rhLS(#sH=,`czo.6= LPWUB!=i:]R;,<A2/MsLr$C<W$pTH9E}Zw4mGYM5:_0W<s');
define('SECURE_AUTH_KEY',  '&YZ&?po&sxoiS*Su#>9{%WDdL)uQ/-zX&=;n}Xt:2!PvrUX9P9*5W2DzCjkRB4oT');
define('LOGGED_IN_KEY',    ';7&KTRkON:uJW6@4xu^!rNswzReDGdqK1d18qT#/-IBD%{yQ@LL 8^t@w*+]2|nS');
define('NONCE_KEY',        'Xze_eR8Cu;Wg>KX[>H923]wj{HdSof>s|@boBo3fIfD0f9V_)%1P=fHPV6eksDt0');
define('AUTH_SALT',        'I2rKkC_qFpAO/4Slr r>CnClAM6%=63Ho~zYf6,7B/(%>#cFA.m5%$#[QvnT$Y>4');
define('SECURE_AUTH_SALT', '?pKLBtFDf&rXWv,Kh_S_gVv72;e5zgAQnkkNcjI4&>;cAlmR<^up&1o87%avV>-#');
define('LOGGED_IN_SALT',   'y9)fDI5p)8X$NBHmBT?B5i4st[K(&(C6nZSLh`bkPHMCeshBu0WG` f>~zpJV:Y*');
define('NONCE_SALT',       'f`mg8cx0RV*~A)u(B;4Huln9~Q&qfLMn;8n&<k9F!GtQ<:YzuC>ZRDvgv]_S:IG*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'arkt_';

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
