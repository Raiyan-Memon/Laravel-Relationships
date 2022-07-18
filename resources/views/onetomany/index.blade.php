@extends('layouts.app')
@section('content')

{{-- @dump($data) --}}

<h2 class="text-center">----One To Many----</h2>

<div class="container justify-content-center">
    <a href="{{route('onetomany.create')}}" class="btn btn-primary btn mb-3">Add Post</a>    
    {{-- <div class="row"> --}}


        @foreach ($data as $item)

        <div class="col-12 border mr-2 mt-3">
            <div class="row">
                <div class="col-8">
                    <h3 style="display: inline-block">{{$item->title}}</h3>
                </div>
                <div class="col-2">
                    <form style="display: inline-block" action="{{route('onetomany.destroy', $item->post_id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  style="color: red;" id="deletebtn" class="btn"><i class="fa fa-trash-o" style="font-size:35px;color:red"></i></button>

                    </form>
                </div>
            </div>
            <hr />
            <p>
                {{$item->desc}}
            </p>
            <p>
                <a id="collapse" style="all: unset; color:gray;cursor:pointer" class="btn btn-success btn-sm" data-toggle="collapse" href="#collapseExample{{$item->post_id}}"
                    role="button" aria-expanded="true" parent="true" aria-controls="collapseExample">
                    Comments
                </a>
            </p>
            <div class="collapse"  id="collapseExample{{$item->post_id}}">
                <div class="card text-left card-body">
                    <form action="{{Route('comment.store')}}" method="POST">
                        @csrf
                        <input type="text" name="name" class="formcontorl" placeholder="Add Comment here">
                        <input type="hidden" value="{{$item->post_id}}" name="post_id" id="">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i></button>

                    </form>


                    {{-- @dump($item->comments) --}}
                    <ol style="overflow: scroll; overflow-x: hidden; height:130px; width=10px">
                        @foreach ($item->comments as $item)
                        <li>
                            <div id="rowdata" class="row">
                                <div class="col-6">
                                    <p class="commentdata"> {{$item->name}} </p>
                                </div>
                                <div class="col-2">
                                    <form action="{{route('comment.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="color: red" id="deletebtn" class="btn"><i class="fa fa-minus"></i></button>

                                    </form>
                                </div>
                            </div>


                        </li>
                        @endforeach
                    </ol>


                </div>
            </div>
        </div>

        @endforeach

        {{-- @dd('stop') --}}
    {{-- </div> --}}
</div>
</div>
</div>

<script>

    $(function () {

        // csrf token for ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    })

</script>

@endsection