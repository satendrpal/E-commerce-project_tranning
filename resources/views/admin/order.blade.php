@extends('Admin.inc.app')
@section('content')
<style>
  .processing {
    display: inline-block;
    padding: 2px 15px;
    font-size: 15px;
    font-weight: 300;
    color: #fff !important;
    background: green;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 3px;
    text-transform: capitalize;
    white-space: nowrap;
    min-width: 70px;
    text-align: center;
  }

  #icon_id{
    font-size: 30px;
    padding-left: 26px;
  }
</style>
<div class="container">

  <h3 style="padding-left:128px">Order Details</h3>
  <!-- <button id="addproduct_btn"class="dt-button add-new btn btn-primary ms-n1" tabindex="0" aria-controls="DataTables_Table_0" type="button"  data-toggle="modal" data-target="#exampleModal"><span><i class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Category</span></span></button> -->
  <table class="table table-bordered" style="margin-left: 124px; max-width:1100px">
    <thead>
      <tr>
        <th>#</th>
        <th>Order_id</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Price Total</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $i = 1;
        ?>
        @foreach($data as $val)
       
      <tr>
        <td><?php echo $i ?></td>
        <p>
          <td>{{$val->order_id}}</td>
          <td>{{$val->price}}</td>
          <td>{{$val->quantity}}</td>
          <td>{{$val->quantity * $val->price}}</td>
          <td>{{$val->date}}</td>
          <td>
            @if($val->get_status=='paid')
            <span class="processing">Paid</span>
            @endif
          </td>
          <td> 
            @if($val->order_status=='Delivered')
               
                 <span><i class="fa-solid fa-circle-check" id="icon_id"></i></span>
                 
            @else
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="delivey_get('{{$val->get_id}}')">
              Assign
            </button>
          @endif
          </td>
          <td><a href="order_view/{{$val->get_id}}"><button><i class="fa fa-eye" aria-hidden="true"></i></button></a>
          </td>
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

  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delivery Boy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="product_order_get"value="">
          <input type="hidden" id="user_order_get"value="">
        <select style="width: 250px;"  id="select_option">
          <option>Select Option</option>
          @foreach($delivery as $del)
          <option>{{$del->name}}</option>
          @endforeach
        </select>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="delivery_post()">Save</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection