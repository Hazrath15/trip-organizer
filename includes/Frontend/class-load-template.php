<?php
if ( ! class_exists( 'TRIPO_Load_Template' ) ) {
    class TRIPO_Load_Template {

        use TRIPO_Single_Trip_Template_Load_Helper;
        use TRIPO_trip_Listing_Template_Load_Helper;

        public function __construct() {
            
            add_filter('single_template', [$this, 'tripo_custom_single_template']);
            add_filter('archive_template', [$this, 'tripo_trip_archive_template']);
        }

    }
}