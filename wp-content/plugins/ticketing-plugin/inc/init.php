<?php
/**
 * @package TicketingPlugin
 */

 namespace Inc;

class init{
    function __construct(){

    }
}



// use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Admin\AdminPages;

// if (! class_exists('TicketingPlugin')){
//     class TicketingPlugin{
//         public $plugname;  

//         function __construct(){
//             $this->plugname = plugin_basename(__FILE__);
//         }

//         function register(){
//             add_action('admin_enqueue_scripts', array( 'TicketingPlugin', 'enqueue'));
//             add_action('admin_menu', [$this,'add_admin_pages']);
//             add_filter('plugin_action_links', array($this,'settings_link'));
        
//         }

//         public function settings_link($links){
//             //add custom setting links
//             $settings_link = '<a href="#">settingd</a>';
//             array_push($links, $settings_link);
//             return $links;
//         }

//         public function add_admin_pages(){
//             add_menu_page('Ticketing Plugin', 'Create Tickets', 'manage_options', 'tickets', [$this, 'admin_index'], 'dashicons-store', 110);
//         }

//         public function admin_index(){
//             //require template
//             require_once plugin_dir_path(__FILE__).'templates/index.php';
//         }

//         static function enqueue(){
//             // Enqueue all my scripts
//             wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css',__FILE__));
//             wp_enqueue_script('mypluginstyle', plugins_url('/assests/myscript.js',__FILE__));
//         }

//         function custom_post_type(){
//             register_post_type('ticket', ['public' => true, 'label' => 'AddTicket']);
//         }

//         static function activate(){
//             // require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-activate.php';
//             Activate::activate();
//         }
//     }

//     $ticketingPlugin = new TicketingPlugin();
//     $ticketingPlugin->register();


//     //activation
//     register_activation_hook(__FILE__, 'activate');

//     //deactivation
//     // require_once plugin_dir_path(__FILE__).'inc/ticketing-plugin-deactivate.php';
//     register_deactivation_hook(__file__,['Deactivate', 'deactivate']);
// }