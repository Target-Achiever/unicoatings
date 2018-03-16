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
define('DB_NAME', 'unicoatings');

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
define('AUTH_KEY',         'C D/[w}9_,_vIon97>d8.-ptFk11l.G[,-hf;q;HDDk1>yjfT};>3..=Hy>iobW(');
define('SECURE_AUTH_KEY',  '?Pn<F+mhczl s@LNmN04zG%p({(fvlr[kRA*X;w}9):3v@}Nz#|+N,]5k_Y?Wmax');
define('LOGGED_IN_KEY',    'x Kn( Om_:0oZq%zohoa>tLseK=<o: 6`w:;NGcp,[=>wqQcRHa<GEuFW[x)lCo?');
define('NONCE_KEY',        '5^]qnc2C22_s+(P%KQ|y-XX=37f$H2et><2~y#n=Nmbo5?1R7Ig:5=UCaaZk+~HX');
define('AUTH_SALT',        'r^WI]!LfJNl.Clhmh#*<}!pY1K4SlTxI?L:AeA5H-3Y:PmyT=6c1N2[5BbWSvTk,');
define('SECURE_AUTH_SALT', 'e3jP_0+,uXsu-QMI4a $W0+**D7hF7e@1!bHH5EScWr*RMx6Niy:?qEa$iOo*z;V');
define('LOGGED_IN_SALT',   '#gktsZ/Ra-*o=N7lssQHj>35BbK8^ZpXa3~D2bv^h2:4IA8}WgZ| 2(.ScWaiNN$');
define('NONCE_SALT',       'YB v:h-&|- 0vF[A{7gMH@!N/?:--#Rwd9sw[|8d|K!M7O*P+@rEr!l+%JTJf1$9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'uc_';

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
