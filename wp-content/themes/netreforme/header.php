<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
		<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--    <title><?//php wp_title('«', true, 'right'); ?> <?php //bloginfo('name'); ?></title>-->
        <meta name="description" content="Мы требуем: отмены Закона №83-ФЗ, сохранения бесплатного школьного образования, увеличения зарплаты учителей, повышения качества образовательных и медицинских услуг">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=cyrillic' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/accordion.min.js"></script>
        <script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
		<script type="text/javascript">
		  VK.init({
			apiId: 5013452
		  });
		</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<?php// body_class(); ?>
        <div class="header-container">
			<div class="navline"></div>
            <header class="wrapper clearfix">
                <h1 class="title">
					<?php if ( ! is_front_page() ) : ?>
						<a href="/"><span class="green">Гражданская</span> инициатива</h1></a>
					<?php else : ?>
						<span class="green">Гражданская</span> инициатива</h1>
					<?php endif; ?>
                <h2 class="title-2">За бесплатное образование и медицину</h2>
                <nav>
					<? wp_nav_menu_extended(array('theme_location' => 'top', 'menu_class' => 'top')); ?>
                </nav>
            </header>
        </div>
