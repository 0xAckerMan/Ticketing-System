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

    function __construct(){
        add_action('init', [$this, 'custom_post_type']);
    }

    function activate(){
        // Generate a cpt
        $this -> custom_post_type();
        //flush the rewrite rules
        flush_rewrite_rules();

    }

    function deactivate(){
        //flush the rewrite rule

    }

    function uninstall (){
        //delete CPt
        // Delete the whole plugin

    }

    function custom_post_type(){
        register_post_type('ticket', ['public' => true, 'label' => 'AddTicket']);
    }

}

$ticketingPlugin = new TicketingPlugin;


//activation
register_activation_hook(__FILE__, [$ticketingPlugin, 'activate']);

//deactivation
register_deactivation_hook(__file__,[$ticketingPlugin, 'deactivate']);

//uninstall