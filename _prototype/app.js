$( document ).ready( function() {
	
	//Slider stuff
	
	var args = {
		height: $( window ).height(),
		width: $( window ).width(),
		play: {
			active: false
		}
	};
	
	$( '.slider' ).slidesjs( args );
	
} );