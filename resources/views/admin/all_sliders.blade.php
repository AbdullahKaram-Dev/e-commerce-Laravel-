@extends('layouts.appadmin')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sliders Table</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID Slider</th>
                                        <th>Description One</th>
                                        <th>Description Two</th>
                                        <th>Slider Image</th>
                                        <th>Slider Status</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->description1}}</td>
                                        <td>{{$slider->description2}}</td>
                                        <td><img src="{{asset('slider_images/'.$slider->slider_image)}}"></td>
                                        @if($slider->status == 1)
                                        <td>
                                            <label class="badge badge-success">Active</label>
                                        </td>
                                        @else
                                        <td>
                                            <label class="badge badge-warning">Pending</label>
                                        </td>
                                        @endif
                                        <td>{{$slider->created_at->diffForHUmans()}}</td>

                                        @if($slider->status == 1)
                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{url('Change-status-slider-pending/'.$slider->id)}}">Pending</a></button>
                                            </td>
                                        @else
                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{url('Change-status-slider-active/'.$slider->id)}}">Active</a></button>
                                            </td>
                                        @endif
                                        <td>
                                            <label class="btn btn-outline-primary"><a href="{{route('edit-slider',$slider->id)}}">Update</a></label>
                                        </td>
                                        <td>
                                            <label class="btn btn-outline-danger"><a style="color:red" href="{{url('delete-slider/'.$slider->id)}}">Delete</a></label>
                                        </td>
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