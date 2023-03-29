<?php
/**
 * Plugin Name:     Decoupled Kit Advanced Custom Fields
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

namespace Pantheon\DecoupledACF;

require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Kick off the plugin.
 *
 * @return void
 */
function bootstrap() {
	add_action( 'init', __NAMESPACE__ . '\\enable_deps' );
}

/**
 * Activate the plugin dependency.
 *
 * @return void
 */
function enable_deps() {
	activate_plugin( 'advanced-custom-fields/acf.php' );
	activate_plugin( 'wp-graphql-acf/wp-graphql-acf.php' );
	create_acf();
	// Check if related post exist & related example post haven't been created yet.
	if ( post_exists( 'Example Post with Image' ) && ! post_exists( 'Example Post with Related Content' ) ) {
		if ( ! get_transient( 'decoupled_kit_acf_created_example_post' ) ) {
			create_example_post();
		}
	}
}

/**
 * Create Related Content ACF.
 *
 * @return void
 */
function create_acf() {
	if ( function_exists( 'acf_add_local_field_group' ) ) :
		acf_add_local_field_group([
			'key' => 'group_63f6015588061',
			'title' => 'Related Content',
			'fields' => [
				[
					'key' => 'field_63f60156c8cb5',
					'label' => 'Related Posts',
					'name' => 'related_posts',
					'aria-label' => '',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => [
						'width' => '',
						'class' => '',
						'id' => '',
					],
					'show_in_graphql' => 1,
					'post_type' => [
						0 => 'post',
					],
					'taxonomy' => '',
					'return_format' => 'object',
					'multiple' => 1,
					'allow_null' => 0,
					'ui' => 1,
				],
			],
			'location' => [
				[
					[
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
					],
				],
			],
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
			'show_in_graphql' => 1,
			'graphql_field_name' => 'relatedContent',
			'map_graphql_types_from_location_rules' => 0,
			'graphql_types' => '',
		]);

	endif;
}

/**
 * Create example post with Related Content ACF.
 *
 * @return void
 */
function create_example_post() {
	$example_post = [
		'post_title' => 'Example Post with Related Content',
		'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc sed augue lacus viverra vitae congue eu consequat. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Diam vulputate ut pharetra sit amet aliquam id. Quis blandit turpis cursus in hac.',
		'post_status' => 'publish',
	];
	$post_id = wp_insert_post( $example_post );
	$example_post_id = post_exists( 'Example Post with Image' );
	update_field( 'field_63f60156c8cb5', $example_post_id, $post_id );
	set_transient( 'decoupled_kit_acf_created_example_post', true );
}

// Let's rock & roll.
bootstrap();
