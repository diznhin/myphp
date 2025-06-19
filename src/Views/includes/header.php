
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

var_dump($_SESSION);

if (isset($_SESSION['success'])) {
    echo '<p style="color: green; text-align: center;">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Diệu Hiền Portfolio</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

  <!-- AOS CSS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <style>
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1100;
      background: rgba(255,255,255,0.97);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 24px rgba(0,0,0,0.04);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo span {
      font-size: 1.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, #234567 0%, #007bff 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 1px;
    }

    .links {
      display: flex;
      gap: 32px;
      align-items: center;
    }

    .link a {
      color: #234567;
      font-weight: 600;
      font-size: 1.1rem;
      text-decoration: none;
      position: relative;
      transition: all 0.3s ease;
    }

    .link a::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0;
      height: 2px;
      background: #007bff;
      transition: width 0.3s ease;
    }

    .link a:hover::after {
      width: 100%;
    }

    .link a:hover {
      color: #007bff;
    }

    .contact-btn a {
      background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
      color: #fff !important;
      padding: 12px 24px;
      border-radius: 30px;
      box-shadow: 0 4px 15px rgba(0,123,255,0.2);
    }

    .contact-btn a:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,123,255,0.3);
    }

    .menu-toggle {
      display: none;
      font-size: 1.8rem;
      cursor: pointer;
      color: #234567;
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: block;
      }

      .links {
        display: none;
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        background: #fff;
        position: absolute;
        top: 100%;
        right: 0;
        width: 100%;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      }

      .links.active {
        display: flex;
      }

      .contact-btn a {
        width: 100%;
        text-align: center;
        padding: 10px 20px;
      }
    }

    main {
      padding-top: 100px;
    }

    @media (max-width: 768px) {
      main {
        padding-top: 80px;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <div class="nav-container">
        <div class="logo">
          <span>Diệu Hiền</span>
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
          <i class="fas fa-bars"></i>
        </div>
        <div class="links" id="mobileMenu">
          <div class="link" data-aos="fade-up" data-aos-delay="100"><a href="/home">Home</a></div>
          <div class="link" data-aos="fade-up" data-aos-delay="200"><a href="/about">About</a></div>
          <div class="link" data-aos="fade-up" data-aos-delay="300"><a href="/education">Education</a></div>
          <div class="link" data-aos="fade-up" data-aos-delay="400"><a href="/services">Services</a></div>
          <div class="link" data-aos="fade-up" data-aos-delay="500"><a href="/projects">Projects</a></div>
          <div class="link contact-btn" data-aos="fade-up" data-aos-delay="600"><a href="/contact">Contact Us</a></div>
        </div>
      </div>
    </nav>
  </header>

  <script>
    function toggleMenu() {
      document.getElementById('mobileMenu').classList.toggle('active');
    }
  </script>

  <main>

