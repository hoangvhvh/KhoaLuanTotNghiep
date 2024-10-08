	<title>{{$meta_title}}</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />

	<!-- <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/> -->
	<meta name="title" content="{{$meta_title}}">
	<meta name="description" content="{{$meta_desc}}">

	<link rel="icon" type="image/x-icon" href="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="canonical" href="{{$url_canonical}}" />
	<meta name="author" content="">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<?php
	if ($com == 'detail') { ?>
		<meta property="og:url" content="{{$url_canonical}}" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="{{$meta_title}}" />
		<meta property="og:description" content="{{$meta_desc}}" />
		<meta property="og:image" content="{{$share_images}}" />

	<?php }
	?>
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<link rel="stylesheet" href="{!! asset('web/css/sweetalert.css')!!}" type="text/css" media="all" />
	<!-- Custom-Files -->
	<link href="{!! asset('web/css/bootstrap.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{!! asset('web/css/style.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{!! asset('web/css/fontawesome-all.css')!!}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{!! asset('web/css/popuo-box.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{!! asset('web/css/menu.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<link href="{!! asset('web/css/slick-theme.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<link href="{!! asset('web/css/slick.css')!!}" rel="stylesheet" type="text/css" media="all" />


	<link href="{!! asset('web/css/jquery.simplyscroll-style.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<link href="{!! asset('web/css/jquery.simplyscroll.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{!! asset('web/css/owl_them.css')!!}">
	<link rel="stylesheet" href="{!! asset('web/css/owl.css')!!}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
		rel="stylesheet">

	<link href="{!! asset('layout_admin/admin/vendors/animate.css/animate.min.css')!!}" rel="stylesheet">


	<!-- Messenger Plugin chat Code -->
	<div id="fb-root"></div>

	<!-- Your Plugin chat code -->
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>


	<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "103770788636351");
		chatbox.setAttribute("attribution", "biz_inbox");

		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v11.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- //web fonts -->