<?php
if( !class_exists('TRIPO_Loader') ) {
    class TRIPO_Loader {
        public static function init() {

            require_once TRIPO_PLUGIN_DIR . 'includes/class-activator.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/class-deactivator.php';

            //Helpers
            require_once TRIPO_PLUGIN_DIR . 'includes/Helpers/trait-single-trip-template-load-helper.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Helpers/trait-trip-listing-template-load-helper.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Helpers/REST/class-form-handler.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Helpers/REST/class-ajax-action-handler.php';

            require_once TRIPO_PLUGIN_DIR . 'public/class-widgets-loader.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Assets/class-assets-loader.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/PostType/class-post-type.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/PostType/class-taxonomy.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/PostType/class-meta-boxes.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Admin/class-post-list-columns.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Frontend/class-load-template.php';
            require_once TRIPO_PLUGIN_DIR . 'includes/Frontend/shortcodes/class-search-by-destination.php';

            new TRIPO_Widgets_Loader();
            new TRIPO_Post_Type();
            new TRIPO_Taxonomies();
            new TRIPO_Meta_Boxes();
            new TRIPO_Admin_Columns();
            new TRIPO_Assets_Loader();
            new TRIPO_Load_Template();
            new Contact_Form_Handler();
            new Ajax_Action_Handler();
            new Search_By_Destination_Shortcode();
        }
    }
}
?>