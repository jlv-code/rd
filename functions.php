<?php 

	/**
		@author: José V.
		@file: functions.php
		@version: 1.0
	 */ 

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1000;

// Register Theme Features
function theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array('post','distribucion'));

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 150, 150, true );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	//add_theme_support( 'title-tag' );

	if (function_exists('add_image_size')) {
		add_image_size('240x180', 240, 180, true);
		add_image_size('970x310', 970, 310, true);
	}
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'theme_features' );

// Register Navigation Menus
function nav_menus() {

	$locations = array(
		'main' => 'Principal',
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'nav_menus' );

// Register Style
function styles() {

	wp_register_style( 'style', get_template_directory_uri().'/style.css', false, '1', 'all' );
	wp_enqueue_style( 'style' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'styles' );

// Register Script
function scripts() {

	//wp_register_script( 'fb_script', get_template_directory_uri().'/static/js/jquery.fancybox.js', array( 'jquery' ), '1', true );
	//wp_enqueue_script( 'fb_script' );
	
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'scripts' );

// Función que permite controlar la cantidad de palabras en el Excerpt
function excerpt_length($length) {
		return 20;
}
add_filter( 'excerpt_length', 'excerpt_length', 999 );

// Función que permite cambiar "[...]" del excerpt por cualquier otra combinación de caracteres
function new_excerpt_more($more) {
		return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Función que añade la funcionalidad de paginador al template
function the_post_paging($posts) {
	global $wp_query;

	if($posts) $wp_query = $posts;

	$big = 999999999; 
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
}

function the_breadcrumb() {
	echo '<a href="', get_option('home'), '">', 'Inicio', "</a>";
	if (is_category() || is_single()) {
		echo " » ";
		the_category(' - ');
		if (is_single()) {
			echo " » ";
			the_title();
		}
	} elseif (is_page()) {
		echo " » ", the_title();
	}
}

function sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Barra Lateral',
		'description' => 'Esta sección se muestra en todo el sitio web.',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		'empty_title'=> '',
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'sidebars' );