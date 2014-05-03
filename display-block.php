<?php if ( get_field( 'code' ) ): ?>
	
	<?php the_field( 'code' ); ?>
	
<?php else: ?>
	
	<?php
		
	$background = 'background-color:' . get_field( 'background_color' ) . ';';
	if ( $background_image = get_field( 'background_image' ) )
	{
		$background .= 'background-image:url(' . $background_image . ');';
		$background .= 'background-size:cover;';
		$background .= 'background-position:center;';
	}
		
	?>
	
	<?php if ( get_field( 'h1' ) === 'blog' ): ?>
		
		<?php
		
		$posts_query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => 1
		) );
		
		$scheme			= get_field( 'scheme' );
		$h1_color		= get_field( 'h1_color' );
		$h2_color		= get_field( 'h2_color' );
		$p_color		= get_field( 'p_color' );
		
		?>
		
		<?php if ( $posts_query->have_posts() ): ?>
			
			<?php while ( $posts_query->have_posts() ): $posts_query->the_post(); ?>
				
				<section class="block block-blog half <?php echo $scheme; ?>"
					style="<?php echo $background; ?>">
			
					<hgroup class="block-headers">
						<h1 style="color:<?php echo $h1_color; ?>;">Blog</h1>
						<h2 style="color:<?php echo $h2_color; ?>;"><?php the_title(); ?></h2>
					</hgroup>
			
					<div class="block-content">
				
						<p class="post-meta"
							style="color:<?php echo $p_color; ?>;">
							<?php the_author_posts_link(); ?> |
							<?php the_time( get_option( 'date_format' ) ); ?>
						</p>
						
						<div class="p-c">
							<?php the_excerpt(); ?>
						</div>
				
						<p class="post-end">
							<a href="<?php the_permalink(); ?>">Continue reading</a>
						</p>
				
					</div>
			
				</section>		
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
	<?php else: ?>

		<section class="block <?php the_field( 'display' ); ?> <?php the_field( 'scheme' ); ?>"
			style="<?php echo $background; ?>">
			<hgroup class="block-headers">
			
				<?php if ( get_field( 'h1' ) ): ?>
					<h1 style="color:<?php the_field( 'h1_color' ); ?>;"><?php the_field( 'h1' ); ?></h1>
				<?php endif; ?>
		
				<?php if ( get_field( 'h2' ) ): ?>
					<h2 style="color:<?php the_field( 'h2_color' ); ?>;"><?php the_field( 'h2' ); ?></h2>
				<?php endif; ?>
		
				<?php if ( get_field( 'p_position' ) === 'headers' && get_field( 'p' ) ): ?>
					<p class="p-c" style="color:<?php the_field( 'p_color' ); ?>;"><?php the_field( 'p' ); ?></p>
				<?php endif; ?>
			
			</hgroup>
			<div class="block-content">
			
				<?php if ( get_field( 'image' ) ): ?>
				
					<p class="img-c">
						<img src="<?php the_field( 'image' ); ?>" alt="Slider image">
					</p>
				
				<?php elseif ( get_field( 'embed' ) ): ?>
				
					<p class="embed-c">
						<?php the_field( 'embed' ); ?>
					</p>
				
					<?php if ( get_field( 'embed_mobile' ) ): ?>
						<a class="btn btn-embed"
							href="<?php the_field( 'embed_mobile_link' ) ?>"
							style="background:<?php the_field( 'h1_color' ); ?>;color:<?php the_field( 'background_color' ); ?>;">
								<?php the_field( 'embed_mobile' ); ?>
						</a>
					<?php endif; ?>
			
				<?php elseif ( get_field( 'button' ) ): ?>
				
					<a class="btn"
						href="<?php the_field( 'button_link' ) ?>"
						style="background:<?php the_field( 'h1_color' ); ?>;color:<?php the_field( 'background_color' ); ?>;">
						<?php the_field( 'button' ); ?>
					</a>
			
				<?php elseif ( get_field( 'p_position' ) === 'content' && get_field( 'p' ) ): ?>
					<p class="p-c" style="color:<?php the_field( 'p_color' ); ?>;"><?php the_field( 'p' ); ?></p>
			
				<?php endif; ?>
			</div>
		</section>
	
	<?php endif; ?>

<?php endif; ?>
