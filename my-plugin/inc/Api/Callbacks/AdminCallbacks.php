<?php
/**
 * @package  MyPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminGeneral()
    {
        return require_once "$this->plugin_path/templates/admin.php";
    }

    public function adminCpt()
    {
        return require_once "$this->plugin_path/templates/cpt.php";
    }

    public function adminTaxonomy()
    {
        return require_once "$this->plugin_path/templates/taxonomy.php";
    }

    public function adminWidget()
    {
        return require_once "$this->plugin_path/templates/widget.php";
    }

    public function exampleOptionsGroup($input)
    {
        return $input;
    }
    public function exampleAdminSection()
    {
        echo 'Hello from <code>AdminCallbacks->examplAdminSection</code>!';
    }
    public function exampleTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
    }

    public function exampleFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
    }
}
