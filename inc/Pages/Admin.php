<?php 
/**
 * @package Flour heart menu wp plugin Admin Page
 */
namespace Inc\Pages;

use \Inc\API\SettingsAPI;
use \Inc\API\Callbacks\AdminCallbacks;

class Admin
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $sub_pages = array();

    public function register() 
    {
        $this->settings = new SettingsAPI();
        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        $this->setSubPages();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->sub_pages )->register();
    }

    public function setPages() 
    {
        $this->pages = array(
            array(
                'page_title' => 'Flour Heart Menu Plugin',
                'menu_title' => 'Flour Heart Menu',
                'capability' => 'manage_options',
                'menu_slug' => 'flour_heart_menu_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-carrot',
                'position' => 110
            )
        );
    }
    
    public function setSubPages() 
    {
        $this->sub_pages = array(
            array(
                'parent_slug' => 'flour_heart_menu_plugin',
                'page_title' => 'Lunch menu',
                'menu_title' => 'Lunch',
                'capability' => 'manage_options',
                'menu_slug' => 'flour_heart_menu_lunch',
                'callback' => array( $this->callbacks, 'adminLunch' ),
            ),
            array(
                'parent_slug' => 'flour_heart_menu_plugin',
                'page_title' => 'Dinner menu',
                'menu_title' => 'Dinner',
                'capability' => 'manage_options',
                'menu_slug' => 'flour_heart_menu_dinner',
                'callback' => array( $this->callbacks, 'adminDinner' ),
            )
        );
    }
}
