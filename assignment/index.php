<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assignment/styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assignment/js/login.js"></script>
    <title>Harsh's Trip Planning Web Application
    </title>

</head>

<body>
    <?php require_once('./layout/header.php') ?>
    <div class="container-fluid text-center">
        <div class="card mx-auto" style="width: 35rem;margin-top:20px">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form action="process_login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address </label>
                        <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        <p id="wrong-email" class="invalid-feedback">Email invalid</p>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="Password">
                    </div>
                    <button value="Submit" type="submit" class="btn btn-primary mt-5">Login</button>
                </form>
                <a href="signup.php" class="card-link link-danger">Don't have an account? Sign up</a>
            </div>
        </div>
    </div>

</body>

</html>