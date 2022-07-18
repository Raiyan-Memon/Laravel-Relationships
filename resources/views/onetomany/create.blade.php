@extends('layouts.app')
@section('content')

<div class="container">

<div class="row">

    <div class="col-2">
        <a href="{{route('onetomany.index')}}" class="btn btn-info">Back</a>

    </div>
    <div class="col">

        <form style="display:block" method="POST" action="{{Route('onetomany.store')}}">
            @csrf
            <input class="form-control mb-3" type="text" placeholder="title" name="title">
            <textarea class="form-control mb-3" name="desc" placeholder="Description" cols="5" rows="6"></textarea>
            <button class="btn btn-success mb-1" type="submit">Save</button>
        </form>
        

    </div>

</div>

</div>

@endsection