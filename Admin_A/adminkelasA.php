<?php
include "../Database/database.php";

session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: ../Login/login.php');
    exit();
}

date_default_timezone_set('Asia/Jakarta');

$sql = "SELECT id, nama, username, foto FROM tb_userkelasa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kelas A</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f7fa;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            background-color: #1a1a2e;
            color: white;
            width: 250px;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar a {
            color: white;
            padding: 15px 25px;
            display: block;
            /* transition: all 0.3s; */
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #162447;
            border-left: 4px solid #007bff;
            padding-left: 21px;
        }

        .sidebar a.active {
            background-color: #162447;
            border-left: 4px solid #007bff;
            padding-left: 21px;
        }

        .sidebar .sidebar-heading {
            font-size: 1.4rem;
            text-align: center;
            padding: 20px 15px;
            border-bottom: 1px solid #444;
            background-color: #0f0f1e;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .user-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .user-card:hover {
            transform: translateY(-5px);
        }

        .user-avatar img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            object-position: top;
            background-color: #f0f0f0;
        }

        .user-info h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .user-info p {
            color: #666;
            margin-bottom: 10px;
        }

        footer {
            padding: 10px;
            text-align: right;
            font-size: 12px;
            color: #888;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 10px;
            }

            .sidebar {
                width: 100%;
                height: auto;
                display: none;
            }

            .navbar-toggler {
                display: inline-block;
                margin-left: auto;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar with Hamburger -->
    <nav class="navbar navbar-dark bg-dark d-flex d-md-none">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="offcanvasMenuLabel">Admin Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark">
                    <a href="adminkelasA.php" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-user me-2"></i> Home
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="user_fotoA.php" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-user me-2"></i> User Photo
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="input.php" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-credit-card me-2"></i> Pembayaran
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="input_absen.php" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-calendar-check me-2"></i> Absensi
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="rekap_absen.php" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-chart-line me-2"></i> Rekap Absensi
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="#" onclick="showModernELearningAlert()" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-book-open me-2"></i> E-Learning
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="logout.php" class="text-danger text-decoration-none d-flex align-items-center">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Sidebar (Visible on larger screens) -->
    <nav class="sidebar d-none d-md-block">
        <div class="sidebar-heading">Admin Menu</div>
        <a href="adminkelasA.php"><i class="fas fa-home"></i> Home</a>
        <a href="user_fotoA2.php"><i class="fas fa-user"></i> User Photo</a>
        <a href="input.php"><i class="fas fa-credit-card"></i> Pembayaran</a>
        <a href="input_absen.php"><i class="fas fa-calendar-check"></i> Absensi</a>
        <a href="rekap_absen.php"><i class="fas fa-chart-line"></i> Rekap Absensi</a>
        <a href="#" onclick="showModernELearningAlert()"><i class="fas fa-book-open"></i> E-Learning</a>
        <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h1 class="mb-4">Welcome Admin Kelas A</h1>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="user-card" style="margin-bottom: 15px;">
                        <div class="user-avatar">
                            <?php
                            $photo_path = $row['foto'] ?? 'default_avatar.png';
                            echo "<img src='{$photo_path}' alt='User Photo'>";
                            ?>
                        </div>
                        <div class="user-info text-center p-3">
                            <h3><?php echo $row['nama']; ?></h3>
                            <p>No. Absen: <?php echo $row['id']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <footer>&copy; 2024 - Developed by Ilham Akbar Jamil | <?php echo date('H:i:s'); ?></footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert -->
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
</body>

</html>

<?php $conn->close(); ?>