<?php 
/**
 * @package Flour heart menu wp plugin Menu Settings Callbacks
 */
namespace Inc\API\Callbacks;

class MenuSettingsCallbacks
{
    /**
     * Check and store boolean value
     */
    public function menuSettings( $input ) 
    {
        return ( isset( $input ) ? true : false );
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
        $checkbox = get_option( $name );
        
		echo '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
	}
}
