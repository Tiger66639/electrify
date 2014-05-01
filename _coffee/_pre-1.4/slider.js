/*
//	SLIDER FUNCTIONALITY
//
//	This file sets up the homepage slider and makes sure that it behaves properly.

(function($) {
	
	// This function will check the color scheme for the slide of the index given.
	
	function checkSlideScheme( slideNum ) {
		
		slideNum--;
		
		var slideScheme = $( 'section[slidesjs-index="' + slideNum + '"]' ).attr( 'data-slide-scheme' );
		var UIscheme = $( '#header' ).attr( 'data-ui-scheme' );
		
		if ( slideScheme != UIscheme ) {
			
			$( '#header' ).attr( 'data-ui-scheme', slideScheme );
			$( '#slider' ).attr( 'data-ui-scheme', slideScheme );
			
		}
		
		var slideImgBackground = $( 'section[slidesjs-index="' + slideNum + '"]' ).hasClass( 'photo' );
		var UIshadows = $( '#header' ).attr( 'data-img-background' );
		
		if ( slideImgBackground != UIshadows ) {
			
			$( '#header' ).attr( 'data-img-background', slideImgBackground.toString() );
			$( '#slider' ).attr( 'data-img-background', slideImgBackground.toString() );
			
		}
		
	}
	
	//	Slider setup
	
	// The slider fills the entire viewport upon initiation.
	var width = $( window ).width();
	var height = $( window ).height();
	
	var args = {
		height: height, // Using our custom variable
		width: width, // Using our custom variable
		pagination: {
			active: true
		},
		navigation: {
			active: false
		},
		play: {
			active: false,
			auto: true,
			interval: 7500,
			restartDelay: 0
		},
		callback: {
			start: function( slideNum ) {
				checkSlideScheme( slideNum );
			},
			complete: function( slideNum ) {
				checkSlideScheme( slideNum );
			}
		}
	};
	
	// If we're not on smartphones, then we'll display the slider.
	if ( width >= 650 ) {
		$( '#slider' ).slidesjs( args );
	}
	
	// I already tried to make the slider respond to resizing, but the browser bugged out on that one.
	// Might try again later...
	// It works well enough for now.
	
	
	//	iPAD SHIMS
	//
	//	Now, iPad Safari displays a boatload of extra padding on top of the homepage.
	//	We'll try to mitigate that here...
	
	var agent = navigator.userAgent.toString(); // User's browser.
	var ipad = agent.indexOf( 'iPad' ) + 1; // Is it the iPad's browser?
	
	if ( ipad ) { // If so...
		$( 'body' ).addClass( 'ipad' ); // We'll use CSS to style the content appropriately.
	}
	
})( jQuery );*/
