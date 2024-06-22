<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Login Page | Job Vacancy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <h4>Job Vacancy 1.0</h4>
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('errorMessage'))
                                <div class="alert alert-danger">
                                    {{ session('errorMessage') }}
                                </div>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>

                            <form id="loginForm" method="POST" action="{{ URL::to('/auth') }}" class="needs-validation"
                                novalidate="" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" name="email"
                                        class="form-control  @error('email')is-invalid @enderror" name="email"
                                        value="" required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="{{ url::to('/forgot-password') }}" class="float-end">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password')is-invalid @enderror" name="password"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" style="width: 100%; padding: 5px 0; margin: 4px 0;"
                                    class="btn btn-primary ms-max">
                                    Login
                                </button>
                                <a href="{{ route('redirect') }}"
                                    style="width: 100%; padding: 5px 0; margin: 4px 0; align-items: center;"
                                    class="btn btn-danger">
                                    <img class="rounded-circle"
                                        src="https://www.webrankinfo.com/dossiers/wp-content/uploads/google-logo-carre-2015-09-400.png"
                                        alt="Google Logo" style="width: 20px; height: 20px; margin-right: 8px;">
                                    Login With Google
                                </a>

                        </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="{{ URL::to('/register/job-seekers') }}"
                                class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-muted">
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="js/login.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Loading...',
                    html: 'Please wait while we process your request',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                this.submit();
            });
        });
    </script>
</body>

</html>
