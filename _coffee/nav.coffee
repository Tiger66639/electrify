(( $ ) ->
	
	#	Storing components
	
	$navM = $ '#nav-mobile'
	$nav = $ '#nav'
	$btn = $ '#nav-mobile-reveal'
	
	#	Set width variable.
	width = $( window ).width()
	
	#	On resize, see which nav should be displayed
	checkDisplay = ->
		width = $( window ).width()
		console.log width
		if width < 650
			$nav.hide()
			$btn.show()
			
		else if width >= 650
			$nav.css { display: 'flex' }
			$navM.hide()
			$btn.hide()
			
	checkDisplay()
	$( window ).resize checkDisplay
	
	$navM.hide().addClass 'collapsed'
	
	slideNav = ->
		console.log 'Fired'
		$btn.blur()
		if $navM.hasClass 'collapsed'
			$navM.removeClass 'collapsed'
			$navM.addClass 'opened'
			$navM.slideDown 250
			
		else if $navM.hasClass 'opened'
			$navM.removeClass 'opened'
			$navM.addClass 'collapsed'
			$navM.slideUp 250
	
	$btn.click slideNav
	
) jQuery