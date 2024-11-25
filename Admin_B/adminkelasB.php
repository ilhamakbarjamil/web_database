<?php
include "../Database/database.php";

session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Jika tidak ada sesi atau sesi tidak valid, arahkan ke halaman login
    header('Location: login.php');
    exit();
}

$sql = "SELECT id, nama, username, foto FROM tb_userkelasb";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard Admin Kelas B</title>
    <link rel="stylesheet" href="shepherd.js/dist/css/shepherd.css" />
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.1.0/dist/js/shepherd.min.js"></script>
    <link rel="icon" href="https://i0.wp.com/web.suaramuhammadiyah.id/wp-content/uploads/2023/02/logo-aisyiyah-official.png?resize=1440%2C1440&ssl=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 200px;
        }

        .hamburger {
            font-size: 30px;
            cursor: pointer;
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            /* Warna hitam transparan */
            padding: 10px;
            border-radius: 5px;
        }

        h1 {
            /* background-color: #343a40; */
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #000000;
            /* Ubah warna latar belakang menjadi hitam */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #343a40;
            border: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #495057;
        }

        button {
            width: 250px;
            padding: 15px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
        }
    </style>
    <script>
        let idleTime = 0;
        const maxIdleTime = 5; // waktu dalam menit

        function resetIdleTime() {
            idleTime = 0;
        }

        function checkIdleTime() {
            idleTime++;
            if (idleTime >= maxIdleTime) {
                window.location.href = 'logout.php';
            }
        }

        document.onload = resetIdleTime;
        document.onmousemove = resetIdleTime;
        document.onkeypress = resetIdleTime;

        setInterval(checkIdleTime, 60000); // periksa setiap menit

        // Tambahkan skrip untuk mencegah kembali ke halaman setelah logout
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }


        // document.querySelector('.logout').addEventListener('click', function() {
        //     window.location.href = 'index.html';
        // });
    </script>
</head>

<body>

    <div class="button-container">
        <h3 style="text-align: center; margin-bottom: 20px; color: #333; border-bottom: 2px solid #333; padding-bottom: 10px; margin-top:20px;">Admin Menu</h3>
        <button class="btn btn-primary" onclick="window.location.href='user_fotoB.php'">
            <i class="fas fa-user"></i> User Photo
        </button>
        <button class="btn btn-primary" onclick="window.location.href='update_kegiatanb.php'">
            <i class="fas fa-sync-alt"></i> Update Informasi
        </button>
        <button class="btn btn-primary" onclick="window.location.href='uploadFotoB.php'">
            <i class="fas fa-images"></i> Update Foto
        </button>
        <button class="btn btn-primary" onclick="window.location.href='uploadPrestasiB.php'">
            <i class="fas fa-trophy"></i> Update Prestasi
        </button>
        <button class="btn btn-primary" onclick="window.location.href='pembayaran_kelasB.php'">
            <i class="fas fa-credit-card"></i> Pembayaran
        </button>
        <button class="btn btn-primary" onclick="window.location.href='absensi_B.php'">
            <i class="fas fa-calendar-check"></i> Absensi
        </button>
        <button class="btn btn-primary" onclick="window.location.href='analisis_B.php'">
            <i class="fas fa-chart-line"></i> Hasil Absensi
        </button>
        <button class="btn btn-primary" onclick="showModernELearningAlert()">
            <i class="fas fa-book-open"></i> E-Learning
        </button>
        <button class="btn btn-primary" onclick="window.location.href='lihatStatusB.php'">
            <i class="fas fa-eye"></i> Lihat Status
        </button>

        <button class="btn btn-danger" onclick="window.location.href='../Logout/logout.php'">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <style>
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button-container .btn {
            width: 100%;
            margin-bottom: 5px;
        }

        .mobile-menu {
            display: block;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .mobile-menu-items {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-items button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            background: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: transparent;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-information{
            background-color: #FF9900;
            color: white;
        }

        .btn-purple{
            background-color: purple;
            color: white;
        }
    </style>


    <div class="mobile-menu">
        <button class="menu-toggle" aria-label="Toggle menu">
            <span class="hamburger-icon"></span>
        </button>
        <nav class="mobile-nav">
            <h3 class="menu-title" style="text-align: center; border-bottom: 2px solid #000; padding-bottom: 5px; margin-top: 10px; margin-bottom: 10px;">Admin Kelas B</h3>
            <a href="update_kegiatana.php" class="btn btn-primary" style="margin-right: 10px; margin-left: 10px;">
                <i class="fas fa-sync-alt"></i> Update Informasi
            </a>
            <a href="pembayaran_kelasA.php" class="btn btn-success" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-credit-card"></i> Pembayaran
            </a>
            <a href="uploadFotoA.php" class="btn btn-success" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-images"></i> Update Foto
            </a>
            <a href="uploadPrestasiA.php" class="btn btn-purple" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-trophy"></i> Update Prestasi
            </a>
            <a href="absensi_A.php" class="btn btn-purple" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-calendar-check"></i> Absensi
            </a>
            <a href="analisis_A.php" class="btn btn-purple" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-chart-line"></i> Hasil Absensi
            </a>
            <a class="btn btn-information" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;" onclick="showModernELearningAlert()">
                <i class="fas fa-book-open"></i> E-Learning
            </a>
            <a href="lihatStatusA.php" class="btn btn-information" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-eye"></i> Lihat status
            </a>
            <a href="logout.php" class="btn btn-danger" style="margin-right: 10px; margin-left: 10px; margin-top: 5px;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function showModernELearningAlert() {
        Swal.fire({
            title: 'E-Learning',
            text: 'Fitur E-Learning akan segera hadir!',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }
    </script>

    <style>
        .mobile-menu {
            background-color: black;
            padding: 10px;
            position: fixed;
            top: 0px;
            width: 100%;
            height: 55px;
            z-index: 1000;
        }

        .menu-toggle {
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .hamburger-icon,
        .hamburger-icon::before,
        .hamburger-icon::after {
            content: '';
            display: block;
            background: white;
            height: 3px;
            width: 25px;
            transition: all 0.3s ease-in-out;
        }

        .hamburger-icon::before {
            transform: translateY(-8px);
        }

        .hamburger-icon::after {
            transform: translateY(5px);
        }

        .menu-open .hamburger-icon {
            background: transparent;
        }

        .menu-open .hamburger-icon::before {
            transform: rotate(45deg);
        }

        .menu-open .hamburger-icon::after {
            transform: rotate(-45deg) translateY(-5px) translateX(5px);
        }

        .mobile-nav {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100vh;
            background: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease-in-out;
        }

        .menu-open .mobile-nav {
            right: 0;
        }

        .nav-item {
            display: block;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .nav-item:hover {
            background-color: #f0f0f0;
        }
    </style>

    <div class="content">
        <h1 style="color: black;">Welcome Admin kelas B</h1>
        <div class="user-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="user-card">
                    <div class="user-avatar">
                        <td>
                            <?php
                                $photo_path = $row['foto'] ?? 'default_avatar.png';
                                echo "<img src='{$photo_path}' alt='User Photo' style='width: 150px; height: 200px; border-radius: 10%; object-fit: cover;'>";
                            ?>
                        </td>
                    </div>
                    <div class="user-info">
                        <h3><?php echo $row['nama']; ?></h3>
                        <p>No. Absen: <?php echo $row['id']; ?></p>
                    </div>
                    
                </div>
            <?php endwhile; ?>
        </div>

        <style>
            .user-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
                padding: 20px;
            }
            .user-card {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
                transition: transform 0.3s ease;
            }
            .user-card:hover {
                transform: translateY(-5px);
            }
            .user-avatar {
                font-size: 48px;
                color: #3498db;
                margin-bottom: 10px;
            }
            .user-info h3 {
                font-size: 23px;
                margin: 0;
                color: #333;
            }
            .user-info p {
                margin: 5px 0;
                color: #666;
            }
            .btn-check-status {
                display: inline-block;
                background-color: #2980b9;
                color: white;
                padding: 8px 16px;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 10px;
                transition: background-color 0.3s ease;
            }
            .btn-check-status:hover {
                background-color: #3498db;
            }
        </style>

        <footer class="text-end">
            <p style="font-size: 12px;">&copy; 2024 - Developed by Ilham Akbar Jamil</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <style>
        /* .button-container {
            display: none;
        }

        .mobile-menu {
            display: block;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .mobile-menu-items {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-items button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            background: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        } */

        @media (min-width: 769px) {
            .mobile-menu {
                display: none;
            }

            .button-container {
                display: flex;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
                padding: 15px;
                margin-top: 60px;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 8px;
            }

            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }

            .button-container {
                display: none;
            }

            .button-container .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .content {
                margin-left: 0px;
            }
        }
    </style>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.body.classList.toggle('menu-open');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.mobile-menu') && document.body.classList.contains('menu-open')) {
                document.body.classList.remove('menu-open');
            }
        });
    </script>
</body>

</html>
<?php $conn->close(); ?>