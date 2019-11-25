<?php if ( !defined( 'FW' ) ) die( 'Forbidden' );

$uri = fw_get_template_customizations_directory_uri( '/extensions/shortcodes/shortcodes/cwp-main-slider' );
wp_enqueue_style(
    'fw-shortcode-cwp-main-slider',
    $uri . '/static/css/styles.css'
);
wp_enqueue_script(
    'fw-shortcode-cwp-main-slider',
    $uri . '/static/js/scripts.min.js'
);

if ( !is_admin() ) {
	$uri = fw_get_template_customizations_directory_uri( '/extensions/shortcodes/shortcodes/cwp-main-slider' );

	// Check if Owl Carousel 2 script and styles are registered (enqueued).
	if ( wp_script_is( 'cwp-owl-carousel-2-script', 'queue' ) ) {
		return false;
	}	else {
		wp_enqueue_script(
			'cwp-owl-carousel-2-script',
			$uri . '/static/libs/js/owl.carousel.min.js',
			array( 'jquery' )
		);
	}

	if ( wp_style_is( 'cwp-owl-carousel-2-css', 'queue' ) ) {
		return false;
	}	else {
		wp_enqueue_style(
			'cwp-owl-carousel-2-css',
			$uri . '/static/libs/css/owl.carousel.min.css'
		);
	}

	if ( wp_style_is( 'cwp-owl-carousel-2-theme-css', 'queue' ) ) {
		return false;
	}	else {
		wp_enqueue_style(
			'cwp-owl-carousel-2-theme-css',
			$uri . '/static/libs/css/owl.theme.default.min.css'
		);
	}
}