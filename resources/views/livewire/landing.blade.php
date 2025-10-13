@push('styles')

<!-- Animasi CSS murni -->
<style>
  .animate-fade {
    opacity: 0;
    animation: fadeIn 1.2s ease forwards;
  }

  .animate-fade-delay {
    opacity: 0;
    animation: fadeIn 1.2s ease 0.4s forwards;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Ikon Bootstrap */
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css");

  #about {
    scroll-margin-top: 80px;
  }
</style>

@endpush
<div>

  <!-- Hero Parallax -->
  <section class="parallax" id="home">
    <div class="container text-center">
      <h1 class="animate-fade fw-bold text-white">
        SISTEM INFORMASI PELAPORAN SERANGAN <br> HAMA & PENYAKIT
      </h1>
      <p class="mt-3 animate-fade-delay">
        Digitalisasi pelaporan serangan hama dan penyakit tanaman untuk Kabupaten Kolaka
      </p>
      <a href="#about" class="btn btn-primary btn-lg mt-4 animate-fade-delay">
        Pelajari Lebih Lanjut
      </a>
    </div>
  </section>

  <!-- Tentang Aplikasi -->
  <section id="about" class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Tentang Aplikasi</h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">
          <strong>SiPetak </strong> merupakan inovasi digital dari Dinas Pertanian dan Perkebunan Kolaka
          untuk memudahkan pelaporan serangan Hama dan Penyakit tanaman cepat dan akurat.
        </p>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="shadow-card h-100 text-center">
            <div class="mb-3">
              <i class="bi bi-cloud-upload text-success fs-1"></i>
            </div>
            <h5 class="fw-semibold">Pelaporan Digital</h5>
            <p class="text-muted">
                Petani dapat melaporkan serangan hama dan penyakit tanaman secara langsung melalui aplikasi web.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="shadow-card h-100 text-center">
            <div class="mb-3">
              <i class="bi bi-graph-up-arrow text-success fs-1"></i>
            </div>
            <h5 class="fw-semibold">Analisis Laporan Cepat</h5>
            <p class="text-muted">
                Laporan dianalisis oleh petugas untuk menghasilkan rekomendasi penanganan yang tepat.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="shadow-card h-100 text-center">
            <div class="mb-3">
              <i class="bi bi-shield-check text-success fs-1"></i>
            </div>
            <h5 class="fw-semibold">Akurat & Transparan</h5>
            <p class="text-muted">
                Semua laporan tersimpan dengan aman dan dapat diakses kapan saja oleh petani dan petugas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

