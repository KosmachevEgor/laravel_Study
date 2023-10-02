<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/page.css')}}">
</head>
<body>
<header class="navbar navbar-expand-md navbar-dark bd-navbar">
    <nav class="container-xxl flex-wrap flex-md-nowrap">
        <div class="container-fluid collapse navbar-collapse">
            <a class="navbar-brand" href="#">MYSITE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.index')}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.index')}}">About Us</a>
                    </li>
                    @can('view', auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
</body>
</html>
