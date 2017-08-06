<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	
	<div>

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
					</div>

					<div class="product featured-product">
					<?php
						$featured_product_name = get_field('featured_product_name');
						$featured_product_images = get_field('featured_product_images');
						$featured_product_description = get_field('featured_product_description');
						$featured_product_price = get_field('featured_product_price');
						$featured_product_paypal_button_html = get_field('featured_product_paypal_button_html');
					?>

					<?php if ($featured_product_name) : ?>
						<h2><?php echo $featured_product_name; ?></h2>
					<?php endif; ?>

					<?php if ($featured_product_images) : ?>
						<div class="product-images">
							<?php foreach( $featured_product_images as $image): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($featured_product_description) : ?>
						<p class="description"><?php echo $featured_product_description; ?></p>
					<?php endif; ?>

					<?php if ($featured_product_price) : ?>
						<p class="price"><?php echo $featured_product_price; ?></p>
					<?php endif; ?>

					<?php if ($featured_product_paypal_button_html) : ?>
						<?php echo $featured_product_paypal_button_html; ?>
					<?php endif; ?>

					</div>
					
				</article>

			<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

		<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
			
			<article class="post error">
				<h1 class="404">Nothing posted yet</h1>
			</article>

		<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

	</div>
	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>