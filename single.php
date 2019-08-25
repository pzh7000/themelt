<?php get_header(); ?>

<!-- Single.php -->
	<main role="main">
	<!-- section -->
	<section class="single-post">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post details -->
			<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>

	<!-- Related posts by tag -->
	<?php
	global $post;
	$related_posts = ph_get_related_by_tag( $post->ID, 3 );
	?>

	<?php if ( ! empty( $related_posts ) ) : ?>
		<div class="related">

			<h5 class="headline">You may also like:</h5>

			<div class="col-3">

				<?php foreach ( $related_posts as $related_post ) : ?>

					<?php
					$thumb_id = get_post_thumbnail_id( $related_post );
					$img_url = wp_get_attachment_url( $thumb_id, 'full' );
					?>

					<a href="<?php echo get_permalink($related_post->ID) ?>" class="related__link">

						<figure class="related__thumb">

								<?php if ( ! empty( $img_url ) ) : ?>
									<img class="related__old" src="<?php echo strip_tags( $img_url ) ?>">
								<?php endif; ?>

						</figure>

						<h6 class="b-related__posttitle"><?php echo $related_post->post_title ?></h6>
					</a>

				<?php endforeach; ?>
			</div>

		</div>
	<?php endif; ?>


<!-- End related post by tag -->

	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
