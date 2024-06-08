<style>
    .container{
        
  max-width: 440px;
  padding: 0 20px;
  margin-left: 121px;
  /* margin: 170px auto; */
}
    </style>
@extends('Admin.inc.app')
@section('content')
<div class="container">
<div class="row">
              <div class="col-md-6 grid-margin stretch-card" style="margin-left:155px;">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product Update </h4>
                    <form class="forms-sample" id="update_product" method="post">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <div class="form-group">
                     

                        <label for="exampleInputUsername1">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category</label>
                        <br>
                        <select class="form-control" name="slug" id="slug">
                          <option value="">Select category</option>
                            @foreach($catgory as $catgoryss)
                            <option value="{{ $catgoryss->id }}" {{ $catgoryss->id == $data->slug ? 'selected' : '' }}>{{ $catgoryss->category_name }}</option>
                            @endforeach
                        </select>
                       
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">price</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
                        <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{$data->color}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Size</label>
                        <input type="text" class="form-control" id="size" name="size" value="{{$data->size}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">SKU (Stock Keeping Unit)</label>
                        <input type="text" class="form-control" id="skucode" name="skucode" value="{{$data->sku}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <br>
                        <!-- <input type="text" class="form-control" id="category_name" name="" > -->
                        <textarea class="form-control" style="height:100px" name="description" name="description" value="{{$data->name}}">{{$data->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Product Image</label>
                        <input type="hidden" class="form-control" id="profileimage" name="profileimage" value="{{$data->profile}}">
                        <input type="file" class="form-control" id="profile" name="profile" >
                      </div>
                    
                      <button type="submit" class="btn btn-gradient-primary me-2 btn btn-info">update</button>
                    </form>
                  </div>
                </div>
                
              </div>
</div>
@endsection