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

class TicketingPlugin{

    public static function register(){
        add_action('admin_enqueue_scripts', array( 'TicketingPlugin', 'enqueue'));
    }


    static function enqueue(){
        // Enqueue all my scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css',__FILE__));
        wp_enqueue_script('mypluginstyle', plugins_url('/assests/myscript.js',__FILE__));
    }

    function custom_post_type(){
        register_post_type('ticket', ['public' => true, 'label' => 'AddTicket']);
    }

}

if (class_exists('TicketingPlugin')){
    TicketingPlugin::register();
}


//activation
require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-activate.php';
register_activation_hook(__FILE__, ['TicketingPluginActivate', 'activate']);

//deactivation
require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-deactivate.php';
register_deactivation_hook(__file__,['TicketingPluginDeactivate', 'deactivate']);
