<?php
if ( ! class_exists( 'TRIPO_Admin_Columns' ) ) {
    class TRIPO_Admin_Columns {
        public function __construct() {
            add_filter( 'manage_trip_posts_columns', [ $this, 'add_custom_columns' ] );
            add_action( 'manage_trip_posts_custom_column', [ $this, 'render_custom_columns' ], 10, 2 );
            add_filter( 'manage_edit-trip_sortable_columns', [ $this, 'make_columns_sortable' ] );
            add_filter( 'manage_trip_order_posts_columns', [ $this, 'add_order_column' ] );
            add_action( 'manage_trip_order_posts_custom_column', [ $this, 'manage_order_column' ], 10, 2 );
        }

        public function add_custom_columns( $columns ) {
            // Insert after the title column
            $new_columns = [];
            foreach ( $columns as $key => $value ) {
                $new_columns[ $key ] = $value;
                if ( 'title' === $key ) {
                    $new_columns['duration']    = __( 'Duration (Days)', 'trip-organizer' );
                    $new_columns['price']       = __( 'Price (SEK)', 'trip-organizer' );
                }
            }
            return $new_columns;
        }

        public function render_custom_columns( $column, $post_id ) {

            if ( $column === 'duration' ) {
                $duration = get_post_meta( $post_id, '_trip_duration', true );
                echo $duration ? esc_html( $duration ) . ' ' . __( 'Days', 'trip-organizer' ) : __( '—', 'trip-organizer' );
            }

            if ( $column === 'price' ) {
                $price = get_post_meta( $post_id, '_trip_price', true );
                echo $price ? number_format( $price ) . ' ' . __( 'SEK', 'trip-organizer' ) : __( '—', 'trip-organizer' );
            }
        }

        public function make_columns_sortable( $columns ) {
            $columns['duration'] = 'duration';
            $columns['price']    = 'price';
            return $columns;
        }

        public function add_order_column($columns) {
            $columns['email'] = 'Email';
            $columns['phone'] = 'Phone';
            $columns['trip']  = 'Trip';
            return $columns;
        }
        public function manage_order_column($column, $post_id) {
            if ( $column === 'email' ) {
                echo esc_html( get_post_meta($post_id, '_email', true) );
            }
            if ( $column === 'phone' ) {
                echo esc_html( get_post_meta($post_id, '_phone', true) );
            }
            if ( $column === 'trip' ) {
                echo esc_html( get_post_meta($post_id, '_trip_title', true) );
            }
        }
    }
}