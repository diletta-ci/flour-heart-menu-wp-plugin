<?php 
/**
 * @package Flour heart menu wp plugin deactivate
 */
namespace Inc\Base;

class Deactivate 
{
    public static function deactivateMethod() {
        flush_rewrite_rules();
    }
}
