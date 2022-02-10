<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/includes
 * @author     Your Name <email@example.com>
 */
class Prostyle_Designer_Activator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate() {
        self::create_page('api', '[prostyle-designer-api]');
        self::create_page('app', '[prostyle-designer-app]');
    }

    public static function create_page($title_of_the_page, $content, $parent_id = NULL) {
        $objPage = get_page_by_title($title_of_the_page, 'OBJECT', 'page');
        if (!empty($objPage)) {
            return $objPage->ID;
        }

        $page_id = wp_insert_post(
                array(
                    'comment_status' => 'close',
                    'ping_status' => 'close',
                    'post_author' => 1,
                    'post_title' => ucwords($title_of_the_page),
                    'post_name' => strtolower(str_replace(' ', '-', trim($title_of_the_page))),
                    'post_status' => 'publish',
                    'post_content' => $content,
                    'post_type' => 'page',
                    'post_parent' => $parent_id
                )
        );
    }

}
