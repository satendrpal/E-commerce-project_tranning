<style>
  .container {

    max-width: 440px;
    padding: 0 20px;
    margin-left: 121px;
    /* margin: 170px auto; */
  }
</style>
@extends('Admin.inc.app')
@section('content')
<style>
  span {
    color: red;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card" style="margin-left:155px;">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product Add</h4>
          <form class="forms-sample" id="Addproduct" method="post">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="exampleInputUsername1">Product Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <span class="name_error"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Category</label>
              <br>
              <select class="form-control" name="slug" id="slug">
                <option value="">Select category</option>
                @foreach($data as $val)
                <option value="{{$val->id}}">{{$val->category_name}}</option>
                @endforeach
              </select>
              <span class="slug_error"></span>

            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">price</label>
              <input type="text" class="form-control" id="price" name="price">
              <span class="price_error"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Color</label>
              <input type="text" class="form-control" id="color" name="color">
              <span class="color_error"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Size</label>
              <input type="text" class="form-control" id="size" name="size">
              <span class="size_error"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">SKU (Stock Keeping Unit)</label>
              <input type="hidden" class="form-control" id="skucode" name="skucode" value="1">

            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Description</label>
              <br>
              <!-- <input type="text" class="form-control" id="category_name" name="" > -->
              <textarea class="form-control" style="height:100px" name="description" id="description"></textarea>
              <span class="description_error"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Product Image</label>
              <input type="file" class="form-control" id="profile" name="profile">
              <span class="file_error"></span>
            </div>
            <button type="submit" class="btn btn-gradient-primary me-2 btn btn-info">Submit</button>
          </form>
        </div>
      </div>




    </div>
  </div>
  @endsection