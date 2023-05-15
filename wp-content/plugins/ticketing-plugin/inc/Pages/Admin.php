<?php
/**
 * @package TicketingPlugin
 */

 namespace Inc\Pages;

 use \Inc\Api\SettingsApi;
 use \Inc\Base\BaseController;
 use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    

    //My Api for creating admin pages in seconds
    public function register(){
$this-> callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();
        $this->setPages();
        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')-> addSubPages($this->subpages) ->register();
    }

    public function setPages(){
        $this->pages = array(
            [
            'page_title' => 'Ticketing Plugin',
            'menu_title' => 'Create Tickets',
            'capability' => 'manage_options',
            'menu_slug' => 'tickets',
            'callback' => array($this->callbacks, 'adminDashboard'),
            'icon_url' => 'dashicons-plus-alt',
            'position' => 110
            ],
        );

    }

    public function setSubPages(){
        $this->subpages = array(
            array(
            'parent_slug' => 'tickets',
            'page_title' => 'Create Ticket',
            'menu_title' => 'Create',
            'capability' => 'manage_options',
            'menu_slug' => 'tickets_create',
            'callback' => array( $this->callbacks, 'adminCreate' )
            ),
            array(
                'parent_slug' => 'tickets',
                'page_title' => 'Update Ticket',
                'menu_title' => 'Update',
                'capability' => 'manage_options',
                'menu_slug' => 'tickets_update',
                'callback' => array( $this->callbacks, 'adminUpdate' ),
            ),
        );
    }
}
