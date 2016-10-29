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
define('DB_NAME', 'voiz');

/** MySQL database username */
define('DB_USER', 'voiz');

/** MySQL database password */
define('DB_PASSWORD', 'voiz');

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
define('AUTH_KEY',         '7>pY4liI4]q;:mqNqQ55N;YD@.Z35DIaDlh#ZNc&dC[tkkD6m{6+pe@|Un_aTT!U');
define('SECURE_AUTH_KEY',  'WDXI4^&$6Vg9+Ep}dr`ts Sp%vI_*HG#{n;+.:lcea<tlGy(`E8Utpuvc1e](Gj6');
define('LOGGED_IN_KEY',    'y*%7&vb!5A,Lv5gI,dUqu|a9t711^-O?M1nx2{<hj>Jh.Jm.Pe)C`(ZpZy2rM oZ');
define('NONCE_KEY',        '_)2xZ^Wz9_!;T]`F!E6XadwJyJeiw>)=G,!@K ,oGLyxh0sZ8tKEZN~A.(|):C0.');
define('AUTH_SALT',        '5ku^0u$=;G/aK J8Wt!C>Z}`@j[H(cHp`Dk;6elIc7Yipk;{>yqj<&?_omGE)rUG');
define('SECURE_AUTH_SALT', 'z?c!{Ox.`$F!p?/m#>X:#-6&CdrF`=&!2g!$baBAuRxk=3Di6Zq]fB0~/XJ]G&r@');
define('LOGGED_IN_SALT',   'O)0H=r %!1QHG/k<E*qbG4FH{H_)6K_JQv^735!OvHZmaBta@}?q%9Ci|+?)g!Xm');
define('NONCE_SALT',       'pB$yOn=eq?z!Pa%$pABz?l!SI4aZK@e*f=o>F(Ca4b]Lfy5g` 88`H0R7,TC6S3z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'voiz_';

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
