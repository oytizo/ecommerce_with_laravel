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
    <form action="{{ Route('item.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="catId">Item Code</label>
                    <input class="form-control" type="text" name="item_code" id="item_code" placeholder="item code">
                </div>
                @error('catId')
                {{ $message }}
                @enderror
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter item Name" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="des">Item Description</label>
                    <textarea class="form-control" class="form-control" name="des" id="des" cols="30" rows="10" placeholder="Enter Item description" value="{{ old('des') }}"></textarea>
                    <span class="text-danger">
                        @error('des')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

            </div><!-- col-4 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pic">Item image</label>
                    <input type="file" class="form-control" name="pic" id="pic" placeholder="Enter Sub-Category image" value="">
                    <span class="text-danger">
                        @error('pic')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label for="gallery">Sub-Category Gallery</label>
                    <input type="file" class="form-control" name="gallery[]" id="gallery" placeholder="Enter Sub-Category Gallery" multiple value="">
                    <span class="text-danger">
                        @error('gallery')
                        {{ $message }}
                        @enderror
                    </span>
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