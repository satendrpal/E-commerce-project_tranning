<style>
    #plusIcon {
        margin-top: 11px;
        display: inline;
        float: right;
        margin-right: 117px;
    }

    #buyItem {
        margin-top: 16px;
        margin-left: 46px;

    }

    #button-addon22 {
        margin-top: -34px;
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
        /* margin-top: 51px; */
    }

    #card-img2 {
        height: 93%;
        width: 36%;
        border-radius: .5rem;
        transition: .3s ease;
        margin: 15px;
        margin-left: 817px;
    }

    .shopping-cart .summary {
        border-top: 2px solid #5ea4f3;
        background-color: #f7fbff;
        height: 100%;
        padding: 30px;
    }

    .shopping-cart .summary h3 {
        text-align: center;
        font-size: 1.3em;
        font-weight: 600;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .shopping-cart .summary .summary-item:not(:last-of-type) {
        padding-bottom: 10px;
        padding-top: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .shopping-cart .summary .text {
        font-size: 1em;
        font-weight: 600;
    }

    .shopping-cart .summary .price {
        font-size: 1em;
        float: right;

    }

    .price {
        font-size: 1em;
        float: right;

    }

    .shopping-cart .summary button {
        margin-top: 20px;
    }

    /* #checkoutss {
            float: right;
            z-index: 1;
            border-top: 2px solid #5ea4f3;
            background-color: #f7fbff;
            position: sticky;
            margin-top: -333px;;
            top: auto;
        } */
    .order-summary-container {
        height: -moz-max-content;
        height: max-content;
        max-width: 500px !important;
        padding-top: 25px;
        position: sticky !important;
        top: 50px
    }

    .order-summary-container>div {
        width: 100%
    }

    .order-summary-container .order-summary {
        border: 1px solid #e5e5e5;
        padding: 25px 30px;
        margin-left: 870px;
        margin-top: -329px;
        height: 231px;

    }

    .order-summary-container .order-summary>h3 {
        margin-bottom: 20px
    }

    .order-summary-container .order-summary>.row:not(:last-child) {
        margin-bottom: 10px
    }

    .order-summary-container .order-summary #grand-total-detail {
        border-top: 1px solid #e5e5e5;
        margin-bottom: 25px;
        margin-top: 15px;
        padding-top: 15px
    }

    .order-success-content {
        font-size: 16px;
        padding: 40px 20px
    }

    .account-content .account-layout .bottom-toolbar .pagination .page-item,
    .cart-details .continue-shopping-btn,
    .theme-btn {
        background-color: #26a37c !important;
        border: 1px solid transparent;
        color: #fff !important;
        cursor: pointer;
        font-weight: 600;
        padding: 11px 57px;
        vertical-align: top;
        z-index: 10
    }
</style>
@include('layout.header')
@section('container')
<!-- content -->
<div class="container">
    <section>
        @php $total=0; @endphp
        @foreach($data as $val)
        <div class="row gx-5">
            <aside class="col-lg-4">
                <div class="border rounded-4 mb-3 d-flex justify-content-center" id="card-img">
                    <img style="max-width: 75%; max-height: 90%; border: 1px solid;" class="rounded-4 fit" src="{{ asset('Addproduct/' . $val->profile) }}" />
                       
            </aside>
            <main class="col-lg-4">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        <?php
                        if ($val->rating_count != 0)
                            $val->rating_count = $val->rating / $val->rating_count;
                        else
                            $val->rating_count = 0;
                        ?>
                        <span class="text-rate">{{ $val->rating_count}} <i class="fa fa-star-o" aria-hidden="true"></i></span>
</br>
                        {{ $val->name }}
                    </h4>
                    <div class="mb-3">
                        <input type="hidden" class="get" id="card_id{{$val->id}}" value="{{ $val->card_id}}">
                        <input type="hidden" class="get" id="get{{$val->id}}" value="{{ $val->price}}">
                        <input type="hidden" class="row" id="row{{ $val->id}}" value="{{ $val->price}}">
                        <input type="hidden" class="row" id="quantity{{ $val->id}}" value="{{ $val->quantity}}">
                        <input type="hidden" class="row" id="btn_id" value="{{ $val->id}}">
                        <span class="h5{{$val->id}}" id="row{{$val->id}}">₹{{ $val->price * $val->quantity }} </span>


                        <span class="text-muted{{$val->id}}">{{ $val->quantity }}/Per Item</span>
                    </div>
                    <hr />
                    <p>
                        {{ $val->description }}
                    </p>
                    <hr />
                    <div id="plusIcon" class="plusIcon">
                        <button class="btn btn-white border border-secondary px-3" onclick="btn2( '{{$val->id}}' );" type="button" id="button-addon12{{$val->id}}" data-mdb-ripple-color="dark" style="margin-top:-11px">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div>
                        <input type="text" name="quantity" class="form-control text-center border border-secondary" value="{{ $val->quantity }}" data-id="get{{$val->id}}" aria-label="Example text with button addon" data-id=" " aria-describedby="button-addon1" id="buyItem{{$val->id}}" style="margin-left:58px;width:133px" readonly />
                    </div>
                    <div id="minusIcon" class="plusIcon">
                        <button class="btn btn-white border border-secondary px-3" onclick="btn('{{$val->id}}');" type="button" id="button-addon22" data-mdb-ripple-color="dark">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>

                    </div>

                    <a href="/remove/{{$val->id}}"><button class="btn btn-success" style="margin-top:20px">Remove</button></a>

                </div>
            </main>
        </div>
        @php $total += $val->price * $val->quantity; @endphp
        @endforeach
    </section>
    <div class="col-lg-4 col-md-12 offset-lg-1 row order-summary-container">
        <div class="order-summary fs16">
            <h3 class="fw6">Cart Summary</h3>
            <div class="row">

                <input type="hidden" id="totalprice_get" value="{{ $total }}">
                <input type="hidden" id="totalprice_get" value="{{ $total }}">
                <span class="col-8">Sub Total</span> <span class="col-4 text-right"><span class="price" id="totalprice">₹{{ $total }}</span></span>
            </div>
            <div id="grand-total-detail" class="payable-amount row"><span class="col-8">Grand Total</span>
                <span id="grand-total-amount-detail" class="col-4 text-right fw6">
                    <span class="price" id="totalprice">₹{{ $total }}</span>
                </span>
            </div>
            <div class="row">
                <a href="/checkout" class="theme-btn text-uppercase col-12 remove-decoration fw6 text-center">Proceed to checkout</a>
            </div>
        </div>
        <div class="coupon-container">
            <div class="discount-control">
                <form method="post" class="custom-form">
                    <div class="control-group">

                    </div>

                </form>
            </div>
            <!---->
        </div>
    </div>
</div>
<!-- content -->

@include('layout.footer')