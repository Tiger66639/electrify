(function($) {
	
	//	RESPONSIVE NAVIGATION FUNCTIONALITY
	//
	//	This file makes sure that the responsive navigation behaves as it should. CSS does most
	//	of the heavy lifting here, but JavaScript enables a couple bells and whistles that makes
	//	the result more aesthetically pleasing.
	
	// Setting up variables for later reference
	var $nav = $( '#nav-mobile' );
	var $revealNav = $( '#mobile-reveal-nav' );
	var width = $( window ).width();
	var prevWidth;
	
	if ( ! $nav.length ) {
		$nav = $( '#nav-showcase-mobile' );
	}
	
	function redrawNav() {
		prevWidth = width;
		//width = $( window ).width();
	
		// This will reset the normal state of the navigation.
		if ( width < 650 ) {
			$nav.addClass( 'collapsed' ).css({ display: 'block' }).hide();
		} else if ( width >= 650 ) {
			$nav.show().css({ display: 'flex', display: '-webkit-flex' });
		}
	}
	
	// Upon resize, we need to reset the width variable.
	$( window ).resize( redrawNav ); //end resize
	
	
	// Make sure that the menu is collapsed at the start
	if ( width < 650 ) {
		$nav.addClass( 'collapsed' ).css({ display: 'block' }).hide();
	}
	
	//	REVEAL NAV (on click/tap)
	//
	//	When the button to reveal the nav is clicked/tapped, the nav should
	//		1	Switch classes from "collapsed" to "opened" so we can track its state
	//		2	Slide down to reveal the mobile nav
	//		3	Blur the button (aesthetics, does not contribute to functionality)
	//	Of course, when clicked/tapped again, the button and nav should revert back to their previous states.
	
	$revealNav.click( function() {
		if ( $nav.hasClass( 'collapsed' ) ) {
			$nav.removeClass( 'collapsed' ).addClass( 'opened' );
			$nav.slideDown( 100 );
			$revealNav.blur();
		} else if ( $nav.hasClass( 'opened' ) ) {
			$nav.removeClass( 'opened' ).addClass( 'collapsed' );
			$nav.slideUp( 100 );
			$revealNav.blur();
		}
	} ); //end click

	//	SEARCHBOX
	//
	//	On click, this menu item will reveal a search form that the user may use.

	// Setting up variables.
	var $searchButton = $( '[href="#search-from-nav"]' );
	var $searchBox = $( '#search-from-nav' );
	
	//	The "collapsed" and "opened" classes track the state of the box.
	//	The button also makes the nav slide up and down.
	$searchButton.click( function() {
		if ( $searchBox.hasClass( 'collapsed' ) ) {
			$searchBox.slideDown( 100 );
			$searchBox.removeClass( 'collapsed' ).addClass( 'opened' );
		} else if ( $searchBox.hasClass( 'opened' ) ) {
			$searchBox.slideUp( 100 );
			$searchBox.removeClass( 'opened' ).addClass( 'collapsed' );
		}
		
		return false; // Prevents the browser from executing its default functionality.

	} ); //end click

})( jQuery );