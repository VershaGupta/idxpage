<?php
# Database Configuration
define( 'DB_NAME', 'wp_lriodev' );
define( 'DB_USER', 'lriodev' );
define( 'DB_PASSWORD', '_hqh8hhzBHHhGqNcF0Bd' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'vurLCi>#?,p07h4/tm`krbr`ZV=*al!/5YNR/n9K4n-LYZ/J2>|}`tlyWg$|3PSm');
define('SECURE_AUTH_KEY',  '8Cq|zMRxiez3 K*7`RW!2q$Qpt>L5L/LFW.rmcm^DWo2Kkbm+g_b8gVDL+kdFsnm');
define('LOGGED_IN_KEY',    'Dzn4PEy55nH^SZ}+th_*T.|TuJ|,M~}8H6B}{W[o,d&ON].F)}@x*)]+P)DD^@Q8');
define('NONCE_KEY',        'iJO-&zU=920V_41;vmQD{KDh7wQB!)6~+YjTXN%s9knOh2h_W#TqWak_$A&6)_U,');
define('AUTH_SALT',        '>m;m$4ZB9+w^WGpV-0bi4Wi|rC-|J-;U*h-<LGEX=9[HD(3Ifwfv@%ub8XD7J#+o');
define('SECURE_AUTH_SALT', 'w>%&f$u W;rxKMPTJzl-Uq1-rW1aMZmwlin%;1[?_E+)41Y)<n2p4uS5T?ZN;I-L');
define('LOGGED_IN_SALT',   '/L=!Q7gK&+ts7FF*v$i+GYhPDiy8;.<%!W:qHa++ME.lVB.ON5Fy|=J]FC5Q3v|!');
define('NONCE_SALT',       'Ths#G+huVdO*t#is?rm!>d}q/Y2Q.E8IV6b^<[HE7I}PNg4|/c1PAYbUW!i<;k N');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'lriodev' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'eb8db3423a9df3260fae601223731a90d4c8e35e' );

define( 'WPE_CLUSTER_ID', '100692' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'lriodev.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100692', );

$wpe_special_ips=array ( 0 => '104.155.175.210', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');














