<?php
require_once 'db_config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="bootstrap-5.2.3/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/title.ico">
    <script src="bootstrap-5.2.3/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="mb-3">
            <h3 class="text-center"><?php require_once 'eventName.php'; ?></h3>
        </div>
        <div class="mb-4">
            <h3 class="text-center">Login</h3>
        </div>
        <div class="mb-3">
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="mb-3 checkbox-container">
                    <label class="form-check-label" for="showPassword">
                        <input type="checkbox" class="form-check-input" id="showPassword"> Show Password
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <p class="w-100 text-center">
            <a href="user-add.php"><u>Not Registered? Sign Up</u></a>
        </p>
        <p class="w-100 text-center">
            <a href="view.php" target="_blank"><u>View the scorecard</u></a>
        </p>
        <p class="w-100 text-center">
            &mdash; <a href="data.php" target="_blank">Score entry</a>&mdash;
        </p>
        <p class="w-100 text-center">
            &mdash; <a href="admin.php" target="_blank">Admin Page</a>&mdash;
        </p>
    </div>

    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>