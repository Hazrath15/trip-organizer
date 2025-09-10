<?php
if ( ! class_exists( 'TRIPO_Taxonomies' ) ) {
    class TRIPO_Taxonomies {

        public function __construct() {
            add_action( 'init', [ $this, 'register_destination_taxonomy' ] );
        }

        public function register_destination_taxonomy() {
            $labels = [
                'name'              => __( 'Destinations', 'trip-organizer' ),
                'singular_name'     => __( 'Destination', 'trip-organizer' ),
                'search_items'      => __( 'Search Destinations', 'trip-organizer' ),
                'all_items'         => __( 'All Destinations', 'trip-organizer' ),
                'edit_item'         => __( 'Edit Destination', 'trip-organizer' ),
                'update_item'       => __( 'Update Destination', 'trip-organizer' ),
                'add_new_item'      => __( 'Add New Destination', 'trip-organizer' ),
                'new_item_name'     => __( 'New Destination Name', 'trip-organizer' ),
                'menu_name'         => __( 'Destinations', 'trip-organizer' ),
            ];

            $args = [
                'hierarchical'      => true, // like categories
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => [ 'slug' => 'destination' ],
                'show_in_rest'      => true, // for Gutenberg
            ];

            register_taxonomy( 'destination', [ 'trip' ], $args );
        }
    }
}
?>