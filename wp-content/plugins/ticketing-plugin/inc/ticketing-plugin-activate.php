<?php
/**
 * @package TicketingPlugin
 */


class TicketingPluginActivate{
    public static function activate(){
        flush_rewrite_rules();
    }
}