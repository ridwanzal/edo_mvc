<!DOCTYPE html>
<html>
<head>
	<title><?php echo $layout['title'] ?></title>
	<meta charset="<?php echo CHARSET ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="noindex,nofollow">
	<meta name="generator" content="Bludit">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN_ADMIN_THEME.'img/favicon.png?version='.BLUDIT_VERSION ?>">

	<!-- CSS -->
	<?php
		echo Theme::cssBootstrap();
		echo Theme::css(array(
			'jquery-auto-complete.css',
			'open-iconic-bootstrap.min.css',
			'jquery.datetimepicker.min.css',
			'bludit.css'
		), DOMAIN_ADMIN_THEME_CSS);
	?>

	<!-- Javascript -->
	<?php
		echo Theme::jquery();
		echo Theme::jsBootstrap();
		echo Theme::js(array(
			'jquery-auto-complete.min.js',
			'jquery.datetimepicker.full.min.js'
		), DOMAIN_ADMIN_THEME_JS);
		echo Theme::jsSortable();
	?>

	<!-- Plugins -->
	<?php Theme::plugins('adminHead') ?>

</head>
<body class="h-100">

<!-- Plugins -->
<?php Theme::plugins('adminBodyBegin') ?>

<!-- Javascript dynamic generated by PHP -->
<?php
	echo '<script charset="utf-8">'.PHP_EOL;
	include(PATH_CORE_JS.'variables.php');
	echo '</script>'.PHP_EOL;

	echo '<script charset="utf-8">'.PHP_EOL;
	include(PATH_CORE_JS.'bludit-ajax.php');
	echo '</script>'.PHP_EOL;
?>

<!-- Overlay background -->
<div id="jsshadow"></div>

<!-- Alert -->
<?php include('html/alert.php'); ?>

<!-- Navbar, only for small devices -->
<?php include('html/navbar.php'); ?>

<div class="container h-100">
	<!-- 25%/75% split on large devices, small, medium devices hide -->
	<div class="row h-100">

		<!-- LEFT SIDEBAR - Display only on large devices -->
		<div class="sidebar col-lg-2 d-none d-lg-block">
		<?php include('html/sidebar.php'); ?>
		</div>

		<!-- RIGHT MAIN -->
		<div class="col-lg-10 pt-3 pb-1 h-100">
		<?php
			if (Sanitize::pathFile(PATH_ADMIN_VIEWS, $layout['view'].'.php')) {
				include(PATH_ADMIN_VIEWS.$layout['view'].'.php');
			} else {
				echo '<h1 class="text-center">'.$L->g('Page not found').'</h1>';
				echo '<h2 class="text-center">'.$L->g('Choose a page from the sidebar.').'</h2>';
			}
		?>
		</div>
	</div>
</div>

<!-- Check user logged and Internet connection -->
<?php include('html/user-logged.php'); ?>

<!-- Plugins -->
<?php Theme::plugins('adminBodyEnd') ?>

</body>
</html>
