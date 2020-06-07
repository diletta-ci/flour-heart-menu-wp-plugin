<?php 
/**
 * @package Flour heart menu wp plugin Menu Settings Callbacks
 */
namespace Inc\API\Callbacks;

class MenuSettingsCallbacks
{
    public $menu_settings = array();

    /**
     * Check and store boolean value
     */
    public function menuSettings( $input ) 
    {
        $this->menu_settings = array(
            'breakfast' => 'Activate Breakfast Menu',
            'lunch' => 'Activate Lunch Menu',
            'dinner' => 'Activate Dinner Menu'
        );

        $output = array();

        foreach ( $this->menu_settings as $key => $value) {
            $output[$key] = ( isset( $input[$key] ) ? true : false );
        }

        return $output;
    }

    /**
     * Echo subtitle of the section
     */
    public function flourHeartAdminSection() 
    {
        echo 'Manage the Menu and Features of this Plugin activation list.';
    }

    /**
     * Echo input checkbox based on args 
     */
    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name );

        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
        
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';	
	}
}
