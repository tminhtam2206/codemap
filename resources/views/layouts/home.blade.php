<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', '') | Code Map</title>
    <link rel="shortcut icon" href="{{ asset('public/images/logo.png') }}" />
    <meta name="author" content="Hoàng Minh Tuấn">
    <meta name="robots" content="index, follow, noodp">
    @yield('seo')
    <meta name="theme-color" content="#3063A0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/open-iconic/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.css') }}" />
    <!-- video -->
    <link rel="stylesheet" href="{{ asset('public/css/plyr.css') }}" />
    <!-- end video -->
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css') }}">
    <script src="{{ asset('public/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LM549F3D3F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LM549F3D3F');
    </script>
    <meta name="google-site-verification" content="x3SRsLJy8TZPz1GpxD6lzEeLwetTkkvlxZ4pY-ZaqAQ" />
</head>

<body>
    <div class="app has-fullwidth">
        <header class="app-header app-header-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="icon-code">c</span>ode map
                    </a>
                    <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.tags_post', ['name'=>'Đồ Án']) }}">
                                    Đồ Án
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.tags_post', ['name'=>'Phần Mềm']) }}">
                                    Phần Mềm
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarPagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-1">Khóa Học</span>
                                    <i class="fas fa-angle-down ml-auto"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarPagesDropdown">
                                    <li class="dropright">
                                        <a class="dropdown-item d-flex align-items-center" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-1">Lập Trình</span>
                                            <i class="fas fa-angle-right ml-auto"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Python']) }}">Lập trình Python</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'C']) }}">Lập trình C</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'C++']) }}">Lập trình C++</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Java']) }}">Lập trình Java</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Csharp']) }}">Lập trình Csharp</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'A.I']) }}">Lập trình A.I</a></li>
                                            <!-- lap trinh web -->
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Javascript']) }}">Lập trình Javascript</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Nodejs']) }}">Lập trình Nodejs</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'PHP']) }}">Lập trình PHP</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'ASP.NET']) }}">Lập trình ASP.NET</a></li>
                                            <li><a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Android']) }}">Lập trình Android</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropright">
                                        <a class="dropdown-item d-flex align-items-center" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-1">Unity3D</span>
                                            <i class="fas fa-angle-right ml-auto"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="authDropdown">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Game 2D']) }}">Game 2D</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('home.tags_post', ['name'=>'Game 3D']) }}">Game 3D</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.tags') }}">
                                    Thẻ Tag
                                </a>
                            </li>
                        </ul>
                        <form class="top-bar-search d-lg-inline-block w-auto my-2 my-lg-0 px-0 px-lg-2" action="{{ route('home.search') }}">
                            <div class="input-group input-group-search">
                                <input class="form-control" type="search" placeholder="Tìm kiếm..." aria-label="Search" name="key" autocomplete="off" required>
                            </div>
                        </form>
                        @guest
                        <div class="navbar-nav dropdown d-flex mr-lg-n3">
                            <a class="btn-account w-100" href="{{ route('home.login') }}">
                                <span class="user-avatar user-avatar-md mr-lg-0">
                                    <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt="">
                                </span>
                                <span class="account-summary d-lg-none">
                                    <span class="account-name">Tài Khoản</span>
                                    <span class="account-description">Đăng Nhập</span>
                                </span>
                            </a>
                        </div>
                        @else
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
                                @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <span class="dropdown-icon oi oi-person"></span> Hồ Sơ
                                </a>
                                @elseif(Auth::user()->role == 'mod')
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-icon oi oi-person"></span> Hồ Sơ
                                </a>
                                @else
                                <a class="dropdown-item" href="{{ route('member.dashboard') }}">
                                    <span class="dropdown-icon oi oi-person"></span> Hồ Sơ
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <span class="dropdown-icon oi oi-account-logout"></span> Đăng Xuất
                                </a>
                            </div>
                        </div>
                        @endguest
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
    <script src="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <!-- video js -->
    <script src="{{ asset('public/js/plyr.polyfilled.js') }}"></script>
    <!-- end video js -->

    @yield('script')
</body>

</html>