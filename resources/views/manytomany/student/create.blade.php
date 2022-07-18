@extends('layouts.app') @section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container">
    {{ "Add Student" }}

    <form method="POST" action="{{ Route('manytomany.store') }}">
        @csrf
        <input type="text" class="form-control mb-3" name="name" id="" placeholder="Student Name" />

        @php $books = DB::select('select * from relationship.books'); @endphp
        {{-- @dump($books) --}}

        <select class="form-control multiselect" name="books[]" multiple="multiple">
            <option value="">Select Option</option>
            @foreach ($books as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success btn-sm mt-2">Save</button>
    </form>
</div>

<script>
    $(function () {
        $(".multiselect").select2({
            placeholder: "Select Books",
        });
    });
</script>

@endsection