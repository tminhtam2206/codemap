<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Đăng Ký | Code Map</title>
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
        <form class="auth-form" action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                    <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
                </div>
                <h1 class="h3">Đăng Ký</h1>
            </div>
            <p class="text-left mb-4">
                Bạn đã có tài khoản? <a href="{{ route('home.login') }}">Đăng nhập</a>
            </p>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="username">Tên đăng nhập</label>
                <input type="text" id="username" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" maxlength="{{ fields['user']['username'] }}" value="{{ old('username') }}" autocomplete="off" required autofocus>
                @error('username')
                <span class="invalid-feedback text-left" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="email">Địa chỉ email</label>
                <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" maxlength="255" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus>
                @error('email')
                <span class="invalid-feedback text-left" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="password">Mật khẩu</label>
                <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" minlength="8" required>
                @error('password')
                <span class="invalid-feedback text-left" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">Xác nhận mật khẩu</label>
                <input type="password" id="inputPassword" class="form-control form-control-lg" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <div class="custom-control custom-control-inline custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me" required>
                    <label class="custom-control-label" for="remember-me">
                        Nhấn tạo tài khoản, nghĩa là bạn đã đồng ý với <a href="{{ route('home.policy') }}" target="blank">Chính sách</a> & <a href="{{ route('home.rules') }}" target="blank">Điều khoản</a> của chúng tôi.
                    </label>
                </div>
            </div>
            <div class="form-group mb-4">
                <button id="btn-submit" class="btn btn-lg btn-primary btn-block" type="submit" disabled>Tạo Tài Khoản</button>
            </div>

            <p class="mb-0 px-3 text-muted text-center">
                © @php echo date('Y') @endphp All Rights Reserved.
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
    <script>
        $('#remember-me').click(function() {
            var item = $(this).is(":checked");

            if (item == true) {
                $('#btn-submit').attr("disabled", false);
            } else {
                $('#btn-submit').attr("disabled", true);
            }
        });
    </script>
</body>

</html>