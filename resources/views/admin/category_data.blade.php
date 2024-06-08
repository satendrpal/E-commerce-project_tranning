@extends('Admin.inc.app')
@section('content')
<div class="container">
  <table class="table table-striped" style="margin-left: 124px; max-width:1100px" border="0" cellspacing="2">
    <h3 style="margin-left: 120px;">Category Details</h3>
    <!-- <button id="addproduct_btn"class="dt-button add-new btn btn-primary ms-n1" tabindex="0" aria-controls="DataTables_Table_0" type="button"  data-toggle="modal" data-target="#exampleModal"><span><i class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Category</span></span></button> -->
    <tr>
      <th>S.no</th>
      <th>Category Name</th>
      <th>Slug</th>
      <th>Status</th>
      <th>Action</th>

    </tr>
    <tbody>
      <?php
      $i = 1;
      ?>
      @foreach($data as $val)
      <tr>
        <td><?php echo $i ?></td>
        <td>{{$val->category_name}}</td>
        <p>
          <td>{{$val->slug}}</td>

          <td>
          @if($val->status == 'active')
          
          <input data-id="{{$val->id}}" onclick="active('{{$val->id}}')"class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $val->status ? 'checked' : '' }}>
            @endif
            @if($val->status == 'Inactive')
            <input data-id="{{$val->id}}" onclick="inactive('{{$val->id}}')"class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" >
            @endif
          </td>
          <td>
            <a href="/cate_delete/{{$val->id}}"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i></button></a>
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
</div>
@endsection