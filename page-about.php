<?php
/**
 * 	Template Name: About Page
 *
 *	This is the template for the about page
 *
*/

get_header(); // This fxn gets the header.php file and renders it ?>
	<?php if ( have_posts() ) : 
	// Do we have any posts/pages in the database that match our query?
	?>

		<?php while ( have_posts() ) : the_post(); 
		// If we have a page to show, start a loop that will display it
		?>

			<article class="post">

				<?php
					$background_color = get_field('hero_background_color');
					$image_url = get_field('hero_image');
				?>

				<?php if (!$background_color && !$image_url) : ?>
					<h1 class="title"><?php the_title(); ?></h1>

				<?php elseif (!$image_url) : ?>
					<div class="hero" style="background-color: <?php echo $background_color;  ?>;">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				<?php else : ?>
					<div class="hero" style="background-image: url('<?php echo $image_url; ?>'); background-color: <?php echo $background_color;  ?>;">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				<?php endif; ?>
				
				<div class="the-content">
					<?php the_content(); ?>
					
					<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
				</div>

				<?php
					$args = [ 'numberposts' => 5];
					$recent_posts = wp_get_recent_posts($args);
				?>

				<?php if ($recent_posts) : ?>
					<div class="recent-posts">
						<h2>Recent Press</h2>
						<ul>
							<?php foreach($recent_posts as $post) : ?>
								<li>
									<a href="<?php echo get_permalink($post['ID']); ?>"> <?php echo $post['post_title']; ?></a>
								</li>
							<?php endforeach; ?>
							<li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">See more press...</a></li>
						</ul>
					</div>
				<?php endif; ?>
				
			</article>

		<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		
		<article class="post error">
			<h1 class="404">Nothing posted yet</h1>
		</article>

	<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>