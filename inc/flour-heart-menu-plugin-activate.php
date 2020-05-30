<?php 
/**
 * @package Flour heart menu wp plugin activate
 */

class FlourHeartMenuPluginActivate 
{
    public static function activate() {
        flush_rewrite_rules();
    }
}
