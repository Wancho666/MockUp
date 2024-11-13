@extends('layouts.layout')

@section('content')
<section class="d-flex justify-content-center align-items-center" style="background-color: #37584f; min-height: 100vh;">
    <article class="p-4 shadow w-100 rounded-4" style="max-width: 400px; background-color: #f3f2ed;">
        <h1 class="text-center mt-4 fw-bold" style="color: #37584f;">Register</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingName" placeholder="Your Name" required>
                <label for="floatingName">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" required>
                <label for="floatingPasswordConfirm">Confirm Password</label>
            </div>
            <button type="submit" class="fw-bold rounded-4 mt-3 w-100" style="background-color: #e8ce83; border: none;">Register</button>
        </form>

        <p class="fw-semibold text-center mt-3"><small>Already have an account? <a href="{{ route('login') }}" style="color: #37584f;">Login here</a></small></p>
    </article>
</section>
@endsection