<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the Prostyle Designer, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/admin
 * @author     Your Name <email@example.com>
 */
class Prostyle_Designer_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct() {

        if (defined('PROSTYLE_DESIGNER_VERSION')) {
            $this->version = PROSTYLE_DESIGNER_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'prostyle-designer';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/prostyle-designer-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/prostyle-designer-admin.js', array('jquery'), $this->version, false);
    }

    public function prostyle_admin_menu() {
        add_menu_page('Prostyle Designer v1.5.5', 'Designer', 'manage_options', 'prostyle-designer', 'admin_init');
    }

    public function prostyle_admin_init() {
        $endpoint = PROSTYLE_ROOT . '/admin/partials/prostyle-designer-admin-display.php';
        if (file_exists($endpoint)):
            include($endpoint);
            return;
        else:
            die('Error 404');
        endif;
    }

}
