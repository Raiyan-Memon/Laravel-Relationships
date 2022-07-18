@extends('layouts.app') @section('content')


<style>

.verticalline{

    width: 3px; border: 3px solid lightblue; height:250px;
    display: inline-block;
    text-align: center;

}


</style>

<h2 class="text-center">----Many To Many----</h2>


<div class="container">
    <div class="row">
        <div class="col-5 text-center">
            <p class="">Student</p>
            @php $student = DB::select('select * from relationship.students');
            @endphp
            {{-- @dump($student) --}}

            <a href="{{route('manytomany.create')}}"><button class="btn btn-primary btn-sm mb-2">Add Student</button></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            
                            {{-- <a href="{{route('manytomany.show', $item->id)}}"><button class="btn btn-primary btn-sm">
                                    Show
                                </button></a> --}}
                           
                            <form style="display: inline-block" action="{{route('manytomany.destroy', $item->id)}}"
                                method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                            
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-2 text-center">
            <h2 class="verticalline"></h2>
        </div>

        <div class="col-5 text-center">
            <p>Library</p>
            @php $book = DB::select('select * from relationship.books'); @endphp
            {{-- @dump($book) --}}

            <a href="{{route('book.create')}}"><button class="btn btn-primary btn-sm mb-2">Add Book</button></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td>
                            
                            {{-- <a href="{{route('book.show', $item->id)}}"><button class="btn btn-primary btn-sm">
                                    Show
                                </button></a> --}}
                            
                            <form style="display: inline-block" action="{{route('book.destroy', $item->id)}}"
                                method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                            
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container text-center">
        <br>
        <p class="">Pivot Table</p>

        @php
            $pivot = DB::select('select * from relationship.student_books');
        @endphp

        {{-- @dump($pivot) --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Student_id</th>
                    <th scope="col">Book_id</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pivot as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->student_id}}</td>
                    <td>{{$item->book_id}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>




    </div>


</div>

@endsection