<?php
/**
 * This template styles the press page
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); ?>
	<?php if ( have_posts() ) : 
	// Do we have any posts in the databse that match our query?
	// In the case of the home page, this will call for the most recent posts 
	?>

		<?php while ( have_posts() ) : the_post(); 
		// If we have some posts to show, start a loop that will display each one the same way
		?>

			<article class="post-excerpt">
				<h2 class="title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>

				<div class="post-meta">
					<?php the_time('F j, Y'); // Display the time published ?> | 
					<?php if( comments_open() ) : // If we have comments open on this post, display a link and count of them ?>
						<span class="comments-link">
							<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); 
							// Display the comment count with the applicable pluralization
							?>
						</span>
					<?php endif; ?>
				
				</div>
				
				<div class="the-content">
					<?php the_excerpt(); ?>
				</div>
				
			</article>

		<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
		
		<div>
			<div class="past-page">
				<?php previous_posts_link( 'newer press' ); ?>
			</div>
			<div class="next-page">
				<?php next_posts_link( 'older press' ); ?>
			</div>
		</div>


	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		
		<article class="post error">
			<h1 class="404">Nothing has been posted like that yet</h1>
		</article>

	<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
<?php get_footer(); ?>