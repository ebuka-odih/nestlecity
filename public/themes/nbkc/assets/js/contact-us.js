$(document).ready(function() {
	$('#contact-us').click(function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $('#contact-us-form').offset().top,
			},
			1000, function() {
			$('#first-name').focus();
		});
	});
});