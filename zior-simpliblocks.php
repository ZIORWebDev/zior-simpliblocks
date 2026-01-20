<?php
/**
 * Plugin Name:       ZIOR SimpliBlocks
 * Plugin URI:        https://ziorweb.dev/plugin/zior-simpliblocks
 * Description:       A collection of simple, lightweight blocks focused on clarity and performance.
 * Author:            ZIORWeb.Dev
 * Author URI:        https://ziorweb.dev
 * Version:           1.0.1
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zior-block-elements
 * Domain Path:       /languages
 * Tested up to:      6.9
 *
 * @package ZIORWebDev\SimpliBlocks
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/gpl-2.0.txt>.
 */

use ZIORWebDev\SimpliBlocks\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin.php';

$plugin_instance = Plugin::get_instance( __FILE__ );

register_activation_hook( __FILE__, array( $plugin_instance, 'activate_plugin' ) );
register_deactivation_hook( __FILE__, array( $plugin_instance, 'deactivate_plugin' ) );
