<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'netreforme');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '200001');

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
define('AUTH_KEY',         'k~clZc-6B9^cR8Q0n@ZGg(FaQl-FPVL`MK|S8V_.`u;#hN?Z4Ga~VRq-Rhet3t(R');
define('SECURE_AUTH_KEY',  'zO] GE0xE_s)O+(p;%<z5,&m9cMFnVbHq(T{cX<oxx!!K.Zx-F~,K]fGaPw+1+Y[');
define('LOGGED_IN_KEY',    '$Djbk(c<-,&tYK|8M5UCbh_!$jB9.pf~}Y;DdZ:,u%f~Iop|n9Rw,L]dnXczeiq;');
define('NONCE_KEY',        'Yds5ICcg`crxUV}B,#~s$PPY&h?by1L+<3r|:r@a+wX+HB=gxlNpBslh`2H*,D~(');
define('AUTH_SALT',        '`vud/Y;YmkubUD+@0rousgBB:,H7H`iI_*?/>,[0tpdD.#<tk]rT7r/gL>GJtD=D');
define('SECURE_AUTH_SALT', 'vuYO5d%8[4|PbRYs5qU}z96Qp%K!9em*w2pTf9{`B3$f2MXd3sOx@i.W9TH#LYB3');
define('LOGGED_IN_SALT',   '(`U,{*25je9j?j7M*a.Gd6h/EWx|ttb+pg)E{?-CEN-^JQA:.%VpMpk|wB|vgjZj');
define('NONCE_SALT',       'N;T,=95X/&{OD|!N@QgZ(@.7s- U!IN+(VUE3;E,iIHFfYk^/#@/?B(X,1x/`=9!');
define('WP_POST_REVISIONS', 0);
define('EMPTY_TRASH_DAYS', 0);
define('MY_HOME','http://netreforme.org');
define('BLOG_NAME','Нет реформе образования! Мы против Закона 83-ФЗ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
 
?>
