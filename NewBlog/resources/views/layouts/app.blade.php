<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

     @if(Auth::check())
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-group">

                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>

                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts')}}">All Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('categories')}}">All Categories</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('tags')}}">All Tags</a>
                            </li>


                           @if(Auth::user()->admin)

                                <li class="list-group-item">
                                    <a href="{{route('users')}}">View User</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{route('user.create')}}">Create New User</a>
                                </li>

                               @endif

                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">My Profile</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('post.trash')}}">All Trashed Post</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('post.create')}}">Create New Post</a>
                            </li>


                            <li class="list-group-item">
                                <a href="{{route('category.create')}}">Create New Category</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('tag.create')}}">Create New Tag</a>
                            </li>

                            @if(Auth::user()->admin)

                                <li class="list-group-item">
                                    <a href="{{route('settings')}}">Settings</a>
                                </li>
                                @endif


                        </ul>
                    </div>


         @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}")


        @endif

        @if(Session::has('info'))

        toastr.info("{{Session::get('info')}}")


        @endif
    </script>

 @yield('scripts')
</body>
</html>