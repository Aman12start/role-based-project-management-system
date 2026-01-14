@extends('layouts.app')

@section('title','Login')



@section('content')

<div class="row justify-content-center">
    <div class="card shadow p-4">
        <h4 class="text-center mb-3">Login</h4>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf 
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>

    </div>

</div>



@endsection