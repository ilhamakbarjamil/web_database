<?php
include "../Database/database.php";
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Ambil nama pengguna dari database
$username = $_SESSION['username'];
$query = "SELECT id, nama, foto, jurusan, kelas, nomer_hp FROM tb_userkelasa WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$name = $user['nama'];
$jurusan = $user['jurusan'];
$absen = $user['id'];
$kelas = $user['kelas'];
$nomerHp = $user['nomer_hp'];

if (empty($nomerHp)) {
    $nomerHp = "null";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="icon" href="https://i0.wp.com/web.suaramuhammadiyah.id/wp-content/uploads/2023/02/logo-aisyiyah-official.png?resize=1440%2C1440&ssl=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f0f2f5;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        nav {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin-bottom: 15px;
        }

        nav ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #34495e;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            margin: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .main-content h3 {
            color: #2c3e50;
            font-size: 15px;
            margin-bottom: 25px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            position: relative;
        }

        .main-content h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #e74c3c;
        }

        .user-photo {
            width: 150px;
            height: 200px;
            margin: 0 auto 20px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .user-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .user-photo:hover img {
            transform: scale(1.05);
        }

        .user-info h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .user-info h3 {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .user-info h3:hover {
            color: #3498db;
            transform: translateX(5px);
        }

        .user-info h3 i {
            margin-right: 10px;
            color: #3498db;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        .logout {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background-color: #c0392b;
        }

        .menu {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #343a40;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
          @media (max-width: 768px) {
              .container {
                  flex-direction: column;
              }

              nav {
                  width: 100%;
              }

              .main-content {
                  margin: 10px;
              }

              .menu {
                  display: none;
              }

              .menu.active {
                  display: block;
              }

              .nomer-hp-title::before {
                  content: '\f095'; /* FontAwesome phone icon */
                  font-family: 'Font Awesome 5 Free';
                  font-weight: 900;
                  margin-right: 5px;
              }
              .nomer-hp-title span {
                  display: none;
              }
          }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="user_dashboardA.php"><i class="fas fa-user"></i> Profil</a></li>
                <li><a href="#"><i class="fas fa-book"></i> E-Learning</a></li>
                <li><a href="user_absenA.php"><i class="fas fa-calendar-check"></i> Absen</a></li>
                <li><a href="user_pembayaranA.php"><i class="fas fa-money-bill-wave"></i> Pembayaran</a></li>
                <li><a href="../Logout/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <h2 style="margin-bottom: 40px;"><b>Profil Murid</b></h2>
            <div class="user-photo">
                <?php
                $photo_path = $user['foto'] ?? 'default_avatar.png';
                echo "<img src='{$photo_path}' alt='User Photo'>";
                ?>
            </div>
            <h2> <?php echo htmlspecialchars($name); ?></h2>
            <h3><i class="fas fa-id-badge"></i> Absen : <?php echo htmlspecialchars($absen); ?></h3>
            <h3><i class="fas fa-chalkboard"></i> Kelas : <?php echo htmlspecialchars($kelas); ?></h3>
            <h3><i class="fas fa-book"></i> Jurusan : <?php echo htmlspecialchars($jurusan); ?></h3>
            <h3 class="nomer-hp-title"><span><i class="fas fa-phone-alt"></i> Nomer Hp : </span><?php echo htmlspecialchars($nomerHp); ?></h3>
        </div>
    </div>

    <div class="footer">
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <p style="font-size: 12px;">&copy; 2024 - Developed by Ilham Akbar Jamil | <?php echo date('H:i:s'); ?></p>
    </div>

    <style>
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            margin-top: auto;
        }
    </style>

</body>

</html>