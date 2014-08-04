( ( $ ) ->
	$ ->
		
		# Basic selector storage
		#
		
		$win = $ window
		$doc = $ document
		
		$slider =		$ '#slider'
		$h =				$ '#h,#h-showcase'
		$b =				$ 'body'
		$html =			$ 'html'
		
		# Checks to see if we're on a mobile device.
		#
		width = $win.width()
		mobile = width < 950
		
		# On resize, check to see if still on mobile screen
		#
		$win.resize ->
			width = $win.width()
			mobile = width < 950
		
		# Number of slides in the slider
		#
		numSlides = $slider.children().length
		
		# Stores the current slide scheme
		#
		currentScheme = null
		
		# Returns the jQuery object for a slide by its ID
		#param slideID (int) the ID of the slide
		#
		findSlideById = ( slideId ) ->
			$slider.find '.slidesjs-slide[slidesjs-index="' + ( slideId - 1 ).toString() + '"]'
		
		# Returns the slide scheme for a specific slide
		#param slideId (int) the ID of the slide
		#
		findSlideSchemeById = ( slideId ) ->
			findSlideById( slideId ).attr 'data-scheme'
		
		# Returns whether or not a slide has a background
		#param slideId (int)	the ID of the slide
		#
		findSlideBkImgById = ( slideId ) ->
			findSlideById( slideId ).hasClass 'bg-img'
		
		# Called when the slider is loaded by the browser
		#
		sliderInit = ( slideNum ) ->
			# Get the scheme
			#
			scheme = findSlideSchemeById slideNum
			
			# Set the scheme on...
			#
			$h.addClass scheme			# the header
			$slider.addClass scheme		# the slider (mostly the pagination)
			
			# Set the current scheme to the new scheme.
			#
			currentScheme = scheme
			
			# And if the slide has a background image,
			# add a background shadow to the header.
			#
			if ( findSlideBkImgById slideNum ) isnt $h.hasClass 'shadow'
				$h.toggleClass 'shadow'
		
		# Called at the end of each fade animation betwen slides
		#
		sliderFinish = ( slideNum ) ->
			# Get the new scheme
			#
			newScheme = findSlideSchemeById slideNum
			
			# If the current scheme and the new scheme are the same...
			#
			if currentScheme isnt newScheme
				# Toggle all the classes
				# ALL THE CLASSES
				#
				$h.toggleClass 'light'
				$h.toggleClass 'dark'
				$slider.toggleClass 'light'
				$slider.toggleClass 'dark'
				
				# And set the current scheme to the new scheme.
				#
				currentScheme = newScheme
			
			# And if the slide has a background image,
			# add a background shadow to the header.
			#
			if ( findSlideBkImgById slideNum ) isnt $h.hasClass 'shadow'
				$h.toggleClass 'shadow'
			
		# Called to initialize slider
		#param interval (int)	ms between slide changes
		#
		doSlider = ( interval = 5000 ) ->
			
			# Stores arguments to pass to slider initializer
			# For more information, read SlidesJS's docs.
			#
			args =
				width: width # slider width
				height: $( window ).height() # slider height
				navigation: # next/previous buttons
					active: false # disabled
				pagination: # pagination buttons
					active: true # enabled
					effect: "fade" # color changes fade
				play: # play/pause buttons
					active: false # disabled
					effect: "fade" # slide transition effect
					interval: interval # number of ms between slides, defaults to 5000ms/5s
					auto: true # start
					pauseOnHover: false # keep the slider running if I hover over it
				fade: # fade animation settings
					speed: 10000 # speed of fade in ms
					crossfade: true # crossfades between slides
				callback: #callbacks to run when certain actions are finished
					# sliderInit is called when slider loaded.
					# It is passed the starting slide ID.
					#
					loaded: sliderInit
					
					# sliderFinish is called when slide transition complete.
					# It is passed the new slide ID.
					#
					complete: sliderFinish
			
			# The actual slider call.
			$slider.slidesjs args
		
		# Initial properties of animated elements
		#
		propsInit =
			opacity: 0
			'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"'
		
		# Final properties of animated elements
		#
		propsFinal =
			opacity: 1
			'-ms-filter': '"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"'
		
		# Called at the start of animations
		#
		fadeStart = ($sels...) -> # this is why I use CoffeeScript
			# Sets initial styling
			for $sel in $sels # and this
				$sel.css propsInit
			
			# Sets a one-time callback on the document object for the dblclick event
			# to force-finish animations on all passed selectors.
			#
			# For noobs, this will cancel the fade on all passed selectors
			# when the user double-clicks the page, but will not affect
			# any further double-clicks.
			#
			$doc.one 'dblclick', ->
				for $sel in $sels # and this
					$sel.stop true, true
					$sel.css propsFinal
				fadeFinish()
			
			#coffeescriptIsAwesome
			#inlineHashtagsYo
			
			# Adds a class
			#
			$b.addClass 'fade-in-progress'
			
			# Prevents scrolling
			#
			$b.css 'position', 'fixed'
		
		# Called at the end of animations
		#
		fadeFinish = ->
			$b.removeClass 'fade-in-progress'	# Removes a class
			$b.css 'position', 'static'			# Allows scrolling again
			
		# Stores the block
		#
		$block = null;
		
		# If there are no slides in the slider,
		# the slider must be empty.
		#
		if numSlides is 0
			$block = $ '#m .block:first'
			
			# If we're not on a mobile device
			# and the block we're interested has fade set on it,
			# begin the fade operation.
			#
			if not mobile and $block.hasClass 'fade'
				# We need to fade in on this block.
				# Make some new selectors...
				#
				$blockh1				= $block.find 'h1'
				$blockh2				= $block.find 'h2'
				$blockp				= $block.find 'p'
				$blockContent		= $block.find '.block-content'
				
				# Set initial styling...
				#
				fadeStart $block, $h, $blockh1, $blockh2, $blockp, $blockContent
				
				#
				# Begin to animate the fade
				#
				$block				.delay( 1500 ).animate( propsFinal, 3000 )
				$blockh1				.delay( 5000 )		.animate( propsFinal, 1500 )
				$blockh2				.delay( 8000 )			.animate( propsFinal, 1500 )
				$blockp				.delay( 11000 )			.animate( propsFinal, 1500 )
				$blockContent		.delay( 11000 )			.animate( propsFinal, 1500 )
				$h						.delay( 11000 )			.animate( propsFinal, 1500, 'swing', fadeFinish ) # fadeFinish as a callback
				#
			
		else
			# The slider exists.
			
			$block = $slider.find '.block:first'
			
			# If we're not on a mobile device
			# and the block we're interested has fade set on it,
			# begin the fade operation.
			#
			if not mobile and $block.hasClass 'fade'
				# We need to fade in on this block
				#
				# Start the slider up so that it can be selected later...
				#
				doSlider 17500
				#
				# Make some new selectors...
				#
				$pag					= $slider.find '.slidesjs-pagination'
				$blockh1				= $block.find 'h1'
				$blockh2				= $block.find 'h2'
				$blockp				= $block.find 'p'
				$blockContent		= $block.find '.block-content'
				
				# Set initial styling...
				#
				fadeStart $block, $h, $pag, $blockh1, $blockh2, $blockp, $blockContent
				
				# Begin to animate the fade
				#
				$block				.delay( 1500 ).animate( propsFinal, 3000 )
				$blockh1				.delay( 5000 )			.animate( propsFinal, 1500 )
				$blockh2				.delay( 8000 )					.animate( propsFinal, 1500 )
				$blockp				.delay( 11000 )						.animate( propsFinal, 1500 )
				$blockContent		.delay( 11000 )						.animate( propsFinal, 1500 )
				$pag					.delay( 11000 )						.animate( propsFinal, 1500 )
				$h						.delay( 11000 )						.animate( propsFinal, 1500, 'swing', fadeFinish ) # fadeFinish as a callback
				#
			
			# If the block doesn't have fade enabled
			# and we're not on mobile,
			# then just do the slider with its default settings.
			#
			else if not mobile then doSlider()
		
) jQuery
