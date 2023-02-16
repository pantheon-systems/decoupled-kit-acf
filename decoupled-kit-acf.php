<?php
/**
 * Plugin Name:     Pantheon Decoupled for Advanced Custom Fields
 * Plugin URI:      https://pantheon.io/
 * Description:     Add examples related to using advanced custom fields on a decoupled WordPress site.
 * Version:         0.1.0
 * Author:          Pantheon
 * Author URI:      https://pantheon.io/
 * Text Domain:     decoupled-kit-acf
 * Domain Path:     /languages
 *
 * @package         Pantheon_Decoupled
 */

require_once(ABSPATH . 'wp-admin/includes/plugin.php');

add_action('init', 'decoupled_kit_acf_enable_deps');

/**
 * Activate the plugin dependency.
 *
 * @return void
 */
function decoupled_kit_acf_enable_deps() {
    activate_plugin('advanced-custom-fields/acf.php');
    activate_plugin('wp-graphql-acf/wp-graphql-acf.php');
}
