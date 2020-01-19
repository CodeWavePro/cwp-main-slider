<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$uri = fw_get_template_customizations_directory_uri( '/extensions/shortcodes/shortcodes/cwp-main-slider' );

	// Check if Owl Carousel 2 script and styles are registered (enqueued).
	if ( !wp_script_is( 'cwp-owl-carousel-2-script', 'enqueued' ) ) {
		wp_enqueue_script(
			'cwp-owl-carousel-2-script',
			$uri . '/static/libs/js/owl.carousel.min.js',
			['jquery']
		);
	}

	if ( !wp_style_is( 'cwp-owl-carousel-2-css', 'enqueued' ) ) {
		wp_enqueue_style(
			'cwp-owl-carousel-2-css',
			$uri . '/static/libs/css/owl.carousel.min.css'
		);
	}

	if ( !wp_style_is( 'cwp-owl-carousel-2-theme-css', 'enqueued' ) ) {
		wp_enqueue_style(
			'cwp-owl-carousel-2-theme-css',
			$uri . '/static/libs/css/owl.theme.default.min.css'
		);
	}
	//------------ End of Owl Carousel scripts and styles. ------------

	//------------ CWP-Slider scripts and styles. ------------
	if ( !wp_script_is( 'fw-shortcode-cwp-main-slider-js', 'enqueued' ) ) {
		wp_enqueue_script(
		    'fw-shortcode-cwp-main-slider-js',
		    $uri . '/static/js/scripts.min.js',
		    ['jquery']
		);
	}

	if ( !wp_style_is( 'fw-shortcode-cwp-main-slider-css', 'enqueued' ) ) {
		wp_enqueue_style(
		    'fw-shortcode-cwp-main-slider-css',
		    $uri . '/static/css/css/style.min.css'
		);
	}
	//------------ End of CWP-Slider scripts and styles. ------------
}