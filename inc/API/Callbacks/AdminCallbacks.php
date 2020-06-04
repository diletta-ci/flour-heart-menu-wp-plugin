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
        echo 'Check this beautiful section!';
    }
    
    public function flourHeartTextExample() 
    {
        $value = esc_attr( get_option( 'text_example' ) );

        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something here!">';
    }
}
