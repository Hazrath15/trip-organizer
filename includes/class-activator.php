<?php
if( !class_exists('TRIPO_Activator') ){
    class TRIPO_Activator {
        public static function activate() {
            flush_rewrite_rules();
        }
    }
}

?>