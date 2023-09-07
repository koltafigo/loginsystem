<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
        }

        .login-title {
            text-align: center;
        }

        .login-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .link {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    require('db.php');

    if (isset($_POST['username'])) {
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, create_datetime)
                  VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<h3 class='login-title'>You are registered successfully.</h3>";
            echo "<p class='link'>Click here to <a href='login.php'>Login</a></p>";
        } else {
            echo "<h3 class='login-title'>Required fields are missing.</h3>";
            echo "<p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>";
        }
    } else {
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    <?php
    }
    ?>
</div>
</body>
</html>

