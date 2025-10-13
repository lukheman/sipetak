<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? 'SiPetak Kolaka' }}</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    :root {
      --primary: #2e7d32;
      --primary-dark: #1b5e20;
      --secondary: #a5d6a7;
      --text-dark: #1a3c34;
      --text-muted: #4a4a4a;
      --background: #f1f8e9;
    }

    * {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Poppins", sans-serif;
      color: var(--text-dark);
      background-color: var(--background);
    }

    /* Navbar */
    .navbar {
      background-color: transparent;
      transition: all 0.4s ease;
      padding: 1rem 0;
    }

    .navbar.scrolled {
      background-color: white !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .navbar-brand,
    .nav-link {
      color: var(--text-dark) !important;
      font-weight: 600;
    }

    .nav-link {
      position: relative;
      transition: color 0.3s ease;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 0%;
      height: 2px;
      background-color: var(--primary);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 100%;
    }

    .navbar-brand img {
      height: 42px;
      margin-right: 8px;
    }

    /* Parallax */
    .parallax {
      background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
        url("{{ asset('img/hero.jpg') }}");
      min-height: 90vh;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 1.5rem;
    }

    .parallax h1 {
      font-size: 3.2rem;
      font-weight: 700;
      line-height: 1.2;
    }

    .parallax p {
      color: var(--secondary);
      font-size: 1.25rem;
      max-width: 650px;
      margin: 1rem auto 0;
    }

    /* Cards */
    .shadow-card {
      border: none;
      border-radius: 14px;
      padding: 2rem;
      background: white;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .shadow-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    /* Section title */
    h2.section-title {
      font-weight: 600;
      font-size: 2rem;
      margin-bottom: 1.2rem;
      color: var(--text-dark);
      text-align: center;
      position: relative;
    }

    h2.section-title::after {
      content: "";
      width: 70px;
      height: 4px;
      background: var(--primary);
      display: block;
      margin: 0.5rem auto;
      border-radius: 3px;
    }

    /* Buttons */
    .btn-primary {
      background-color: var(--primary);
      border: none;
      border-radius: 10px;
      padding: 0.8rem 2rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(46, 125, 50, 0.4);
    }

    .btn-outline-primary {
      border-color: var(--primary);
      color: var(--primary);
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: white;
    }

    /* Footer */
    footer {
      background-color: var(--primary-dark);
      color: white;
      padding: 2.5rem 0;
    }

    footer a {
      color: var(--secondary);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    footer a:hover {
      color: white;
    }

    footer p {
      margin: 0.3rem 0;
      font-size: 0.95rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .parallax h1 {
        font-size: 2rem;
      }
      .parallax p {
        font-size: 1rem;
      }
      h2.section-title {
        font-size: 1.5rem;
      }
    }

@stack('styles')
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">
        SiPetak
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link @if (request()->routeIs('landing')) active @endif" href="{{ route('landing') }}">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#about">Tentang</a></li>
          <li class="nav-item"><a wire:navigate class="nav-link @if (request()->routeIs('login')) active @endif" href="{{ route('login') }}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <main class="mt-5 pt-5">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p class="mb-1">&copy; {{ date('Y') }} Dinas Pertanian dan Perkebunan Kolaka. Semua Hak Dilindungi.</p>
      <p><a href="{{ route('landing') }}#contact">Hubungi Kami</a> | <a href="{{ route('landing') }}#privacy">Kebijakan Privasi</a></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Navbar scroll behavior
    window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");
      if (window.scrollY > 60) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });
  </script>
</body>
</html>
