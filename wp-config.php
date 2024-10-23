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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'DB_NAME' );

/** MySQL database username */
define( 'DB_USER', 'DB_USER' );

/** MySQL database password */
define( 'DB_PASSWORD', 'DB_PASSWORD' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISABLE_WP_CRON', true);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jXVGyyz8)^,G*=y?#t?vNg2pCN2Fim(?glZg.#U(KKH:^V|nM(&<`iXxHP#,h=<E' );
define( 'SECURE_AUTH_KEY',  'op{``er]9Vfh{;sbRH6<Y@s&#0Dv Q7WI;=G+Et*!f&&;,mFZaqx-zQi)8yq)+h{' );
define( 'LOGGED_IN_KEY',    '/)xU)G(Y^sl=[8{h`.%k[o]NqI6EIRk YW|[P38nNR?SZ3uUA6VEhBV`P*Fgm fn' );
define( 'NONCE_KEY',        'R=XdQD-FyFwkN$ 978[kY{dw2&M_>G>I-ml6w;.=Bi<;#?*~VqCK.uWel:i,k:-A' );
define( 'AUTH_SALT',        'Zw5Oz}pzFG?Q~AXr)SUkzi@!I7r2>5&:/^B^OKO.nn1%h7_[D6aj=k-{jy|f`cFx' );
define( 'SECURE_AUTH_SALT', '@WX%N0>)v`W`8t/`l/#d<?d}#BQHwwlI-0%#p<koXSOxGxTWW5[4|QC0a6q,0/$,' );
define( 'LOGGED_IN_SALT',   '>.>*/:#b5&#V(Rz1x;[1~-V?`NjFQ?C|xf(-T&B1WFbi&,8&82WHu)*:;3f/rfx]' );
define( 'NONCE_SALT',       '|L~H$;j#q*+WK|(#:9ur]jXgv2?l)?wL8mI$0rQZQXt[LpiBadz-8J~UG,wR=]3]' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* That's all, stop editing! Happy blogging. */

/** This will disable all automatic WordPress updates */
define( 'WP_AUTO_UPDATE_CORE', false );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';