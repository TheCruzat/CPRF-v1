<?php
/**
 * ACF Block Template: Instagram
 *
 */

namespace CPRF;

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "text-center";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

		<?php if(is_data_okay('title', $flds)) {
			echo '<h2>'.scn($flds['title']).'</h2>';
		} ?>

		<?= do_shortcode('[instagram-feed feed=1]'); ?>

	</div>
</section>
