<?php if ( get_field( 'code' ) ) : ?>
	
	<?php the_field( 'code' ); ?>
	
<?php elseif ( get_field( 'h1' ) == 'blog' ) : ?>
	
	<?php
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 1
	);
	
	$front_page_query = new WP_Query( $args );
	
	$background = 'background-color:' . get_field( 'background_color' ) . ';background-image:url(' . get_field( 'background_image' ) . ');background-position:center;background-size:cover;';
	$display = get_field( 'display' );
	$scheme = get_field( 'scheme' );
	$h1_color = get_field( 'h1_color' );
	$h2_color = get_field( 'h2_color' );
	$p_color = get_field( 'p_color' );
	
	?>
	
	<?php if ( $front_page_query->have_posts() ) : while ( $front_page_query->have_posts() ) : $front_page_query->the_post(); ?>
		
		<section class="w block block-blog <?php echo $display; ?>" style="<?php echo $background; ?>" data-slide-scheme="<?php echo $scheme; ?>">
			<hgroup class="headers cf">
				<h1 style="color:<?php echo $h1_color; ?>;">Lightning Lancers Blog</h1>
				<h2 style="color:<?php echo $h2_color; ?>;"><?php the_title(); ?></h2>
			</hgroup>
			<div class="content cf">
				<p class="meta" style="color:<?php echo $h2_color; ?>;"><span class="icon author"><?php the_author_posts_link(); ?></span> | <span class="icon date"><?php the_date(); ?></span> | <span class="icon comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comment', '% comments' ) ?></a></span></p>
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>" class="icon article">Continue reading</a></p>
			</div>
		</section>
		
	<?php endwhile; endif; ?>
	
	
<?php else : ?>
	
	<?php
	
	$background = 'background-color:' . get_field( 'background_color' ) . ';'; // background-color
	$background_image = get_field( 'background_image' );
	                         
	if ( $background_image ) {
		
		$background .= 'background-image:url(' . $background_image . ');'; // background-image
		$background .= 'background-position:center;'; // background-position
		$background .= 'background-size:cover;'; // background-size
		$background .= 'box-shadow:inset 0 0 100px #000;'; // box-shadow
		
	} ?>

	<section
	class="w block <?php the_field( 'display' ); ?> <?php if ( $background_image ) { ?>photo<?php } ?>  <?php if ( get_field( 'fade_in' ) ) { ?>fade<?php } ?>"
	style="<?php echo $background; ?>"
	data-slide-scheme="<?php the_field( 'scheme' ); ?>">
	
		<hgroup class="headers cf">
			<h1 style="color:<?php the_field( 'h1_color' ); ?>;"><?php the_field( 'h1' ); ?></h1>
			<?php if ( get_field( 'h2' ) ) : ?>
				<h2 style="color:<?php the_field( 'h2_color' ); ?>;"><?php the_field( 'h2' ) ?></h2>
			
			<?php endif; ?>
		
			<?php if ( get_field( 'p' ) && get_field( 'p_position' ) != 'content' ) : ?>
				<p class="p-c"  style="color:<?php the_field( 'p_color' ); ?>;">
					<?php the_field( 'p' ); ?>
				</p>
			
			<?php endif; ?>
		</hgroup>
	
		<div class="content cf">
			<?php if ( get_field( 'p' ) && get_field( 'p_position' ) == 'content' ) : ?>
				<p class="p-c"  style="color:<?php the_field( 'p_color' ); ?>;">
					<?php the_field( 'p' ); ?>
				</p>
			
			<?php elseif ( get_field( 'image' ) ) : ?>
				<p class="img-c">
					<img src="<?php the_field( 'image' ); ?>" alt="Block image">
				</p>
			
			<?php elseif ( get_field( 'embed' ) ) : ?>
				<p class="embed-c">
					<?php the_field( 'embed' ); ?>
				</p>
			
				<?php if ( get_field( 'embed_mobile' ) && get_field( 'embed_mobile_link' ) ) : ?>
					<a href="<?php the_field( 'embed_mobile_link' ); ?>" class="btn btn-embed"
						style="background:<?php the_field( 'h1_color' ); ?>;color:<?php the_field( 'background_color' ); ?>;">
						<?php the_field( 'embed_mobile' ); ?>
					</a>
				<?php endif; ?>
			
			<?php endif; ?>
		
			<?php if ( get_field( 'button' ) ) : ?>
				<a href="<?php the_field( 'button_link' ); ?>"
				style="background:<?php the_field( 'h1_color' ); ?>;color:<?php the_field( 'background_color' ); ?>;"
				class="btn">
					<?php the_field( 'button' ); ?>
				</a>
			<?php endif; ?>
		</div>
		
	</section>

<?php endif; ?>