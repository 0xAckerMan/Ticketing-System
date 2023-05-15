<?php
/**
 * @package TicketingPlugin
 */

 namespace Inc\Pages;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;

class Admin extends BaseController{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public function __construct(){
        $this->settings = new SettingsApi();

        $this->pages = array(
            [
            'page_title' => 'Ticketing Plugin',
            'menu_title' => 'Create Tickets',
            'capability' => 'manage_options',
            'menu_slug' => 'tickets',
            'callback' => function(){echo '<h1>Ticet plugin</h1>';},
            'icon_url' => 'dashicons-plus-alt',
            'position' => 110
            ],


        );

        $this->subpages = array(
            array(
            'parent_slug' => 'tickets',
            'page_title' => 'Create Ticket',
            'menu_title' => 'Create',
            'capability' => 'manage_options',
            'menu_slug' => 'tickets_create',
            'callback' => function(){echo '<h1>Create plugin</h1>';},
            ),
            array(
                'parent_slug' => 'tickets',
                'page_title' => 'Update Ticket',
                'menu_title' => 'Update',
                'capability' => 'manage_options',
                'menu_slug' => 'tickets_update',
                'callback' => function(){echo '<h1>Update plugin</h1>';},
            ),
        );
    }
    

    //My Api for creating admin pages in seconds
    public function register(){

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')-> addSubPages($this->subpages) ->register();
    }
}
