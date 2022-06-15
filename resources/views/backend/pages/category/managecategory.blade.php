@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Category Manage Page</h4>
    <p class="mg-b-0">Dpage Description</p>
  </div>
</div>
<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="name form-control" type="text"  placeholder="Enter Category Name">
            <span class="text-danger nameError"></span>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="" id="" cols="30" rows="10" class="des form-control" placeholder="Enter Description"></textarea>
            <span class="text-danger desError"></span>
          </div>
          <div class="form-group">
            <label for="tag">Tags</label>
            <input class="tag form-control" type="text"  placeholder="Enter Tag Name">
            <span class="text-danger tagError"></span>
          </div>
          <div class="form-group">
            <label for="tag">Status</label>
            <select  class="status form-control">
              <option value="">-----Select Status-----</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
            <span class="text-danger statusError"></span>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="addcategory btn btn-primary">Add Category</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category -->
<div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="name form-control" type="text" id="name" name="name" placeholder="Enter Category Name">
            <!-- <span class="text-danger nameError"></span> -->
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="des" id="des" cols="30" rows="10" class="des form-control" placeholder="Enter Description"></textarea>
            <!-- <span class="text-danger desError"></span> -->
          </div>
          <div class="form-group">
            <label for="tag">Tags</label>
            <input class="tag form-control" type="text" id="tag" name="tag" placeholder="Enter Tag Name">
            <!-- <span class="text-danger tagError"></span> -->
          </div>
          <div class="form-group">
            <label for="tag">Status</label>
            <select name="category" id="category" class="status form-control">
              <option value="">-----Select Status-----</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
            <!-- <span class="text-danger statusError"></span> -->
            <div class="form-group">
            <input class="tag form-control editid" type="hidden" id="editid" name="editid">
            <!-- <span class="text-danger tagError"></span> -->
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update">Update Category</button>
      </div>
    </div>
  </div>
</div>

<!-- delete -->
<div class="modal fade" id="deletecat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are You Sure to Delete This??</p>
      <form action="">
        <div class="form-group">
          <input type="hidden" class="form-group tempid" value="">
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary deletecata">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="br-pagebody">
  <div class="row">
    <div class="col-md-12">
      <div class="msg"></div>
      <div class="mssg"></div>
      <div class="deletemsg"></div>
      <button class="btn btn-info btn-sm border-rounded" data-target="#addcategory" data-toggle="modal"><i class="fa fa-plus">Add Category</i></button>
      <table class="table border-1">
        <thead>
          <tr>
            <th>#s1</th>
            <th>Categoty Name</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="tbody">

        </tbody>
      </table>


    </div><!-- col-4 -->
  </div><!-- row -->

</div><!-- br-pagebody -->

@endsection