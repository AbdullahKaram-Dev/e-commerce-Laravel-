@extends('layouts.appadmin')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories Table</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>

                                    <tr>
                                        <th>ID Category</th>
                                        <th>Category Name</th>
                                        <th>Created_At</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($categories as $category)

                                        <tbody>
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->created_at->diffForHUmans()}}</td>
                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{route('edit-category',$category->id)}}">Update</a></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger"><a  style="color: red" href="{{url('delete-category/'.$category->id)}}">Delete</a></button>
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