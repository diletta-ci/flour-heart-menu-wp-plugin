<?php 
/**
 * @package Flour heart menu wp plugin Enqueue
 */
namespace Inc\Base;

class Enqueue
{
    public function register() 
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ));
    }

    function enqueue() 
    {
        wp_enqueue_style( 'flourHeartMenuStyle', PLUGIN_URL . 'assets/style.css' );
        wp_enqueue_script( 'flourHeartMenuScript', PLUGIN_URL . 'assets/script.js' );
    }
}
