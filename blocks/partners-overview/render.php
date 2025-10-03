<?php
/**
 * ACF Block Template: Partners Overview
 *
 */

namespace CPRF;

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "md:grid md:grid-cols-3 md:gap-[4rem]";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

		<?php
			if(is_data_okay('partners_selector', $flds)) {
				foreach($flds['partners_selector'] as $coun => $partner) {
					$f = get_fields($partner->ID);
					echo '<div class="cursor-pointer" data-lb-type="partners" data-lb-id="'.$partner->ID.'">';
					echo 	'<span class="block pb-[50%] relative mb-[1.5rem]"><img class="absolute object-contain h-full w-full top-[0]" src="'.get_the_post_thumbnail_url($partner->ID, 'medium').'" alt=""></span>';
					echo 	'<h3 class="mb-0 text-[1rem] text-center">'.$partner->post_title.'</h3>';
					echo '</div>';
				}
			}
		?>

	</div>
</section>
