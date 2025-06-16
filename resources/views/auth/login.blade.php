<!DOCTYPE html>
<html
  lang="en"
  class="light-style"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login - Simak TI</title>

    <meta name="description" content="Login to Simak TI dashboard" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <!-- Custom CSS -->
    <style>
      /* Center the authentication wrapper vertically and horizontally */
      .authentication-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-color: #f5f5f9;
      }

      /* Style the card */
      .authentication-inner .card {
        width: 100%;
        max-width: 450px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
      }

      /* Logo styling */
      .app-brand img {
        width: 120px;
        height: auto;
        margin-bottom: 1rem;
      }

      /* Title styling */
      .card-body h4 {
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 1.5rem;
      }

      /* Back to home button */
      .back-to-home {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        color: #566a7f;
        background-color: #f5f5f9;
        border: 1px solid #d9dee3;
        border-radius: 6px;
        padding: 0.5rem 1rem;
        margin: 1rem 0 0 1rem;
        transition: all 0.2s ease;
      }

      .back-to-home:hover {
        color: #696cff;
        background-color: #e7e7ff;
        border-color: #696cff;
        transform: translateY(-1px);
      }

      .back-to-home img {
        width: 16px;
        height: 16px;
        margin-right: 0.5rem;
      }

      /* Form input styling */
      .form-control {
        border: 1px solid #d9dee3;
        border-radius: 6px;
        padding: 0.75rem 1rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
      }

      .form-control:focus {
        border-color: #696cff;
        box-shadow: 0 0 0 3px rgba(105, 108, 255, 0.1);
      }

      .form-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: #566a7f;
        margin-bottom: 0.5rem;
      }

      /* Error message styling */
      .invalid-feedback {
        display: none;
        color: #ff3e1d;
        font-size: 0.85rem;
        margin-top: 0.25rem;
      }

      .is-invalid ~ .invalid-feedback {
        display: block;
      }

      .is-invalid {
        border-color: #ff3e1d !important;
      }

      /* Button styling */
      .btn-primary {
        background-color: #696cff;
        border-color: #696cff;
        border-radius: 6px;
        padding: 0.75rem;
        font-weight: 500;
        transition: background-color 0.2s ease, transform 0.2s ease;
      }

      .btn-primary:hover {
        background-color: #5a5cff;
        border-color: #5a5cff;
        transform: translateY(-2px);
      }

      /* Checkbox styling */
      .form-check-input:checked {
        background-color: #696cff;
        border-color: #696cff;
      }

      /* Create account link */
      .text-center a {
        color: #696cff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
      }

      .text-center a:hover {
        color: #5a5cff;
        text-decoration: underline;
      }

      /* Responsive adjustments */
      @media (max-width: 576px) {
        .authentication-inner .card {
          padding: 1.5rem;
        }

        .app-brand img {
          width: 100px;
        }

        .card-body h4 {
          font-size: 1.25rem;
        }

        .back-to-home {
          padding: 0.4rem 0.8rem;
          font-size: 0.85rem;
        }

        .back-to-home img {
          width: 14px;
          height: 14px;
        }
      }
    </style>

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!-- Template customizer & Theme config -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Login -->
          <div class="card">
            <div>
              <a href="{{ route('home') }}" class="back-to-home" aria-label="Return to Home"> Home
              </a>
            </div>
            <div class="card-body">
              <!-- Logo -->
              <div class="justify-content-center">
                <a href="/dashboard" class="app-brand-link">
                  <img class="img-fluid" src="{{ asset('images/logo3.png') }}" alt="Simak TI Logo" />
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Simak TI!</h4>
              <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    autofocus
                  />
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                  />
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember-me" name="remember" />
                  <label class="form-check-label" for="remember-me">Remember Me</label>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary d-grid w-100">Sign In</button>
                </div>
              </form>
              <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">Create an account</a>
              </p>
            </div>
          </div>
          <!-- /Login -->
        </div>
      </div>
    </div>
    <!-- /Content -->

    <!-- Core JS -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
