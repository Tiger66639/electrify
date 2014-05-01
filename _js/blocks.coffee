(( $ ) ->
	
	# args = 
	# 	width: $( window ).width()
	# 	height: $( window ).height()
	# 	pagination:
	# 		active: true
	# 	
	# 	navigation:
	# 		active: false
	# 	
	# 	play:
	# 		active: false
	# 		auto: true
	# 		interval: 7500
	# 		restartDelay: 0
	# 	
	# 	callback:
	# 		complete: (slideNum) -> 
	# 			checkSlideScheme slideNum	
	# 
	# $( '#slider' ).slidesjs args
		
	
	mobile_ = $( window ).width() < 950
	
	$body = $ 'body'
	$slider = $ '#slider'
	$header = $ '#header'
	
	$slider_ = $slider.length
	
	setBody = ->
		$body.css 'position', 'fixed'
		$body.addClass 'fade-in-progress'
	
	resetBody = ->
		$body.css 'position', 'static'
		$body.removeClass 'fade-in-progress'
	
	checkSlideScheme = ( slideNum ) ->
		slideNum--
		
		$current = $ 'section[slidesjs-index="' + slideNum + '"]'
		
		slideScheme = $current.attr 'data-slide-scheme'
		uiScheme = $header.attr 'data-ui-scheme'
		
		if slideScheme != uiScheme
			$header.attr 'data-ui-scheme', slideScheme
			$slider.attr 'data-ui-scheme', slideScheme
		
		slideImgBg_ = $current.hasClass 'photo'
		uiShadows = $header.attr 'data-img-background'
		
		if slideImgBg_ != uiShadows
			$header.attr 'data-img-background', slideImgBg_.toString()
			$slider.attr 'data-img-background', slideImgBg_.toString()
		
		slideNum
	# end checkSlideScheme
	
	#	SKIP FADE
	#
	#	Bind to a event and pass in an array of elements to skip the fade on.	  
	skipfade = ( $selectors... ) ->
		for $elem in $selectors
			console.log $elem
			$elem.stop true, true
	
	# end skipfade
	
	
	doSlider = ( $slider, duration = 7500 ) ->
		
		args = 
			width: $( window ).width()
			height: $( window ).height()
			pagination:
				active: true
			
			navigation:
				active: false
			
			play:
				active: false
				auto: true
				interval: duration
				restartDelay: 0
				pauseOnClick: true
			
			callback:
				complete: (slideNum) -> 
					checkSlideScheme slideNum		
		
		if ! mobile_
			$slider.slidesjs args
			
		$slider
	
	# end doSlider
	
	properties =
		opacity: 1
	
	options =
		duration: 1000
	
	optionsFirst =
		duration: 3000
	
	optionsFinal =
		duration: 1000
		complete: resetBody
	
	if $slider_
		$block = $ '#slider .block:first-of-type'
		
		if !mobile_
			if $block.hasClass 'fade'
				setBody()
			
				$blockh1 =			$ '#slider .block:first-of-type h1'
				$blockh2 =			$ '#slider .block:first-of-type h2'
				$blockp =			$ '#slider .block:first-of-type .headers p'
				$blockContent =		$ '#slider .block:first-of-type .content'
			
				doSlider $slider, 15000
			
				$sliderUi = $ '#slider .slidesjs-pagination'
				
				$( document ).click ->
					skipfade [$blockh1, $blockh2, $blockp, $blockContent, $sliderUi, $header]
				
				$header			.css 'opacity', '0'
				$slider			.css 'opacity', '0'
				$blockh1		.css 'opacity', '0'
				$blockh2		.css 'opacity', '0'
				$blockp			.css 'opacity', '0'
				$blockContent	.css 'opacity', '0'
				$sliderUi		.css 'opacity', '0'
			
				#	Fade progress
			
				$slider		.animate properties, optionsFirst
				$blockh1	.delay( 3000 )	.animate properties, options
				$blockh2					.delay( 5500 )		.animate properties, options
				$blockp											.delay( 8500 )		.animate properties, options
				$blockContent									.delay( 8500 )		.animate properties, options
				$sliderUi										.delay( 8500 )		.animate properties, options
				$header											.delay( 8500 )		.animate properties, optionsFinal
		
			else
				doSlider( $slider )
		
	else
		if !mobile_
			$block = $ 'body .block:first-of-type'
		
			if $block.hasClass 'fade'
			
				setBody()
			
				$blockh1 =			$ '.block:first-of-type h1'
				$blockh2 =			$ '.block:first-of-type h2'
				$blockp =			$ '.block:first-of-type .headers p'
				$blockContent =		$ '.block:first-of-type .content'
			
				$( document ).click ->
					skipfade $blockh1, $blockh2, $blockp, $blockContent, $header
				
				$block			.css 'opacity', '0'
				$header			.css 'opacity', '0'
				$blockh1		.css 'opacity', '0'
				$blockh2		.css 'opacity', '0'
				$blockp			.css 'opacity', '0'
				$blockContent	.css 'opacity', '0'
			
				#	Fade progress
				
				$block		.animate properties, optionsFirst
				$blockh1	.delay( 3000 )	.animate properties, options
				$blockh2					.delay( 5500 )		.animate properties, options
				$blockp											.delay( 8500 )		.animate properties, options
				$blockContent									.delay( 8500 )		.animate properties, options
				$header											.delay( 8500 )		.animate properties, optionsFinal
	
	
) jQuery
