@extends('Admin.inc.app')
@section('content')
<div class="container">
<div class="row">
              <div class="col-md-6 grid-margin stretch-card" style="margin-left:370px;">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <form class="forms-sample" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" id="category_name" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Slug</label>
                        <input type="text" class="form-control" id="slug" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Status</label>
                        <!-- <input type="text" class="form-control" id="category_name" > -->
                        <select class="form-control" name="status" id="status">
                        <option value="">Select status</option>
                        <option value="active"> Active</option>
                       <option value="Inactive">Inactive</option>
                      </select>
                      </div>
                  </div>
                  <button type="button" class="btn btn-gradient-primary me-2 btn btn-info" id="category_btn">Create</button>
                    </form>
                </div>
              </div>
</div>

@endsection