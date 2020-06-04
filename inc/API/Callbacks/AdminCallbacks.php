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

    public function flourHeartOptionGroup( $input ) 
    {
        return $input;
    }

    public function flourHeartAdminSection() 
    {
        echo 'My menu basic settings';
    }
    
    public function flourHeartMenuName() 
    {
        $value = esc_attr( get_option( 'menu_name' ) );

        echo '<input type="text" class="regular-text" name="menu_name" value="' . $value . '" placeholder="Special Christmas">';
    }
    
    public function flourHeartMenuType()
    {
        $value = esc_attr( get_option( 'menu_type' ) );

        echo '<input type="text" class="regular-text" name="menu_type" value="' . $value . '" placeholder="Vegetarian and vegan">';

    }
}
