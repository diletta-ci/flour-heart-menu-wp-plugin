<?php 
/**
 * @package Flour heart menu wp plugin - main file
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

/**
 * If this file is called directly, abort!!! 
 */ 
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

/**
 * Require once the Composer Autoload
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Define CONSTANTS
 */
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_NAME', plugin_basename( __FILE__ ) );

/**
 * Run on plugin activation
 */
function activate_flour_heart_plugin() 
{
    Inc\Base\Activate::activateMethod();
}
register_activation_hook( __FILE__, 'activate_flour_heart_plugin' );

/**
 * Run on plugin deactivation
 */
function deactivate_flour_heart_plugin() 
{
    Inc\Base\Deactivate::deactivateMethod();
}
register_deactivation_hook( __FILE__, 'deactivate_flour_heart_plugin' );

/**
 * Initialize the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}
