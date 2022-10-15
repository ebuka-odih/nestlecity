$(document).ready(function() {
	var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
	var pathArray = window.location.pathname.split( '/' );
	var secondLevelLocation = pathArray[2];
	// Preset calculator option
	if (secondLevelLocation) {
		$('#calculators').val(secondLevelLocation);
	}

	// Select2
	$('#calculators').select2({
		placeholder: 'Select a Calculator'
	});	

	$('#calculators').change(function(event) {
		$option = $(this).val();
		console.log($option);
		if ($option) {
			window.location.replace("/calculators/" + $option);
		}
	});
});