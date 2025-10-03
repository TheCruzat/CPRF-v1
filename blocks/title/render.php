<?php
/**
 * ACF Block Template: Title
 *
 */

namespace CPRF;

global $extra_class;
$extra_class = "pb-[0]";

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "md:max-w-[48rem] md:mx-auto";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">
	<?php

	if(is_data_okay('title', $flds)) {
		echo '<h2>' . $flds['title'] . '</h2>';
	}

	?>
	</div>
</section>
