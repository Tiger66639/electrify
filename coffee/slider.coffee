( ( $ ) ->
	$ ->
		
		$window = $ window
		$doc = $ document
		
		width = $window.width()
		mobile = width < 950
		
		$slider =		$ '#slider'
		$h =				$ '#h,#h-showcase'
		$b =				$ 'body'
		$html =			$ 'html'
		
		numSlides = $slider.children().length
		
		$window.resize ->
			width = $window.width()
			mobile = width < 950
		
		currentScheme = null
		
		findSlideById = ( slideId ) ->
			slideId--
			return $ '#slider .slidesjs-slide[slidesjs-index="' + slideId.toString() + '"]'
		
		findSlideSchemeById = ( slideId ) ->
			return findSlideById( slideId ).attr 'data-scheme'
		
		findSlideBkImgById = ( slideId ) ->
			return findSlideById( slideId ).hasClass 'bg-img'
		
		sliderInit = ( slideNum ) ->
			scheme = findSlideSchemeById slideNum
			$h.addClass scheme
			$slider.addClass scheme
			currentScheme = scheme
		
		sliderFinish = ( slideNum ) ->
			newScheme = findSlideSchemeById slideNum
			if currentScheme isnt newScheme
				currentScheme = newScheme
				$h.toggleClass 'light'
				$h.toggleClass 'dark'
				$slider.toggleClass 'light'
				$slider.toggleClass 'dark'
			
			if findSlideBkImgById slideNum isnt $h.hasClass 'shadow'
				$h.toggleClass 'shadow'
			
		
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
		
		fadeFinish = ->
			$b.removeClass 'fade-in-progress'
			$b.css 'position', 'static'
				
		$block = null;
		
		if numSlides is 0
			$block = $ '#a .block:first-of-type'
			
			if $block.hasClass 'fade' and not mobile
				# We need to fade in on this block
				#
				# Make some new selectors...
				#
				$b							= $ 'body'
				$blockh1				= $ '#a .block:first-of-type h1'
				$blockh2				= $ '#a .block:first-of-type h2'
				$blockp					= $ '#a .block:first-of-type p'
				$blockContent		= $ '#a .block:first-of-type .content'
				#
				# Set initial styling...
				#
				$b.css 'position', 'fixed'
				$b.addClass 'fade-in-progress'
				#
				propsInit =
					opacity: 0
					'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"'
				#
				$block					.css propsInit
				$h							.css propsInit
				$blockh1				.css propsInit
				$blockh2				.css propsInit
				$blockp					.css propsInit
				$blockContent		.css propsInit
				#
				# Allow the user to skip the animation by double-clicking...
				#
				$doc.one 'dblclick', ->
					$block				.stop true, true
					$h						.stop true, true
					$blockh1			.stop true, true
					$blockh2			.stop true, true
					$blockp				.stop true, true
					$blockContent	.stop true, true
					
					$block				.css propsFinal
					$h						.css propsFinal
					$blockh1			.css propsFinal
					$blockh2			.css propsFinal
					$blockp				.css propsFinal
					$blockContent	.css propsFinal
					
					fadeFinish()
					
				#
				# Begin to animate the fade
				#
				propsFinal =
					opacity: 1
					'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"'
				#
				$block					.delay( 1500 ).animate( propsFinal, 3000 )
				$blockh1				.delay( 5000 )												.animate( propsFinal, 1500 )
				$blockh2				.delay( 8000 )																								.animate( propsFinal, 1500 )
				$blockp					.delay( 11000 )																																				.animate( propsFinal, 1500 )
				$blockContent		.delay( 11000 )																																				.animate( propsFinal, 1500 )
				$h							.delay( 11000 )																																				.animate( propsFinal, 1500, 'swing', fadeFinish )
				#
			
		else
			$block = $ '#slider .block:first-of-type'
			
			if not mobile and $block.hasClass 'fade'
				# We need to fade in on this block
				#
				# Start the slider up so that it can be selected later...
				#
				doSlider 17500
				#
				# Make some new selectors...
				#
				$b							= $ 'body'
				$pag						= $ '#slider .slidesjs-pagination'
				$blockh1				= $ '#slider .block:first-of-type h1'
				$blockh2				= $ '#slider .block:first-of-type h2'
				$blockp					= $ '#slider .block:first-of-type p'
				$blockContent		= $ '#slider .block:first-of-type .content'
				#
				# Set initial styling...
				#
				$b.css 'position', 'fixed'
				$b.addClass 'fade-in-progress'
				#
				propsInit =
					opacity: 0
					'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"'
				#		
				$block					.css propsInit
				$h							.css propsInit
				$pag						.css propsInit
				$blockh1				.css propsInit
				$blockh2				.css propsInit
				$blockp					.css propsInit
				$blockContent		.css propsInit
				#
				# Allow the user to skip the animation by double-clicking...
				#
				$doc.one 'dblclick', ->
					$block				.stop true, true
					$h						.stop true, true
					$pag					.stop true, true
					$blockh1			.stop true, true
					$blockh2			.stop true, true
					$blockp				.stop true, true
					$blockContent	.stop true, true
					
					$block				.css propsFinal
					$h						.css propsFinal
					$pag					.css propsFinal
					$blockh1			.css propsFinal
					$blockh2			.css propsFinal
					$blockp				.css propsFinal
					$blockContent	.css propsFinal
					
					fadeFinish()
					
				#
				# Begin to animate the fade
				#
				propsFinal =
					opacity: 1
					'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"'
				#
				$block					.delay( 1500 ).animate( propsFinal, 3000 )
				$blockh1				.delay( 5000 )												.animate( propsFinal, 1500 )
				$blockh2				.delay( 8000 )																								.animate( propsFinal, 1500 )
				$blockp					.delay( 11000 )																																				.animate( propsFinal, 1500 )
				$blockContent		.delay( 11000 )																																				.animate( propsFinal, 1500 )
				$pag						.delay( 11000 )																																				.animate( propsFinal, 1500 )
				$h							.delay( 11000 )																																				.animate( propsFinal, 1500, 'swing', fadeFinish )
				#
			
			else if not mobile then doSlider()
		
) jQuery
