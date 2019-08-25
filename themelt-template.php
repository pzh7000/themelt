<?php /* Template Name: The Melt Page Template */ get_header(); ?>
<!-- The Melt Template -->
	<div class="hero">
			<h1 class="title">The Melt <span class="title-span">Podcast</span></h1>
	</div>

	<main role="main">
	<!-- Latest Episode -->
		<div class="latest-episode container">
			<?php
				global $post;
				$latest_post_args = array(
					'numberposts' => 1,
					'post_type' => 'podcast',
					'offset' => 0
				);
				$latest_posts = get_posts( $latest_post_args );
			?>

			<?php if ( ! empty( $latest_posts ) ) : ?>

					<div class="flex-container align-center featured-img">

						<?php foreach ( $latest_posts as $latest_post ) : ?>
							<?php
							$thumb_id = get_post_thumbnail_id( $latest_post );
							$img_url = wp_get_attachment_url( $thumb_id, 'full' );
							// query_posts(array('post__not_in' => $ids));
							?>
							<figure class="related__thumb">
								<?php if ( ! empty( $img_url ) ) : ?>
									<img class="related__old" src="<?php echo strip_tags( $img_url ) ?>">
								<?php endif; ?>
							</figure>
						<?php endforeach; ?>

					</div>

					<div class="episode-player">

						<?php get_sidebar(); ?>

					</div>

			<?php endif; ?>
		</div>
		<!-- End latest post -->

		<!-- Recent posts -->
		<?php
			$args2 = array(
				'numberposts' => 3,
				'post_type' => 'podcast',
				'offset' => 1
			);
			$related_posts = get_posts( $args2 );
		?>

		<?php if ( ! empty( $related_posts ) ) : ?>
			<div class="recent-posts container">
				<div class="recent-posts-foreground">

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

<!-- View Archive -->
<div class="archive-section container">
	<a class="btn archive-btn" href="/episodes">Archive</a>
	<div class="loader2"><span class="loader2__dot">.</span><span class="loader2__dot">.</span><span class="loader2__dot">.</span></div>
</div>
<!-- End View Archive -->

<!-- View Support -->
<div class="hero2">
	<div class="support-section container">
		<a class="btn support-btn" href="#">Support</a>
		<div class="loader"><span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></div>
	</div>
</div>

<!-- End View Support -->


		<!-- /section -->
	</main>

<?php get_footer(); ?>
