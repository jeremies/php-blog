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
            <li class="right"><a href="/auth/register">Sign up</a></li>
            <li class="right"><a href="/login">Sign in</a></li>
        </ul>
    </div>
    <div class="content">
    @if (count($errors) > 0)
		<div class="alert">
			<strong>Whoops! Something went wrong!</strong>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
    @yield('content')
    </div>
</body>
</html>
