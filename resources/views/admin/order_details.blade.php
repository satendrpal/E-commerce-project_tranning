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


    .sale {
        display: flex;
        -moz-column-gap: 20px;
        column-gap: 20px
    }

    .sale .sale-section {
        font-size: 16px;
        width: 50%
    }

    .sale .sale-section .secton-title {
        font-size: 18px;
        color: #320505;
        padding: 15px 0;
        border-bottom: 1px solid hsla(0, 0%, 63.5%, .2)
    }

    .sale .sale-section .section-content {
        display: block;
        padding: 20px 0
    }

    .sale .sale-section .section-content .row {
        display: block;
        padding: 7px 0
    }

    .sale .sale-section .section-content .row .title {
        width: 200px;
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block
    }

    .sale .sale-section .section-content .row .value {
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block
    }

    .table .qty-row {
        display: block;
        margin-bottom: 5px
    }

    .table .qty-row:last-child {
        margin-bottom: 0
    }

    .table .radio {
        margin: 0
    }

    .summary-comment-container .comment-container {
        margin-top: 20px;
        float: left
    }

    .summary-comment-container .comment-container .comment-list {
        margin-top: 40px
    }

    .summary-comment-container .comment-container .comment-list li {
        margin-bottom: 20px
    }

    .summary-comment-container .comment-container .comment-list li:last-child {
        margin-bottom: 0
    }

    .summary-comment-container .comment-container .comment-list li p {
        margin: 5px 0 0;
        color: #8e8e8e
    }

    .sale-summary {
        margin-top: 20px;
        height: 130px;
        float: right
    }

    .sale-summary tr td {
        padding: 5px 8px;
        vertical-align: text-bottom
    }

    .sale-summary tr.bold {
        font-weight: 600;
        font-size: 15px
    }

    .sale-summary tr.border td {
        border-bottom: 1px solid hsla(0, 0%, 63.5%, .2)
    }

    .sale {
        display: flex;
        -moz-column-gap: 20px;
        column-gap: 20px
    }

    .sale .sale-section {
        font-size: 16px;
        width: 50%
    }

    .sale .sale-section .secton-title {
        font-size: 18px;
        color: #8e8e8e;
        padding: 15px 0;
        border-bottom: 1px solid hsla(0, 0%, 63.5%, .2)
    }

    .sale .sale-section .section-content {
        display: block;
        padding: 20px 0
    }

    .sale .sale-section .section-content .row {
        display: block;
        padding: 7px 0;
    }

    .sale .sale-section .section-content .row .title {
        width: 200px;
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block
    }

    .sale .sale-section .section-content .row .value {
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block
    }

    .sale .sale-section .section-content .row .title {
        width: 200px;
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block;
    }

    .sale .sale-section .section-content .row .value {
        color: #3a3a3a;
        letter-spacing: -.26px;
        display: inline-block
    }

    .sale-container   .table .qty-row {
        display: block;
        margin-bottom: 5px
    }

    .sale-container    .table .qty-row:last-child {
        margin-bottom: 0
    }

    .sale-container    .table .radio {
        margin: 0
    }

    .sale-container .summary-comment-container .comment-container {
        margin-top: 20px;
        float: left
    }

    .sale-container  .summary-comment-container .comment-container .comment-list {
        margin-top: 40px
    }

    .sale-container   .summary-comment-container .comment-container .comment-list li {
        margin-bottom: 20px
    }
    .sale-container  .sale .sale-section .section-content .row .title {
    width: 200px;
    color: #3a3a3a;
    letter-spacing: -.26px;
    display: inline-block;
}

.sale-container .sale .sale-section .section-content .row .value {
    color: #3a3a3a;
    letter-spacing: -.26px;
    display: inline-block
}
.sale-container .sale .sale-section .section-content .row .title {
    width: 200px;
    color: #3a3a3a;
    letter-spacing: -.26px;
    display: inline-block;
}
p{
    white-space: nowrap;
}
</style>
<div class="container">
    <table class="table table-striped" style="margin-left: 124px;" border="0" cellspacing="2">
        <h3 style="margin-left: 200px;">Order Details</h3>
        <!-- <button id="addproduct_btn"class="dt-button add-new btn btn-primary ms-n1" tabindex="0" aria-controls="DataTables_Table_0" type="button"  data-toggle="modal" data-target="#exampleModal"><span><i class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Category</span></span></button> -->


        <thead>
            <tr style="height: 65px;"><!---->
                <th class="grid_head sortable">Product Name</th>
                <th class="grid_head sortable">Price</th>
                <th class="grid_head sortable">Item Status</th>
                <!-- <th class="grid_head sortable">Subtotal</th> -->
                <th class="grid_head sortable">Grand Total</th>
                <th class="grid_head sortable">Date</th>

                <th class="grid_head sortable">Status</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
        <tbody>

            @foreach($data as $val)

            <div class="sale-container" style="margin-left: 200px;">
                <div class="accordian active">
                    <div class="accordian-header">

                        <i class="icon accordian-up-icon"></i>
                    </div>
                    <div class="accordian-content">
                        <div>
                            <div class="sale">
                                <div class="sale-section">
                                    <div class="secton-title"><span>Order Information</span></div>
                                    <div class="section-content">
                                        <div class="row"><p><span class="title">
                                                Order Date
                                            <span class="value" style="padding-left: 120px;">
                                                {{$val->date}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Order Status
                                            </span> <span class="value">
                                                {{$val->get_status}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Channel
                                            </span> <span class="value">
                                                Default
                                            </span></p></div>
                                    </div>
                                </div>
                                <div class="sale-section">
                                    <div class="secton-title"><span>Account Information</span></div>
                                    <div class="section-content">
                                        <div class="row"><p><span class="title">
                                                Customer Name
                                            </span> <span class="value">
                                                {{$val->names}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Email
                                            </span> <span class="value">
                                                {{$val->email}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Customer Group
                                            </span> <span class="value">
                                                General
                                            </span></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
<hr/>
<div class="sale-container" style="margin-left: 0px;">
                <div class="accordian active">
                    <div class="accordian-header">

                        <i class="icon accordian-up-icon"></i>
                    </div>
                    <div class="accordian-content">
                        <div>
                            <div class="sale">
                                <div class="sale-section">
                                    <div class="secton-title"><p><span>Address</span></div>
                                    <div class="section-content">
                                        <div class="row"><p><span class="title">
                                               Address
                                            </span> <span class="value">
                                                {{$val->address}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Order Status
                                            </span> <span class="value">
                                                {{$val->get_status}}
                                            </span></p></div>
                                        <div class="row"><p><span class="title">
                                                Channel
                                            </span> <span class="value">
                                                Default
                                            </span></p></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <hr/>           
                <div class="secton-title"><span>Product Details</span></div>
                <tr>
       <p>
       <td>{{$val->name}}</td>
          <td>{{$val->price}}</td>
          <td>{{$val->quantity}}</td>
          <td>{{$val->quantity * $val->price}}</td>
          <td>{{$val->date}}</td>
          <td>
            <!-- @if($val->get_status=='paid')
            <span class="processing">Paid</span>
            @endif -->
          </td>
          <!-- <td><button><i class="fa fa-eye" aria-hidden="true"></i></button> -->
             </td>
                @endforeach
                </tbody>
  </table>
  

                @endsection