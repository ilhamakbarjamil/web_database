<?php include "Database/database.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - TK ABA 12 Jombang</title>
  <link rel="icon" href="https://png.pngtree.com/png-clipart/20230623/original/pngtree-school-logo-design-template-vector-png-image_9204124.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      background-color: #ffffff;
      overflow-x: hidden;
      /* Prevent horizontal scrolling */
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: transparent;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.982);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      transition: background-color 0.3s ease;
      transition: opacity 0.3s ease, transform 0.3s ease;
      background-color: transparent;
    }

    .navbar.scrolled {
      background-color: rgba(0, 0, 0, 0.546);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar .logo {
      margin-left: 10px;
      font-weight: bold;
      color: white;
    }

    .navbar .menu {
      display: flex;
      gap: 1rem;
    }

    .navbar a {
      color: rgb(255, 255, 255);
      text-decoration: none;
      padding: 0.75rem 1.5rem;
      border-radius: 25px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .navbar a:hover {
      background-color: rgb(0, 0, 0);
      transform: scale(1.05);
    }

    .navbar .menu-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
    }

    .navbar .menu-toggle span {
      height: 3px;
      width: 25px;
      background: rgb(255, 255, 255);
      margin: 3px;
      transition: transform 0.3s ease, background 0.3s ease;
      margin-right: 25px;
    }

    .hero {
      background: url("images/sekolah.jpg") center/cover no-repeat fixed;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
      background-attachment: fixed;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      /* Adjust opacity as needed */
    }

    .hero-content {
      margin-top: 100px;
      position: relative;
      z-index: 1;
      color: white;
    }

    .hero h4 {
      color: rgba(255, 255, 255, 0.667);
      text-align: left;
    }

    .hero h1 {
      margin-top: 10px;
      font-size: 45px;
      margin-bottom: 1rem;
      color: rgba(255, 255, 255, 0.911);
    }

    .hero p {
      text-align: left;
      font-size: 1.5rem;
      margin-bottom: 2rem;
      color: rgba(255, 255, 255, 0.836);
    }

    .logo img {
      width: 100px;
      height: auto;
    }

    .about-text {
      text-align: left;
      font-size: 1.5rem;
      color: #666;
    }

    .about {
      padding: 100px 0;
      background-color: #f9f9f9;
    }

    .about-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .section-title {
      font-size: 2.5rem;
      text-align: center;
      margin-bottom: 50px;
      color: #2c3e50;
      position: relative;
      width: 100%;
    }

    .section-title::after {
      content: "";
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d8);

    }

    .about-content {
      display: flex;
      align-items: center;
      text-align: left;
      gap: 50px;
    }

    .about-text {
      flex: 1;
    }

    .about-text p {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #555;
    }

    .btn-learn-more {
      display: inline-block;
      padding: 12px 25px;
      background-color: #ff5050;
      color: white;
      text-decoration: none;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-learn-more:hover {
      background-color: #73000a6f;
    }

    .about-image {
      flex: 1;
    }

    .about-image img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div id="preloader">
    <div class="loader-container">
      <div class="loader"></div>
      <p class="loading-text">✌️Website dalam uji coba🙏</p>
    </div>
  </div>
  <div class="navbar">
    <div class="logo">
      <img src="logo/logo/school.png" alt="School Logo" style="width: 70px; height: auto;" />
    </div>
    <div class="menu-toggle" onclick="toggleMenu()">
      <span class="line1"></span>
      <span class="line2"></span>
      <span class="line3"></span>
    </div>
    <div class="menu">
      <a href="#home"><i class="fas fa-home" id="Home"></i> Home</a>
      <a href="#ppdb" onclick="showDaftarAlert()"><i class="fas fa-user-plus" id="PPDB"></i> PPDB</a>
      <a href="Login\login.php"><i class="fas fa-sign-in-alt" id="login"></i> Login</a>
    </div>
  </div>

  <audio id="alertSound" src="sound/windows-error-sound-effect-35894.mp3" preload="auto"></audio>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
  <script>
    function showDaftarAlert() {
      Swal.fire({
        title: "Fitur Belum Tersedia",
        text: "Anda dapat melakukan pendaftaran secara offline atau datang langsung ke sekolah, terima kasih 🙏",
        icon: "info",
        confirmButtonText: "Kembali",
      });
    }
  </script>

  <div class="content">
    <section id="home" class="hero">
      <div class="hero-content">
        <h4>Selamat datang di,</h4>
        <h1>TK AISYIYAH BUSTANUL ATHFAL 12 JOMBANG</h1>
        <p>Empowering students through education.</p>
      </div>
    </section>

    <section id="about" class="about" style="margin-bottom: -80px">
      <div class="about-container">
        <h2 class="section-title">About Us</h2>
        <div class="about-content">
          <div class="about-text">
            <p>
              Kami percaya setiap anak memiliki potensi luar biasa yang siap
              untuk dieksplor dan dikembangkan. Dengan pendekatan pembelajaran
              yang inovatif dan lingkungan yang penuh kasih sayang, kami
              membimbing anak-anak untuk menjadi pribadi yang cerdas, kreatif,
              dan berakhlak mulia.
            </p>
          </div>
          <div class="about-image">
            <img
              src="uploads/gie-1358.JPG"
              alt="Anak-anak belajar di TK ABA 12 Jombang" />
          </div>
        </div>
        <a
          href="Login\login.php"
          class="btn-learn-more"
          style="margin-top: 50px; text-align: right; display: inline-block">Sign In</a>
        <p>*Menu login hanya tersedia untuk wali murid dan guru</p>
      </div>
    </section>

    <section id="achievements" class="achievements-section">
      <div class="container">
        <h2 class="section-title">Achievements</h2>
        <?php
        // Query untuk mengambil 3 prestasi terbaru
        $sql = "SELECT * FROM prestasi ORDER BY tanggal_pembuatan DESC LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="achievement-card">';
            echo '<div class="achievement-image">';
            echo '<img src="' . htmlspecialchars($row["image"], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8') . '" />';
            echo '</div>';
            echo '<div class="achievement-content">';
            echo '<div class="achievement-badge">' . htmlspecialchars($row["badge"], ENT_QUOTES, 'UTF-8') . '</div>';
            echo '<h3>' . htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8') . '</h3>';
            echo '<p>' . htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>data di database kosong.</p>';
        }

        ?>
      </div>
    </section>

    <style>
      #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .loader-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .loader {
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
      }

      .loading-text {
        margin-top: 20px;
        font-size: 18px;
        color: #3498db;
        font-weight: bold;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }

      .achievements-section {
        background-color: #f0f4f8;
        padding: 80px 0;
      }

      .section-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 50px;
        font-size: 2.5rem;
      }

      .achievement-card {
        margin-bottom: 10px;
        display: flex;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin: 0 auto;
        margin-bottom: 20px;
      }

      .achievement-image {
        flex: 1;
        min-height: 300px;
      }

      .achievement-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .achievement-content {
        flex: 1;
        padding: 40px;
        position: relative;
      }

      .achievement-badge {
        position: absolute;
        left: 40px;
        background: #e74c3c;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: bold;
      }

      .achievement-content h3 {
        margin-top: 50px;
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 20px;
      }

      .achievement-content p {
        font-size: 1.1rem;
        color: #7f8c8d;
        line-height: 1.6;
      }
    </style>

    <section id="latest-activities" class="latest-activities-section">
      <div class="container">
        <h2 class="section-title tekan2">Information</h2>
        <?php
        $sql = "SELECT * FROM kegiatan_harian ORDER BY tanggal DESC LIMIT 4";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="activity-showcase">';
            echo '<img src="' . $row["foto"] . '" alt="Kegiatan Terbaru" class="activity-image"/>';
            echo '<div class="activity-description">';
            // echo '<h3>'.$row["judul"].'</h3>';
            echo '<p>' . $row["deskripsi"] . '</p>';
            echo '<span class="activity-date">' . $row["tanggal"] . '</span>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "data di database kosong.";
        }
        $conn->close();
        ?>
      </div>
    </section>

    <style>
      .latest-activities-section {
        background-color: #f9f9f9;
        padding: 80px 0;
      }

      .activity-showcase {
        max-width: 800px;
        margin: 40px auto 0;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .activity-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
      }

      .activity-description {
        padding: 20px;
      }

      .activity-description h3 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: #333;
      }

      .activity-description p {
        font-size: 1rem;
        color: #666;
        margin-bottom: 10px;
        text-align: justify;
      }

      .activity-date {
        font-size: 0.9rem;
        color: #999;
        display: block;
        text-align: right;
      }
    </style>

    <style>
      .video-section {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
      }

      .video-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

      .video-container video {
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
      }

      .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
      }

      .video-overlay h2 {
        font-size: 3rem;
        margin-bottom: 1rem;
      }

      .video-overlay p {
        font-size: 1.5rem;
      }
    </style>

    <section id="gallery" class="gallery-section">
      <div class="container">
        <h2 class="section-title">Our Gallery</h2>
        <div class="gallery-grid">
          <?php
          include "Database/database.php";


          $sql = "SELECT * FROM tb_updatefoto ORDER BY id DESC LIMIT 8";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="gallery-item">';
              echo '<img src="' . $row["foto"] . '" alt="Gallery Image" />';
              echo '<div class="overlay">';
              echo '<div class="overlay-content">';
              echo '<h3>' . $row["judul"] . '</h3>';
              echo '<p>' . $row["deskripsi"] . '</p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo "Tidak ada gambar di database galeri.";
          }

          $conn->close();  // Close the connection after all database operations
          ?>
        </div>
      </div>
    </section>

    <style>
      .gallery-section {
        padding: 80px 0;
        background-color: #f9f9f9;
      }

      .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 40px;
      }

      .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .gallery-item:hover {
        transform: scale(1.05);
      }

      .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
      }

      .gallery-item:hover img {
        transform: scale(1.1);
      }

      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
      }

      .gallery-item:hover .overlay {
        opacity: 1;
      }

      .overlay-content h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
      }

      .overlay-content p {
        font-size: 1rem;
      }
    </style>

    <style>
      .video-section {
        width: 90%;
        margin: 0 auto;
        overflow: hidden;
        text-align: center;
      }

      .video-section video {
        width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 10px;
      }
    </style>

    <div id="counterContainer">
      <section id="counter" class="counter-section">
        <div class="container">
          <h2 class="section-title" style="margin-top: 5px">More than</h2>
          <div class="counter-wrapper">
            <div class="counter-item">
              <i class="fas fa-user-graduate"></i>
              <div id="graduateCounter" class="counter">0</div>
              <p style="margin-bottom: 50px">
                Alumni
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>

    <style>
      .counter-section {
        background-color: #f9f9f9;
        padding: 50px 0;
        text-align: center;
      }

      .counter-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .counter-item {
        margin: 0 20px;
      }

      .counter-item i {
        font-size: 3rem;
        color: #ff6b6b;
      }

      .counter {
        font-size: 3rem;
        font-weight: bold;
        margin: 10px 0;
      }
    </style>

    <script>
      function animateCounter(id, start, end, duration) {
        let obj = document.getElementById(id),
          current = start,
          range = end - start,
          increment = end > start ? 1 : -1,
          step = Math.abs(Math.floor(duration / range)),
          multiplier = 5,
          timer = setInterval(() => {
            current += increment * multiplier;
            obj.textContent = current;
            if (current >= end) {
              clearInterval(timer);
              obj.textContent = end + "+";
            }
          }, step);
      }

      document.addEventListener("DOMContentLoaded", (event) => {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              setTimeout(() => {
                animateCounter("graduateCounter", 0, 500, 850);
              }, 100);
              observer.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.5
        });

        const counterContainer = document.getElementById('counterContainer');
        observer.observe(counterContainer);
      });
    </script>


    <script>
      window.addEventListener("load", function() {
        const preloader = document.getElementById("preloader");
        const startTime = performance.now();

        function hidePreloader() {
          const endTime = performance.now();
          const loadTime = endTime - startTime;

          // Adjust minimum display time based on load time
          const minDisplayTime = loadTime < 500 ? 1000 : 500;
          const displayTime = Math.max(minDisplayTime - loadTime, 0);

          setTimeout(() => {
            preloader.style.opacity = "0";
            setTimeout(() => {
              preloader.style.display = "none";
            }, 500);
          }, displayTime);
        }

        // Use Promise.all to wait for all resources to load
        Promise.all(
          Array.from(document.images).map((img) => {
            if (img.complete) return Promise.resolve();
            return new Promise((resolve) => {
              img.onload = img.onerror = resolve;
            });
          })
        ).then(() => {
          hidePreloader();
        });
      });
    </script>

    <section id="logos" class="logo-section" style="margin-top: 50px; margin-bottom: 100px">
      <div class="container">
        <div class="logo-scroll-container">
          <div class="logo-grid">
            <!-- <img
              src="logo/logo/LOGO BRAND MUHAMMADIYAH VERTICAL.png"
              alt="Partner Logo 1"
              class="logo-item"
              style="height: 100px; width: 145px; vertical-align: middle" />
            <img
              src="logo/logo/Logo-Aisyiyah-300x220.png"
              alt="Partner Logo 2"
              class="logo-item"
              style="height: 100px; width: 135px; vertical-align: middle" />
            <img
              src="logo/logo/logotk.png"
              alt="Partner Logo 3"
              class="logo-item"
              style="
                  height: 160px;
                  width: 160px;
                  vertical-align: middle;
                  margin-bottom: -30px;
                " /> -->
            <img
              src="logo/logo/Logo Kemendikbud Laluahmad.com.png"
              alt="Partner Logo 4"
              class="logo-item"
              style="height: 80px; width: 105px; vertical-align: middle" />
            <img
              src="logo/logo/merdekabelajar.png"
              alt="Partner Logo 5"
              class="logo-item"
              style="height: 80px; width: 130px; vertical-align: middle" />
          </div>
        </div>
      </div>
    </section>

    <section id="teachers" class="py-5 bg-light">
      <div class="container">
        <h2 class="section-title">Our Outstanding Teachers</h2>
        <div class="swiper-container" style="border-radius: 10px">
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/bu saroh2 - Copy.jpeg"
                  class="card-img-top"
                  alt="Bu Nanda" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Maisaroh</h4>
                  <p class="card-text text-muted">
                    Head Master Of TK ABA 12 Jombang
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/mama - Copy.jpg"
                  class="card-img-top"
                  alt="Bu Sita" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Sulaikah</h4>
                  <p class="card-text text-muted">
                    Advisor Of TK ABA 12 Jombang
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/bu2.jpeg"
                  class="card-img-top"
                  alt="Bu Sita" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Sita</h4>
                  <p class="card-text text-muted">Early Childhood Educator</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/mbak nanda - Copy.jpeg"
                  class="card-img-top"
                  alt="Bu Sita" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Nanda</h4>
                  <p class="card-text text-muted">Early Childhood Educator</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/bu fik2 - Copy.jpeg"
                  class="card-img-top"
                  alt="Bu Sita" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Fik</h4>
                  <p class="card-text text-muted">Early Childhood Educator</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="background: #f9f9f9">
              <div class="card border-0 shadow-sm">
                <img
                  src="images/mbak tika2 - Copy.jpeg"
                  class="card-img-top"
                  alt="Bu Sita" />
                <div class="card-body text-center">
                  <h4 class="card-title">Bu Tika</h4>
                  <p class="card-text text-muted">Early Childhood Educator</p>
                </div>
              </div>
            </div>
            <!-- Add more teachers as needed -->
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </section>

    <style>
      .swiper-container {
        margin: 2rem auto;
        max-width: 800px;
        padding: 1rem;
        position: relative;
        overflow: hidden;
        /* Prevent overflow */
      }

      .swiper-slide {
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .swiper-slide img {
        border-radius: 50%;
        margin: 1rem auto;
        width: 190px;
        height: 190px;
        object-fit: cover;
      }

      .swiper-slide h3 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
      }

      .swiper-slide p {
        font-size: 1.25rem;
        color: #666;
        margin-bottom: 1rem;
      }

      .swiper-button-next,
      .swiper-button-prev {
        background-color: rgba(255, 255, 255, 0.8);
        color: #1c1c1c;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
      }

      .swiper-button-next:after,
      .swiper-button-prev:after {
        font-size: 18px;
      }

      .swiper-button-next:hover,
      .swiper-button-prev:hover {
        background-color: #bcbcbc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .swiper-button-next {
        right: 10px;
      }

      .swiper-button-prev {
        left: 10px;
      }
    </style>

    <style>
      .logo-section {
        background-color: white;
        /* padding: 50px 0; */
      }

      .logo-grid {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 100px;
        vertical-align: middle;
      }

      .logo-item {
        filter: grayscale(100%);
        transition: filter 0.3s ease;
      }

      .logo-item:hover {
        filter: grayscale(0%);
      }

      .logo-scroll-container {
        overflow: hidden;
      }

      .logo-grid {
        display: flex;
        justify-content: center;
        align-items: center;
        /* flex-wrap: nowrap; */
        gap: 50px;
        margin: 0 auto;
        max-width: 100%;
        /* overflow-x: auto; */
      }

      .logo-item {
        display: inline-block;
        margin: 0 20px;
      }
    </style>

    <div style="display: flex; justify-content: center; margin-top: 150px;" class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15821.528477845304!2d112.33988007920834!3d-7.5332355796780694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7813488a21035b%3A0x1f5efeba549f4de0!2sTK.%20Aisyiyah%20Bustanul%20Athfal%20(Muhammadiyah)!5e0!3m2!1sid!2sid!4v1723641599063!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <section id="contact" class="contact-section">
      <div class="container">
        <h2 class="section-title">Contact Us</h2>
        <div class="contact-wrapper">
          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Address</h3>
            <p>
              Dsn. Pojok, Ds. Curahmalang, Kec. Sumobito, Kab. Jombang, Jawa
              Timur
            </p>
          </div>
          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-phone"></i>
            </div>
            <h3>Phone</h3>
            <p>+62 123 456 7890</p>
          </div>
          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>info@tkaba12jombang.com</p>
          </div>
        </div>
      </div>
    </section>

    <style>
      .contact-section {
        background-color: #f8f9fa;
        padding: 80px 0;
        margin-top: 20px;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
      }

      .contact-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
      }

      .contact-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .contact-card:hover {
        transform: translateY(-5px);
      }

      .contact-icon {
        font-size: 2.5rem;
        color: #ff6b6b;
        margin-bottom: 20px;
      }

      .contact-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #333;
      }

      .contact-card p {
        color: #666;
        line-height: 1.6;
      }

      .social-media {
        margin-top: 50px;
        text-align: center;
      }

      .social-icon {
        font-size: 1.5rem;
        color: #007bff;
        margin: 0 20px;
        transition: color 0.3s ease;
      }

      .social-icon:hover {
        color: #0056b3;
      }
    </style>
    <div class="footer-bottom">
      <p>&copy; 2024 Developed by Ilham Akbar Jamil</p>
    </div>

    <style>
      .footer-bottom {
        text-align: right;
        margin-top: 5px;
        padding-top: 5px;
        border-top: 1px solid #555;
      }

      @media (max-width: 768px) {
        body {
          overflow-x: hidden;
        }

        .navbar .menu {
          display: none;
          flex-direction: column;
          width: 100%;
          margin-top: 1rem;
          border-radius: 10px;
          background-color: #000000;
        }

        .navbar .menu.show {
          display: flex;
        }

        .show .line-1 {
          transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar .menu a {
          padding: 1rem;
          text-align: center;
          width: 100%;
          border-radius: 0;
        }

        .navbar .menu-toggle {
          display: flex;
          margin-right: 18px;
        }

        .logo img {
          margin-right: 20px;
          margin-top: 10px;
        }

        .hero h4 {
          text-align: left;
        }

        .hero h1 {
          text-align: left;
          font-size: 30px;
        }

        .hero p {
          text-align: left;
          font-size: 20px;
        }

        .about-text p {
          text-align: justify;
        }

        .about-image img {
          display: none;
        }

        .about-image a {
          text-align: center;
        }

        .gallery-section h2 {
          margin-top: 5px;
        }

        .about-content {
          flex-direction: column;
        }

        .contact-wrapper {
          flex-direction: column;
        }

        .contact-card {
          flex-basis: calc(30% - 20px);
          width: 80%;
          margin-bottom: 20px;
        }

        .contact-icon {
          font-size: 2.5rem;
        }

        .contact-card h3 {
          font-size: 1.2rem;
        }

        .contact-card p {
          font-size: 0.9rem;
        }

        .achievement-card {
          flex-direction: column;
        }

        .achievement-image {
          min-height: 250px;
        }

        .social-icon {
          width: 50px;
          height: 50px;
          font-size: 1.2rem;
          line-height: 50px;
          margin: 0 10px;
        }

        .logo-scroll-container {
          overflow: hidden;
          /* white-space: nowrap; */
          width: 100%;
          margin: 0 auto;
        }

        .logo-item {
          display: inline-block;
          margin: 0 30px;
          max-width: 150px;
        }
      }
    </style>
  </div>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    function toggleMenu() {
      const menu = document.querySelector(".menu");
      menu.classList.toggle("show");
    }

    window.addEventListener("scroll", function() {
      var navbar = document.querySelector(".navbar");
      if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });

    let lastScrollTop = 0;

    window.addEventListener("scroll", function() {
      let navbar = document.querySelector(".navbar");
      let scrollTop =
        window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > lastScrollTop) {
        // Scroll ke bawah
        navbar.style.opacity = "0";
        navbar.style.transform = "translateY(-100%)";
      } else {
        // Scroll ke atas
        navbar.style.opacity = "1";
        navbar.style.transform = "translateY(0)";
      }

      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    const sr = ScrollReveal({
      distance: "100px",
      duration: 1700,
      delay: 100,
      // reset: true,
    });

    sr.reveal(".achievements-section,.counter-section", {
      origin: "top"
    });
    sr.reveal(".gallery-section", {
      origin: "bottom"
    });
    sr.reveal(".hero-content,.about,.container,.map", {
      origin: "left"
    });
    sr.reveal(".video-section", {
      origin: "right"
    });
  </script>

  <link rel="stylesheet" href="shepherd.js/dist/css/shepherd.css" />
  <script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.1.0/dist/js/shepherd.min.js"></script>
  <script>
    window.addEventListener("load", function() {
      const preloader = document.getElementById("preloader");
      const startTime = performance.now();

      function hidePreloader() {
        const endTime = performance.now();
        const loadTime = endTime - startTime;

        const minDisplayTime = loadTime < 500 ? 1000 : 500;
        const displayTime = Math.max(minDisplayTime - loadTime, 0);

        setTimeout(() => {
          preloader.style.opacity = "0";
          setTimeout(() => {
            preloader.style.display = "none";
            if (typeof initTour === 'function') {
              initTour();
            }
          }, 500);
        }, displayTime);
      }

      Promise.all(
        Array.from(document.images).map((img) => {
          if (img.complete) return Promise.resolve();
          return new Promise((resolve) => {
            img.onload = img.onerror = resolve;
          });
        })
      ).then(() => {
        hidePreloader();
      });
    });

    function initTour() {
      if (localStorage.getItem('tourShown') === 'true') {
        return;
      }

      if (typeof Shepherd === 'undefined') {
        console.error("Shepherd is not loaded.");
        return;
      }

      const tour = new Shepherd.Tour({
        defaultStepOptions: {
          classes: "shadow-md bg-purple-600",
          scrollTo: true,
          arrow: {
            enabled: true,
            element: '.shepherd-arrow',
            color: '#ffffff'
          },
          highlightClass: 'highlight'
        },
      });

      tour.addStep({
        id: "welcome",
        text: '<h3 class="text-xl font-bold">Selamat datang di TK ABA 12 Jombang!</h3><p>Mari kita jelajahi fitur-fitur website kami.</p>',
        attachTo: {
          element: "#body",
          on: "bottom",
        },
        buttons: [{
          text: "Mulai Tur",
          action: tour.next,
          classes: "bg-green-500 hover:bg-green-600",
        }],
      });

      tour.addStep({
        id: "home",
        text: "Ini adalah halaman utama kami. Di sini Anda dapat melihat informasi terbaru di section Information tentang TK ABA 12 Jombang.",
        attachTo: {
          element: "#home", // Pastikan ini sesuai dengan ID elemen di HTML
          on: "bottom",
        },
        buttons: [{
          text: "Lanjut",
          action: tour.next,
        }],
      });

      tour.addStep({
        id: "ppdb",
        text: "Fitur PPDB digunakan untuk pendaftaran secara online. Anda dapat mengisi formulir dan mengunggah dokumen yang diperlukan.",
        attachTo: {
          element: "#ppdb",
          on: "bottom",
        },
        buttons: [{
          text: "Lanjut",
          action: tour.next,
        }],
      });

      tour.addStep({
        id: "login",
        text: "Fitur login digunakan untuk wali murid dan guru yang sudah terdaftar.",
        attachTo: {
          element: "#login", // Pastikan ini sesuai dengan ID elemen di HTML
          on: "bottom",
        },
        buttons: [{
          text: "Lanjut",
          action: tour.next,
        }],
      });

      tour.addStep({
        id: "done",
        text: "Silahkan menjelajahi fitur yang ada pada website kami. Terima kasih telah mengikuti tur ini 🙏.",
        attachTo: {
          element: "#done", // Pastikan ini sesuai dengan ID elemen di HTML
          on: "bottom",
        },
        buttons: [{
          text: "Done",
          action: tour.next,
        }],
      });

      tour.start();
      localStorage.setItem('tourShown', 'true'); // Set 'tourShown' setelah tur dimulai
    }
  </script>

  <style>
    .highlight {
      box-shadow: 0 0 0 5px rgb(255, 0, 0);
      transition: all 0.3s ease;
    }

    .shepherd-element {
      background: #ffffff;
      backdrop-filter: none;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      color: #333;
      font-family: "Inter", sans-serif;
      padding: 24px;
      max-width: 400px;
      opacity: 1;
      position: relative;
      z-index: 9999;
    }

    .shepherd-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 12px;
      color: #1a202c;
    }

    .shepherd-text {
      font-size: 1rem;
      line-height: 1.6;
      color: #4a5568;
    }

    .shepherd-button {
      background-color: #4299e1;
      border: none;
      border-radius: 8px;
      color: white;
      cursor: pointer;
      font-size: 0.9rem;
      font-weight: 600;
      padding: 10px 20px;
      transition: all 0.3s ease;
      margin-top: 16px;
    }

    .shepherd-button:hover {
      background-color: #3182ce;
      transform: translateY(-2px);
    }

    .shepherd-button-secondary {
      background-color: #edf2f7;
      color: #4a5568;
    }

    .shepherd-button-secondary:hover {
      background-color: #e2e8f0;
    }

    .shepherd-arrow:before {
      background: white;
    }

    .shepherd-progress-dots {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .shepherd-progress-dot {
      background-color: #cbd5e0;
      border-radius: 50%;
      height: 6px;
      margin: 0 4px;
      width: 6px;
      transition: all 0.3s ease;
    }

    .shepherd-progress-dot-active {
      background-color: #4299e1;
      transform: scale(1.2);
    }

    .shepherd-element {
      animation: fadeInUp 0.4s ease-out;
    }
  </style>
</body>

</html>