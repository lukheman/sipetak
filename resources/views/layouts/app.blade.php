<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title . " | SIPETAK" ?? 'SIPETAK' }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />


  <!-- Toastfy -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  @stack('styles')
</head>

<body class="with-welcome-text">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <!-- <img src="{{ asset('assets/images/logo.svg')}}" alt="logo" /> -->
            <span class="fw-bold">SiPetak</span>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <!-- <img src="{{ asset('assets/images/logo-mini.svg')}}" alt="logo" /> -->
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item fw-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">{{ $title ?? 'Default'}}</h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle"
                src="{{ getActiveUser()?->photo ? asset('storage/' . getActiveUser()->photo) : asset('assets/images/faces/face8.jpg') }}"
                alt="Profile image"> </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle"
                  src="{{ getActiveUser()?->photo ? asset('storage/' . getActiveUser()->photo) : asset('assets/images/faces/face8.jpg') }}"
                  alt="Profile image" width="40" height="40">
                <p class="mb-1 mt-3 fw-semibold">
                  {{ getActiveUser()?->nama ?? getActiveUser()?->nama_admin ?? getActiveUser()?->nama_kepala_dinas ?? 'User' }}
                </p>
                <p class="fw-light text-muted mb-0">{{ getActiveUser()?->email ?? '' }}</p>
              </div>
              <a class="dropdown-item" href="{{ route('profile')}}"><i
                  class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile Ku </a>
              <a class="dropdown-item" href="{{ route('logout')}}"><i
                  class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <x-sidebar />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @stack('modals')
          {{ $slot }}
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
              BootstrapDash.</span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights
              reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->

  <!-- Toastfy -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{ asset('js/script.js')}}"></script>

  @stack('scripts')

</body>

</html>