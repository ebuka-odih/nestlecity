var captchaVerified = false;
var currentTabIndex = null;
var sectionHeightValid;
var sectionHeightInvalid;
var isValid = false;
var isInvalid = false;
var isCoApplicant = false;

// Check Google Captcha
function recaptchaCallback() {
	if (grecaptcha.getResponse().length > 0) {
		captchaVerified = true;
		$('#google-captcha').val('true');
		// Re-validate form
		$('#personal-loan-application-form').validator('validate');
	} else {
		$('#google-captcha').val('');
	}
};

function checkboxValidate(name, min) {
	if (min == null) {
    	var min = 1 //minumum number of boxes to be checked for this form-group
	}

    if($('input[name="'+name+'"]:checked').length < min) {
        $('input[name="'+name+'"]').prop('required',true);
    } else {
        $('input[name="'+name+'"]').prop('required',false);
    }
}

// function resizeFormHeight() {
//   var formHeight = $('section.personal-loan-application > div.personal-loan-application-contents').height();
//   var heightOffset = 60;
//   formHeight = formHeight + heightOffset;
//   $('section.personal-loan-application').animate({height: formHeight}, 500);
// }

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var resizeFormHeight = debounce(function() {
  var formHeight = $('section.personal-loan-application > div.personal-loan-application-contents').height();
  var heightOffset = 60;
  formHeight = formHeight + heightOffset;
  $('section.personal-loan-application').animate({height: formHeight}, 500);
  // console.log('Resize Fired!');
}, 250);

function getSectionWidth() {
  $('table.table:visible').each(function(index, el) {
    // console.log(index);
    // console.log(el);
    // Get All element heights
    var thElementHeights = $('thead > tr > th', this).map(function() {
      // console.log($(this).height());
      return $(this).height();
    }).get();
    var tdElementHeights = $('tbody > tr > td', this).map(function() {
      // console.log($(this).height());
      return $(this).height();
    }).get();
    // Get Max height
    var thMaxHeight = Math.max.apply(null, thElementHeights);
    var tdMaxHeight = Math.max.apply(null, tdElementHeights);
    // console.log('thMaxHeight:', thMaxHeight);
    // console.log('tdMaxHeight:', tdMaxHeight);
    // Set heights
    $('thead > tr > th', this).height(tdMaxHeight);
    $('tbody > tr > td', this).height(tdMaxHeight);
  });
}

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
 	var isValid = false;
	var self = this;
	 //  SSN Mask options
	var ssnMaskOptions = {
		placeholder: "___-__-____",
		onComplete: function(val, event) {
			if (val.length === 11) {
				$(event.target).prop('type','password');
			}
		},
		onChange: function(val, event) {
			if (val.length < 11) {
				$(event.target).prop('type','tel');
			}
		}
	};
 	// Masks
    $('#phone').mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    $('#ssn').mask("000-00-0000", ssnMaskOptions);
    $('#dob').mask("00/00/0000", {placeholder: "__/__/____"});
    $("#business-phone").mask("(000) 000-0000", {placeholder: "(___) ___-____"});
	$("#phone-alt").mask("(000) 000-0000", {placeholder: "(___) ___-____"});
	$("#co-applicant-phone").mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    $("#co-applicant-business-phone").mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    $("#co-applicant-phone-alt").mask("(000) 000-0000", {placeholder: "(___) ___-____"});
    $("#co-applicant-ssn").mask("000-00-0000", ssnMaskOptions);
    $("#co-applicant-dob").mask("00/00/0000", {placeholder: "__/__/____"});
    // Mask Dollar amounts
    $('#salary, #residence-payment, #co-applicant-residence-payment, #co-applicant-salary').change(function(e) {
        var inputValue = $(this).val();
        $(this).val(numeral(inputValue).format('$0,0'));
	});
	// on page load check joint
    isCoApplicant = $('#joint-credit').val();
	jointCreditUpdate(isCoApplicant);
	
	$('#joint-credit').change(function(e) {
        isCoApplicant = $(this).val();
        jointCreditUpdate(isCoApplicant);
    });

	function jointCreditUpdate(isCoApplicant) {
		if (isCoApplicant == 'yes') {
			$('.co-applicant-question').css('display','block').show('400');
			$('#personal-loan-application-wizard > div.navbar > div > div > ul > li:nth-child(8) > a').html('8');
			$('input.co-applicant-question:not(.not-required), select.co-applicant-question:not(.not-required)').attr('required', 'required');
		} else {
			$('.co-applicant-question').hide('400');
			$('#personal-loan-application-wizard > div.navbar > div > div > ul > li:nth-child(8) > a').html('5');
			$('input.co-applicant-question:not(.not-required), select.co-applicant-question:not(.not-required)').removeAttr('required');
		}
	}
  
    $('select.explanation-question').change(function(e) {
    	var name = $(this).attr('name');
    	var inputValue = $(this).val();
    	if (inputValue == 'yes') {
    		// Make explanation required if answer set to yes
    		$('#' + name + '-explanation').attr('required', 'required');
    	} else {
    		$('#' + name + '-explanation').removeAttr('required');
    	}
    });
 	// Raise section height on error
 	$('#personal-loan-application-wizard').on('invalid.bs.validator', function(e) {
		$('section.personal-loan-application').addClass('form-error');
		// $('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active').validator('validate');
	});
	// Event when form is valid
	$('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active').on('validated.bs.validator', function(e) {
		var validator = $(this).data('bs.validator');
		if (!validator.hasErrors() && !validator.isIncomplete()) {
	    	resizeFormHeight();
		} else {
			$('section.personal-loan-application').addClass('form-error');
    	}
	});

	// Form Validator
    $('#personal-loan-application-form').validator({
		custom: {
			'min-loan-value': function($el) {
				var matchValue = parseInt($el.data("min-loan-value").toString().replace(/\$|,/g, ""));
				var inputVal = parseInt($el.val().toString().replace(/\$|,/g, ""));
				// console.log('inputVal', inputVal);
				// console.log('matchValue', matchValue);
				if (isNaN(inputVal) || !(inputVal >= matchValue)) {
					return "Minimum loan value is: " + numeral(matchValue).format('$0,0');
				}
			}
		}
	}).on('submit', function (e) {
		var $submitButton = $('#personal-loan-application-form button[type="submit"]');

        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            resizeFormHeight();
            console.log('Form has missing fields');
        } else {
            // everything looks good!
            resizeFormHeight();
            console.log('everything looks good!');

            var data = {};
            data = $('#personal-loan-application-form').serializeObject();
			console.log(data);
			// Display button loading spinnner and build in oc loader on top
            $.oc.stripeLoadIndicator.show();
			$submitButton.button('loading');
			$submitButton.prop('disabled');

            $.request('personalLoanApplication::onSubmitForm', {
				loading: $.oc.stripeLoadIndicator,
				data: data,
				complete: function() {
					// Hide spinner and oc loader
					$.oc.stripeLoadIndicator.hide();
					$submitButton.button('reset');
				  },
                error: function(error) {
					$submitButton.prop('disabled', false);
                    // console.log('error:');
                    // console.log(error);
                },
                redirect: '/personal/loan-application/thank-you'
            });   
            return false;
        }
    });

  	$('#personal-loan-application-wizard').bootstrapWizard({
  		'tabClass': 'nav nav-pills',
  		'onNext': function(tab, navigation, index) {
			var isValid = false;
  			var hasError = false;
  			var tabs = $('.tab-pane');
			var currentTab = tabs[index - 1];
  			var inputs = $(':input, select, textarea');
  			var stepElements = $(currentTab).find(inputs);
  			var count = stepElements.length;
			var activeTabEl = $('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active');
			var hasErrors = activeTabEl.validator('validate').has('.has-error:visible').length;
			
  			// Update form
  			activeTabEl.validator('update');
  			// Validate form
  			activeTabEl.validator('validate');
  			// Form contains invalid or missing fields
  			activeTabEl.on('invalid.bs.validator', function(e) {
  				// Form is invalid
				resizeFormHeight();
				$('section.personal-loan-application').addClass('form-error');
				isValid = false;
			});
			// Event when form is valid
			activeTabEl.on('validated.bs.validator', function(e) {
				var validator = $(this).data('bs.validator');
				if (!validator.hasErrors() && !validator.isIncomplete()) {
					console.log('No errors found');
					$('section.personal-loan-application').removeClass('form-error');
					isValid = true;					
				} else {
					console.log('Some errors present');
					$('section.personal-loan-application').addClass('form-error');
					isValid = false;
					resizeFormHeight();
				}
			});
			if (hasErrors) {
				resizeFormHeight();
				// reset isValid
				isValid = false;
				hasErrors = true;
				return false;
			}
  		},
  		'onTabClick': function(tab, navigation, index) {
  			var hasError = false;
  			var tabs = $('.tab-pane');
  			var currentTab = tabs[index - 1];
  			var inputs = $(':input, select, textarea');
  			var stepElements = $(currentTab).find(inputs);
  			var count = stepElements.length;
			var activeTabEl = $('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active');
			var hasErrors = activeTabEl.validator('validate').has('.has-error:visible').length;
  			// Update form
  			activeTabEl.validator('update');
  			// Validate form
  			activeTabEl.validator('validate');
  			// Form contains invalid or missing fields
  			activeTabEl.on('invalid.bs.validator', function(e) {
  				// Form is invalid
  				$('section.personal-loan-application').addClass('form-error');
  				self.isValid = false;
          		resizeFormHeight();
  			});
  			// Event when form is valid
  			activeTabEl.on('validated.bs.validator', function(e) {
  				var validator = $(this).data('bs.validator');
  				if (!validator.hasErrors() && !validator.isIncomplete()) {
			    	console.log('No errors found');
			    	resizeFormHeight();
			    	self.isValid = true;
  				} else {
			    	console.log('Some errors present');
			    	$('section.personal-loan-application').addClass('form-error');
			    	self.isValid = false;
           			resizeFormHeight();
			    }
  			});
  			if (hasErrors) {
				resizeFormHeight();
				// reset isValid
				isValid = false;
				hasErrors = true;
				return false;
			}
  		},
  		'onTabShow': function(tab, navigation, index) {
  			var $total = navigation.find('li:visible').length;
  			var $current = index+1;
  			var $percent = ($current/$total) * 100;
			var activeTabEl = $('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active');
			currentTabIndex = index;
			
			$('#personal-loan-application-wizard .progress-bar').css({width:$percent+'%'});
			// Hide next button on last tab
			if (isCoApplicant == 'yes' && currentTabIndex === 7) {
				activeTabEl.validator('update');
				activeTabEl.validator('validate');
				$('#personal-loan-application-wizard > div.tab-content > ul.pager.wizard > li.next').hide();
			} else if (isCoApplicant == 'no' && currentTabIndex === 4) {
				activeTabEl.validator('update');
				activeTabEl.validator('validate');
				$('#personal-loan-application-wizard > div.tab-content > ul.pager.wizard > li.next').hide();
			} else {
				$('#personal-loan-application-wizard > div.tab-content > ul.pager.wizard > li.next').show();
			}  
			
			 // Update form
  			activeTabEl.validator('update');
  			self.isValid = false;
			setTimeout(function() {
				getSectionWidth();
				resizeFormHeight();
			}, 500);    
  		},
  		'onTabChange': function(tab, navigation, index) {
			var activeTabEl = $('#personal-loan-application-wizard > div.tab-content > div.tab-pane.active');
  			self.isValid = false;
  			// Update form
    		activeTabEl.validator('update');
        	setTimeout(function() {
				getSectionWidth();
          		resizeFormHeight();
        	}, 200);
  		}
  	});
  
    $(window).on('resize', function() {
      resizeFormHeight();
    });
});