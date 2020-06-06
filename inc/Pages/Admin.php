<?php 
/**
 * @package Flour heart menu wp plugin Admin Page
 */
namespace Inc\Pages;

use \Inc\API\SettingsAPI;
use \Inc\API\Callbacks\AdminCallbacks;
use \Inc\API\Callbacks\MenuSettingsCallbacks;

class Admin
{
    public $settings;
    public $callbacks;
    public $menu_settings_callbacks;
    public $pages = array();
    public $sub_pages = array();
    public $menu_settings = array();
    
    public function register() 
    {
        $this->settings = new SettingsAPI();
        $this->callbacks = new AdminCallbacks();
        $this->menu_settings_callbacks = new MenuSettingsCallbacks();

        /**
         * Define checkboxes of the menu settings
         */
        $this->menu_settings = array(
            'breakfast' => 'Activate Breakfast Menu',
            'lunch' => 'Activate Lunch Menu',
            'dinner' => 'Activate Dinner Menu'
        );

        $this->setPages();
        $this->setSubPages();
        
        $this->setSettings();
        $this->setSections();
        $this->setFields();

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

    /**
     * Implement form group of the menu setting checkboxes 
     * based on menu_settings array()
     */
    public function setSettings()
    {
        $args = array();

        foreach ($this->menu_settings as $key => $value) {
            $args[] = array(
                'option_group' => 'flour_heart_settings',
                'option_name' => $key,
                'callback' => array( $this->menu_settings_callbacks, 'menuSettings' )
            );
        }

        $this->settings->setSettings( $args );
    }
    
    public function setSections()
    {
        $args = array(
            array(
                'id' => 'flour_heart_admin_index',
                'title' => 'Settings Manager',
                'callback' => array( $this->menu_settings_callbacks, 'flourHeartAdminSection' ),
                'page' => 'flour_heart_menu_plugin'
            )
        );

        $this->settings->setSections( $args );
    }
    
    /**
     * Set all the fields on the form menu setting
     * based on menu_settings array()
     */
    public function setFields()
    {
        $args = array();

        foreach ( $this->menu_settings as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->menu_settings_callbacks, 'checkboxField' ),
                'page' => 'flour_heart_menu_plugin',
                'section' => 'flour_heart_admin_index',
                'args' => array(
                    'label_for' => $key,
                    'class' => "menu-$key"
                )
            );
        }

        $this->settings->setFields( $args );
    }
}
