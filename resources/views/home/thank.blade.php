<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Coming Soon</title>
	<link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png" />
	<link rel="shortcut icon" href="assets/favicon.ico" />
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
	<main id="comingsoon" class="empty-state empty-state-fullpage bg-primary text-white" style="background-image: url(assets/images/illustration/img-1.png);">
		<div class="empty-state-container">
			<h1 class="state-header" style="letter-spacing: 4px;"><a href="{{ route('home') }}" style="color: #FFF; text-decoration: none;">TRANG CHỦ</a></h1>
			<p class="state-description lead">Cảm ơn bạn đã để lại liên hệ với chúng tôi.</p>
			<div class="state-action">
				<a href="#" class="btn btn-reset"><i class="fab fa-fw fa-facebook"></i></a><a href="#" class="btn btn-reset"><i class="fab fa-fw fa-twitter"></i></a><a href="#" class="btn btn-reset"><i class="fab fa-fw fa-instagram"></i></a><a href="#" class="btn btn-reset"><i class="fab fa-fw fa-linkedin"></i></a>
			</div>
		</div>
	</main>
	<script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/particles.js/particles.min.js') }}"></script>
	<script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>
</body>
</html>