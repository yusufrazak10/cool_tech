<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <div>
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            
            <button type="submit">Login</button>
        </form>
    </div>
    
    

</body>
</html>

