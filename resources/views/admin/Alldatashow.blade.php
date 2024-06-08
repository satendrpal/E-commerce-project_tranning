@extends('Admin.inc.app')
@section('content')
<div class="container">
  <!-- <table class="table table-striped" style="margin-left: 124px;" border="0" cellspacing="2"> -->
    <h3 style="margin-left: 120px;">Product Details</h3>
    <!-- <button id="addproduct_btn"class="dt-button add-new btn btn-primary ms-n1" tabindex="0" aria-controls="DataTables_Table_0" type="button"  data-toggle="modal" data-target="#exampleModal"><span><i class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Category</span></span></button> -->
    <table class="table table-bordered" style="margin-left: 124px; max-width:1100px">
    <thead>
    <tr>
      <th>S.no</th>
      <th>Product</th>
      <th>Product Name</th>
      <th>prices</th>
      <th>Size</th>
      <th>Description</th>
      <!-- <th>Status</th> -->
      <th>Action</th>
      
    </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      ?>
      @foreach($data as $val)
      <tr>
        <td><?php echo $i ?></td>
        <td><img src="{{ asset('Addproduct/' . $val->profile) }}" width=50rem height="50rem"></td>
        <td>{{$val->name}}</td>
        <p>
          <td>{{$val->price}}</td>
          <td>{{$val->size}}</td>
          <td>{{$val->description}}</td>
          <!-- <td>
            @if($val->status == 'Active')
            <input data-id="{{$val->id}}" onclick="Active_product('{{$val->id}}')" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $val->status ? 'checked' : '' }}>
            @endif
            @if($val->status == 'Inactive')
            <input data-id="{{$val->id}}" onclick="inactive_product('{{$val->id}}')" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
            @endif
          </td> -->
          <td><a href="/edit/{{$val->id}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
          <td><a href=""><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i></button></a></td>
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
@endsection