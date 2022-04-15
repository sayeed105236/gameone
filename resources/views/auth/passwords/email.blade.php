

<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Gameone</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/coinex.css?v=1.0.0')}}">  </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
      <div style="background-image: url('../../assets/images/auth/01.png')" >
        <div class="wrapper">
<section class="vh-100 bg-image">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="POST" action="{{ route('password.email') }}">
                          @csrf
                         <div class="auth-form">
                            <div class="text-center">
                                <h2 >Reset Password</h2>
                            </div>

                            <div>
                                <p class="mt-3 text-center">Enter your email address and we'll send you an email
                                    with instructions to reset your password.</p>
                                <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label for="floatingInput">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Reset</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>


    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('assets/js/libs.min.js')}}"></script>
    <!-- widgetchart JavaScript -->
    <script src="{{asset('assets/js/charts/widgetcharts.js')}}"></script>
    <!-- fslightbox JavaScript -->
    <script src="{{asset('assets/js/fslightbox.js')}}"></script>
    <!-- app JavaScript -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <!-- apexchart JavaScript -->
    <script src="{{asset('assets/js/charts/apexcharts.js')}}"></script>
  </body>
</html>
