<?php

/**
 * @link              https://www.llaveros.shop
 * @since             1.0.0
 * @package           Prostyle_Designer
 *
 * @wordpress-plugin
 * Plugin Name:       Prostyle Designer
 * Plugin URI:        http://smtoken.tech/prostyle/
 * Description:       Allow users to create and customise products in your shop. The Woocomerce plugin is required.
 * Version:           1.5.1
 * Author:            Shaun Cheeseman
 * Author URI:        https://smtoken.tech/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */
if (!defined('WPINC')) {
    die;
}

define('PROSTYLE_DESIGNER_VERSION', '1.0.0');

define('PROSTYLE_ROOT', plugin_dir_path(__FILE__));

define('PROSTYLE_CLASSES', PROSTYLE_ROOT . 'includes/');

define('PROSTYLE_DESIGNS', PROSTYLE_ROOT . 'media/');

define('PROSTYLE_PLUGIN', '/wp-content/plugins/prostyle-designer/');

define('PROSTYLE_MEDIA', get_site_url() . PROSTYLE_PLUGIN . 'media/');

define('PROSTYLE_APP', get_site_url() . PROSTYLE_PLUGIN . 'public/partials/prostyle-designer-public-display.php');

define('PROSTYLE_APP_LAUNCHER', PROSTYLE_ROOT . 'public/partials/prostyle-designer-app.php');

define('PROSTYLE_TEMPLATES', PROSTYLE_ROOT . 'public/db.php');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_prostyle_designer() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-prostyle-designer-activator.php';
    Prostyle_Designer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_prostyle_designer() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-prostyle-designer-deactivator.php';
    Prostyle_Designer_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_prostyle_designer');
register_deactivation_hook(__FILE__, 'deactivate_prostyle_designer');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-prostyle-designer.php';

/**
 * The api endpoint.
 *
 * @since     1.0.0
 * @return    Prostyle_Designer_Api.
 */
function api() {
    $plugin = new Prostyle_Designer();
    return $plugin->api();
}

/**
 * The app endpoint.
 *
 * @since     1.0.0
 * @return    Prostyle_Designer_Pubic.
 */
function app() {
    $public = new Prostyle_Designer_Public();
    return $public->launch_app();
}

/**
 * The admin start page.
 *
 * @since     1.0.0
 * @return    Prostyle_Designer_Admin.
 */
function admin_init() {
    $admin = new Prostyle_Designer_Admin();
    $admin->prostyle_admin_init();
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_prostyle_designer() {

    $plugin = new Prostyle_Designer();
    $plugin->run();
}

run_prostyle_designer();
