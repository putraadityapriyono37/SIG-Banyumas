<?php
include '../_config/config.php';

if (isset($_POST['login'])) {
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk mengambil password dari database berdasarkan username
    $query = "SELECT * FROM tb_admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Cek apakah password yang dimasukkan sesuai dengan yang ada di database
        if ($password == $user['password']) {
            // Password cocok, login berhasil
            header("Location: ../dashboard/index.php");
            exit();
        } else {
            // Password tidak cocok
            $error_message = "Password salah!";
        }
    } else {
        // Username tidak ditemukan
        $error_message = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="../_assets/img/bms.png">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3498db, #2980b9);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #3498db;
        }

        .btn-login {
            background: #3498db;
            border: none;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background: #2980b9;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" require autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-login w-100">Login</button>
        </form>
    </div>
</body>

</html>