@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Edit product Page</h4>
        <p class="mg-b-0">Dpage Description</p>
    </div>
</div>

<div class="br-pagebody">
    <form action="{{ Route('subcatupdate',$subcategory->id) }}" method="POST" enctype="multipart/form-data">
        <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="catId">Select Category Name</label>
                    <select name="catId" id="catId" class="form-control">
                        <option value="">------Select Sub Category----</option>
                        @foreach($catname as $catname)


                        <option value="{{ $catname->id }}" @if($catname->id == $subcategory->catId) selected @endif >{{ $catname->name }}</option>

                        @endforeach

                    </select>
                </div>
                @error('catId')
                {{ $message }}
                @enderror
                <div class="form-group">
                    <label for="name">Sub-Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Sub-Category Name" value="{{ $subcategory->subcatname }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="des">Product Description</label>
                    <textarea class="form-control" class="form-control" name="des" id="des" cols="30" rows="10" placeholder="Enter description">{{ $subcategory->des }}</textarea>
                    <span class="text-danger">
                        @error('des')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

            </div><!-- col-4 -->
            <div class="col-md-6">
                <div class="form-group">
                    <img src="{{ asset('backend/subcategoryimages/'.$subcategory->img) }}" alt="" height="100">
                    <label for="img">Sub-Category image</label>
                    <input type="file" class="form-control" name="img" id="img" placeholder="Enter Sub-Category image">
                    <span class="text-danger">
                        @error('img')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label for="catId">Product Status</label>
                    <select name="status" id="status" class="form-control">
                        @if($subcategory->status==1)
                        <option value="{{ $subcategory->status }}">@if($subcategory->status==1){{ "Active" }}
                            @else{{ "Inactive" }}

                            @endif
                        </option>
                        <option value="2">Inactive</option>

                        @else
                        <option value="{{ $subcategory->status }}">@if($subcategory->status==2){{ "Active" }}
                            @else{{ "Inactive" }}

                            @endif
                        </option>
                        <option value="1">Active</option>
                        @endif
                    </select>
                </div>




                <div class="form-group">
                    <button class="btn btn-info form-control">Add Product</button>
                </div>
            </div>
        </div>
</div><!-- row -->
</form>
</div>

@endsection