(function( $ ) {
	
	//	Storing components...
	
	var smartphone_ = $( window ).width() < 650; // Used in conditionals to check if device is a smartphone
	
	var $body =		$( 'body' );
	var $header =	$( '#header' );
	var $slider =	$( '#slider' );
	
	var sliderExists = $slider.length; // Will be empty if no slider
	
	// Set body styles for the fade
	// Will be called at the start of the fade
	function setBody() {
		//console.log( 'setBody called' );
		
		$header.hide();
		$body.css( 'position', 'fixed' );
		$body.addClass( 'fade-in-progress' );
	}
	
	// Reset body styles from fade
	// Will be called at end of fade
	function resetBody() {
		//console.log( 'resetBody called' );
		
		$body.css( 'position', 'static' );
	}
	
	// Changes header/UI scheme based on the slide value passed in
	function checkSlideScheme( slideNum ) {
		
		//console.log( 'checkSlideScheme called' );
	
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
	
	} // end function
	
	function doSlider( slider, playDuration ) {
		
		//console.log( 'doSlider called' );
		
		if ( typeof playDuration === undefined ) {
			playDuration = 7500;
		}
		
		var args = {
			height: $( window ).height(),
			width: $( window ).width(),
			pagination: {
				active: true
			},
			navigation: {
				active: false
			},
			play: {
				active: false,
				auto: true,
				interval: playDuration,
				restartDelay: 0
			},
			callback: {
				complete: function( slideNum ) {
					checkSlideScheme( slideNum );
				}
			}
		};
		
		slider.slidesjs( args );
		
		return slider;
		
	} // end function
	
	
	//	Two scenarios here.
	//
	//	The first is if there's a slider on the page.
	
	if ( sliderExists ) {
		
		//console.log( 'Slider exists' );
		
		var $block = $( '#slider .block:first-of-type' )
		
		//	If the block is set to fade in, it will.
		if ( $block.hasClass( 'fade' ) && $.cookie( 'home_fade' ) != true && !smartphone_ ) {
			
			
			//	Prep for fading
			setBody();
			
			//	Storing components
			var $blockh1 =				$( '#slider .block:first-of-type h1' );
			var $blockh2 =				$( '#slider .block:first-of-type h2' );
			var $blockp = 				$( '#slider .block:first-of-type p' );
			var $blockContent = 		$( '#slider .block:first-of-type .content' );
			
			//	Set up the slider
			doSlider( $slider, 15000 );
			
			// More prep
			var $sliderUI =	$( '#slider .slidesjs-pagination' );
			
			$slider			.hide();
			$blockh1		.hide();
			$blockh2		.hide();
			$blockp			.hide();
			$blockContent	.hide();
			$sliderUI		.hide();
			
			// Fade progress
			$slider		.fadeIn( 3000 );
			$blockh1	.delay( 3000 )	.fadeIn( 1000 );
			$blockh2					.delay( 5500 )		.fadeIn( 1000 );
			$blockp											.delay( 8500 )		.fadeIn( 1000 );
			$blockContent									.delay( 8500 )		.fadeIn( 1000 );
			$sliderUI										.delay( 8500 )		.fadeIn( 1000 );
			$header											.delay( 8500 )		.fadeIn( 1000, resetBody );
			
			$.cookie( 'home_fade', true, { expires: 5, path: '/' } );
			
		}
		
		//	If the block is not set to fade in, it will not.
		else {
			
			doSlider( $slider );
			
		}
		
	}
	
	//	The second is if there's none.
	
	else if ( $( '.block.fade:first-of-type' ).hasClass( 'fade' ) && $.cookie( 'showcase_fade' ) != true && !smartphone_ ) {
		
		//	Prep for fading
		setBody();
		
		//	Storing components
		var $block =		$( '.block.fade:first-of-type' );
		var $blockh1 =		$( '.block.fade:first-of-type h1' );
		var $blockh2 =		$( '.block.fade:first-of-type h2' );
		var $blockp =		$( '.block.fade:first-of-type p' );
		var $blockContent =	$( '.block.fade:first-of-type .content' );
		
		//	More prep for fading
		$blockh1		.hide();
		$blockh2		.hide();
		$blockp			.hide();
		$blockContent	.hide();
		
		//	Fade progress
		$block		.fadeIn( 3000 );
		$blockh1	.delay( 3000 )	.fadeIn( 1000 );
		$blockh2					.delay( 5500 )		.fadeIn( 1000 );
		$blockp											.delay( 8500 )		.fadeIn( 1000 );
		$blockContent									.delay( 8500 )		.fadeIn( 1000 );
		$header											.delay( 8500 )		.fadeIn( 1000, resetBody );
		
		//	Set cookie to prevent annoying users with the animation time and again.
		//	It'll expire in 5 days, so they'll still sometimes see the animation.
		$.cookie( 'showcase_fade', true, { expires: 5, path: '/' } );
			
	}
	
})( jQuery );
