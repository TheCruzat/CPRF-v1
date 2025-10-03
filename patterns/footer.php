<?php
/**
 * Title: Footer
 * Slug: cprf/footer
 *
 * @package cprf
 * @since 1.0.0
 * */

		$opt = get_fields('options'); ?>

		<div id="lb"></div>

		<div>
			<div class="container text-sm mx-auto px-4 md:px-8 py-4 flex max-md:flex-col justify-center md:justify-between items-center max-w-6xl xl:max-w-7xl">
				<p class="md:mb-0 max-md:mb-[calc(var(--hr)/6)] max-md:text-center"><?= strip_tags( cn($opt['footer_content']), ['a', 'br'] ); ?><p>
				<p><a class="signature" target="_blank" title="site by e+c" href="//eencee.me">
					<?php
					$str = '<span>[&nbsp;</span>';
					$str .= '<span>site by&nbsp;</span>';
					$str .= '<span>e</span>';
					$str .= '<span>llsworth</span>';
					$str .= '<span>&nbsp;+&nbsp;c</span>';
					$str .= '<span>ruzat</span>';
					$str .= '<span>&nbsp;]</span>';
					echo $str ?>
				</a></p>
			</div>
		</div>

		<script>
			const siteURL = "<?= url(); ?>";
		</script>

