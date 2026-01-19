<?php
/**
 * Main plugin controller class for SimpliBlocks.
 *
 * This class bootstraps the plugin, loads dependencies, sets up internationalization,
 * and initializes core services including the plugin updater.
 *
 * @package ZIORWebDev\SimpliBlocks
 */

namespace ZIORWebDev\SimpliBlocks;

use ZIORWebDev\WordPressBlocks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * The core plugin class for SimpliBlocks.
 *
 * Responsible for defining core constants, loading dependencies, setting up localization,
 * and initializing the plugin loader and updater.
 *
 * Implements the singleton pattern to ensure only one instance is used.
 *
 * @package ZIORWebDev\SimpliBlocks.
 */
final class Plugin {

	/**
	 * Path to the main plugin file.
	 *
	 * @var string
	 */
	protected $plugin_file;

	/**
	 * Name of the plugin.
	 *
	 * @var string
	 */
	protected $plugin_name = '';

	/**
	 * Singleton instance of the Plugin class.
	 *
	 * @var Plugin
	 */
	protected static $instance;

	/**
	 * Current version of the plugin.
	 *
	 * @var string
	 */
	protected $plugin_version = '';

	/**
	 * Class constructor.
	 */
	private function __construct( string $plugin_file ) {
		$this->plugin_file = $plugin_file;
	}

	/**
	 * Initialize the plugin.
	 *
	 * Sets up constants, includes required files, and initializes the plugin updater.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function init(): void {
		$this->setup_constants();
		$this->include_classes();

		/**
		 * Load WordPress Blocks library.
		 */
		WordPressBlocks\Load::get_instance();
	}

	/**
	 * Include required plugin files.
	 *
	 * Loads configuration, core functions, loader class, and the updater helper.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function include_classes(): void {
		require_once ZIOR_SIMPLIBLOCKS_PLUGIN_DIR . 'vendor/autoload.php';
	}

	/**
	 * Defines plugin constants used throughout the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function setup_constants(): void {
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_DIR', plugin_dir_path( $this->plugin_file ) );
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_URL', plugin_dir_url( $this->plugin_file ) );
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_FILE', $this->plugin_file );
		define( 'ZIOR_SIMPLIBLOCKS_PLUGIN_VERSION', $this->plugin_version );
	}

	/**
	 * Get the singleton instance of the Plugin class.
	 *
	 * @param string $plugin_file
	 * @return Plugin
	 * @since 1.0.0
	 */
	public static function get_instance( string $plugin_file ): Plugin {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $plugin_file );
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Load the plugin textdomain.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain(
			'zior-simpliblocks',
			false,
			ZIOR_SIMPLIBLOCKS_PLUGIN_DIR . '/languages/',
		);
	}

	/**
	 * Activate the plugin.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function activate_plugin(): void {
		do_action( 'zior_simpliblocks_activation' );
	}

	/**
	 * Deactivate the plugin.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function deactivate_plugin(): void {
		do_action( 'zior_simpliblocks_deactivation' );
	}
}
