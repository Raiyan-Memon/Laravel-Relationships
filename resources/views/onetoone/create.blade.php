@extends('layouts.app') @section('content')

<div class="container">
    <form action="{{ route('onetoone.store') }}" method="POST">
        @csrf

        <input type="text" name="name" id="" class="form-control" placeholder="Name" /><br />

        @php $phonedata = DB::select('select * from relationship.phones');
        @endphp

        <select class="form-control" name="phone_id" id="">
            <option value="">
                Select from an option
                <hr />
            </option>
            <option value="">
                <hr />
            </option>

            @foreach ($phonedata as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </form>

    <br />
    <a href="{{ Route('onetoone.index') }}" class="btn btn-info btn-sm">Back</a>
</div>
@endsection