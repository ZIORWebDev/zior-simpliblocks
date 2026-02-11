<?php
/**
 * Plugin bootstrap class for SimpliBlocks.
 *
 * This class is responsible for initializing the plugin by defining constants
 * and loading core services. It does not maintain runtime state and therefore
 * does not implement the singleton pattern.
 *
 * @package ZIORWebDev\SimpliBlocks
 */

namespace ZIORWebDev\SimpliBlocks;

use ZIORWebDev\WordPressBlocks\Loader as BlocksLoader;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin bootstrap class.
 *
 * Handles plugin initialization, constant definition, and service bootstrapping.
 * All methods are static to avoid unnecessary global instances.
 *
 * @since 1.0.0
 */
final class Plugin {

	/**
	 * Initialize the plugin.
	 *
	 * Defines core constants and boots required services.
	 * This method should be called once from the main plugin file.
	 *
	 * @since 1.0.0
	 *
	 * @param string $plugin_file Absolute path to the main plugin file.
	 * @return void
	 */
	public static function init( string $plugin_file ): void {
		self::define_constants( $plugin_file );
		self::init_services();
	}

	/**
	 * Define plugin constants.
	 *
	 * Constants are only defined once to prevent redefinition errors.
	 * These constants are used throughout the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @param string $plugin_file Absolute path to the main plugin file.
	 * @return void
	 */
	private static function define_constants( string $plugin_file ): void {
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_FILE', $plugin_file );
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_DIR', plugin_dir_path( $plugin_file ) );
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_URL', plugin_dir_url( $plugin_file ) );
	}

	/**
	 * Boot core plugin services.
	 *
	 * Responsible for initializing external libraries, loaders,
	 * and other core services required by the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private static function init_services(): void {
		( new BlocksLoader() )->init();
	}

	/**
	 * Plugin activation callback.
	 *
	 * Fires a custom action that other components can hook into
	 * to perform activation-related tasks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function activate_plugin(): void {
		/**
		 * Fires when the SimpliBlocks plugin is activated.
		 *
		 * @since 1.0.0
		 */
		do_action( 'zior_simpliblocks_activation' );
	}

	/**
	 * Plugin deactivation callback.
	 *
	 * Fires a custom action that other components can hook into
	 * to perform deactivation-related cleanup.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function deactivate_plugin(): void {
		/**
		 * Fires when the SimpliBlocks plugin is deactivated.
		 *
		 * @since 1.0.0
		 */
		do_action( 'zior_simpliblocks_deactivation' );
	}
}
