<?php
/**
 * Title: Header
 * Slug: cprf/header
 * *
 * @package cprf
 * @since 1.0.0
 */

	$flds = get_fields('Options');
	$w = 250;
	$h = 150;
	$l = $w / 2;

	$nav_items = wp_get_nav_menu_items('main-navigation');

	if(!is_404()) $curr_page = get_permalink(pID()); else $curr_page = '';

	$nav_total = count($nav_items);
	$nav_a = ceil($nav_total/2);
	$nav_b = floor($nav_total/2);

	function get_current($i,$j) {
		if(str_contains($j, $i)) {
			return ' class="current"';
		} else {
			return '';
		}
	}

	function nav_item($i,$j) {
		$bcls = 'block font-medium px-[2rem] xl:px-[0.75rem] 2xl:px-[1.25rem] py-[0.5rem] border-[4px] border-white transition-all duration-[0.35s] ease-in-out';
		if(!is_404()) $cls = get_current($i->url,$j); else $cls = '';
		if($i->classes[0] && $i->classes[0] !== '') $bcls .= ' ' . $i->classes[0];
		?><li<?= $cls; ?>>
				<a href="<?= $i->url ?>" class="<?= $bcls; ?>"><span class="relative"><?= $i->title; ?></span></a></li><?php
	}

	$nav_class = "uppercase xl:flex xl:justify-between xl:w-[35%] text-[1rem] 2xl:text-[1.2rem]";

?>

<script>
	// let there be load effect
	const bodyForLoad = document.querySelector('body');
	bodyForLoad.classList.add('arm-fade');
 	setTimeout(() => { bodyForLoad.classList.add('fade-it'); }, 10);
</script>

<div class="max-xl:bg-[var(--darkOlive)] xl:border-b-4 xl:border-[var(--darkOlive)] fixed top-0 w-full bg-white max-xl:h-[var(--mobileHeader)] z-2">
	<div class="px-4 xl:px-12 flex max-xl:justify-between items-center xl:h-[90px] relative">
		<a class="block absolute top-[0] max-xl:overflow-hidden max-xl:h-[56px] max-xl:left-[0] xl:w-[<?= $w ?>px] xl:h-[<?= $h ?>px]" style="right: calc(50vw - <?= $l ?>px)" href="<?php echo site_url(); ?>" title="<?= get_bloginfo('site_title') ?>">
			<h1 class="site-logo relative max-xl:absolute max-xl:top-[-68px] max-xl:left-[-4px] z-2 leading-[0.8]! text-center uppercase text-3xl md:text-4xl xl:text-5xl">
				<?php svg('cprf_logo') ?>
			</h1>
		</a>

		<nav class="nav max-xl:h-[var(--mobileNavHeight)] z-[1] max-xl:w-[var(--mobileNavWidth)] max-xl:overflow-hidden w-full max-xl:absolute max-xl:top-[56px] max-xl:left-[100%] max-xl:bg-[#ffffff] xl:flex xl:justify-between xl:items-center">

			<ul class="<?= $nav_class; ?>">
				<?php for($i = 0; $i < $nav_b; $i++ ) nav_item($nav_items[$i],$curr_page); ?>
			</ul>

			<ul class="<?= $nav_class; ?>">
				<?php for($i = $nav_a; $i < $nav_total; $i++ ) nav_item($nav_items[$i],$curr_page); ?>
			</ul>

		</nav>

		<button id="mobile-menu" class="block absolute right-[0.75rem] top-[0.7rem] z-2 xl:hidden! bg-[var(--darkOlive)]!" aria-expanded="false" aria-haspopup="true" aria-controls="primary-menu" aria-label="Open Main Menu">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</button>

		<div class="cover absolute hidden xl:hidden! top-[var(--mobileHeader)] left-[0] w-[100vw] h-[100vh] z-[0] opacity-[75%] bg-[var(--darkOlive)] transition-[background_0.2s_ease-in-out]"></div>
	</div>
</div>
