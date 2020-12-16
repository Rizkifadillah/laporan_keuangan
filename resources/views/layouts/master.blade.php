
<!DOCTYPE html>
<html>

<head>
  @include('layouts.css')
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layouts.topbar')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-5">
      <div class="container-fluid">
        <div class="header-body">
          
          <!-- Card stats -->
          @yield('content')
        </div>
      </div>
    </div>
    <!-- Page content -->
    
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('layouts.js')

  @yield('scripts')
</body>

</html>
