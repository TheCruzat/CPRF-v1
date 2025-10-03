<?php

// [button]

function sc_button($atts) {
	$a = shortcode_atts( [
		'label' => 'label required',
		'id' => null,
		'class' => null,
		'slug' => null,
		'url' => null,
		'new' => null
	], $atts );

	$class = '';

	if($a['slug'] || $a['url']) {
		$tag = 'a';
		$class .= 'button';
		if($a['class']) {
			$class .= ' ';
		}
		if($a['slug']) {
			$url = site_url().'/'.$a['slug'];
		}
		if($a['url']) {
			$url = $a['url'];
		}

	} else {
		$tag = 'button';
	}

	if($a['class']) {
		$class .= $a['class'];
	}


	$str = '';

	$str .= '<'.$tag;
	if($a['id']) {
	 $str .= ' id="'.$a['id'].'"';
	}
	if($class != '') {
	 $str .= ' class="'.$class.'"';
	}
	if($url) {
	 $str .= ' href="'.$url.'"';
	 if($a['new']) {
	 	$str .= ' target="_blank"';
	 }
	}
	$str .= '>' . $a['label'] . '</'.$tag.'>';

	return $str;

}
add_shortcode('button','sc_button');


// [resume-button]

function sc_resume_button($atts) {
	$a = shortcode_atts( [
		'label' => 'label required'
	], $atts );

	global $flds;
	$rdb = $flds['resume_download'];

	if($rdb['file'] !== null) {
		return do_shortcode('[button label="'.$a['label'].'" url="'.$rdb['file']['url'].'"]');
	}
}
add_shortcode('resume-button', 'sc_resume_button');


// [copyright-year]

function sc_copyright_year($atts) {
	$a = shortcode_atts( [
		'prefix' => 'Copyright',
		'symbol' => '&copy;',
		'start-year' => null
	], $atts );

	$start = '';
	$year = date('Y');
	if($a['start-year'] !== null && $a['start-year'] !== $year) $start = $a['start-year'] . '-';

	$str = $a['prefix'] . ' ' . $a['symbol'] . $year;

	return $str;
}
add_shortcode('copyright-year', 'sc_copyright_year');


// [site-title]

function sc_site_title() { return get_bloginfo('site-title'); }
add_shortcode('site-title', 'sc_site_title');


// [url]

add_shortcode('url', 'url');


// [footer-inline-nav]

function sc_footer_inline_menu() {
	$fnav = get_field('footer_nav', 'options');
	$str = '<ul>';
	foreach($fnav as $coun => $nav) { $n = $nav['link'];
		$str .= '<li><a href="'.do_shortcode($n['url']).'" title="'.$n['title'].'" aria-label="'.$n['title'].'">'.$n['title'].'</a>';
		if($coun < (count($fnav) - 1) ) {
			$str .= '&nbsp;|&nbsp;';
		}
		$str .= '</li>';
	}
	$str .= '</ul>';
	return $str;
}
add_shortcode('footer-inline-nav', 'sc_footer_inline_menu');

