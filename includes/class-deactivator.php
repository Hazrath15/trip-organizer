<?php
if( !class_exists('TRIPO_Deactivator') ) {
    class TRIPO_Deactivator {
        public static function deactivate() {
            flush_rewrite_rules();
        }
    }
}

?>