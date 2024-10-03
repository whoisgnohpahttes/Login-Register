<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
    <div class="container">
        <div class="login">
            <div class="txt"><h1>Sign in</h1></div>
        <form class="login-card" action="process-login.php" method="POST">
        <div class="input">
            <div class="email-input">
                <input name="email_account" type="email" class="form-control" id="floatingInput" placeholder="Email address" required>
            </div>
            <div class="password-input">
                <input name="password_account" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            </div>
        </div>
        <p class="d-flex justify-content-evenly">Is not a member ?<a href="form-register.php">Register</a></p>
        <div class="button d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
        </div>
    </div>
    <p>© 2024 Login-Register by Setthaphong Lisri</p>
</body>
</html>