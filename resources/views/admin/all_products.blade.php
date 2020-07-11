@extends('layouts.appadmin')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products Table</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID Product</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Category ID</th>
                                        <th>Product Price</th>
                                        <th>Product Status</th>
                                        <th>Created_at</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @php $id = 1  @endphp
                                        @foreach($products  as $product)
                                            <td>{{$id++}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td><img src="{{asset('images_products/'.$product->product_image)}}"></td>
                                            <td>{{$product->category_id}}</td>
                                            <td>{{'$'.$product->product_price}}</td>

                                            @if($product->status == 1)
                                                <td>
                                                    <label class="badge badge-success">Active</label>
                                                </td>
                                            @else
                                                <td>
                                                    <label class="badge badge-warning">Pending</label>
                                                </td>
                                            @endif
                                            <td>{{$product->created_at->diffForHumans()}}</td>

                                            @if($product->status == 1)
                                                <td>
                                                    <button class="btn btn-outline-primary"><a href="{{url('Change-status-product-pending/'.$product->id)}}">Pending</a></button>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-outline-primary"><a href="{{url('Change-status-product-active/'.$product->id)}}">Active</a></button>
                                                </td>
                                            @endif

                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{url('edit-product/'.$product->id)}}">Update</a></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger"><a style="color: red" href="{{url('delete-product/'.$product->id)}}">Delete</a></button>
                                            </td>


                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection