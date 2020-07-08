@extends('layouts.appadmin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Slider</h4>
                            <form action="{{route('update-slider',$OldData->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div style="color:red;">{{$error}}</div>
                                    @endforeach
                                @endif
                                <fieldset>
                                    <div class="form-group">
                                        <label for="cname">Description One</label>
                                        <input id="cname" class="form-control" value="{{$OldData->description1}}" name="description1" minlength="2" type="text"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cname">Description Two</label>
                                        <input id="cname" class="form-control" value="{{$OldData->description2}}" name="description2" minlength="2" type="text"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cname">Slider Image</label>
                                        <input id="cname" class="form-control" name="slider_image" type="file"
                                               >
                                    </div>

                                    <div class="form-group">
                                        <label for="cname">Slider Status</label>
                                        <select id="sortingField" class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Pending</option>
                                        </select>
                                    </div>

                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection