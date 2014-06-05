( ( $ ) ->
	$ ->
		
		$window = $ window
		
		width = $window.width()
		mobile = width < 650
		
		$window.resize ->
			width = $window.width()
			mobile = width < 650
		
		currentScheme = null
		
		$slider = $ '#slider'
		$header = $ '#h'
		
		findSlideSchemeById = ( slideId ) ->
			slideId--
			return $( '#slider .slidesjs-slide[slidesjs-index="' + slideId.toString() + '"]' ).attr 'data-scheme'
		
		sliderInit = ( slideNum ) ->
			scheme = findSlideSchemeById slideNum
			$header.addClass scheme
			$slider.addClass scheme
			currentScheme = scheme
		
		changeScheme = ( newScheme ) ->
			$header.toggleClass 'light'
			$header.toggleClass 'dark'
			$slider.toggleClass 'light'
			$slider.toggleClass 'dark'
			
			if currentScheme isnt newScheme
				currentScheme = newScheme
		
		sliderFinish = ( slideNum ) ->
			newScheme = findSlideSchemeById slideNum
			changeScheme newScheme
		
		doSlider = ( interval = 5000 ) ->
			args =
				width: width
				height: $( window ).height()
				navigation:
					active: false
				pagination:
					active: true
					effect: "fade"
				play:
					active: false
					effect: "fade"
					interval: interval
					auto: true
					pauseOnHover: false
				fade:
					speed: 10000
					crossfade: true
				callback:
					loaded: sliderInit
					complete: sliderFinish
					
			$slider.slidesjs args
				
		if not mobile
			doSlider()
		
) jQuery
