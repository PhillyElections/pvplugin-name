<?php
/**
 * 
 * Plugin Name: PV Plugin Name
 * Description: Allow for Machine Inspector online signups.
 * Plugin URI: https://github.com/mattyhead/pvplugin-name
 * Author: Matthew Murphy
 * Author URI: https://github.com/mattyhead
 * Version: 0.0.1
 * Text Domain: pvplugin-name
 * Domain Path: /languages/
 * License: GPLv2
 * 
 * Plugin Name is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *  
 * Plugin Name is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Plugin Name. If not, see:
 * https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
 * 
 **/

define( 'PVPLUGINABBR__NAME', 'PV Plugin Name' );
define( 'PVPLUGINABBR__TEXTDOMAIN', 'pvplugin-name' );
define( 'PVPLUGINABBR__TEXTDOMAINPATH', '/languages/' );
define( 'PVPLUGINABBR__FILE', __FILE__ );
define( 'PVPLUGINABBR__DIR', dirname( __FILE__ ) );
define( 'PVPLUGINABBR__VERSION', '0.0.1' );
define( 'PVPLUGINABBR_REQUIRED_WP_VERSION', '4.0' );
define( 'PVPLUGINABBR_REQUIRED_PHP_VERSION', '5.3' );

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function pvpluginabbr_requirements_met() {
    global $wp_version;
    
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );        // to get is_plugin_active() early

    if ( version_compare( PHP_VERSION, PVPLUGINABBR_REQUIRED_PHP_VERSION, '<' ) ) {
        return false;
    }

    if ( version_compare( $wp_version, PVPLUGINABBR_REQUIRED_WP_VERSION, '<' ) ) {
        return false;
    }

    if ( ! is_plugin_active( PVPLUGINABBR__FILE ) ) {
        return false;
    }

    return true;
}

if ( !class_exists( 'pvpluginabbr_actions' ) ) {
    class pvpluginabbr_actions {
        // define standard hooks
        /**
         * activation hook for pvplugin-name
         * @return NULL
         */
        function pvpluginabbr_activate() {
            echo "activated";
            // clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }

        /**
         * deactivation hook for pvplugin-name
         * @return NULL
         */
        function pvpluginabbr_deactivate() {
            echo "deactivated";
            // clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }

        /**
         * uninstall hook for pvplugin-name
         * @return NULL
         */
        function pvpluginabbr_uninstall() {
            echo "uninstall";
            // clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }
    }
    
    // register standard hooks
}


if ( pvpluginabbr_requirements_met() & class_exists( 'pvpluginabbr_actions' ) ) {

    register_activation_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_activate() );
    register_deactivation_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_deactivate() );
    register_uninstall_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_uninstall() );

    if ( is_admin() ) {
        // we are in admin mode
        // load our admin interface
    } else {
        // we are in the frontend
        // load our frontend interface
    }
}
