<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRIPO_Assets_Loader {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'load_frontend_assets' ] );
        // add_action( 'admin_enqueue_scripts', [ $this, 'load_admin_assets' ] );
    }

    /**
     * Load frontend assets.
     */
    public function load_frontend_assets() {
        // Example: Enqueue frontend CSS and JS
        wp_enqueue_style(
            'trip-organizer-bootstrap',
            plugin_dir_url( __FILE__ ) . '../../src/css/bootstrap.min.css',
            [],
            '5.3.5'
        );
        wp_enqueue_style(
            'trip-organizer-main',
            plugin_dir_url( __FILE__ ) . '../../src/scss/main.css',
            [],
            '1.0.0'
        );
        wp_enqueue_style(
            'nouislider-css',
            'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css',
            [],
            '15.7.0'
        );
        wp_enqueue_script(
            'trip-organizer-bootstrap',
            plugin_dir_url( __FILE__ ) . '../../src/js/bootstrap.min.js',
            [ 'jquery' ],
            '5.3.5',
            true
        );
        wp_enqueue_script(
            'nouislider-js',
            'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js',
            [],
            '15.7.0',
            true
        );
        wp_enqueue_script(
            'trip-organizer-main',
            plugin_dir_url( __FILE__ ) . '../../src/js/main.js',
            [ 'jquery' ],
            '1.0.0',
            true
        );


        // Get all durations
        $durations = get_posts([
            'post_type'      => 'trip',  // your CPT
            'posts_per_page' => -1,
            'fields'         => 'ids',
        ]);

        $duration_values = [];
        $price_values = [];

        foreach ($durations as $trip_id) {
            $duration = get_post_meta($trip_id, '_trip_duration', true);
            $price    = get_post_meta($trip_id, '_trip_price', true);

            if ($duration) {
                $duration_values[] = (int) $duration;
            }
            if ($price) {
                $price_values[] = (int) $price;
            }
        }

        $min_duration = !empty($duration_values) ? min($duration_values) : 1;
        $max_duration = !empty($duration_values) ? max($duration_values) : 30;

        $min_price = !empty($price_values) ? min($price_values) : 1000;
        $max_price = !empty($price_values) ? max($price_values) : 100000;

        wp_localize_script('trip-organizer-main', 'contactFormData', [
            'nonce' => wp_create_nonce('wp_rest'),
            'restUrl' => esc_url_raw(rest_url('custom-contact/v1/send')),
            'ajax_url' => admin_url('admin-ajax.php'),
            'minDuration' => (int) $min_duration,
            'maxDuration' => (int) $max_duration,
            'minPrice'    => (int) $min_price,
            'maxPrice'    => (int) $max_price,
        ]);
    }

    // /**
    //  * Load admin assets.
    //  */
    // public function load_admin_assets() {
    //     // Example: Enqueue admin CSS and JS
    //     wp_enqueue_style(
    //         'trip-organizer-admin',
    //         plugin_dir_url( __FILE__ ) . '../../assets/css/admin.css',
    //         [],
    //         '1.0.0'
    //     );

    //     wp_enqueue_script(
    //         'trip-organizer-admin',
    //         plugin_dir_url( __FILE__ ) . '../../assets/js/admin.js',
    //         [ 'jquery' ],
    //         '1.0.0',
    //         true
    //     );
    // }
}

