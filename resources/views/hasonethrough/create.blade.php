@extends('layouts.app')


@section('content')


<div class="container">


    <form action="{{route('hasonethrough.store')}}" method="POST">
        @csrf

        <input class="form-control mb-2" type="text" name="name" id="" placeholder="Task Name">
       
        <select class="form-control mb-2" name="user_id" id="">
            <option value="">Select User</option>

            @php
                $userdata = DB::select('select * from relationship.users');
            @endphp

            @foreach ($userdata as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach

        </select>

        <button type="submit" class="btn btn-success btn-sm">Save</button>

    </form>

</div>

@endsection