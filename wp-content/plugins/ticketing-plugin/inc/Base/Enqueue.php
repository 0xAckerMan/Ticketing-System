<?php
/**
 * @package TicketingPlugin
 */

 namespace Inc\Base;

class Enqueue{
    
    public function register(){
        add_action('admin_enqueue_scripts', array( $this, 'enqueue'));
    }
    static function enqueue(){
        // Enqueue all my scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL.'assests/mystyle.css');
        wp_enqueue_script('mypluginstyle', PLUGIN_URL.'assests/myscript.js');
    }}