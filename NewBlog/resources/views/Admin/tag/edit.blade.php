@extends('layouts.app')

@section('content')

    @include('Admin.Errors.error')

    <div class="panel panel-default">

        <div class="panel-heading">

            Update Tag {{$tag->name}}
        </div>

        <div class="panel-body">

            <form action="{{route('tag.update',['$id'=>$tag->id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="tag" value="{{$tag->name}}" class="form-control">

                </div>



                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-success " type="submit">
                            Store Tag

                        </button>

                    </div>
                </div>
            </form>

        </div>


    </div>

@stop