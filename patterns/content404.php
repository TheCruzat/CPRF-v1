<?php
/**
 * Title: 404 Content
 * Slug: cprf/content-404
 *
 * @package cwtc3
 * @since 1.0.0
 */

$opt = get_fields('options');
?>

<div class="entry-content wp-block-404-content is-layout-flow wp-block-post-content-is-layout-flow mx-auto">
<?php
if(is_data_okay('page_404_content', $opt)) echo '<div class="text-center">'; ecn($opt['page_404_content']); echo '</div>';
?>
</div>
