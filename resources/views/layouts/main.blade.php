<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @stack("css") --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
</head>
<body>
<div class="container">
    <div class="col-md-2">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="col-md-8">@yield("content") </div>
    <div class="col-md-2">
        <div class="profile-main">
            <div class="profile-infos">
                <h6>{{Auth::user()->name}}</h6>
                <p>{{Auth::user()->email}}</p>
            </div>
            <div class="profile-buttons">
                <a id="logout" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt">Logut</i>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
</body>
</html>
