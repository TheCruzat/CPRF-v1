<?php
/**
 * ACF Block Template: Stats
 *
 */

namespace CPRF;

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

	<?php
		if(is_data_okay('stats', $flds)) {
			echo '<div class="lg:grid lg:grid-cols-3 lg:gap-[var(--colGap)]">';

			foreach($flds['stats'] as $st) {
				echo '<div class="max-lg:max-w-[24rem] max-lg:mx-auto max-lg:mb-[var(--hr)]">';
				if(is_data_okay('title_1', $st)) echo '<p class="text-header text-stroke text-[5rem] lg:text-[6rem] xl:text-[8rem] 2xl:text-[11rem] 2xl: text-[var(--paleGreen)] leading-[0.8] text-center mb-[1.25rem]! pb-0">'.esc_html($st['title_1']).'</p>';
				if(is_data_okay('title_2', $st)) echo '<p class="text-header text-[3rem] xl:text-[4rem] 2xl:text-[5rem] leading-[0.8] text-center mb-[1.5rem]! pb-0">'.esc_html($st['title_2']).'</p>';
				if(is_data_okay('content', $st)) echo '<p>'.esc_html($st['content']).'</p>';
				echo '</div>';
			}

			echo '</div>';
		}
	?>

	</div>
</section>
