<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Đăng Nhập | Code Map</title>
    <link rel="shortcut icon" href="{{ asset('public/images/logo.png') }}" />
    <meta name="theme-color" content="#3063A0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script>
</head>

<body>
    <main class="auth auth-floated">
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                    <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
                </div>
                <h1 class="h3">Đăng Nhập</h1>
            </div>
            <p class="text-left mb-4">
                Bạn chưa có tài khoản? <a href="{{ route('home.register') }}">Tạo tài khoản</a>
            </p>
            @if(Session::has('error'))
            <div class="alert alert-danger shadow-sm px-2 text-left" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{ Session::get('error') }}
            </div>
            @endif
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Email hoặc tên đăng nhập</label>
                <input type="text" id="inputUser" class="form-control form-control-lg" name="username" value="{{ old('username') }}" autocomplete="off" maxlength="255" required autofocus>
            </div>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">Mật khẩu</label>
                <input type="password" id="inputPassword" class="form-control form-control-lg" name="password" required>
            </div>
            <div class="form-group">
                <div class="custom-control custom-control-inline custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
                    <label class="custom-control-label" for="remember_me">Ghi nhớ đăng nhập</label>
                </div>
                <a href="#" class="link">Quên mật khẩu?</a>
            </div>

            <div class="form-group mb-4">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng Nhập</button>
            </div>
            <!-- <div class="row mb-3">
                <div class="col-6">
                    <button class="btn btn-danger" style="background-color: red !important;"><i class="fab fa-google"></i> Đăng Nhập với Google</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary"><i class="fab fa-facebook-f"></i> Đăng Nhập với Facebook</button>
                </div>
            </div> -->
            <p class="mb-0 px-3 text-muted text-center">
                Copyright © @php echo date('Y'); @endphp. All right reserved.
            </p>
        </form>
        <div id="announcement" class="auth-announcement" style="background-image: url(assets/images/illustration/img-1.png);">
            <div class="announcement-body">
                <h2 class="announcement-title">Code Map Team</h2>
                <a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-fw fa-angle-right"></i> Trang chủ</a>
            </div>
        </div>
    </main>
    <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/particles.js/particles.min.js') }}"></script>
    <script>
        $(document).on('theme:init', () => {
            particlesJS.load("announcement", "{{ asset('public/assets/javascript/pages/particles.json') }}");
        });
    </script>
    <script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>
</body>

</html>