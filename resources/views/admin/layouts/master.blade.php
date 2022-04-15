
<!doctype html>
<html lang="en">
@include('admin.layouts.partials.header')

  <body class=" ">
      @include('admin.layouts.partials.loader')

      @include('admin.layouts.partials.sidebar')
    <main class="main-content">
      <div class="position-relative">
        <!--Nav Start-->
      @include('admin.layouts.partials.navbar')
      </div>
      <div class="container-fluid content-inner pb-0">
        @yield('admin_content')


      </div>
      @include('admin.layouts.partials.footer')

    </main>

    <!-- Wrapper End-->
    <!-- offcanvas start -->

    @include('admin.layouts.partials.scripts')
  </body>
</html>
