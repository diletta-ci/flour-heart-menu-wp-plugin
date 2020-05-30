<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package Flour heart menu wp plugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Clear Database stored data - Method 1
// $menus = get_posts( array( 'post_type' => 'menu', 'numberposts' => -1 ) );

// foreach ($menus as $menu) {
//     wp_delete_post( $menu->ID, true );
// }

// Access the database via SQL - Method 2 
global $wpdb;

$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'menu'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT if FROM wp_posts" );
$wpdb->query( "DELETE FROM wp_term_relantionships WHERE object_id NOT IN (SELECT if FROM wp_posts" );