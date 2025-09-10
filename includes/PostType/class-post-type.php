<?php

if( !class_exists('TRIPO_Post_Type') ) {
    class TRIPO_Post_Type {
        public function __construct() {
            add_action('init', [$this, 'register_trip_post_type']);
            add_action( 'init', [ $this, 'register_order_post_type' ] );
        }

        public function register_trip_post_type() {
            $labels = [
                'name'               => __('Trips', 'trip-organizer'),
                'singular_name'      => __('Trip', 'trip-organizer'),
                'add_new'            => __('Add New Trip', 'trip-organizer'),
                'add_new_item'       => __('Add New Trip', 'trip-organizer'),
                'edit_item'          => __('Edit Trip', 'trip-organizer'),
                'new_item'           => __('New Trip', 'trip-organizer'),
                'view_item'          => __('View Trip', 'trip-organizer'),
                'search_items'       => __('Search Trips', 'trip-organizer'),
                'not_found'          => __('No trips found', 'trip-organizer'),
                'not_found_in_trash' => __('No trips found in Trash', 'trip-organizer'),
                'menu_name'          => __('Trips', 'trip-organizer'),
            ];

            $args = [
                'labels'             => $labels,
                'public'             => true,
                'has_archive'        => true,
                'rewrite'            => ['slug' => 'trip'],
                'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
                'show_in_rest'       => true,
                'menu_icon'          => 'dashicons-location-alt',
            ];

            register_post_type('trip', $args);
        }
        public function register_order_post_type() {
            $labels = [
                'name'          => __( 'Orders', 'trip-organizer' ),
                'singular_name' => __( 'Order', 'trip-organizer' ),
                'menu_name'     => __( 'Orders', 'trip-organizer' ),
            ];

            $args = [
                'labels'        => $labels,
                'public'        => false,
                'show_ui'       => true,
                'show_in_menu'  => true,
                'menu_icon'     => 'dashicons-cart',
                'supports'      => [ 'title' ], // We will save details as meta
            ];

            register_post_type( 'trip_order', $args );
        }
    }
}