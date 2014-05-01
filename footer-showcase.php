	<footer id="footer" class="showcase" class="w">
		<div class="c f">
			<section class="widget-column">
				<?php if ( !dynamic_sidebar( 'footer_showcase_left' ) ) : ?>
					<section class="widget">
						<h5>Widget here</h5>
						<p>Place a widget in the "Showcase Footer - left column" slot.</p>
					</section>
				<?php endif; ?>
			</section>
			<section class="widget-column">
				<?php if ( !dynamic_sidebar( 'footer_showcase_center' ) ) : ?>
					<section class="widget">
						<h5>Widget here</h5>
						<p>Place a widget in the "Showcase Footer - center column" slot.</p>
					</section>
				<?php endif; ?>
			</section>
			<section class="widget-column">
				<?php if ( !dynamic_sidebar( 'footer_showcase_right' ) ) : ?>
					<section class="widget">
						<h5>Widget here</h5>
						<p>Place a widget in the "Showcase Footer - right column" slot.</p>
					</section>
				<?php endif; ?>
			</section>
		</div>
	</footer>
	<footer id="copyright">
		<p>All images and content copyright &copy; 2014 by FRC Team #1444 (Lightning Lancers). All images and logos copyright by their respective owners. All rights reserved.</p>
	</footer>
	<div id="foot">
		<?php wp_footer(); ?>
	</div>
</body>
</html>