<?php

if ( ! defined( 'WPINC' ) ) {
    exit;
}

if ( !class_exists( 'pvpluginabbr_core_actions' ) ) {
    // define hooks
    static public class pvpluginabbr_core_actions {

        // standard hooks
        /**
         * activation hook for pvplugin-name
         * @return NULL
         */
        static public function pvpluginabbr_activate() {

            // test for installed tables
            if ( 0 ) {
                // run install sql
            } 

            // clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }

        /**
         * deactivation hook for pvplugin-name
         * @return NULL
         */
        static public function pvpluginabbr_deactivate() {

            // clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }

        /**
         * uninstall hook for pvplugin-name
         * @return NULL
         */
        static public function pvpluginabbr_uninstall() {

            // run uninstall sql
        }

        // additional hooks
    }
}

// register standard hooks
register_activation_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_activate() );
register_deactivation_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_deactivate() );
register_uninstall_hook( PVPLUGINABBR__FILE, pvpluginabbr_actions::pvpluginabbr_uninstall() );
