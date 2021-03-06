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
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/admin.css') }}" />
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
    <div class="app">
        <header class="app-header app-header-dark">
            <div class="top-bar">
                <div class="top-bar-brand">
                    <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="icon-code">c</span>ode map
                    </a>
                </div>
                <div class="top-bar-list">
                    <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                    </div>
                    <div class="top-bar-item top-bar-item-full">
                        <form class="top-bar-search">
                            <div class="input-group input-group-search dropdown">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                </div><input type="text" class="form-control" data-toggle="dropdown" aria-label="Search" placeholder="T??m ki???m ch???c n??ng">
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-xl ml-n4 mw-100">
                                    <div class="dropdown-arrow ml-3"></div>
                                    <div class="dropdown-scroll perfect-scrollbar h-auto" style="max-height: 360px">
                                        <div class="list-group list-group-flush list-group-reflow mb-2">
                                            <h6 class="list-group-header d-flex justify-content-between">
                                                <span>???????ng t???t</span>
                                            </h6>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.list_member') }}" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                <div class="ml-2">Th??nh Vi??n</div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.list_tags') }}" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-tags"></i>
                                                </div>
                                                <div class="ml-2">Th??? Tag</div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.post') }}" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-paper-plane"></i>
                                                </div>
                                                <div class="ml-2">????ng B??i</div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.list_post') }}" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-layer-group"></i>
                                                </div>
                                                <div class="ml-2">B??i ????ng</div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="ml-2">T??i Kho???n</div>
                                            </div>
                                            <h6 class="list-group-header d-flex justify-content-between mt-2">
                                                <span>Ph???n M??? R???ng</span>
                                            </h6>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.policy') }}" class="stretched-link">
                                                    <span class="sr-only"></span>
                                                </a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-user-shield"></i>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="mb-n1">Ch??nh S??ch B???o M???t</div>
                                                </div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="{{ route('admin.rules') }}" class="stretched-link">
                                                    <span class="sr-only"></span>
                                                </a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-pencil-ruler"></i>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="mb-n1">??i???u Kho???n D???ch V???</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                        <ul class="header-nav nav">
                            <li class="nav-item dropdown header-nav-dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-grid-three-up"></span></a>
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-sheets">
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('home') }}" class="tile-wrapper" target="blank">
                                                <span class="tile tile-lg bg-indigo"><i class="fas fa-home"></i></span>
                                                <span class="tile-peek">Trang ch???</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('admin.post') }}" class="tile-wrapper">
                                                <span class="tile tile-lg bg-teal"><i class="fas fa-paper-plane"></i></span>
                                                <span class="tile-peek">????ng B??i</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('admin.list_post') }}" class="tile-wrapper">
                                                <span class="tile tile-lg bg-pink"><i class="fas fa-layer-group"></i></span>
                                                <span class="tile-peek">B??i ????ng</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('admin.project') }}" class="tile-wrapper">
                                                <span class="tile tile-lg bg-yellow"><i class="fas fa-project-diagram"></i></span>
                                                <span class="tile-peek">????? ??n</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('admin.list_tags') }}" class="tile-wrapper">
                                                <span class="tile tile-lg bg-cyan"><i class="fas fa-tags"></i></span>
                                                <span class="tile-peek">Th??? Tag</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="{{ route('admin.list_member') }}" class="tile-wrapper">
                                                <span class="tile tile-lg bg-cyan"><i class="fas fa-users"></i></span>
                                                <span class="tile-peek">Th??nh Vi??n</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="dropdown d-flex">
                            <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-avatar user-avatar-md"><img src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt=""></span>
                                <span class="account-summary pr-lg-4 d-none d-lg-block">
                                    <span class="account-name">{{ getName() }}</span>
                                    <span class="account-description text-capitalize">{{ getRole() }}</span>
                                </span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow ml-3"></div>
                                <h6 class="dropdown-header d-none d-md-block d-lg-none">{{ getName() }}</h6>
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <span class="dropdown-icon oi oi-person"></span> H??? S??
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <span class="dropdown-icon oi oi-account-logout"></span> ????ng Xu???t
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <aside class="app-aside app-aside-expand-md app-aside-light">
            <div id="aside-left" class="aside-content">
                <header class="aside-header d-block d-md-none">
                    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                        <span class="user-avatar user-avatar-lg">
                            <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt="">
                        </span>
                        <span class="account-icon">
                            <span class="fa fa-caret-down fa-lg"></span>
                        </span>
                        <span class="account-summary">
                            <span class="account-name">{{ getName() }}</span>
                            <span class="account-description text-capitalize">{{ getRole() }}</span>
                        </span>
                    </button>
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <div class="pb-3">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <span class="dropdown-icon oi oi-person"></span> H??? S??
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"><span class="dropdown-icon oi oi-account-logout"></span> ????ng Xu???t</a>
                        </div>
                    </div>
                </header>
                <div class="aside-menu overflow-hidden">
                    <nav id="stacked-menu" class="stacked-menu">
                        <ul class="menu">
                            <li class="menu-item {{ hasActive('admin/dashboard') }}">
                                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                                    <span class="menu-icon fas fa-home"></span>
                                    <span class="menu-text text-uppercase">B???ng ??i???u Khi???n</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive('admin/post') }}">
                                <a href="{{ route('admin.post') }}" class="menu-link">
                                    <span class="menu-icon fas fa-paper-plane"></span>
                                    <span class="menu-text text-uppercase">????ng B??i</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive('admin/profile') }}">
                                <a href="{{ route('admin.profile') }}" class="menu-link">
                                    <span class="menu-icon fas fa-user"></span>
                                    <span class="menu-text text-uppercase">T??i Kho???n</span>
                                </a>
                            </li>
                            <li class="menu-header">Ch???c n??ng c?? b???n</li>
                            <li class="menu-item {{ hasActive('admin/list-members') }}">
                                <a href="{{ route('admin.list_member') }}" class="menu-link">
                                    <span class="menu-icon fas fa-users"></span>
                                    <span class="menu-text text-uppercase">Th??nh Vi??n</span>
                                </a>
                            </li>
                            
                            <li class="menu-item {{ hasActive('admin/tags') }}">
                                <a href="{{ route('admin.list_tags') }}" class="menu-link">
                                    <span class="menu-icon fas fa-tags"></span>
                                    <span class="menu-text text-uppercase">Th??? Tag</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive2('admin/list-post') }}">
                                <a href="{{ route('admin.list_post') }}" class="menu-link">
                                    <span class="menu-icon fas fa-layer-group"></span>
                                    <span class="menu-text text-uppercase">B??i ????ng</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive2('admin/project') }}">
                                <a href="{{ route('admin.project') }}" class="menu-link">
                                    <span class="menu-icon fas fa-project-diagram"></span>
                                    <span class="menu-text text-uppercase">????? ??n</span>
                                </a>
                            </li>
                            <li class="menu-header">Ph???n H???i & Li??n H???</li>
                            <li class="menu-item {{ hasActive('admin/contact') }}">
                                <a href="{{ route('admin.contact') }}" class="menu-link">
                                    <span class="menu-icon fas fa-id-card"></span>
                                    <span class="menu-text text-uppercase">Li??n H???</span>
                                </a>
                            </li>
                            <li class="menu-header">Ch??nh S??ch & B???o M???t</li>
                            <li class="menu-item {{ hasActive('admin/policy') }}">
                                <a href="{{ route('admin.policy') }}" class="menu-link">
                                    <span class="menu-icon fas fa-user-shield"></span>
                                    <span class="menu-text text-uppercase">Ch??nh S??ch B???o M???t</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive('admin/rules') }}">
                                <a href="{{ route('admin.rules') }}" class="menu-link">
                                    <span class="menu-icon fas fa-pencil-ruler"></span>
                                    <span class="menu-text text-uppercase">??i???u Kho???n D???ch V???</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive('admin/instruct') }}">
                                <a href="{{ route('admin.instruct') }}" class="menu-link">
                                    <span class="menu-icon fas fa-chalkboard-teacher"></span>
                                    <span class="menu-text text-uppercase">H?????ng D???n Websites</span>
                                </a>
                            </li>
                            <li class="menu-header">H??? Th???ng N??ng Cao</li>
                            <li class="menu-item">
                                <a href="{{ server }}" class="menu-link" target="_blank">
                                    <span class="menu-icon fas fa-server"></span>
                                    <span class="menu-text text-uppercase">M??y Ch???</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ database }}" class="menu-link" target="_blank">
                                    <span class="menu-icon fas fa-database"></span>
                                    <span class="menu-text text-uppercase">C?? S??? D??? Li???u</span>
                                </a>
                            </li>
                            <li class="menu-item {{ hasActive('admin/config-system') }}">
                                <a href="{{ route('admin.config_system') }}" class="menu-link">
                                    <span class="menu-icon fas fa-cogs"></span>
                                    <span class="menu-text text-uppercase">C???u H??nh H??? Th???ng</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <footer id="frame-app-version" class="aside-footer border-top p-2">
                    <button id="app-version" class="btn btn-light btn-block">
                        <span class="d-compact-menu-none">{{ app_version }}</span>
                        <i class="fab fa-servicestack  ml-1"></i>
                    </button>
                </footer>
            </div>
        </aside>
        <main class="app-main">
            <div class="wrapper">
                @yield('content')
            </div>
            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.instruct') }}">H?????ng D???n</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.rules') }}">??i???u Kho???n</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.policy') }}">Ch??nh S??ch</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('home.contact') }}">Li??n H???</a>
                    </li>
                </ul>
                <div class="copyright">Copyright ?? @php echo date('Y'); @endphp. All right reserved.</div>
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
    <script src="{{ asset('public/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '{{ app_url }}admin?type=Images',
            filebrowserImageUploadUrl: '{{ app_url }}admin/upload?type=Images&_token=',
            filebrowserBrowseUrl: '{{ app_url }}admin?type=Files',
            filebrowserUploadUrl: '{{ app_url }}dmin/upload?type=Files&_token='
        };

        CKEDITOR.replace('content', options);
    </script>
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
    <script src="{{ asset('public/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    @yield('script')
</body>

</html>