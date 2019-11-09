jQuery( function( $ ) {

	/**
	 * When all page is loaded.
	 */
	$( document ).ready( function() {

		/**
		 * Owl Slider.
		 */
		if ( $( 'div' ).hasClass( 'cwp-slider' ) ) {
			var owl = $( '.cwp-slider' );
			var sliderItems = parseInt( owl.attr( 'data-slides' ) );
			var sliderTimer = parseInt( owl.attr( 'data-timer' ) );
			var sliderEffect = owl.attr( 'data-effect' );

			owl.owlCarousel( {
				items 				: sliderItems,
		    	animateOut 			: sliderEffect,
		    	loop 				: true,
			    margin 				: 0,
			    nav 				: true,
			    navText				: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			    dots 				: false,
			    autoplay 			: true,
			    autoplayHoverPause 	: false,
			    lazyLoad			: true,
			    autoplayTimeout		: sliderTimer
		    } );
		}

	} );

	/**
	 * When window scrolled.
	 */
	$( window ).on( 'scroll', function() {
		var st = $( this ).scrollTop();

		if ( $( 'div' ).hasClass( 'cwp-slider' ) ) {
			$( '.cwp-slider .cwp-slide' ).css( 'background-position', 'center ' + ( st / 7 ) + 'px' );
		}
	} );

} );