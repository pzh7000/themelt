<?php get_header(); ?>
<!-- Index.php -->
	<main role="main">
		<!-- section -->
		<section>

			<h1 class="align-center"><?php esc_html_e( 'Archive', 'html5blank' ); ?></h1>

			<!-- Post Archive -->
			<?php
				$archive_args = array(
					'post_type' => 'podcast',
					'offset' => 0
				);
				$archive_posts = get_posts( $archive_args );
			?>

			<?php if ( ! empty( $archive_posts ) ) : ?>
				<div class="container">

					<div class="flex-container align-center">

						<?php foreach ( $archive_posts as $archive_post ) : ?>

							<?php
							$thumb_id = get_post_thumbnail_id( $archive_post );
							$img_url = wp_get_attachment_url( $thumb_id, 'full' );
							?>
							<div class="flex-4-columns">

								<a href="<?php echo get_permalink($archive_post->ID) ?>" class="archive__link">

									<figure class="archive__thumb">

											<?php if ( ! empty( $img_url ) ) : ?>
												<img class="archive__old" src="<?php echo strip_tags( $img_url ) ?>">
											<?php endif; ?>

									</figure>

									<h4 class="archive__posttitle align-left"><?php echo $archive_post->post_title ?></h4>
								</a>
							</div>
						<?php endforeach; ?>

					</div>

				</div>
			<?php endif; ?>

	<!-- End archive post by tag -->

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
