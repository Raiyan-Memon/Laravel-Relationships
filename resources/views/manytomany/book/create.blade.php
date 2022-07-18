@extends('layouts.app')



@section('content')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



{{"create book"}}
<form method="POST" action="{{Route('book.store')}}">
    @csrf

    <input type="text" class="form-control mb-3" name="title" id="" placeholder="Book Title">

    @php $students = DB::select('select * from relationship.students'); @endphp

    <select class="form-control multiselect" name="students[]" multiple="multiple">
        <option value="">Select Option</option>
        @foreach ($students as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>

    <button class="btn btn-success mt-2 btn-sm" type="submit">Save</button>

</form>
    <script>
        $(function () {
            $(".multiselect").select2({
                placeholder: "Select Books",
            });
        });
    </script>   

@endsection