@extends('layouts.layout')
@section('content')

<style>
    /* Responsive styling for background and alignment */
    section {
        min-height: 100vh;
        width: 100%;
        background: #37584f;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Responsive styling for the login card */
    section article {
        background-color: #f3f2ed;
        width: 100%;
        max-width: 400px; /* Limits the max width for larger screens */
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Text and button colors */
    section h1, p, a, button {
        color: #37584f;
    }

    /* Button styling */
    button {
        background: #e8ce83;
        border: none;
        padding: 0.7em;
    }

    /* Link styling */
    a {
        text-decoration: none;
    }
</style>

<section class="d-flex justify-content-center align-items-center">
    <article>
        <h1 class="text-center fw-bold">Login</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login.submit') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="fw-bold rounded-4 mt-4 w-100">LOGIN</button>
        </form>

        <p class="fw-semibold text-center mt-3">
            <small>New here? <a href="{{ route('register') }}">Create an account</a></small>
        </p>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </article>
</section>
@endsection