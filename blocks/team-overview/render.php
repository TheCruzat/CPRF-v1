<?php
/**
 * ACF Block Template: Team Overview
 *
 */

namespace CPRF;

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "md:grid md:grid-cols-3 md:gap-[4rem]";
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">

		<?php
			if(is_data_okay('team_member_selector', $flds)) {
				foreach($flds['team_member_selector'] as $coun => $team) {
					$f = get_fields($team->ID);
					echo '<div class="cursor-pointer max-md:mb-[3rem]" data-lb-type="team" data-lb-id="'.$team->ID.'">';
					echo 	'<img class="w-full mb-[1.5rem]" src="'.get_the_post_thumbnail_url($team->ID, 'medium').'" alt="">';
					echo 	'<h3 class="mb-[0.75rem]! text-[1rem]">'.$team->post_title.'</h3>';
					if(is_data_okay('role', $f)) {
						echo '<p>'.$f['role'].'</p>';
					}
					echo '</div>';
				}
			}
		?>

	</div>
</section>
