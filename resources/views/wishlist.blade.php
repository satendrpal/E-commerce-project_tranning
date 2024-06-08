
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
    max-width: 500px!important;
    padding-top: 25px;
    position: sticky!important;
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

    </style>
    @include('layout.header')
    @section('container')
    <!-- content -->
    <div class="container">
    <section >
    @php $total=0; @endphp
            @foreach($data as $val)
            
            <div class="row gx-5">
                <aside class="col-lg-4" >
                    <div class="border rounded-4 mb-3 d-flex justify-content-center" id="card-img">
                        <img style="max-width: 75%; max-height: 90%; border: 1px solid;" class="rounded-4 fit" src="{{ asset('Addproduct/' . $val->profile) }}" />

                </aside>
                <main class="col-lg-4">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
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
                        <hr/>
                        <p>
                            {{ $val->description }}
                        </p>
                        <hr />
                        <form action="/addtocard" method="post">
                      @csrf   
                      <input type="hidden" name="quantity" value="{{$val->quantity}}">       
                      <input type="hidden" name="product_id" value="{{$val->id}}">
                    <button type="submit" class="btn btn-warning shadow-0" value="submit" name="submit">Add to Card</button>
                    <button type="submit" class="btn btn-warning shadow-0">Buy Now</button>
                    </form>

                        <a href="/remove_wishlist/{{$val->card_id}}" ><button class="btn btn-success" style="margin-top:20px">Remove</button></a>

                    </div>
                </main>
                </div>
                @php $total += $val->price * $val->quantity; @endphp
                @endforeach  
    </section>
   
    </div>
    <!-- content -->

    @include('layout.footer')