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

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if (! class_exists('TicketingPlugin')){
    class TicketingPlugin{
        public $plugname;  

        function __construct(){
            $this->plugname = plugin_basename(__FILE__);
        }

        function register(){
            add_action('admin_enqueue_scripts', array( 'TicketingPlugin', 'enqueue'));
            add_action('admin_menu', [$this,'add_admin_pages']);
            add_filter('plugin_action_links', array($this,'settings_link'));
        
        }

        public function settings_link($links){
            //add custom setting links
            $settings_link = '<a href="#">settingd</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages(){
            add_menu_page('Ticketing Plugin', 'Create Tickets', 'manage_options', 'tickets', [$this, 'admin_index'], 'dashicons-store', 110);
        }

        public function admin_index(){
            //require template
            require_once plugin_dir_path(__FILE__).'templates/index.php';
        }

        static function enqueue(){
            // Enqueue all my scripts
            wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css',__FILE__));
            wp_enqueue_script('mypluginstyle', plugins_url('/assests/myscript.js',__FILE__));
        }

        function custom_post_type(){
            register_post_type('ticket', ['public' => true, 'label' => 'AddTicket']);
        }

        function activate(){
            // require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-activate.php';
            Activate::activate();
        }
    }

    $ticketingPlugin = new TicketingPlugin();
    $ticketingPlugin->register();


    //activation
    register_activation_hook(__FILE__, ['TicketingPluginActivate', 'activate']);

    //deactivation
    // require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-deactivate.php';
    register_deactivation_hook(__file__,['Deactivate', 'deactivate']);
}