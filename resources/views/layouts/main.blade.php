<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/trix/trix.css') }}">
        <script src="{{ asset('assets/trix/trix.js') }}"></script>
        <title>@yield('title')</title>
    </head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 border-bottom mb-4 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Support Ticket</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </div>
                </div>
            </div>
        </nav>
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Menu</h5>
                    <hr>
                    <div class="list-group">
                        @can('isAdmin')
                        <a href="{{ route('dashboard.index') }}"
                            class="list-group-item">Dashboard</a>
                        @endcan

                        @can('isAgent')
                        <a href="{{ route('dashboard.index') }}"
                            class="list-group-item">Dashboard</a>
                        @endcan

                        @can('isAdmin')
                        <a href="{{ route('category.index') }}"
                           class="list-group-item">Ticket Categories</a>
                        @endcan

                        <a href="{{ route('ticket.index') }}"
                           class="list-group-item">Tickets</a>

                        @can('isAdmin')
                        <a href="{{ route('user.index') }}"
                           class="list-group-item">Users</a>
                        @endcan
                    </div>

                    <div class="list-group mt-4">
                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action">Logged as: <b>{{ auth()->user()->name }}</b></a>
                        <a href="{{ route('profile.index') }}"
                           class="list-group-item">Profile</a>
                        <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            @yield('breadcump')
                        </ol>
                    </nav>
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
    </body>

</html>
