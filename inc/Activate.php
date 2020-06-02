<?php 
/**
 * @package Flour heart menu wp plugin activate
 */
namespace Inc;

class Activate 
{
    public static function activateMethod() {
        flush_rewrite_rules();
    }
}
