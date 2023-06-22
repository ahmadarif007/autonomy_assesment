<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.includes.head')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @include('backend.includes.placeholder')
      @include('backend.includes.navbar')
      @include('backend.includes.sidebar')
      @yield('dashboardContent')
      @include('backend.includes.footer')
      <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    @include('backend.includes.script')
  </body>
</html>
