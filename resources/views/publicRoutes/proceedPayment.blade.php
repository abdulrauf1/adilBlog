@extends('layouts.appPublic')



@section('content')

    <div class="">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" style="background: #c9a452;" >
                    
                        <h3 class="panel-title"  ><h3 style="color:white">Payment Details for <strong>{{$planDetail->title}}</strong></h3></h3>
                    </div>
                    <div class="panel-body">
        
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="top">
                            <form 
                                    role="form" 
                                    action="{{ route('stripe.post') }}" 
                                    method="post" 
                                    class="require-validation"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                    id="payment-form">
                                @csrf
            
                                <input type="hidden" name="paymentAmount" value="{{($planDetail->paymentInstallments)?$planDetail->paymentInstallments:$planDetail->paymentAmount}}">
                                <input type="hidden" name="paymentId" value="{{$planDetail->id}}">
                                <input type="hidden" name="paymentTitle" value="{{$planDetail->title}}">

                                
                                <div class='form-row row'>
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>Name </label> <input
                                            class='form-control' size='4' name="name" type='text' required>
                                    </div>

                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>Contact Number</label> <input
                                            class='form-control' size='4' name="contact" type='text' required>
                                    </div>
                                </div>
                                
                              
                                <div class='form-row row'>
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input
                                            class='form-control' size='4' type='text'>
                                    </div>

                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>Email</label> <input
                                            class='form-control' size='4' name="email" type='email' required>
                                    </div>
                                </div>
            
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>
            
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
            
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit">Pay Now ($ {{($planDetail->paymentInstallments)?$planDetail->paymentInstallments:$planDetail->paymentAmount}})</button>
                                    </div>
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>        
            </div>
            
        </div>

    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
      
    $(function() {
      
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        
        var $form = $(".require-validation");
         
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });
         
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
        
        });
          
        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                     
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
         
    });
    </script>
@endsection


    
    
