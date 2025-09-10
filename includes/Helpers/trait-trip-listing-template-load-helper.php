<?php
trait TRIPO_trip_Listing_Template_Load_Helper {

    function tripo_trip_archive_template($archive) {
        global $post;

        if ($post->post_type == 'trip') {
            $plugin_template = TRIPO_PLUGIN_DIR . 'includes/Frontend/templates/archive-trip.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }
        return $archive;
    }

}
?>
