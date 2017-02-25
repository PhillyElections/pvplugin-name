<?php
/**
 * check for PVPLUGINABBR environment
 */
if ( ! defined( 'PVPLUGINABBR_INC' ) ) {
	exit;
}

if ( ! class_exists( 'pluginabbr_public_actions' ) ) {
	class pluginabbr_public_actions {

		public static function load_styles() {
			wp_enqueue_style(
				'pvpluginabbr_public',
				plugins_url( 'assets/css/styles.css', __FILE__ ),
				array(),
				PVPLUGINABBR_VERSION,
				'screen'
			);
		}

		public static function load_scripts() {
			wp_enqueue_script(
				'pvpluginabbr_public',
				plugins_url( 'assets/js/main.js', __FILE__ ),
				array( 'query' ),
				PVPLUGINABBR_VERSION
			);
		}
	}
}

// load default client includes
add_action( 'init', pluginabbr_public_actions::load_styles() );
add_action( 'init', pluginabbr_public_actions::load_scripts() );
