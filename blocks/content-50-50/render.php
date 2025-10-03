<?php
/**
 * ACF Block Template: Content 50/50
 *
 */

namespace CPRF;

global $extra_class;
$extra_class = "overflow-hidden";

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "xl:grid xl:grid-cols-2 gap-[var(--colGap)] items-center xl:items-end";
$sub_class = "";

if($flds['orientation'] == 'image_right') $con_class .= " direction-rtl text-left"; $sub_class = "ltr";
if(is_data_okay('background_color', $flds) && $flds['background_color'] !== 'default') $con_class .= " ".$flds['background_color'];
?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">
		<div class="image-frame-5050 max-xl:mb-[calc(var(--hr)/2)]">
			<?php if(is_data_okay('image', $flds)) : ?>
				<span></span>
				<img class="relative z-auto" src="<?= $flds['image']['sizes']['large'] ?>" alt="<?= $flds['image']['alt'] ?>" />
			<?php endif; ?>
		</div>
		<div dir="<?= $sub_class; ?>">
			<?php 
				// pr($attributes);
				// pr($flds['image']); 
			?>
			<?php if(is_data_okay('headline', $flds)) : ?>
				<h2><?= $flds['headline'] ?></h2>
			<?php endif; ?>
			<?php if(is_data_okay('content', $flds)) : ?>
				<?= cn($flds['content']) ?>
			<?php endif; ?>
			<?php if(is_data_okay('title', $flds['call_to_action']) && is_data_okay('url', $flds['call_to_action'])) : ?>
				<?= do_shortcode('[button label="'.$flds['call_to_action']['title'].'" url="'.$flds['call_to_action']['url'].'"]'); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
