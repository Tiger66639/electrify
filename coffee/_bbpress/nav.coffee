(($) ->
	$h = $ '#h-bbpress'
	
	$searchButton = $ '#h-bbpress .bbp-search a'
	$searchForm = $ '#bbp-search-form'
	
	$searchButton.click ->
		$searchButton.toggleClass 'active'
		$searchForm.slideToggle 250
		false
	
) jQuery
