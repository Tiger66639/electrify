	</main>
	<footer id="f">
		<div class="c">
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_left' ) ): ?>
					<h6>Widget here</h6>
					<p>Please drop a widget into the "Footer - Left" slot.</p>
				<?php endif; ?>
			</section>
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_center' ) ): ?>
					<h6>Widget here</h6>
					<p>Please drop a widget into the "Footer - Center" slot.</p>
				<?php endif; ?>
			</section>
			<section class="col">
				<?php if ( ! dynamic_sidebar( 'footer_right' ) ): ?>
					<h6>Widget here</h6>
					<p>Please drop a widget into the "Footer - Right" slot.</p>
				<?php endif; ?>
			</section>
		</div>
	</footer>
	<div id="inc">
		<?php wp_footer(); ?>
	</div>
</body>

</html>
