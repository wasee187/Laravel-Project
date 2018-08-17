@extends('layouts.app')

@section('content')

    @include('Admin.Errors.error')


    <div class="panel panel-default">

        <div class="panel-heading">

            Update Settings
        </div>

        <div class="panel-body">

            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">

                </div>


                <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="number" name="contact_number" class="form-control" value="{{$settings->contact_number}}">

                </div>


                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$settings->address}}">

                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$settings->email}}">

                </div>

                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-success " type="submit">
                            Update Post

                        </button>

                    </div>
                </div>
            </form>

        </div>


    </div>

@stop