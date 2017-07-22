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
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

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
