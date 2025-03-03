<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <div>
        <h2>Welcome to the Dashboard</h2>
        
        <!-- Logout form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
<!-- Check if the user is logged in and display welcome message -->
@if (Auth::check())
    <p>Welcome, {{ Auth::user()->name }}!</p>
    @if(Auth::user()->isAdmin())
        <p>You have admin access.</p>
    @endif
@endif

    

</body>
</html>

