<?php

/**
 * @package TicketingPlugin
 */

/*
Plugin Name: Ticketing Plugin
Plugin URI: http://k0r3s.me
Description: This my weekend assessment plugin for ticket tracking system
Version: 1.0.0
Author: Joel Kores
Author URI: http://github.com/0xAckerMan
License: GPLv2 or Later
Text Domain: Ticketing Plugin
*/

//Security Check here and there
defined('ABSPATH') or die("Caught you hacker");

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists( 'Inc\\Init')){
    Inc\Init::register_sevices();
}