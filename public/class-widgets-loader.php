<?php
if( !class_exists('TRIPO_Widgets_Loader') ) {
    class TRIPO_Widgets_Loader {
        public function __construct() {
            add_action( 'elementor/widgets/register', [$this, 'register_new_widgets'] );
        }
        function register_new_widgets( $widgets_manager ) {

            require_once( __DIR__ . '/widgets/heading.php' );
            require_once( __DIR__ . '/widgets/hero-banner.php' );
            require_once( __DIR__ . '/widgets/contact-form.php' );
            require_once( __DIR__ . '/widgets/timeline.php' );

            $widgets_manager->register( new \TRIPO_Heading() );
            $widgets_manager->register( new \TRIPO_Hero_Banner() );
            $widgets_manager->register( new \TRIPO_Contact_Form() );
            $widgets_manager->register( new \TRIPO_Timeline() );
        }
    }
}

?>