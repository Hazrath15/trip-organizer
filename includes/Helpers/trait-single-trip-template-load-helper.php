<?php
trait TRIPO_Single_Trip_Template_Load_Helper {
    function tripo_custom_single_template($single) {
        global $post;

        if ($post->post_type == 'trip') {
            $plugin_template = TRIPO_PLUGIN_DIR . 'includes/Frontend/templates/single-trip.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $single;
    }
}
?>