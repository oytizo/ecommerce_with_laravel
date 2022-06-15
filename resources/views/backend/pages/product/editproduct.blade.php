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
    <form action="{{ Route('update',$product->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter Product Name" value="{{ $product->pname }}">
                    <span class="text-danger">
                        @error('pname')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" class="form-control" name="description" id="product_description" cols="30" rows="10" placeholder="Enter Description">{{ $product->discription }}</textarea>
                    <span class="text-danger">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">-----Select Category----</option>
                        <option value="male" @if ($product->category=='male' ) selected @endif>Male</option>
                        <option value="female" @if ($product->category=='female' ) selected @endif>Female</option>
                        <option value="children" @if ($product->category=='children' ) selected @endif>Children</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <select name="size" id="size" class="form-control">
                        <option value="">-----Select Size----</option>
                        <option value="xl" @if ($product->size=='xl' ) selected @endif>XL</option>
                        <option value="m" @if ($product->size=='m' ) selected @endif>M</option>
                        <option value="sm" @if ($product->size=='sm' ) selected @endif>SM</option>
                    </select>
                </div>

            </div><!-- col-4 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="costPrice">Cost Price</label>
                    <input type="text" class="form-control" name="costprice" id="costPrice" placeholder="Enter Cost Price" value="{{ $product->costPrice }}">
                    <span class="text-danger">
                        @error('costprice')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="saleprice">Sale Price</label>
                    <input type="text" class="form-control" name="saleprice" id="saleprice" placeholder="Enter Sale Price" value="{{ $product->saleprice }}">
                    <span class="text-danger">
                        @error('saleprice')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" value="{{ $product->quantity }}">
                    <span class="text-danger">
                        @error('quantity')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-----Select status----</option>
                        <option value="1" @if ($product->status==1) selected @endif>Active</option>
                        <option value="2" @if ($product->status==2) selected @endif>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-info form-control">Update Product</button>
                </div>
            </div>
        </div>
</div><!-- row -->
</form>

</div><!-- br-pagebody -->

@endsection