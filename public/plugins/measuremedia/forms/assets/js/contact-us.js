var captchaVerified = false;
// Check Google Captcha
function recaptchaCallback() {
	if (grecaptcha.getResponse().length > 0) {
		captchaVerified = true;
		$('#google-captcha').val('true');
		// Re-validate form
		$('#contact-us-form').validator('validate');
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
	// Phone mask
    $('#phone').mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    // Catch invalid fields
    $('#contact-us-form').on('invalid.bs.validator', function(e) {    	
    	if (e.detail.length > 0) {
    		// handle the invalid form...
            $('section.contact-us').css('height', '1080px');
    	}
    });

    // Form Validator
    $('#contact-us-form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            $('section.contact-us').css('height', '1080px');
            console.log('Form has missing fields');
        } else {
            // everything looks good!
            $('section.contact-us').css('height', '820px');
            console.log('everything looks good!');

            var data = {};                      
            data = $('#contact-us-form').serializeObject();
            console.log(data);

            $.request('ContactUs::onSubmitForm', {
                data: data,
                error: function(error) {
                    console.log('error:');
                    console.log(error);
                },
                redirect: '/contact/thank-you'
                // success: function(data) {
                //     this.success(data);
                //     $('.section-header').hide();
                //     $('#contact-us-form').hide(1000);
                //     $('.section-header').html('Thank you so much for your recent submission. Someone will be in touch with you soon.');
                //     $('.section-header').show(1000);
                // }
            });   
            return false;
        }
    });

    $('#contact-us-form').on('ajaxErrorMessage', function(e) {
      console.log('ajaxErrorMessage');
      console.log(e);
    });
});