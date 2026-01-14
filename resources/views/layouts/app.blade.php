<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Management Project')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap cdn for styling  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">Task Manager</span>

    @auth

        <span class="text-white me-3">
            Welcome,{{ auth()->user()->name }}

        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>

    @endauth    

</nav>

<div class="container mt-4">

<!-- flashhh messge -->

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    
    @endif

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    
    @endif

    <!-- validation error -->

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            
            @endforeach
        </ul>
    </div>
    
    @endif


    @yield('content')
</div>
    
</body>
</html>