<?php
/**
 * Title: Partners Block
 * Slug: cprf/partners
 *
 * @package cprf
 * @since 1.0.0
 */


global $block;
$block['id'] = 'partners-block';

include(dirname(__FILE__) . '/../blocks/partners/render.php');

?>

