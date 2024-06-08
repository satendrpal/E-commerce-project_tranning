<?php

use App\Http\Controllers\HomeController;
use App\Register;

if (Session::has('userId')) {
    $user = Register::where('id', '=', Session::get('userId'))->first();
    $user_id = $user->id;
}
?>

<style>
    #mycontainer {
        min-height: 167px;
    }

    tr th {
        text-align: center;
    }

    .delete {
        font-size: 27px;
        color: red;
    }
</style>
<style>
    .pending {
        background-color: #ffc107;
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    .Delivered {
        background-color: #28a745;
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }
    
</style>
@include('layout.header')
@include('layout.popup')
@section('container')
<div class="container">
    <section>
        <div class="text-center">
            <h4 class="mb-3"><strong>My Orders</strong></h4>

            <div class="row" id="mycontainer">
              
                <div class="col">
                    <table class="table table-bordered" id="table" border="2" cellspacing="0">
                        <thead>
                            <tr class="thead-dark">
                                <th>S.no</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($data as $value)
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> <img class="" src="{{('/Addproduct/'.$value->profile)}}" style="height:50px;width:100px;"></td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{($value->quantity *$value->price)}}</td>
                                <td>
                                    @if($value->order_status=='Delivered')
                                    <span class="Delivered">Delivered</span>
                                    @else
                                    <span class="pending">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    $os = explode(',', $value->userid_get);
                                    ?>
                                    @if(!in_array($value->user_order_id, $os))
                                    <button class="btn btn-success" data-target="#exampleModal" data-toggle="modal" onclick="rating_get('{{$value->get_id}}')">Rating</button>
                                    @endif
                                    @if(in_array($value->user_order_id, $os))
                                    <?php
                                    if ($value->rating_count != 0)
                                        $rating_count = $value->rating / $value->rating_count;
                                    else
                                        $rating_count = 0;
                                    ?>
                                    <span class="review-stars" style="color: #1e88e5;">
                                        @if($rating_count <= 0) <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            @elseif($rating_count > 0 && $rating_count <= 1) <i class="fa fa-star" aria-hidden="true"></i>
                                                @if( $rating_count === 1)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                @else
                                                <i class="fa fa-star-half" aria-hidden="true"></i>
                                                @endif
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @elseif($rating_count > 1 && $rating_count <= 2) <i class="fa fa-star" aria-hidden="true"></i>

                                                    @if( $rating_count > 2 && $rating_count <= 3) <i class="fa fa-star" aria-hidden="true"></i>
                                                        @else
                                                        <i class="fa fa-star-half" aria-hidden="true"></i>
                                                        @endif
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        @elseif($rating_count > 2 && $rating_count <= 3) <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            @if( $rating_count === 3)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            @else
                                                            <i class="fa fa-star-half" aria-hidden="true"></i>
                                                            @endif
                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                            @elseif($rating_count > 3 && $rating_count <= 4) <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                @if( $rating_count === 4)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                @else
                                                                <i class="fa fa-star-half" aria-hidden="true"></i>
                                                                @endif
                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @elseif($rating_count > 4 && $rating_count <= 5) <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    @if( $rating_count >= 5)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    @else
                                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                                    @endif
                                                                    @endif
                                    </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="" class="delete" data-id="{{$value->product_id}}" data-quantity="{{$value->product_id}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <input type="hidden" name="product_id" id="get_id" value="">
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_send_manager" class="btn btn-success" onclick="send_rating()" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')