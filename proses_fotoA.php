<?php
if (isset($_POST['submit'])) {
    // Koneksi ke database
    include "Database/database.php";

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $target_dir = "uploads/";
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $nama . "_" . $file_name;
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $upload_ok = 1;
    } else {
        echo "File bukan gambar.";
        $upload_ok = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $upload_ok = 0;
    }

    // Batasi ukuran file (misalnya maksimal 2MB)
    if ($_FILES["file"]["size"] > 2000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $upload_ok = 0;
    }

    // Batasi tipe file yang diperbolehkan
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $upload_ok = 0;
    }

    // Cek apakah upload_ok bernilai 0 karena terjadi kesalahan
    if ($upload_ok == 0) {
        echo "Maaf, file tidak dapat diupload.";
    } else {
        // Jika semuanya baik, coba upload file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Simpan nama file ke database
            $sql = "UPDATE tb_userkelasa SET foto='$target_file' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "File ". htmlspecialchars($file_name). " telah berhasil diupload.";
            } else {
                echo "Terjadi kesalahan saat menyimpan data: " . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
        }
    }

    $conn->close();
}
?>
