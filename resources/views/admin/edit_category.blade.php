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
        <h4 class="card-title">Update Category</h4>
        <form action="{{route('update-category',$OldData->id)}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <fieldset>
                <div class="form-group">
                    <label for="cname">Category Name</label>
                    <input id="cname" class="form-control" value="{{$OldData->category_name}}" name="category_name" minlength="4"
                           type="text" required>

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


