<?php 
/**
 * @package Flour heart menu wp plugin Admin Callbacks
 */
namespace Inc\API\Callbacks;

class AdminCallbacks
{
    public function adminDashboard()
    {
        return require_once(PLUGIN_PATH . 'templates/index.php');
    }
    
    public function adminLunch()
    {
        return require_once(PLUGIN_PATH . 'templates/lunch.php');
    }

    public function adminDinner()
    {
        return require_once(PLUGIN_PATH . 'templates/dinner.php');
    }
}
