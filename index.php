<?php
/*
Plugin Name: PWP-Lytebox
Plugin URI: http://p-api-shop.ru
Description: 
Version: 1.0.4
Author: Polkan
Author URI: http://p-api-shop.ru
License: GPL2
*/

// don't call file directly
if ( !defined( 'ABSPATH' ) ) 
    exit;

require_once( dirname( __FILE__ ) . '/main.php' );

$pwplytebox = new PWP_Lytebox;
