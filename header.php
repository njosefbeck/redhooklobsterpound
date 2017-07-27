<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?>
	<?php if (!is_front_page()) : ?>| <?php wp_title(''); ?><?php endif; ?>
</title>

<!-- Icons (Favicon, etc.) -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-16x16.png">

<!-- Manifest files, for Android -->
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<script src="https://use.fontawesome.com/8730f8dbff.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

<header>
	<div class="stars">
		<img class="star star-left" src="<?php echo get_stylesheet_directory_uri(); ?>/images/StarIcon.jpg" alt="Star 1" />
		<img class="star star-center" src="<?php echo get_stylesheet_directory_uri(); ?>/images/StarIcon.jpg" alt="Star 1" />
		<img class="star star-right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/StarIcon.jpg" alt="Star 1" />
	</div>

	<h1>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
			<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/RedHookLogo.jpg" alt="Red Hook Lobster D.C. Logo" />
		</a>
	</h1>
	<p>Washington D.C.</p>
	<nav>
		<button class="hamburger">&#9776;</button>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="512" height="512"><path d="m22 0c-12.2 0-22 9.8-22 22s9.8 22 22 22 22-9.8 22-22-9.8-22-22-22zm3.2 22.4l7.5 7.5c0.2 0.2 0.3 0.5 0.3 0.7s-0.1 0.5-0.3 0.7l-1.4 1.4c-0.2 0.2-0.5 0.3-0.7 0.3-0.3 0-0.5-0.1-0.7-0.3l-7.5-7.5c-0.2-0.2-0.5-0.2-0.7 0l-7.5 7.5c-0.2 0.2-0.5 0.3-0.7 0.3-0.3 0-0.5-0.1-0.7-0.3l-1.4-1.4c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l7.5-7.5c0.2-0.2 0.2-0.5 0-0.7l-7.5-7.5c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.2-0.2 0.5-0.3 0.7-0.3s0.5 0.1 0.7 0.3l7.5 7.5c0.2 0.2 0.5 0.2 0.7 0l7.5-7.5c0.2-0.2 0.5-0.3 0.7-0.3 0.3 0 0.5 0.1 0.7 0.3l1.4 1.4c0.2 0.2 0.3 0.5 0.3 0.7s-0.1 0.5-0.3 0.7l-7.5 7.5c-0.2 0.1-0.2 0.5 0 0.7z" fill="#062e57"/></svg>

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav>

	<div class="border"></div>
</header>

<main>
