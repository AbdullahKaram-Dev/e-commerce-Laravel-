@extends('layouts.appadmin')

@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div style="color:red;">{{$error}}</div>
@endforeach
@endif
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Category</h4>
                            <form action="{{route('save-category')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <fieldset>
                                    <div class="form-group">
                                        <label for="cname">Category Name</label>

                                        <input id="cname" class="form-control" name="category_name" minlength="4"
                                               type="text" required>

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