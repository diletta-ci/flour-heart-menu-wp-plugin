<?php 
/**
 * @package Flour heart menu wp plugin activate
 */
namespace Inc\Base;

class Activate 
{
    public static function activateMethod() {
        flush_rewrite_rules();
    }
}
