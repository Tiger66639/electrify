( ( $ ) ->
	$ ->
		
		$window = $ window
		
		width = $window.width()
		mobile = width < 950
		
		$comReveal = $ '#reveal-comments'
		$comTrigger = $ '#reveal-comments-a'
		
		if mobile
			$comReveal.hide()
			$comTrigger.show()
		
		$window.resize ->
			width = $window.width()
			mobile = width < 950
			
			if not $comTrigger.hasClass 'active'
				
				if mobile
					$comReveal.hide()
					$comTrigger.show()
					
				else
					$comReveal.show()
					$comTrigger.hide()
			
		$comTrigger.click ->
			$comTrigger.blur()
			$comTrigger.toggleClass 'active'
			$comReveal.slideToggle 250
		
		

) jQuery
