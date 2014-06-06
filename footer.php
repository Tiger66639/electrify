	</main>
	<footer id="f">
		<div class="c">
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_left' ) ): ?>
					<div class="widget">
						<h5>Widget here</h5>
						<p>Please drop a widget into the &ldquo;Footer - Left&rdquo; slot.</p>
					</div>
				<?php endif; ?>
			</section>
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_center' ) ): ?>
					<div class="widget">
						<h5>Widget here</h5>
						<p>Please drop a widget into the &ldquo;Footer - Center&rdquo; slot.</p>
					</div>
				<?php endif; ?>
			</section>
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_right' ) ): ?>
					<div class="widget">
						<h5>Widget here</h5>
						<p>Please drop a widget into the &ldquo;Footer - Right&rdquo; slot.</p>
					</div>
				<?php endif; ?>
			</section>
		</div>
	</footer>
	<div id="inc">
		<?php wp_footer(); ?>
	</div>
</body>

</html>
