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
    <form action="{{ Route('item.update',$items->id) }}" method="POST" enctype="multipart/form-data">
        <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="catId">Item Code</label>
                    <input class="form-control" type="text" name="item_code" id="item_code" placeholder="item code" value="{{ $items->item_code }}" readonly>
                </div>
                @error('item_code')
                {{ $message }}
                @enderror
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter item Name" value="{{ $items->name }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="des">Item Description</label>
                    <textarea class="form-control" class="form-control" name="des" id="des" cols="30" rows="10" placeholder="Enter Item description">{{ $items->des }}</textarea>
                    <span class="text-danger">
                        @error('des')
                        {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="form-group">
                    <img src="{{ asset('backend/items/'.$items->pic) }}" alt="" height="200"><br>
                    <label for="pic">Item Image</label>
                    <input type="file" class="form-control" name="pic" id="pic" placeholder="Enter Sub-Category image" value="">
                    <span class="text-danger">
                        @error('pic')
                        {{ $message }}
                        @enderror
                    </span>
                </div>



                <div class="form-group">
                    <button class="btn btn-info form-control">Add Product</button>
                </div>
            </div>
            <div class="col-md-4">
                @foreach($gallery as $allpic)
                <form action="{{ route('item.single.update',$allpic->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <a href="{{ Route('item.deletesinglepic',$allpic->id) }}" class="btn btn-sm btn-danger" style="height: 25px;"><i class="fas fa-window-close"></i></a>
                        <img src="{{ asset('backend/items/gallery/'.$allpic->gallery) }}" alt="" height="200">
                        <input type="file" class="form-control" id="" name="{{ $allpic->id }}">
                        <button class="btn btn-sm btn-info">update</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
</div><!-- row -->
</form>
</div>

@endsection