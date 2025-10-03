<?php
/**
 * ACF Block Template: Content Full
 *
 */

namespace CPRF;

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "md:max-w-[48rem] md:mx-auto";

?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

		<?php

			if(is_data_okay('content', $flds)) ecn($flds['content']);

		?>

	</div>
</section>
