<?php
include "../Database/database.php";

// Mulai session
session_start();

$loginError = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek admin
    $stmt = $conn->prepare("SELECT * FROM pswd_admin WHERE username=?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['user_logged_in'] = true;
        
        if ($user['admin_type'] == 'kelas_a') {
            header("Location: ../Admin_A/adminkelasA.php");
        } elseif ($user['admin_type'] == 'kelas_b') {
            header("Location: ../Admin_B/adminkelasB.php");
        }
        exit();
    }

    // Cek user kelas_a
    $stmt = $conn->prepare("SELECT * FROM tb_userkelasa WHERE username=?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id']; // Simpan ID pengguna untuk referensi
        header("Location: ../User_A/user_dashboardA.php");
        // header("Location: midtrans_proses.php");
        exit();
    }

    // Cek user kelas_b
    $stmt = $conn->prepare("SELECT * FROM tb_userkelasb WHERE username=?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id']; // Simpan ID pengguna untuk referensi
        header("Location: ../User_B/user_dashboardB.php");
        exit();
    }

    // Jika login gagal
    $loginError = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TK ABA 12 JOMBANG</title>
    <link rel="icon" href="https://i0.wp.com/web.suaramuhammadiyah.id/wp-content/uploads/2023/02/logo-aisyiyah-official.png?resize=1440%2C1440&ssl=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <audio id="alertSound" src="sound/windows-error-sound-effect-35894.mp3" preload="auto"></audio>
    <div id="alertContainer" style="display: none;"></div>

    <div class="container">
        <h3>Login</h3>
        <form action="login.php" method="POST">
            <div class="input-container">
                <input type="text" placeholder="username" name="username" />
            </div>
            <div class="input-container">
                <input type="password" placeholder="password" name="password" id="password" />
                <span class="eye-icon" onclick="togglePassword()">👁</span>
            </div>
            <button type="submit" style="margin-top: 20px;">Login</button>
            <button type="button" style="margin-top: 10px; background-color: red;" onclick="window.location.href='../test.php'">Back Home</button>
        </form>
        <footer style="text-align: center; margin-top: 50px;">
            <p style="font-size: 12px;">&copy; 2024 - Developed by Ilham Akbar Jamil</p>
        </footer>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
        }

        .input-container {
            position: relative;
            width: 100%;
        }

        .input-container input[type="text"],
        .input-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-container .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        <?php if ($loginError): ?>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Username dan Password tidak ditemukan, silahkan coba lagi',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('alertSound').play();
                }
            });
        <?php endif; ?>
    </script>
</body>

</html>