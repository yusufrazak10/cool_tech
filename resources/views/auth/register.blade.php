<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <div>
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
            
            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>


