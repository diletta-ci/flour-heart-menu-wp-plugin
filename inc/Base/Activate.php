<?php 
/**
 * @package Flour heart menu wp plugin activate
 */
namespace Inc\Base;

class Activate 
{
    public static function activateMethod() {
        flush_rewrite_rules();

        if ( get_option( 'flour_heart_menu_plugin' ) ) {
            return;
        }

        $default = array();

        update_option( 'flour_heart_menu_plugin', $default );
    }
}
