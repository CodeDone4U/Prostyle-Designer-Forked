<?php

/**
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/public
 */

/**
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/public
 * @author     Shaun Cheeseman <info@smtoken.tech>
 */
class Prostyle_Designer_Public {

    /**
     * @since    1.0.0
     * @access   private
     * @var      string    $prostyle_designer    The ID of this plugin.
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
     * @param      string    $prostyle_designer       The name of the plugin.
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
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Prostyle_Designer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Prostyle_Designer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/prostyle-designer-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Prostyle_Designer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Prostyle_Designer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/prostyle-designer-public.js', array('jquery'), $this->version, false);
    }

    /**
     * Integrate the designer application.
     *
     * @since    1.0.0
     */
    public function launch_app() {

        $endpoint = PROSTYLE_APP_LAUNCHER;
        if (file_exists($endpoint)):
            ob_start();
            include($endpoint);
            return ob_get_clean();
        else:
            die('Error 404');
        endif;
    }
    
    /**
     * Get the required templates.
     *
     * @since    1.0.0
     */
    public function get_templates() {

        $endpoint = PROSTYLE_TEMPLATES;
        if (file_exists($endpoint)):
            include($endpoint);
        else:
            die('Error 404');
        endif;
    }

}
