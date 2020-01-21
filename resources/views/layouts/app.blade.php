<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Blog</title>
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}" type="text/css">
    @yield('css')
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="/new">New article</a></li>
            <li><a href="/">Articles</a></li>
        </ul>
    </div>
    <div class="content">
    @yield('content')
    </div>
</body>
</html>