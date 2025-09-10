<?php
/*
Plugin Name: Trip Organizer
Plugin URI: https://github.com/Hazrath15
Description: A plugin to organize and manage trips.
Version: 1.0.0
Author: Hazrath Ali
Author URI: https://github.com/Hazrath15
License: GPL2
Text Domain: trip-organizer
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'TRIPO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once TRIPO_PLUGIN_DIR . 'includes/class-loader.php';
TRIPO_Loader::init();

register_activation_hook(__FILE__,['TRIPO_Activator', 'activate']);
register_deactivation_hook(__FILE__,['TRIPO_Deactivator', 'deactivate']);
