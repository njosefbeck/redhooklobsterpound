<?php 
/**
 * 	Template Name: Home Page
 *
 *	This is the template for the home page
 *
*/
get_header(); ?>
	<div>
		<?php if ( have_posts() ) : 
		// Do we have any posts/pages in the databse that match our query?
		?>

			<?php while ( have_posts() ) : the_post(); 
			// If we have a page to show, start a loop that will display it
			?>

				<article class="post">

					<?php if (!is_front_page()) : ?>
						<h1 class='title'>
							<?php the_title(); ?>
						</h1>
					<?php endif; ?>
									
					<div class="the-content">
						<?php the_content(); 
						// This call the main content of the page, the stuff in the main text box while composing.
						// This will wrap everything in paragraph tags
						?>
					</div>

					<?php if (have_rows('schedule')) : ?>
						<div class="tabs-header">
							<h2>Where's the truck?</h2>
						</div>

						<div class="tabs">
							<?php // Separate while statements for the tab navigation and then body ?>
							
							<?php $nav_index = 0; ?>
							<?php while (have_rows('schedule')) : the_row(); ?>
								<input id="tab<?php echo $nav_index;?>" type="radio" name="tabs" <?php if($nav_index === 0) : ?>checked<?php endif; ?>>
								<label for="tab<?php echo $nav_index;?>"><?php echo the_sub_field('location_name'); ?></label>
								<?php $nav_index++; ?>
							<?php endwhile; ?>

							<?php $content_index = 0; ?>
							<?php while (have_rows('schedule')) : the_row(); ?>
								<section id="content<?php echo $content_index; ?>" class="tab-content">
									<?php echo the_sub_field('calendar'); ?>
									<?php $content_index++; ?>
								</section>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<div class="tweets-header">
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<h2>Tweets</h2>
					</div>

					<?php
						$tweets = getTweets(4, 'lobstertruckDC');
						if (is_array($tweets)) {
							// to use with intents
							echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';
							echo '<div class="tweets">';
							foreach($tweets as $tweet) {
								if ($tweet['text']) {
									//echo '<pre>' . print_r($tweet, true) . '</pre>';
									echo '<div class="tweet">';
									$the_tweet = $tweet['text'];

									/*
							        Twitter Developer Display Requirements
							        https://dev.twitter.com/terms/display-requirements

							        2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
							          i. User_mentions must link to the mentioned user's profile.
							         ii. Hashtags must link to a twitter.com search with the hashtag as the query.
							        iii. Links in Tweet text must be displayed using the display_url
							             field in the URL entities API response, and link to the original t.co url field.
							        */

							        // i. User mentions must link to the mentioned user's profile.
							        if (is_array($tweet['entitites']['user_mentions'])) {
							        	foreach ($tweet['entities']['user_mentions'] as $key => $user_mention) {
							        		$the_tweet = preg_replace(
							        			'/@'.$user_mention['screen_name'].'/i',
                    							'<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                    							$the_tweet
						        			);
							        	}
							        }

							        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
							        if(is_array($tweet['entities']['hashtags'])){
							            foreach($tweet['entities']['hashtags'] as $key => $hashtag){
							                $the_tweet = preg_replace(
							                    '/#'.$hashtag['text'].'/i',
							                    '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
							                    $the_tweet
						                    );
							            }
							        }

							        // iii. Links in Tweet text must be displayed using the display_url
							        //      field in the URL entities API response, and link to the original t.co url field.
							        if(is_array($tweet['entities']['urls'])){
							            foreach($tweet['entities']['urls'] as $key => $link){
							                $the_tweet = preg_replace(
							                    '`'.$link['url'].'`',
							                    '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
							                    $the_tweet
						                    );
							            }
							        }

							        echo '
							        <div class="tweet-header">
							        	<a href="https://twitter.com/lobstertruckDC"><img src="' . get_stylesheet_directory_uri() . '/images/twitter_avatar.jpg" alt="Red Hook Lobster D.C. Twitter Avatar" /></a>
							        	<p>Red Hook Lobster Pound D.C. <br/> <a href="https://twitter.com/lobstertruckDC" target="_blank" rel="noopener">@lobstertruckDC</a></p>
							        </div>';

							        echo '<div class="tweet-content">' . $the_tweet . '</div>';

							        // 3. Tweet Actions
							        //    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
							        //    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
							        // get the sprite or images from twitter's developers resource and update your stylesheet
							        echo '
							        <div class="twitter-intents">
							            <p><a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'">Reply</a></p>
							            <p><a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'">Retweet</a></p>
							            <p><a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'">Favorite</a></p>
							        </div>';

							        // 4. Tweet Timestamp
							        //    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
							        // 5. Tweet Permalink
							        //    The Tweet timestamp must always be linked to the Tweet permalink.
							        echo '
							        <p class="tweet-timestamp">
							            <a href="https://twitter.com/lobstertruckDC/status/'.$tweet['id_str'].'" target="_blank">
							                '.date('h:i A M d',strtotime($tweet['created_at']. '- 8 hours')).'
							            </a>
							        </p>';// -8 GMT for Pacific Standard Time

							        // Add separator between each tweet
							        echo '
						        	<div class="tweet-separator">
						        		<img src="' . get_stylesheet_directory_uri() . '/images/clawicon.jpg" alt="Claw Icon" />
						        	</div>
							        ';

							        // Close tweet container element
							        echo '</div>';
								} else {
									echo '
									<div class="no-tweets">
									<a href="https://twitter.com/lobstertruckDC" target="_blank" rel="noopener">Click here to read our tweets</a>
									</div>';
								}
							}
							echo '</div>';
						}
					?>

					<?php
						$banner_text = get_field('banner_text');
						$banner_link = get_field('banner_link');
						$banner_text_color = get_field('banner_text_color');
						$banner_bg_color = get_field('banner_background_color');
						$banner_exists = $banner_text | $banner_link | $banner_text_color | $banner_bg_color;
					?>

					<?php if ($banner_exists) : ?>
						<?php if (!$banner_text_color && !$banner_bg_color) : ?>
							<a class="banner-link" href="<?php echo $banner_link; ?>">
								<div class="banner">
									<?php echo $banner_text; ?>
								</div>
							</a>
						<?php elseif (!$banner_bg_color) : ?>
							<a class="banner-link" href="<?php echo $banner_link; ?>">
								<div class="banner" style="color: <?php echo $banner_text_color; ?>">
									<?php echo $banner_text; ?>
								</div>
							</a>
						<?php else : ?>
							<a class="banner-link" href="<?php echo $banner_link; ?>">
								<div class="banner" style="color: <?php echo $banner_text_color; ?>; background-color: <?php echo $banner_bg_color; ?>;">
									<?php echo $banner_text; ?>
								</div>
							</a>
						<?php endif; ?>
					<?php endif; ?>
					
				</article>

			<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

		<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
			
			<article class="post error">
				<h1 class="404">Nothing has been posted like that yet</h1>
			</article>

		<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
	</div>
<?php get_footer(); ?>