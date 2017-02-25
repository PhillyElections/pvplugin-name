<?php
/**
 * Check for PVPLUGINABBR environment
 */
if ( ! defined( 'PVPLUGINABBR_INC' ) ) {
	exit;
}

if ( ! class_exists( 'pvpluginabbr_core_actions' ) ) {

	/**
	 * Define core actions using static methods.
	 */
	class pvpluginabbr_core_actions {

		// standard hooks
		/**
		 * activation hook for pvplugin-name.
		 */
		public static function pvpluginabbr_activate() {

			// test for installed tables
			if ( 0 ) {
				// run install sql
			}

			// clear the permalinks after the post type has been registered
			//flush_rewrite_rules();
		}

		/**
		 * deactivation hook for pvplugin-name.
		 */
		public static function pvpluginabbr_deactivate() {

			// clear the permalinks after the post type has been registered
			//flush_rewrite_rules();
		}

		/**
		 * uninstall hook for pvplugin-name.
		 */
		public static function pvpluginabbr_uninstall() {

			// run uninstall sql
		}

		// additional hooks
	}
}

// register standard hooks
register_activation_hook( PVPLUGINABBR__FILE, pvpluginabbr_core_actions::pvpluginabbr_activate() );
register_deactivation_hook( PVPLUGINABBR__FILE, pvpluginabbr_core_actions::pvpluginabbr_deactivate() );
register_uninstall_hook( PVPLUGINABBR__FILE, pvpluginabbr_core_actions::pvpluginabbr_uninstall() );

// register additional hooks
