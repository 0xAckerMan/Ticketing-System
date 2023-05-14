<?php
/**
 * @package TicketingPlugin
 */


class TicketingPluginDeactivate{
    public static function deactivate(){
        flush_rewrite_rules();
    }
}