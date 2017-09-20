<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</main>

<footer>

	<div class="social-media-icons">
		<div class="icon">
			<a href="https://www.facebook.com/RedHookLobsterPoundDC/" target="_blank" rel="noopener">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
		</div>
		<div class="icon">
			<a href="https://twitter.com/LobstertruckDC" target="_blank" rel="noopener">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
		</div>
		<div class="icon">
			<a href="https://www.instagram.com/lobstertruckdc/" target="_blank" rel="noopener">
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<div class="border border-footer"></div>
	<div class="footer-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</div>
	&copy; <?php echo date("Y"); ?> Red Hook Lobster Pound D.C.<br/>
	Made with love by <a href="https://twobeasts.co" target="_blank">Two Beasts</a>
</footer>

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
