<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
    <div class="container">
         <div class="register">
         <div class="txt"><h1>Sign up</h1></div>
        <form class="register-card " action="process-register.php" method="POST">
        <div class="input">
            <input name="username_account" type="text" class="form-control" id="floatingInput" placeholder="Username" required>
            <input name="email_account" type="email" class="form-control" id="floatingInput" placeholder="Email" required>
            <input name="password_account1" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <input name="password_account2" type="password" class="form-control" id="floatingPassword" placeholder="Verify password" required>
        </div>
            <p class="d-flex justify-content-evenly">Do you have account ?<a href="form-login.php">Login</a></p>
        <div class="button d-grid gap-2 ">
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
    </form>
        </div>
    </div>

    <p >© 2024 Login-Register by Setthaphong Lisri</p>
</body>
</html>