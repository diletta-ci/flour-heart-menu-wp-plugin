<?php 
/**
 * @package Flour heart menu wp plugin
 */
/*
Plugin Name: Flour Heart Menu
Plugin URI: https://github.com/giodi-ci/flour-heart-menu-wp-plugin
Description: Basic plugin to add a menu for restaurant website.
Version: 1.0.0
Author: Giodi CI - Diletta Calá Impirotta
Author URI: https://github.com/giodi-ci
License: GPLv2 or later
Text Domain: flour-heat-menu-wp-plugin  
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( !class_exists('FlourHeartMenuPlugin') ) {

    class FlourHeartMenuPlugin
    {    
        function register() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ));
        }

        function create_post_type() {
            add_action( 'init', array( $this, 'custom_post_type') );
        }      
    
        function custom_post_type() {
            register_post_type( 'menu', ['public' => true, 'label' => 'Menu'] );
        }
    
        function enqueue() {
            wp_enqueue_style( 'flourHeartMenuStyle', plugins_url( '/assets/style.css', __FILE__ ) );
            wp_enqueue_script( 'flourHeartMenuScript', plugins_url( '/assets/script.js', __FILE__ ) );
        }

        function activate() {
            require_once plugin_dir_path( __FILE__ ) . 'inc/flour-heart-menu-plugin-activate.php';
            FlourHeartMenuPluginActivate::activate();
        }
    }
    
    $flourHeartMenuPlugin = new FlourHeartMenuPlugin();
    $flourHeartMenuPlugin->register();
    $flourHeartMenuPlugin->create_post_type();
    
    // activation
    register_activation_hook( __FILE__, array( $flourHeartMenuPlugin, 'activate' ) );
    
    // deactivation
    require_once plugin_dir_path( __FILE__ ) . 'inc/flour-heart-menu-plugin-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'FlourHeartMenuPluginDeactivate', 'deactivate' ) );
}
