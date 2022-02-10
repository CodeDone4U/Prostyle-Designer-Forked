<?php

/**
 * Process requests to the api.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/includes
 * @author     Your Name <email@example.com>
 */
class Prostyle_Designer_Api {

    /**
     * Collect data sent to the api.
     *
     * When the Prostyle Designer submits a newly created design
     * collect_data() get all the data associated with the creation
     * i.e. image.
     *
     * @since    1.0.0
     */
    public static function collect_data() {
        if (isset($_POST['image'])):
            $image = $_POST['image'];
            // Create Image
            self::create_image($image);
        else:
            die('Access Denied!! Prostyle bots only');
        endif;
    }

    /**
     * After successful data collection convert the raw image data to png
     *
     * @since    1.0.0
     */
    public static function create_image($raw_image) {
        if (file_exists(PROSTYLE_DESIGNS)):
            $filename = date('YmdHi', time()) . '.png';
            $new_file = file_get_contents($raw_image);
            $file_path = PROSTYLE_DESIGNS . $filename;
            file_put_contents($file_path, $new_file);
            self::create_product($filename);
        else:
            mkdir(PROSTYLE_DESIGNS);
        endif;
    }

    /**
     * Create a product in the system after successful data collection
     *
     * @since    1.0.0
     */
    public static function create_product($filename) {
        $file = array();
        $file['name'] = $filename;
        $file['tmp_name'] = download_url(PROSTYLE_MEDIA . $filename);


        $post_id = wp_insert_post(array(
            'post_title' => 'Prostyle Custom Keyring - '. date('YmdHi', time()),
            'post_content' => 'This product is customisable . You can customise it here. ',
            'post_status' => 'publish',
            'post_type' => "product",
        ));
        wp_set_object_terms($post_id, 'simple', 'product_type');

        update_post_meta($post_id, '_price', '9');
        update_post_meta($post_id, '_featured', 'yes');
        update_post_meta($post_id, '_stock', '1');
        update_post_meta($post_id, '_stock_status', 'instock');
        update_post_meta($post_id, '_sku', date('YmdHi', time()));

        //Upload image to media gallery to get id.
        if (is_wp_error($file['tmp_name'])) {
            @unlink($file['tmp_name']);
            var_dump($file['tmp_name']->get_error_messages());
        } else {
            $attachmentId = media_handle_sideload($file, $post_id);

            if (is_wp_error($attachmentId)) {
                @unlink($file['tmp_name']);
                var_dump($attachmentId->get_error_messages());
            } else {
                update_post_meta($post_id, '_thumbnail_id', $attachmentId);
                $product = get_page_by_title('Prostyle Custom Keyring - '. date('YmdHi', time()), OBJECT, 'product');
                $product_link = get_permalink($product->ID);
                echo $product_link;
                die();
            }
        }
    }

    /**
     * Add to cart after successful product creation
     *
     * @since    1.0.0
     */
    public static function add_to_cart($product_id) {
        return $status;
    }

}
