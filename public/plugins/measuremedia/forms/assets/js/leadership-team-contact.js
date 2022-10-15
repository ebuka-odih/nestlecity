var captchaVerified = false;
// Check Google Captcha
function recaptchaCallback() {
	if (grecaptcha.getResponse().length > 0) {
		captchaVerified = true;
		$('#google-captcha').val('true');
		// Re-validate form
		$('#contact-leadership-form').validator('validate');
	} else {
		$('#google-captcha').val('');
	}
};

// http://stackoverflow.com/questions/1184624/convert-form-data-to-javascript-object-with-jquery?page=1&tab=votes#comment1014239_1186309
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(document).ready(function() {
	// Focus on Name input
	$('#name').focus();
	// Phone mask
    $('#phone').mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    // Catch invalid fields
    $('#contact-leadership-form').on('invalid.bs.validator', function(e) {    	
    	if (e.detail.length > 0) {
    		// handle the invalid form...
            $('section.contact-us').css('height', '1080px');
    	}
    });

    // Form Validator
    $('#contact-leadership-form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            $('section.contact-leadership').css('height', '1080px');
        } else {
            // everything looks good!
            $('section.contact-leadership').css('height', '820px');
            var data = {};
            data = $('#contact-leadership-form').serializeObject();
            console.log(data);
            $.request('LeadershipTeamContact::onSubmitForm', {
                data: data,
                error: function(error) {
                    console.log('error:');
                    console.log(error);
                },
                redirect: $('section.contact-leadership').data('redirect')
            });   
            return false;
        }
    });
});