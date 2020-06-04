<?php 
/**
 * @package Flour heart menu wp plugin Settings API
 */
namespace Inc\API;

class SettingsAPI
{
    /*
     * Declare the admin and sub pages array
     */
    public $admin_pages = array();
    public $admin_sub_pages = array();

    /**
     * Check admin_pages length and call method to add admin menu
     */
    public function register() 
    {
        if ( ! empty($this->admin_pages) ) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
        }
    }

    /**
     * Store all admin pages
     * @return the same instance of the class
     */
    public function addPages(array $pages) 
    {
        $this->admin_pages = $pages;

        return $this;
    }

    /**
     * Define the sub page
     */
    public function withSubPage( string $title = null ) {
        if ( empty($this->admin_pages ) ) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $sub_page = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            )
        );

        $this->admin_sub_pages = $sub_page;

        return $this;
    }

    public function addSubPages( array $pages)
    {
        $this->admin_sub_pages = array_merge( $this->admin_sub_pages, $pages );

        return $this;
    }

    /**
     * Loop through all the pages and sub-pages 
     * and activate them 
     */
    public function addAdminMenu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );  
        }
        
        foreach ($this->admin_sub_pages as $page) {
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );  
        }
    }
}