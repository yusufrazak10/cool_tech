@extends('layouts.app')

@section('content')
    <h1>Enter Author Password</h1>

    <!-- Display error message if it exists -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form to enter author password -->
    <form action="{{ url('/writers-console') }}" method="POST">
        @csrf
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Submit</button>
    </form>
@endsection





