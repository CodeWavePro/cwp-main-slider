jQuery( function( $ ) {

	/**
	 * When all page is loaded.
	 */
	$( document ).ready( function() {

		var owl, sliderItems, sliderTimer, sliderEffect, isAutoplay;
		var scene, parallax;

		/*
		 * Owl Slider.
		 */
		if ( $( 'div' ).hasClass( 'cwp-slider' ) ) {	// If slider div exists.
			owl = $( '.cwp-slider' );					// Short call to slider wrapper.
			sliderItems = parseInt( owl.attr( 'data-slides' ) );	// Count of slides in data-attribute 'data-slides' of slider wrapper.
			sliderTimer = parseInt( owl.attr( 'data-timer' ) );		// Count of miliseconds in data-attribute 'data-timer' of slider wrapper.
			sliderEffect = owl.attr( 'data-effect' );	// Sliding effect in data-attribute 'data-effect' of slider wrapper.
			isAutoplay = owl.attr( 'data-autoplay' );	// Autoplay or not slider in data-attribute 'data-autoplay' of slider wrapper.

			isAutoplay = ( isAutoplay === 'false' ) ? false : true;

			owl.owlCarousel( {	// Slider initialization.
				items 				: sliderItems,
		    	animateOut 			: sliderEffect,
		    	loop 				: true,
			    margin 				: 0,
			    nav 				: true,
			    navText				: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			    dots 				: false,
			    autoplay 			: isAutoplay,
			    autoplayHoverPause 	: false,
			    lazyLoad			: true,
			    autoplayTimeout		: sliderTimer
		    } );

		    /////////////////// Slider item elements animation ///////////////////

		    /**
			 * When Owl slide is active once after page load.
			 */
			$( '.owl-item.active .cwp-slide__image', owl ).addClass( 'fadeInRight' );
			$( '.owl-item.active .cwp-slide-text__header, .owl-item.active .cwp-slide-text__description', owl ).addClass( 'fadeInLeft' );
			$( '.owl-item.active .cwp-slide-icons', owl ).addClass( 'fadeInUp' );

			/**
			 * When Owl slide is active after navigation button click.
			 */
			$( '.owl-nav button', owl ).on( 'click', function() {
				$( '.cwp-slide__image', owl ).removeClass( 'fadeInRight' );	// Remove animation from images on all slides.
				$( '.cwp-slide-text__header, .cwp-slide-text__description', owl ).removeClass( 'fadeInLeft' );	// Remove animation from titles & descriptions on all slides.
				$( '.cwp-slide-icons', owl ).removeClass( 'fadeInUp' );	// Remove animation from social icons on all slides.

				$( '.owl-item.active .cwp-slide__image', owl ).addClass( 'fadeInRight' );	// Add animation only to active slide image.
				$( '.owl-item.active .cwp-slide-text__header, .owl-item.active .cwp-slide-text__description', owl ).addClass( 'fadeInLeft' );	// Add animation only to active slide header & description.
				$( '.owl-item.active .cwp-slide-icons', owl ).addClass( 'fadeInUp' );	// Add animation only to active slide social icons.
			} );
		}

	} );

} );