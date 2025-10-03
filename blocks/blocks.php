<?php
/**
 * All of the custom Gutenberg blocks made by ACF
 *
 * @package cprf
 */
// namespace CPRF;

/**
 * Load Blocks
 */
function load_custom_blocks() {

	register_block_type( get_template_directory() . '/blocks/content-50-50/block.json' );
	register_block_type( get_template_directory() . '/blocks/content/block.json' );
	register_block_type( get_template_directory() . '/blocks/instagram/block.json' );
	register_block_type( get_template_directory() . '/blocks/partners/block.json' );
	register_block_type( get_template_directory() . '/blocks/partners-overview/block.json' );
	register_block_type( get_template_directory() . '/blocks/stats/block.json' );
	register_block_type( get_template_directory() . '/blocks/team-overview/block.json' );
	register_block_type( get_template_directory() . '/blocks/title/block.json' );

}
add_action( 'init', 'load_custom_blocks' );

function custom_block_categories( $block_categories, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
			array_push(
					$block_categories,
					array(
							'slug'  => 'cprf_page_blocks',
							'title' => __( 'CPRF Page Blocks', 'cprf' ),
							'icon'  => 'text-page',
					),
			);
	}
	return $block_categories;
}
// add_filter( 'block_categories_all', __NAMESPACE__ . '\custom_block_categories', 10, 2 );
add_filter( 'block_categories_all', 'custom_block_categories', 10, 2 );
