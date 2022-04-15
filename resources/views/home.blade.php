
<!doctype html>
<html lang="en">
@include('user.layouts.partials.header')

  <body class=" ">
      @include('user.layouts.partials.loader')

      @include('user.layouts.partials.navbar')
    <main class="main-content">
      <div class="position-relative">
        <!--Nav Start-->
      @include('user.layouts.partials.navbar')
      </div>
      <div class="container-fluid content-inner pb-0">
        @yield('user_content')


      </div>
      @include('user.layouts.partials.footer')

    </main>

    <!-- Wrapper End-->
    <!-- offcanvas start -->

    @include('user.layouts.partials.scripts')
  </body>
</html>
