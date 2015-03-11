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

	<?php wp_head() ?>

</head>

<body <?php body_class() ?>>
	<div id="wrap">
		<div id="content">
			<div class="inner">
				
					
