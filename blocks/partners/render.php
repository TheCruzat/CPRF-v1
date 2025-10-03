<?php
/**
 * ACF Block Template: Partners
 *
 */

namespace CPRF;

global $extra_class;
$extra_class = "bg-[var(--fullCyan)]";

include(dirname(__FILE__) . '/../block-meta.php');

$flds = get_fields('options');

$con_class = "text-center";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

		<?php

		if(is_data_okay('partners_title', $flds)) echo '<h2 class="max-md:mb-[var(--hr)/2]">' . strip_tags(cn(esc_html($flds['partners_title'])), '<br>') . '</h2>';

		if(is_data_okay('partners', $flds)) {
			echo '<div class="lg:inline-flex lg:w-[auto] lg:items-center lg:gap-[3rem]">';

			foreach($flds['partners'] as $coun => $pnr) {
				// pr($pnr);
				if(is_data_okay('link', $pnr) && is_data_okay('logo', $pnr)) {
					echo '<a class="max-w-[180px] mx-auto block mb-[calc(var(--hr)/2)]" href="'.esc_url($pnr['link']).'" target="_blank"><img src="'.$pnr['logo']['url'].'" alt="'.esc_html($pnr['logo']['alt']).'" class="mx-auto block max-h-[100px]" /></a>';
				}

			}

			echo '</div>';
		}

		if(is_data_okay('partners_cta', $flds)) if($cta = $flds['partners_cta']) echo '<div class="w-full"></div>' . do_shortcode('[button new="'.$cta['target'].'" url="'.$cta['url'].'" label="'.$cta['title'].'"]');

		?>

	</div>
</section>
