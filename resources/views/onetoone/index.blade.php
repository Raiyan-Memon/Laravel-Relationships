@extends('layouts.app')

@section('content')
{{-- @dd($data) --}}

<div class="container">
    <a class="btn btn-info" style="color: white" href="{{Route('onetoone.create')}}">Create</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Phone Name</th>
        <th scope="col">Phone_id</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($data as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->getPhone->name}}</td>
        <td>{{$item->phone_id}}</td>
        <td> 
            <a href="{{route('onetoone.show', $item->id)}}"><button class="btn btn-primary btn-sm">Show</button></a>
           
           <form style="display: inline-block" action="{{route('onetoone.destroy', $item->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">Delete</button>
           </form>

        </td>
      </tr>

      @endforeach
    </tbody>
  </table>

</div>  

@endsection