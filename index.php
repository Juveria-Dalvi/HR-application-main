<?php
session_start();
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo '<script>alert("Login failed. Please check your username and password.");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #3498db, #f4791f);
            overflow: hidden;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 300px;
            text-align: left;
        }

        h2 {
            color: #333;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
        }

        /* Dynamic Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            animation: gradientShift 15s linear infinite;
            background: linear-gradient(-45deg, #3498db, #f4791f, #e74c3c, #9b59b6, #3498db);
            background-size: 400% 400%;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    <div class="login-container">
        <h2 style="text-align:center;">Login</h2>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
