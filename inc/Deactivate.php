<?php 
/**
 * @package Flour heart menu wp plugin deactivate
 */

class Deactivate 
{
    public static function deactivateMethod() {
        flush_rewrite_rules();
    }
}
