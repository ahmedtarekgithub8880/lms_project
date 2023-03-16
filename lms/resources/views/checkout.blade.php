
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
<script src="https://secure.gosell.io/js/sdk/tap.min.js"></script>
@extends('layouts.app')
@section('page_title' , __('You are about to make an ORDER'))
@section('page_info' , __('Checkout'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Add To cart ================================== -->
    <section class="pt-0">
        <div class="container">

            <form action="{{ route('saveOrder') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-12">

                        @if($cart_items->count() > 0)
                        <div class="cart_totals checkout light_form mb-4">
                            <h4>{{ __('Billing info') }}</h4>
                            <div class="row">

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('First Name') }}</label>
                                        <input name="first_name" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Last Name') }}</label>
                                        <input name="last_name" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Email Address') }}</label>
                                        <input name="email" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Phone Number') }}</label>
                                        <input name="phone" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Address') }}</label>
                                        <input name="address" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Town/City') }}</label>
                                        <input name="city" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('State') }}</label>
                                        <input name="state" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Zip/Postal Code') }}</label>
                                        <input  name="postal_code" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="sm-add-ship">
                                        <input id="aa-3"  class="checkbox-custom" name="payment_type" value="0"  type="radio">
                                        <label for="aa-3" class="checkbox-custom-label">  {{ __('Cash On delivery') }}</label>
                                    </div>
                                </div>
                                @if($cart_items->sum('final_price') != 0)
                                <div class="col-lg-6 col-md-6">
                                    <div class="sm-add-ship">
                                        <input id="aa-4" class="checkbox-custom" name="payment_type" value="1"  type="radio">
                                        <label for="aa-4" class="checkbox-custom-label">  {{ __('Pay Now') }}</label>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                        @else
                            <div class="cart_totals checkout light_form mb-4"> <br>
                                <h4>{{ __('You have no items in your cart  , Please add some products') }}   </h4>
                                <br>
                                <a href="{{ route('shop') }}" type="button" class="btn btn-theme2 ml-2">{{ __('Shop now') }}</a>

                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- Total Cart -->
                        <div class="cart_totals checkout">
                            <h4>{{ __('Billing Summary') }}</h4>
                            <div class="cart-wrap">
                                <ul class="cart_list">
                                    <li><b>{{ __('Products in cart') }}</b><strong>({{ $cart_items->count() }})</strong></li>
                                    <hr>
                                    @forelse($cart_items as  $row)
                                        <li>{{ $row->product->getTranslatedAttribute('name') }}  ({{ $row->product->price }} X {{ $row->qty }})<strong>{{ $row->final_price }} {{ __('OMR') }}</strong></li>
                                    @empty
                                    @endforelse
                                </ul>
                                <div class="flex_cart">
                                    <div class="flex_cart_1">
                                       {{ __('Total Cost') }}
                                    </div>
                                    <div class="flex_cart_2">
                                        {{ $cart_items->sum('final_price') }} {{ __('OMR') }}
                                    </div>
                                </div>
                                <button type="submit" class="btn checkout_btn"> {{ __('Place an order') }} </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            

            <!-- <form id="form-container" method="post" action="/charge">
             
                <div id="element-container"></div>
                <div id="error-handler" role="alert"></div>
                <div id="success" style=" display: none; position: relative;float: left;">
                    Success! Your token is <span id="token"></span>
                </div>
             
                <button  class="btn checkout_btn" id="tap-btn">Submit</button>
            </form> -->
            
        </div>
    </section>
    <script>

    //pass your public key from tap's dashboard
    var tap = Tapjsli('pk_test_UMkRP8zTuZ6nNOYXxBKrWtyE');

    var elements = tap.elements({});

    var style = {
        base: {
            color: '#535353',
            lineHeight: '18px',
            fontFamily: 'sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: 'rgba(0, 0, 0, 0.26)',
                fontSize:'15px'
            }
        },
        invalid: {
            color: 'red'
        }
    };
    // input labels/placeholders
    var labels = {
        cardNumber:"Card Number",
        expirationDate:"MM/YY",
        cvv:"CVV",
        cardHolder:"Card Holder Name"
    };
    //payment options
    var paymentOptions = {
        currencyCode:["KWD","USD","SAR"],
        labels : labels,
        TextDirection:'ltr'
    }
    //create element, pass style and payment options
    var card = elements.create('card', {style: style},paymentOptions);
    //mount element
    card.mount('#element-container');
    //card change event listener
    card.addEventListener('change', function(event) {
        if(event.loaded){
            console.log("UI loaded :"+event.loaded);
            console.log("current currency is :"+card.getCurrency())
        }
        var displayError = document.getElementById('error-handler');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });


    // Handle form submission
    var form = document.getElementById('form-container');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        tap.createToken(card).then(function(result) {
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('error-handler');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                var errorElement = document.getElementById('success');
                errorElement.style.display = "block";
                var tokenElement = document.getElementById('token');
                tokenElement.textContent = result.id;
                tapTokenHandler(token)

            }
        });
    });

    function tapTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'tapToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }


    card.addEventListener('change', function(event) {
        if(event.BIN){
            console.log(event.BIN)
        }
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
</script>
@endsection

