@extends('layouts.app') @section('content')

{{-- @dump($project->tasks) --}}

<style>
    .verticalline {
        width: 3px;
        border: 3px solid lightblue;
        height: 250px;
        display: inline-block;
        text-align: center;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-5">
            <h4 class="text-center">Project</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Project Alloted to</th>
                        <th scope="col">Task done by Users</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $data)

                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td >{{$data->title}}</td>
                        <td>
                        @foreach ($data->users as $useritems)
                            {{$useritems->name}}
                        @endforeach
                        </td>
                        <td>
                            @foreach ($useritems->tasks as $useritems1)
                            {{-- @dump($useritems1->name) --}}
                                {{$useritems1->name}},
                            @endforeach
                            </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2 text-center">
            <h2 class="verticalline"></h2>
        </div>
        <div class="col-5">
            <h4 class="text-center">User</h4>
            {{-- @dump($user) --}}
         <a href="{{route('register')}}">   <button class="btn btn-primary btn-sm">Add User</button></a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Project_id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $useritem)

                    <tr>
                        <th scope="row">{{$useritem->id}}</th>
                        <td colspan="2">{{$useritem->name}}</td>
                        <td colspan="2">{{$useritem->project_id}}</td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
                
            


        </div>
    </div>

    <div class="container">

        <h3 class="text-center">Tasks</h3>

       <a href="{{route('hasonethrough.create')}}"> <button class="btn btn-primary btn-sm">Add Task</button></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project_id</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $task = DB::select('select * from relationship.tasks');
                @endphp

                @foreach ($task as $useritem)

                <tr>
                    <th scope="row">{{$useritem->id}}</th>
                    <td colspan="2">{{$useritem->name}}</td>
                    <td colspan="2">{{$useritem->user_id}}</td>

                </tr>

                @endforeach
            </tbody>
        </table>


    </div>


</div>
@endsection
