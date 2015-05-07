<?php 

	/**
		@author: José V.
		@file: header.php
		@version: 1.0
	 */

?>

<!DOCTYPE html>
<html lang="es-VE">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<meta itemprop="name" content="Revista Diplomática de Venezuela" />
	<meta itemprop="copyright" content="Revista Diplomática | <?php print date('Y') ?>" />
	<meta itemprop="contentRating" content="General" />
	<meta name="identifier-url" content="http://www.revistadiplomatica.com/" />
	<meta name="title" content="Revista Diplomática de Venezuela" />
	<meta name="author" content="Jose Luis Vieitez" />
	<meta name="robots" content="All" />
	<meta name="revisit-after" content="1" />
	<meta name="description" content="La Revista Diplomática de Venezuela, información de primera mano." />
	<meta name="keywords" content="revista, diplomatica, noticias, venezuela" />
	<meta name="copyright" content="Revista Diplomática de Venezuela | <?php print date('Y') ?>" />

	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'PT+Sans+Narrow::latin', 'Open+Sans::latin', 'Open+Sans+Condensed:300:latin', 'Oswald::latin' ] }
		};

		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>

	<?php wp_head() ?>

</head>

<body <?php body_class() ?>>
	<div id="wrap">
		<div id="content">
			<div class="inner">
				<header>
					<div class="inner">
						<div class="logo"><img src="<?php echo get_template_directory_uri() ?>/static/images/logo.png" alt="Revista Diplomática de Venezuela"></div>
						<div class="navmenu">
							<nav><?php wp_nav_menu(array('theme_location' => 'main')); ?></nav>
						</div>
						<div class="search"><?php get_search_form() ?></div>
					</div>
				</header>