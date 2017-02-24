<?php
/**7
 * 
 * Plugin Name: PV Plugin Name
 * Description: Do [something] for [someone] in [location]
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
if ( ! defined( 'WPINC' ) ) {
    exit;
}

define( 'PVPLUGINABBR_NAME', 'PV Plugin Name' );
define( 'PVPLUGINABBR_TEXTDOMAIN', 'pvplugin-name' );
define( 'PVPLUGINABBR_TEXTDOMAINPATH', '/languages/' );
define( 'PVPLUGINABBR_FILE', __FILE__ );
define( 'PVPLUGINABBR_DIR', dirname( PVPLUGINABBR_FILE ) );
define( 'PVPLUGINABBR_ADMINDIR', PVPLUGINABBR_DIR . DS . 'admin' );
define( 'PVPLUGINABBR_PPUBLICDIR', PVPLUGINABBR_DIR . DS . 'public' );
define( 'PVPLUGINABBR_VERSION', '0.0.1' );
define( 'PVPLUGINABBR_REQUIRED_WP_VERSION', '4.0' );
define( 'PVPLUGINABBR_REQUIRED_PHP_VERSION', '5.3' );

require_once( ABSPATH . '/wp-admin/includes/plugin.php' );        // to get is_plugin_active() early

// check requirements
if ( version_compare( PHP_VERSION, PVPLUGINABBR_REQUIRED_PHP_VERSION, '<' ) 
  || version_compare( $wp_version, PVPLUGINABBR_REQUIRED_WP_VERSION, '<' ) 
  || !is_plugin_active( PVPLUGINABBR_FILE ) ) {
    // do nothing if requirements are not met

} else {
    // register core events
    require_once( PVPLUGINABBR_DIR . DS . 'actions.php');

    // select which interface to load
    if ( is_admin() ) {
        // load backend
        require_once( PVPLUGINABBR_DIR . DS . 'admin'. DS . 'main.php' );
    } else {
        // load frontend
        require_once( PVPLUGINABBR_DIR . DS . 'public'. DS . 'main.php' );
    }
}
