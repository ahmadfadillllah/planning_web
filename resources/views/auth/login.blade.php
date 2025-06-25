<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Sign In | {{ config('app.name') }}</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Web-based planning app for task scheduling, team collaboration, and project management." />
     <meta name="author" content="{{ config('app.name') }}" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('app') }}/assets/images/sims2.png">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('app') }}/assets/js/config.min.js"></script>

</head>

<body class="authentication-bg">

     <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-xl-5">
                         <div class="card auth-card">
                              <div class="card-body px-3 py-5">
                                   <div class="mx-auto mb-4 text-center auth-logo">
                                        <a href="index.html" class="logo-dark">
                                             <img src="{{ asset('app') }}/assets/images/sims1.png" height="50" alt="logo dark">
                                        </a>

                                        <a href="index.html" class="logo-light">
                                             <img src="{{ asset('app') }}/assets/images/sims1.png" height="50" alt="logo light">
                                        </a>
                                   </div>

                                   <h2 class="fw-bold text-uppercase text-center fs-18">Sign In</h2>
                                   <p class="text-muted text-center mt-1 mb-4">Masukkan NRP dan password Anda untuk mengakses Aplikasi</p>

                                   <div class="px-4">
                                        <form action="{{ route('login.post') }}" class="authentication-form" method="POST">
                                            @csrf
                                             <div class="mb-3">
                                                  <label class="form-label" for="example-nrp">NRP</label>
                                                  <input type="text" id="example-nrp" name="nik" class="form-control bg-light bg-opacity-50 border-light py-2" style="text-transform: uppercase;"  placeholder="Masukkan NRP" required
                                                  oninvalid="this.setCustomValidity('Harap isi kolom ini')" oninput="this.setCustomValidity('')">
                                             </div>
                                             <div class="mb-3">
                                                  {{-- <a href="auth-password.html" class="float-end text-muted text-unline-dashed ms-1">Reset password</a> --}}
                                                  <label class="form-label" for="example-password">Password</label>
                                                  <input type="password" id="example-password" class="form-control bg-light bg-opacity-50 border-light py-2" name="password" placeholder="MASUKKAN PASSWORD" required
                                                  oninvalid="this.setCustomValidity('Harap isi kolom ini')" oninput="this.setCustomValidity('')">
                                             </div>
                                             <div class="mb-3">
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                       <label class="form-check-label" for="checkbox-signin">Ingat Saya!</label>
                                                  </div>
                                             </div>

                                             <div class="mb-1 text-center d-grid">
                                                  <button class="btn btn-danger py-2 fw-medium" type="submit">Masuk</button>
                                             </div>
                                        </form>
                                   </div>

                              </div>
                              {{-- <div class="mb-2 text-center auth-logo">
                                        <a href="index.html" class="logo-dark">
                                             <img src="{{ asset('app') }}/assets/images/logo-dark.png" height="50" alt="logo dark">
                                        </a>

                                        <a href="index.html" class="logo-light">
                                             <img src="{{ asset('app') }}/assets/images/logo-dark.png" height="50" alt="logo light">
                                        </a>
                                   </div> --}}
                         </div>

                         <p class="mb-0 text-center text-white">Copyright © IT-FMS 2025 PT. SIMS JAYA KALTIM <br><i>{{ config('app.name') }}</i></p>

                    </div>
               </div>
          </div>
     </div>

     <script src="{{ asset('app') }}/assets/js/vendor.js"></script>

     <script src="{{ asset('app') }}/assets/js/app.js"></script>


</body>
</html>
