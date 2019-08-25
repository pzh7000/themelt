<?php get_header(); ?>
<!-- Page.php -->


	<main>
	<div class="about">
		<div class="about-overlay">

			<!-- section -->
			<section>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="container">

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_title( '<h2>', '</h2>' ); ?>

						<?php the_content(); ?>

						<?php comments_template( '', true ); // Remove if you don't want comments ?>

						<br class="clear">

						<?php edit_post_link(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

					</article>
					<!-- /article -->
				</div>
			<?php endif; ?>

			</section>
			<!-- /section -->

		</div>
	</div>
	<!-- Recent posts -->
	<?php
		$args2 = array(
			'numberposts' => 3,
			'post_type' => 'podcast',
			'offset' => 0
		);
		$related_posts = get_posts( $args2 );
	?>

	<?php if ( ! empty( $related_posts ) ) : ?>
		<div class="about-recent-posts">
			<div class="container">

				<h2>Recent Episodes:</h2>

				<div class="flex-container align-center">

					<?php foreach ( $related_posts as $related_post ) : ?>

						<?php
						$thumb_id = get_post_thumbnail_id( $related_post );
						$img_url = wp_get_attachment_url( $thumb_id, 'full' );
						?>
						<div class="flex-3-columns">

							<a href="<?php echo get_permalink($related_post->ID) ?>" class="related__link">

								<figure class="related__thumb">

										<?php if ( ! empty( $img_url ) ) : ?>
											<img class="related__old" src="<?php echo strip_tags( $img_url ) ?>">
										<?php endif; ?>

								</figure>

								<h4 class="related__posttitle align-left"><?php echo $related_post->post_title ?></h4>
							</a>
						</div>
					<?php endforeach; ?>

				</div>

			</div>
		</div>
	<?php endif; ?>

	<!-- End related post by tag -->


	<!-- View Support -->
	<div class="about-hero">
	<div class="support-section container">
	<a class="btn support-btn" href="#">Support</a>
	<div class="loader"><span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></div>
	</div>
	</div>

	<!-- End View Support -->



		</main>


<?php get_footer(); ?>
