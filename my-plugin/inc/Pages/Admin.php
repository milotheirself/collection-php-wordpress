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

        $this->setSettings();
        $this->setSections();
        $this->setFileds();

        $this->settings->addPages($this->pages)->withSubPage('General')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Example Plugin',
                'menu_title' => 'Example Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'example_plugin',
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
                'parent_slug' => 'example_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'example_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            ),
            array(
                'parent_slug' => 'example_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'example_taxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ),
            array(
                'parent_slug' => 'example_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'example_widgets',
                'callback' => array($this->callbacks, 'adminWidget'),
            ),
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'example_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'exampleOptionsGroup'),
            ),
            array(
                'option_group' => 'example_options_group',
                'option_name' => 'first_name',
            ),
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'example_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'exampleAdminSection'),
                'page' => 'example_plugin',
            ),
        );

        $this->settings->setSections($args);
    }

    public function setFileds()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'exampleTextExample'),
                'page' => 'example_plugin',
                'section' => 'example_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class',
                ),
            ),
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'exampleFirstName'),
                'page' => 'example_plugin',
                'section' => 'example_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class',
                ),
            ),
        );

        $this->settings->setFileds($args);
    }

}
