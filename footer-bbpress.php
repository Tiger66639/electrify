	</main>
	<footer id="f-bbpress">
		<div class="c">
			
			<?php foreach ( array( 'left', 'center', 'right', ) as $col ): ?>
				
				<section class="col">
					<?php if ( ! dynamic_sidebar( 'bbpress_footer_' . $col ) ): ?>
						<div class="widget">
							<h5>Widget here</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					<?php endif; ?>
				</section>
				
			<?php endforeach; ?>
			
		</div>
	</footer>
	
	<?php if ( ! is_user_logged_in() ): ?>
		<a id="login-secret" href="<?php echo wp_login_url(); ?>" title="Members only">
			<span data-icon="user"></span>
		</a>
	<?php endif; ?>
	
	<footer id="copyright">
		<p>All images and content copyright &copy; <?php echo date( 'Y' ); ?> by FRC Team #1444 (Lightning Lancers). All images and logos copyright by their respective owners. All rights reserved.</p>
	</footer>
	
	<div id="inc">
		<?php wp_footer(); ?>
	</div>
	
</body>

</html>
