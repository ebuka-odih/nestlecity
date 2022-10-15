var captchaVerified = false;
// Check Google Captcha
function recaptchaCallback() {
    if (grecaptcha.getResponse().length > 0) {
        captchaVerified = true;
        $('#google-captcha').val('true');
        // Re-validate form
        $('#california-consumer-privacy-container-form').validator('validate');
    } else {
        $('#google-captcha').val('');
    }
};

// http://stackoverflow.com/questions/1184624/convert-form-data-to-javascript-object-with-jquery?page=1&tab=votes#comment1014239_1186309
$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
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
    // SSN Mask Options
    var ssnMaskOptions = {
        placeholder: "___-__-____",
        onComplete: function (val, event) {
            if (val.length === 11) {
                $(event.target).prop('type', 'password');
            }
        },
        onChange: function (val, event) {
            if (val.length < 11) {
                $(event.target).prop('type', 'tel');
            }
        }
    };
    // SSN Mask
    $('#ssn').mask("000-00-0000", ssnMaskOptions);

    // attach to email inputs. throws error if not valid
    $('.email-validator').change(function (e) {
        if ($(this).val().length > 0) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var test = re.test(String($(this).val()).toLowerCase());
            if (!test) {
                $.oc.flashMsg({
                    text: "Please enter a valid email address. ",
                    class: 'error'
                });
                $(this).val("");
            }
        }
    });

    // Catch invalid fields
    $('#california-consumer-privacy-form').on('invalid.bs.validator', function (e) {
        if (e.detail.length > 0) {
            // handle the invalid form...
            // $('div.business-unsubscribing-application-container').css('height', '1080px');
        }
    });

    // Form Validator
    $('#california-consumer-privacy-form').validator().on('submit', function (e) {

        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            // $('div.business-unsubscribing-application-container').css('height', '1080px');
            console.log('Form has missing fields');
            $.oc.flashMsg({
                text: 'Form has missing fields',
                class: 'error'
            });
        } else {
            var button = $('#optout-submit-button');
            var button_text = button.html();
            // console.log(button.data('loading-text'));
            button.html(button.data('loading-text'));
            // everything looks good!
            // $('div.business-unsubscribing-application-container').css('height', (Number($('#california-consumer-privacy-form').height()) + 10) + 'px');
            console.log('everything looks good!');

            var data = {};
            data = $('#california-consumer-privacy-form').serializeObject();
            console.log(data);

            $.request('CaliforniaConsumerPrivacyAct::onSubmitForm', {
                data: data,
                error: function (error) {
                    // console.log('error:');
                    // console.log(error);
                    $.oc.flashMsg({
                        text: error.responseText,
                        class: 'error'
                    });
                    // button.html(button_text);
                },
                redirect: '/california-consumer-privacy-act/thank-you'
            });
            // button.html(button_text);
            return false;
        }
    });

    $('#california-consumer-privacy-form').on('ajaxErrorMessage', function (e) {
        console.log('ajaxErrorMessage');
        console.log(e);
    });
});
