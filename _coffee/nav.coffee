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
		
		$search = $ '#n .menu-item [title="Search"]'
		$searchParent = $search.parent()
		$form = $ '#n-search'
		
		toggleSearch = ->
			$searchParent.toggleClass 'active'
			
			if $searchParent.hasClass 'active'
				# Time to open the search field so that the user can search
				$form.slideDown 250
			
			else
				# The user wants to dismiss the field
				$form.slideUp 250
			
			false
		
		$search.click toggleSearch
		
) jQuery