<?php

use App\Http\Controllers\HomeController;
use App\Register;

if (Session::has('userId')) {
    $user = Register::where('id', '=', Session::get('userId'))->first();
    $user_id = $user->id;
    $amount_get = $user->wallet_amount;
}
?>

<style>
    .passerrmsg,
    .adderr,
    .nameerr,
    .emailerr,
    .paymenterr,
    .wallet_err,
    .payerrr,
    .payerrrshow {
        color: red;
        font-size: 14px;
        text-transform: capitalize;
        display: none;
        margin-left: 20px;

    }

    #plusIcon {
        margin-top: 16px;
        display: inline;
        float: right;
        margin-right: -93px;
    }

    #buyItem {
        margin-top: 16px;
        margin-left: 46px;
    }

    #button-addon2 {
        margin-top: -61px;
    }

    aside {
        width: 350px;
        height: 367px;
    }

    #card-img {
        height: 93%;
        width: 93%;
        border-radius: .5rem;
        transition: .3s ease;
        margin: 15px;
    }

    #check {
        margin-top: 30px;
        margin-left: 100px;
    }

    #aa-header .aa-header-bottom {
        background-color: #dff0d8;
        padding: 0px 0px;
    }


    /* loader */
    .input-box.button input #button {
        display: block;
        margin: 20px auto;
        padding: 10px 30px;
        background-color: #eee;
        border: solid #ccc 1px;
        cursor: pointer;
    }

    #overlayss {
        /* top: 0; */
        z-index: 100;
        width: 100%;
        /*height: 100%; */
        display: none;
        margin-left: 272px;
        margin-top: -47px;
    }

    .cv-spinnerss {
        /* height: 100%; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinnerss {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }

    .input-box.button input #button {
        display: block;
        margin: 20px auto;
        padding: 10px 30px;
        background-color: #eee;
        border: solid #ccc 1px;
        cursor: pointer;


    }

    #overlay {
        /* top: 0; */
        z-index: 100;
        width: 100%;
        /*height: 100%; */
        display: none;
        margin-left: -24px;
        margin-top: -60px;
    }

    .cv-spinner {
        /* height: 100%; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }


    /* hold css */

    .input-box.button input #button {
        display: block;
        margin: 20px auto;
        padding: 10px 30px;
        background-color: #eee;
        border: solid #ccc 1px;
        cursor: pointer;
    }

    #overlay_hold {
        /* top: 0; */
        z-index: 100;
        width: 100%;
        /*height: 100%; */
        display: none;
        margin-left: 272px;
        margin-top: -47px;
    }

    .cv-spinner_hold {
        /* height: 100%; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner_hold {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }

    #btn_order {
        margin-left: 319px;
        width: 124px;
        margin-top: -41px;

    }
</style>

@include('layout.header')
@include('layout.popup')
@section('container')


<div class="col-md-6 order-md-1" id="check" style="margin-top: -15px;">

    <h4 class="mb-3">Billing address</h4>

    <!-- novalidate -->

    <form class="needs-validation" id="checkForm">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                @foreach($data as $val)
                <input type="hidden" id="quantity_get" name="quantity_get[]" value="{{$val->quantity}}">
                <input type="hidden" id="prodcut_id_get" name="prodcut_id_get[]" value="{{$val->prodcut_id_get}}">
                @endforeach
                <input type="hidden" id="quantity_get" name="status[]" value="paid">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="">
                <span class="nameerr"> *this field is required </span>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="username">Username <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <!-- <div class="mb-3">
            <label for="username">Username <span class="text-muted">(Optional)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                </div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
        </div> -->
        </div>
        <div class="mb-3">
            <label for="email">Email </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <span class="emailerr"> *this field is required </span>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
            <span class="adderr"> *this field is required </span>
        </div>

        <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>

            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
        </div>


        <div class="row" style="margin-left:3px">
            <h4 class="mb-3">Select Payment Method</h4>

            <input type="radio" name="wallet" id="wallet" value="wallet">
            <label for="cc-name">Wallet Amount</label>
            </br>

            <input type="radio" name="wallet" id="wallet" value="walletnot">
            <label for="cc-name">Pay Now</label>
            </br>
            <span class="payerrr"> *Plese Select payment Method</span>
            <h4 class="mb-3">Payment</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Pay Now</label>
                    <input type="hidden" class="form-control" id="wallet_amont_per" name="wallet_amont_per" value="">
                    <input type="hidden" class="form-control" id="wallet_amount_get" name="wallet_amount_get" value="{{$amount_get}}">
                    <input type="number" class="form-control" id="payment" name="payment" placeholder="">
                    <button class="btn btn-primary btn-lg btn-block" id="btn_order" type="submit">Place Order</button>
                    <span class="paymenterr"> *total amount not matched</span>
                    <span class="wallet_err"> *You Don't Have Amount In Your Wallet</span>
                    <span class="payerrrshow"> *this field is required </span>
                </div>
            </div>
    </form>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-5 order-md-2 mb-4" style="margin-top: 30px;">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product_quantity</th>
                    <th>Price_Total</th>
                </tr>
            </thead>
            @php $total=0; @endphp
            @foreach($data as $val)
            <tbody>
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->quantity }}</td>
                    <td>₹{{ $val->price * $val->quantity }}</td>
                </tr>
                @php $total += $val->price * $val->quantity; @endphp
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>Grand Total</th>
                    <th></th>
                    <th id="totalprice">₹{{ $total }}</th>
                </tr>
            </thead>
        </table>

        <!-- <div id="grand-total-detail" class="payable-amount row"><span class="col-8">Grand Total</span> -->
        <span id="grand-total-amount-detail" class="col-4 text-right fw6">
            <input type="hidden" id="totalprice_get" value="{{ $total }}">
            <!-- <span class="price" id="totalprice">₹{{ $total }}</span> -->
        </span>
    </div>
</div>
@include('layout.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
    $("#checkForm").on('submit', function(e) {

        e.preventDefault();
        var formvalue = new FormData(this);
        var firstName = $('#firstName').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var payment = $('#payment').val();
        var price = $('#totalprice_get').val();
        var wallet_amount = $('#wallet_amount_get').val();


        var convert_price = parseInt(price)
        var convert_wallet_amount = parseInt(wallet_amount)
        var wallet_amont_per = convert_wallet_amount - convert_price;
        $('wallet_amont_per').val(wallet_amont_per)
        if (firstName == "") {
            $('.nameerr').show();
        } else if (email == "") {
            $('.emailerr').show();
            $('.nameerr').hide();
        } else if (address == "") {
            $('.adderr').show();
            $('.emailerr').hide();
            $('.nameerr').hide();
        } else if ($('input[name="wallet"]:checked').length == 0) {
            $('.payerrr').show();
            $('.emailerr').hide();
            $('.nameerr').hide();
            $('.paymenterr').hide();
        } else if (payment == '') {
            $('.payerrrshow').show();
            $('.emailerr').hide();
            $('.payerrr').hide();
            $('.wallet_err').hide();
            $('.nameerr').hide();
            $('.paymenterr').hide();
        } else if (!(payment == price)) {
            $('.paymenterr').show();
            $('.adderr').hide();
            $('.payerrrshow').hide();
            $('.payerrr').hide();
            $('.wallet_err').hide();
        } else {
            $('.payerrrshow').hide();
            $('.payerrr').hide();
            $('.adderr').hide();
            $('.emailerr').hide();
            $('.nameerr').hide();
            $('.paymenterr').hide();
            $('#loader').show();
            $("#orderbtn").attr("disabled", true);
            $("#overlay").fadeIn(300);
            $.ajax({
                url: "/order_place",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formvalue,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response.error)
                    if (response.error == 'error') {
                        console.log(response.error);
                        $("#overlay").fadeOut(300);
                        $('.wallet_err').show();
                    }
                    if (response.success == 'success') {
                        console.log(response);
                        swal("Thank You...", "Your Order Purchase SuccesFully.", "success", );
                        $('#checkForm').trigger('reset');
                        $("#overlay").fadeOut(300);
                        setTimeout(myURL, 1500);
                        function myURL() {
                            document.location.href = 'http://127.0.0.1:8000/';
                        }
                        // window.location.href = "http://127.0.0.1:8000/";
                        // window.top.close();
                        $('form').trigger('reset');
                        $("#checkForm").trigger('reset');
                    }
                },
            })
        }

    })
</script>

</html>