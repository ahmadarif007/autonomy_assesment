<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('backend.includes.navbar')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">OUTLOOK</a>
          </div>
        </div>
        @include('backend.includes.sidebar')
      </div>
    </aside>

    @yield('dashboardContent')
    @include('backend.includes.footer')
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  @include('backend.includes.script')
</body>
</html>
