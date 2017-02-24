<?php

if ( ! defined( 'WPINC' ) ) {
    exit;
}

if ( !class_exists('pluginabbr_admin_actions') ) {
    static public class pluginabbr_admin_actions {
        static public function load_styles( ) {
            wp_enqueue_style(
                'pvpluginabbr_admin',
                plugins_url( 'assets/css/styles.css', __FILE__ ),
                array(),
                PVPLUGINABBR_VERSION,
                'screen'
            );
        }

        static public function load_scripts( ) {
            wp_enqueue_script(
                'pvpluginabbr_admin',
                plugins_url( 'assets/js/main.js', __FILE__ ),
                array( 'query' ),
                PVPLUGINABBR_VERSION
            );
        }
    }
}
add_action( 'init', pluginabbr_admin_actions::load_styles( ) );
add_action( 'init', pluginabbr_admin_actions::load_scripts( ) );
