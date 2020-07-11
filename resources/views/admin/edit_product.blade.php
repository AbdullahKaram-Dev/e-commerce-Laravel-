@extends('layouts.appadmin')

@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="row grid-margin">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Product</h4>
            <form method="POST" action="{{url('update-product/'.$OldData->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color:red;">{{$error}}</div>
                    @endforeach
                @endif
                <fieldset>
                    <div class="form-group">
                        <label for="cname">Product Name</label>
                        <input id="cname" class="form-control" value="{{$OldData->product_name}}" name="product_name" minlength="2"
                               type="text"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="cname">Product Price</label>
                        <input id="cname" class="form-control" value="{{$OldData->product_price}}" name="product_price" minlength="2"
                               type="number"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="cname">Select Category</label>
                        <select id="sortingField" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cname">Product Image</label>
                        <input id="cname" class="form-control"  name="product_image" type="file"
                               >
                    </div>

                    <div class="form-group">
                        <label for="cname">Product Status</label>
                        <select id="sortingField" class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Pending</option>
                        </select>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Update">
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection