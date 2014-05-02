(($) ->
	$ ->
		$nav = $ '#n-mobile'
		$reveal = $ '#n-reveal'
		
		$nav.hide()
		$nav.addClass 'collapsed'
		
		toggleNav = ->
			$reveal.blur()
			if $nav.hasClass 'collapsed'
				$nav.removeClass 'collapsed'
				$nav.slideDown 250
			
			else
				$nav.addClass 'collapsed'
				$nav.slideUp 250
			
			false
		
		$reveal.click toggleNav
		
) jQuery