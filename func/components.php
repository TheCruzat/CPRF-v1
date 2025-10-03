<?php



// page title
function page_title($tit = null) {
	if($tit) {
		$title = $tit;
	} else {
		$title = get_the_title();
	}
	echo '<h1 class="page-title min-md:max-w-75/100 min-lg:max-w-66/100 text-[length:var(--h1)]/[var(--lineHeightHeader)] text-[var(--title-color)] mb-4 md:mb-8 xl:mb-12 relative">'.$title.'</h1>';
}

function svg($src = null, $class = null) {
	if(!$src) {
		echo "Error, filename required";
	} else {
		$path = thm() . '/assets/img/' . $src;
		$path = str_replace(['.svg','.SVG'],'', $path);
		$path .= '.svg';
		$svg = file_get_contents($path);
		echo $svg;
	}
}
