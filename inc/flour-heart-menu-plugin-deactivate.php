<?php 
/**
 * @package Flour heart menu wp plugin deactivate
 */

class FlourHeartMenuPluginDeactivate 
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}
