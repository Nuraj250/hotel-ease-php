<!DOCTYPE html>
<html>
<head>
    <title>Login | HotelEase</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="/Auth/login">
        <input type="email" name="email" placeholder="Email" required /><br/>
        <input type="password" name="password" placeholder="Password" required /><br/>
        <button type="submit">Login</button>
    </form>
    <p>No account? <a href="/Auth/register">Register</a></p>
</body>
</html>
