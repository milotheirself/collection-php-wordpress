<?php
/**
 * @package  MyPlugin
 */
namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 *
 */
class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubPage('General')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Example Plugin',
                'menu_title' => 'Example Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => array($this->callbacks, 'adminGeneral'),
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ),
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            ),
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_taxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ),
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_widgets',
                'callback' => array($this->callbacks, 'adminWidget'),
            ),
        );
    }
}