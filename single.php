<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>

					<article class="post">
					
						<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
						<div class="post-meta">
							<?php the_time('F j, Y'); // Display the time it was published ?>
						</div>
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div>
						
					</article>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div>
	</div>
<?php get_footer(); ?>
