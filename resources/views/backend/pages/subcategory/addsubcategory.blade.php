@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Add Product</h4>
        <p class="mg-b-0">Dpage Description</p>
    </div>
</div>

<div class="br-pagebody">
    <form action="{{ Route('subcategoryinsert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="catId">Select Category Name</label>
                    <select name="catId" id="catId" class="form-control">
                        <option value="">------Select Category Name--------</option>
                        @foreach($catname as $catname)

                        <option value="{{ $catname->id }}">{{ $catname->name }}</option>

                        @endforeach

                    </select>
                </div>
                @error('catId')
                        {{ $message }}
                        @enderror
                <div class="form-group">
                    <label for="name">Sub-Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Sub-Category Name" value="{{ old('pname') }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="des">Product Description</label>
                    <textarea class="form-control" class="form-control" name="des" id="des" cols="30" rows="10" placeholder="Enter description" value="{{ old('des') }}"></textarea>
                    <span class="text-danger">
                        @error('des')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

            </div><!-- col-4 -->
            <div class="col-md-6">
            <div class="form-group">
                    <label for="img">Sub-Category image</label>
                    <input type="file" class="form-control" name="img" id="img" placeholder="Enter Sub-Category image" value="{{ old('pname') }}">
                    <span class="text-danger">
                        @error('img')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
              
                <div class="form-group">
                    <label for="catId">Product Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">------Select Status--------</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>


           
        
                <div class="form-group">
                    <button class="btn btn-info form-control">Add Product</button>
                </div>
            </div>
        </div>
</div><!-- row -->
</form>

</div><!-- br-pagebody -->

@endsection