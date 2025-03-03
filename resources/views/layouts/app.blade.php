<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Laravel Project</title>
</head>

<body>

    <!-- Main content injected by individual pages -->
    <div class="main-content">
        @yield('content')  
    </div>

    <!-- Form for logout -->
    @auth
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
     @endauth
     
    <!-- Cookie Notification Component -->
    <x-cookie-notification />
</body>
</html>

