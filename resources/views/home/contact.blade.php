<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Liên Hệ | Code Map</title>
    <link rel="shortcut icon" href="{{ asset('public/images/logo.png') }}" />
    <meta name="theme-color" content="#3063A0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
    <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" />
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
    <main class="app app-site">
        <nav class="navbar navbar-expand-lg navbar-light py-4" data-aos="fade-in">
            <div class="container">
                <button class="hamburger hamburger-squeeze hamburger-light d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                <a class="navbar-brand ml-auto mr-0" href="{{ route('home') }}">
                    <span class="icon-code">c</span>ode map
                </a>
                <div class="navbar-collapse collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mr-lg-3 active">
                            <a class="nav-link py-2" href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item mr-lg-3">
                            <a class="nav-link py-2" href="{{ route('home.tags_post', ['name'=>'Đồ Án']) }}">Đồ án</a>
                        </li>
                        <li class="nav-item mr-lg-3">
                            <a class="nav-link py-2" href="{{ route('home.tags_post', ['name'=>'Phần Mềm']) }}">Phần mềm</a>
                        </li>
                        <li class="nav-item mr-lg-3">
                            <a class="nav-link py-2" href="{{ route('home.tags') }}">Thẻ tag</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-5">
            <div class="container container-fluid-xl">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 order-md-2" data-aos="fade-left">
                        <img class="img-fluid img-float-md-6 mb-5 mb-md-0" src="{{ asset('public/assets/images/illustration/launch.svg') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6 order-md-1" data-aos="fade-in">
                        <div class="col-fix pl-xl-3 ml-auto text-center text-sm-left">
                            <h1 class="display-4 enable-responsive-font-size mb-4">Cảm ơn bạn đã ghé thăm website của chúng tôi!</h1>
                            <p class="lead text-muted mb-5">Chúng tôi rất mong sẽ giúp ích được gì đó cho bạn trong tương lai.</p>
                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary d-block d-sm-inline-block mr-sm-2 my-3" data-aos="zoom-in" data-aos-delay="200">Trang Chủ<i class="fa fa-angle-right ml-2"></i></a>
                            <a href="{{ route('home.instruct') }}" class="btn btn-lg btn-subtle-primary d-block d-sm-inline-block my-3" target="_blank" data-aos="zoom-in" data-aos-delay="300">Hướng Dẫn</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="row text-center text-md-left">
                    <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="0">
                        <img class="mb-4" src="{{ asset('public/assets/images/illustration/lab.svg') }}" alt="" height="72">
                        <h2 class="lead">Đơn giản và phong phú</h2>
                    </div>
                    <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="100">
                        <img class="mb-4" src="{{ asset('public/assets/images/illustration/easy-config.svg') }}" alt="" height="72">
                        <h2 class="lead">Dễ dàng tùy chỉnh</h2>
                    </div>
                    <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="200">
                        <img class="mb-4" src="{{ asset('public/assets/images/illustration/scale.svg') }}" alt="" height="72">
                        <h2 class="lead">Nhanh chóng và mở rộng</h2>
                    </div>
                    <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="300">
                        <img class="mb-4" src="{{ asset('public/assets/images/illustration/support.svg') }}" alt="" height="72">
                        <h2 class="lead">Hỗ trợ nhanh chóng</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2 text-center">
                        <h2>Để Lại Liên Hệ Với Chúng Tôi</h2>
                        <p class="lead text-muted">Chúng tôi sẽ xem xét lời nhắn của bạn nhanh chóng.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <form action="{{ route('home.contact.post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Địa chỉ email</label>
                        <input type="email" class="form-control" name="email" maxlength="255" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Để lại lời nhắn</label>
                        <textarea name="message" class="form-control" cols="30" rows="10" maxlength="255" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="192" viewbox="0 0 1440 240" preserveaspectratio="none">
                <path class="fill-light" fill-rule="evenodd" d="M0 240V0c19.985 5.919 41.14 11.008 63.964 14.89 40.293 6.855 82.585 9.106 125.566 9.106 74.151 0 150.382-6.697 222.166-8.012 13.766-.252 27.51-.39 41.21-.39 99.76 0 197.087 7.326 282.907 31.263C827.843 72.527 860.3 117.25 906.926 157.2c43.505 37.277 115.38 51.186 208.485 53.076 7.584.153 15.156.224 22.714.224 40.887 0 81.402-2.062 121.914-4.125 40.512-2.062 81.027-4.125 121.902-4.125 1.01 0 2.019.002 3.03.004 16.208.042 34.959.792 55.029 2.234V240H0z"></path>
            </svg>
        </section>
        <section class="position-relative pb-5 bg-light">
            <div class="sticker">
                <div class="sticker-item sticker-top-right sticker-soften">
                    <img src="{{ asset('public/assets/images/decoration/cubes.svg') }}" alt="" data-aos="zoom-in">
                </div>
                <div class="sticker-item sticker-bottom-left sticker-soften scale-150">
                    <img src="{{ asset('public/assets/images/decoration/cubes.svg') }}" alt="" data-aos="zoom-in">
                </div>
            </div>
            <div class="container position-relative">
                <h2 class="text-center text-sm-left">Chức năng đang phát triển</h2>
                <p class="lead text-muted text-center text-sm-left mb-5">Đây là những tính năng cần thiết.</p>
                <div class="card-deck-lg">
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="0">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/rocket.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Thanh Toán Ví Điện Tử</h5>
                                    <p class="text-muted font-size-lg">Hỗ trợ người dùng thanh toán một cách nhanh chống, không cần qua nhiều bước trung gian.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/setting.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Fix Bug Hệ Thống</h5>
                                    <p class="text-muted font-size-lg">Sửa nhanh những bug căn bản và bảo mật tài khoản một cách an toàn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-deck-lg">
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/brain.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Quyền Sở Hữu Trí Tuệ</h5>
                                    <p class="text-muted font-size-lg">Bảo đảm quyền sở hữu trí tuệ của người dùng trên nền tảng của chúng tôi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/horse.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Tăng Băng Thông</h5>
                                    <p class="text-muted font-size-lg">Phục vụ kết nối nhiều người cùng một lúc, không làm mất thời gian của khách hàng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-deck-lg">
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/savings.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Thanh toán một lần</h5>
                                    <p class="text-muted font-size-lg">Sau khi mua hàng, bạn sẽ nhận được bản cập nhật miễn phí mãi mãi. Chúng tôi sẽ làm ngày càng tốt hơn cho bạn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="500">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-start text-center text-sm-left">
                                <img src="{{ asset('public/assets/images/illustration/document.svg') }}" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                                <div class="flex-fill">
                                    <h5 class="mt-0">Tài Liệu Hướng Dẫn</h5>
                                    <p class="text-muted font-size-lg">Mỗi thành phần được giải thích rõ ràng với ví dụ, khối mã và các phương pháp hay nhất.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative py-5 bg-light">
            <div class="sticker">
                <div class="sticker-item sticker-top-right sticker-soften translate-x-50">
                    <img src="{{ asset('public/assets/images/decoration/bubble1.svg') }}" alt="" data-aos="fade-left">
                </div>
            </div>
        </section>
        <section class="position-relative py-5 bg-light">
            <div class="sticker">
                <div class="sticker-item sticker-bottom-left sticker-soften">
                    <img src="{{ asset('public/assets/images/decoration/bubble2.svg') }}" alt="" data-aos="zoom-in" data-aos-delay="200">
                </div>
            </div>
            <div class="container position-relative mb-5">
                <h2 class="text-center">Cảm ơn bạn đã đóng góp cho chúng tôi</h2>
                <p class="text-center text-muted font-size-lg mb-5">Chúng tôi không là gì nếu không có bạn! Cảm ơn tất cả các bạn đã đóng góp trong mỗi bản cập nhật.</p>
                <div class="row mb-6">
                    <div class="col-12 col-md-8 offset-md-2 py-3">
                        <div class="row justify-content-center text-center">
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="0">
                                <img src="{{ asset('public/assets/images/logo/airbnb.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('public/assets/images/logo/amazon.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset('public/assets/images/logo/apple.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('public/assets/images/logo/dropbox.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="400">
                                <img src="{{ asset('public/assets/images/logo/google.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="500">
                                <img src="{{ asset('public/assets/images/logo/linkedin.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="600">
                                <img src="{{ asset('public/assets/images/logo/paypal.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="700">
                                <img src="{{ asset('public/assets/images/logo/shopify.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="900">
                                <img src="{{ asset('public/assets/images/logo/sketch.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 mb-5" data-aos="fade-up" data-aos-delay="1000">
                                <img src="{{ asset('public/assets/images/logo/slack.svg') }}" alt="" class="img-fluid" style="max-height: 32px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 offset-lg-1 mr-md-0">
                        <div class="card shadow-none rounded-lg mb-0 mr-md-n5 mt-md-n5 scale-125" data-aos="fade-in">
                            <img class="img-fluid rounded-lg" src="{{ asset('public/images/avatar.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 ml-md-0">
                        <div class="card shadow-lg rounded-lg p-4 ml-md-n5 mt-md-5" data-aos="fade-up">
                            <blockquote class="blockquote text-center border-0 p-3 p-md-4">
                                <figure>
                                    <img class="mr-2" src="{{ asset('public/assets/images/decoration/quote.svg') }}" alt="" height="32">
                                </figure>
                                <p>Tôi là một người đam mê lập trình, khi lập trình tôi gặp khá nhiều khó khăn, nhưng lúc đó tôi không từ bỏ, luôn kiên trì tìm cách, cuối cùng tôi cũng hoàn thành được dự án hôm nay.</p>
                                <footer class="blockquote-footer">
                                    Hoàng Minh Tuấn, <cite title="Bootstrap Themes">Code Map</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 position-relative bg-light">
            <div class="sticker">
                <div class="sticker-item sticker-bottom-left w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="120" viewbox="0 0 1440 240" preserveaspectratio="none">
                        <path class="fill-black" fill-rule="evenodd" d="M1070.39 25.041c107.898 11.22 244.461 20.779 369.477 51.164L1440 240H0L.133 72.135C350.236-17.816 721.61-11.228 1070.391 25.04z"></path>
                    </svg>
                </div>
            </div>
        </section>
        <section class="py-5 bg-black text-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <span class="icon-code">c</span>ode map <br><br>
                        <p class="text-muted mb-2">Codemap Information Technology.</p>
                        <address class="text-muted">
                            <abbr title="US phone code">+84</abbr> (033) 389-4499
                        </address>
                        <ul class="list-inline mb-5 mb-md-0">
                            <li class="list-inline-item mr-3" data-aos="fade-in" data-aos-delay="0">
                                <a href="#" class="text-muted text-decoration-none" title="twitter"><img class="grayscale" src="{{ asset('public/assets/images/avatars/twitter.svg') }}" alt="" width="24"></a>
                            </li>
                            <li class="list-inline-item mr-3" data-aos="fade-in" data-aos-delay="100">
                                <a href="#" class="text-muted text-decoration-none" title="instagram"><img class="grayscale" src="{{ asset('public/assets/images/avatars/instagram.svg') }}" alt="" width="24"></a>
                            </li>
                            <li class="list-inline-item mr-3" data-aos="fade-in" data-aos-delay="200">
                                <a href="#" class="text-muted text-decoration-none" title="dribbble"><img class="grayscale" src="{{ asset('public/assets/images/avatars/dribbble.svg') }}" alt="" width="24"></a>
                            </li>
                            <li class="list-inline-item mr-3" data-aos="fade-in" data-aos-delay="300">
                                <a href="#" class="text-muted text-decoration-none" title="medium"><img class="grayscale" src="{{ asset('public/assets/images/avatars/medium.svg') }}" alt="" width="24"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3 mb-md-0">
                        <h6 class="mb-4">Công Ty</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="{{ route('home.contact') }}" class="text-muted">Về Chúng Tôi</a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-muted">Blog</a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-muted">Knowledge Base</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3 mb-md-0">
                        <h6 class="mb-4">Sản Phẩm</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="http://codemap.atwebpages.com/" class="text-muted">Code Map</a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-muted">Tàng Kinh Các</a>
                            </li>
                            <li class="mb-3">
                                <a href="https://taskmarks.blogspot.com/" class="text-muted">Task Marks</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3 mb-md-0">
                        <h6 class="mb-4">Trợ Giúp</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="#" class="text-muted">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('home.instruct') }}" class="text-muted">Tài Liệu Hỗ Trợ</a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-muted">FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3 mb-md-0">
                        <h6 class="mb-4">Bảo Mật & Hướng Dẫn</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="{{ route('home.policy') }}" class="text-muted">Chính Sách Bảo Mật</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('home.rules') }}" class="text-muted">Điều Khoản Dịch Vụ</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('home.instruct') }}" class="text-muted">Hướng Dẫn Website</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="text-muted text-center mt-5">© @php echo date('Y') @endphp CodeMap, Inc. All rights reserved.</p>
            </div>
        </section>
    </main>
    <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>
</body>

</html>