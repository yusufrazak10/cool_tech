@extends('layouts.app') <!-- Extend the base layout to use common structure -->

@section('content') <!-- Define the content section -->

    <!-- Display the page title: Admin Password Entry -->
    <h1>Enter Admin Password</h1>

    <!-- Check if there is an error message in the session and display it -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }} <!-- Show the error message from the session -->
        </div>
    @endif

    <!-- Create a form for the admin password input -->
    <form action="{{ url('/admin-console') }}" method="POST">
        @csrf <!-- Include the CSRF token for security -->

        <!-- Label for the password input field -->
        <label for="password">Password:</label>
        
        <!-- Password input field, marked as required -->
        <input type="password" name="password" id="password" required>
        
        <!-- Submit button to submit the form -->
        <button type="submit">Submit</button>
    </form>
@endsection









    