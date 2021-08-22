<?php
/**
 * Plugin Name: فلت سام فارسی
 * Plugin URI: https://www.rtl-theme.com/user-profile/smsco/
 * Description: فارسی ساز قالب فلت سام
 * Version: 1.0
 * Author: محمدرضا احمدزاده
 * Author URI: https://www.rtl-theme.com/user-profile/smsco/
 * Text Domain: flatsome-admin
 * License: GPL2
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'FLATSOMEFA_URL' ) ) {
	define( 'FLATSOMEFA_URL', plugins_url( '', __FILE__ ) . '/' );
}

define( 'FLATSOMEFA', plugin_dir_path(__FILE__));


require_once(FLATSOMEFA.'includes/admin-bar.php');


require_once(FLATSOMEFA.'includes/functions.php');


require_once(FLATSOMEFA.'includes/class-translate.php');


	



