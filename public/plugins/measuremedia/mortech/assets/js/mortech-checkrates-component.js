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
    console.log('ready----------');
    $("input[name='rate-year-radio']").on("click",function() {
        var checkedValue = $("input[name='rate-year-radio']:checked").val();
        console.log(checkedValue);
        //alert(checkedValue);
        if(checkedValue=="30") {
            $("#30-year-fixed").show();
            $("#15-year-fixed").hide();
            $("#5-1-arm").hide();
        }

        else if(checkedValue=="15") {
            $("#30-year-fixed").hide();
            $("#15-year-fixed").show();
            $("#5-1-arm").hide();
        }

        else if(checkedValue=="5") {
            $("#30-year-fixed").hide();
            $("#15-year-fixed").hide();
            $("#5-1-arm").show();
        }
        else{
            console.log('error');
        }
    });
	$('#home-value, #down-payment, #current-mortgage-balance').change(function(e) {
        var inputValue = $('#' + e.target.id).val();
        $('#' + e.target.id).val(numeral(inputValue).format('$0,0'));
    });
    // On page load
    $('#home-value, #down-payment, #current-mortgage-balance').each(function() {
        var inputValue = $(this).val();
        if (inputValue.length) {
        	$(this).val(numeral(inputValue).format('$0,0'));
        }
    });
    // Purchase/Refinance Switch
    $('.loan-type').on('change rightnow', function(e) {
        var loanType = $('.loan-type:checked').val();
        console.log(loanType);
        if (loanType == 'purchase') {
            $('#down-payment-div').show();
            $('#down-payment').show();
            $('#down-payment').attr('required', 'required');
            $('#current-mortgage-balance-div').hide();
            $('#current-mortgage-balance').hide();
            $('#current-mortgage-balance').removeAttr('required');
        }
        if (loanType == 'refinance') {
            $('#down-payment-div').hide();
            $('#down-payment').hide();
            $('#down-payment').removeAttr('required');
            $('#current-mortgage-balance-div').show();
            $('#current-mortgage-balance').show();
            $('#current-mortgage-balance').attr('required', 'required');
        }
    }).triggerHandler('rightnow');
    // Military option slider
    $('#military-slider').on('change', function(e) {
        var currentVal = $('#military-slider').prop('checked');
        if (currentVal) {
            $('#military').val(2);
        } else {
            $('#military').val(0);
        }
    });

    $('#check-rates-form').on('invalid.bs.validator', function(e) {
        if (e.detail.length > 0) {
            console.log(e);
            // handle the invalid form...
            // $('section.mortgage-hero-slideshow, body > div.unslider > section > div.hero-slideshow-wrapper > ul > li > div').css('height', '700px');
        }
    });

    $('.local-storage').on('change',function(){
      var local_storage = window.localStorage.getItem('loanAppValues');
      if(!local_storage){
        local_storage  = {};
      }
      local_storage['test1'] = "testtadfzcdc";
      window.localStorage.setItem('loanAppValues', local_storage);
    });

    $('.apply-online').click(function(){

      var homeloan_rate_data = JSON.parse(window.localStorage.getItem('homeloan_rate_data'));
      var loanData = {};
      if(homeloan_rate_data){
        loanData = homeloan_rate_data;
      }

      loanData.LoanProgram = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-program' ).data('loan-program'));
      loanData.Rate = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-rate' ).data('rate'));
      loanData.Apr = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-apr' ).data('apr'));
      loanData.Payment = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-payment' ).data('payment'));
      loanData.TotalLenderFees = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-lender span.lender-fees' ).data('lender-fees'));
      loanData.DiscountPoints = $.trim($('.' + $(this).data('selected-column') + ' div.rates-cell-lender span.discount-points' ).data('discount-points'));

      var UtmLinks = window.localStorage.getItem('utm_links') || '';
			UtmLinks = UtmLinks ? (UtmLinks.indexOf('&') !== 0 ? '&' + UtmLinks : UtmLinks) : '';
			loanData.UtmLinks = UtmLinks;

      $.request('checkRatesResults::onSubmitForm', {
        data: loanData,
        complete: function(response) {
          var responseText = JSON.parse(response.responseText);
              console.log(responseText);
              if (responseText.href) {
								var href = responseText.href;
								href = href.indexOf('?') === -1 ? href + '?' : href;
                window.location.href = href + loanData.UtmLinks;
              } else {
                if(responseText.error){
                  alert(responseText.error);
                } else {
                  if(responseText.debug){
                    console.log(responseText.debug);
                  } else {
                    alert('Unknown Error. ');
                  }
                }
              }
          }
      });
    });

    // Form Validator
    $('#check-rates-form').validator().on('submit', function (e) {
        var $submitButton = $('#check-rates-form > button');
        console.log('---------submitted----------, validating--------');
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            // $('section.mortgage-hero-slideshow, body > div.unslider > section > div.hero-slideshow-wrapper > ul > li > div').css('height', '700px');
            // console.log('Form has missing fields');
        } else {
            // everything looks good!
            // $('section.mortgage-hero-slideshow, body > div.unslider > section > div.hero-slideshow-wrapper > ul > li > div').css('height', '540px');
            // console.log('everything looks good!');
            // Display button loading spinnner and build in oc loader on top
            $.oc.stripeLoadIndicator.show();
            $submitButton.button('loading');

            var data = {};
            data = $(this).serializeObject();
            console.log(data);

            // localStorage.clear();
            localStorage.homeloan_rate_data = JSON.stringify(data );

            // Submit form
            $.request('checkRates::onSubmitForm', {
                data: data,
                complete: function(response) {
                    // Hide spinner and oc loader
                    $.oc.stripeLoadIndicator.hide();
                    $submitButton.button('reset');
                },
                redirect: '/home-loans/resources/rates'
            });
            return false;
        }
    });
});
