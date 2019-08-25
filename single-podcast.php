<?php get_header(); ?>

<!-- Single-podcast.php -->
	<main role="main">
	<!-- section -->
	<section class="single-post">
		<div class="container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="flex-container align-center featured-img">

				<?php
				$thumb_id = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb_id, 'full' );
				// query_posts(array('post__not_in' => $ids));
				?>
				<figure class="related__thumb">
					<?php if ( ! empty( $img_url ) ) : ?>
						<img class="related__old" src="<?php echo strip_tags( $img_url ) ?>">
					<?php endif; ?>
				</figure>

			</div>

				<!-- post title -->
				<h3>
					<?php the_title(); ?>
				</h3>
				<!-- /post title -->

						<?php endwhile; ?>

						<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post details -->
				<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
				<!-- /post details -->

				<div class="align-left">
					<?php the_content(); // Dynamic Content ?>
				</div>

				<div class="container align-right">
					<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
				</div>

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

	</div>

	</section>

<!-- Related posts by tag -->
<?php
global $post;
$post_id = get_the_ID();


$args2 = array(
	'numberposts' => 3,
	'post_type' => 'podcast',
	'post__not_in' => array( $post_id )
);
// $related_posts = ph_get_related_by_tag( $post->ID, 3 );
$related_posts = get_posts( $args2 );
$count = wp_count_posts('podcast');
// var_dump($count->publish);

if ( $count->publish == 2 ) {
	$args = array(
		'posts_per_page' => 2,
		'post__not_in' => array( $post_id ),
		'post_type' => 'post'
	);
} elseif ( $count->publish == 3 ) {
	$args = array(
		'posts_per_page' => 1,
		'post__not_in' => array( $post_id ),
		'post_type' => 'post'
	);
}

$myposts = get_posts( $args );

?>

		<?php if ( ! empty( $related_posts ) ) : ?>
			<div class="recent-posts container">

				<div class="recent-posts-foreground">

					<h2>Related Episodes:</h2>

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
						<?php foreach ( $myposts as $post ) : ?>
								<div class="flex-3-columns">
							<?php
							$thumb_id = get_post_thumbnail_id( $post );
							$img_url = wp_get_attachment_url( $thumb_id, 'full' );
							?>

								<a href="<?php echo get_permalink($post->ID) ?>" class="related__link">

									<figure class="related__thumb">

											<?php if ( ! empty( $img_url ) ) : ?>
												<img class="related__old" src="<?php echo strip_tags( $img_url ) ?>">
											<?php endif; ?>

									</figure>

									<h4 class="related__posttitle"><?php echo $post->post_title ?></h4>
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
	<!-- <div class="loader2"><span class="loader2__dot">.</span><span class="loader2__dot">.</span><span class="loader2__dot">.</span></div> -->
	<div class="loader"><span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></div>
</div>
<!-- End View Archive -->

<!-- View Support -->
<div class="hero2">
	<div class="support-section container">
		<a class="btn support-btn" href="#">Support</a>
		<div class="loader2"><span class="loader2__dot">.</span><span class="loader2__dot">.</span><span class="loader2__dot">.</span></div>
		<!-- <div class="loader"><span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></div> -->
	</div>
</div>

<!-- End View Support -->


	<!-- /section -->
	</main>


<?php get_footer(); ?>
