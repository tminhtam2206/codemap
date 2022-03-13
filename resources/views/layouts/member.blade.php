<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', '') | Code Map</title>
    <link rel="shortcut icon" href="{{ asset('public/images/logo.png') }}" />
    <meta name="theme-color" content="#3063A0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/open-iconic/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/member.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css') }}">
    <script src="{{ asset('public/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.css') }}">
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    @yield('css')
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
    <div class="app has-fullwidth">
        <header class="app-header app-header-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('member.dashboard') }}">
                        <span class="icon-code">c</span>ode map
                    </a>
                    <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item {{ hasActive_Member('profile') }}">
                                <a class="nav-link" href="{{ route('home') }}">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="nav-item {{ hasActive_Member('post') }}">
                                <a class="nav-link" href="{{ route('member.post') }}">
                                    Đăng bài
                                </a>
                            </li>
                            <li class="nav-item {{ hasActive_Member('my-post') }}">
                                <a class="nav-link" href="{{ route('member.my_post') }}">
                                    Bài đăng của tôi
                                </a>
                            </li>
                        </ul>
                        <div class="navbar-nav dropdown d-flex mr-lg-n3">
                            <button class="btn-account w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-avatar user-avatar-md mr-lg-0">
                                    <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt="">
                                </span>
                                <span class="account-summary d-lg-none">
                                    <span class="account-name">{{ getName() }}</span>
                                    <span class="account-description text-capitalize">{{ getRole() }}</span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow mr-3"></div>
                                <a class="dropdown-item" href="{{ route('member.dashboard') }}">
                                    <span class="dropdown-icon oi oi-person"></span> Hồ Sơ
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <span class="dropdown-icon oi oi-account-logout"></span> Đăng Xuất
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="app-main" style="background-image: url({{ app_url }}public/images/background.png);">
            <div class="wrapper">
                <div class="page">
                    @yield('content')
                </div>
            </div>
            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.instruct') }}">Hướng Dẫn</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.rules') }}">Điều Khoản</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.policy') }}">Chính Sách</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.contact') }}">Liên Hệ</a>
                    </li>
                </ul>
                <div class="copyright">Copyright © @php echo date('Y'); @endphp. All right reserved.</div>
            </footer>
        </main>
    </div>
    <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/ckfintor/ckeditor.js') }}"></script>
    <script src="{{ asset('public/ckfintor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/js/toastr.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.dataTables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                language: {
                    url: "{{ asset('public/js/vi.json') }}"
                },
                "bSort": false
            });
        });
    </script>
    {!! Toastr::message() !!}
    @yield('script')
</body>

</html>