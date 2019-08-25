<?php get_header(); ?>

<!-- Single-podcast.php -->
	<main role="main">
	<!-- section -->
	<section class="single-post">
		<div class="container align-center">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<!-- post title -->
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
				<!-- /post title -->

				<!-- post details -->
				<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
				<!-- /post details -->

				<?php the_content(); // Dynamic Content ?>

				<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

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
	$args = array(
	  'numberposts' => 3,
		'post_type' => 'podcast'
	);
	// $related_posts = ph_get_related_by_tag( $post->ID, 3 );
	$related_posts = get_posts( $args );
	?>


			<?php if ( ! empty( $related_posts ) ) : ?>
				<div class="related container">

					<h3 class="headline">Related Episodes:</h3>

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

									<h4 class="related__posttitle"><?php echo $related_post->post_title ?></h4>
								</a>
							</div>

						<?php endforeach; ?>
					</div>

				</div>
			<?php endif; ?>


<!-- End related post by tag -->


<ul>
    <?php

		$post_id = get_the_ID();
		$args = array(
			'posts_per_page' => 5,
			'post__not_in'   => array( $post_id ),
			'post_type' => 'any'
		);
    $myposts = get_posts( $args );

		$args2 = array(
			'numberposts' => 3,
			'post_type' => 'podcast',
			'post__not_in'   => array( $post_id )
		);
		// $related_posts = ph_get_related_by_tag( $post->ID, 3 );
		$related_posts = get_posts( $args2 );


    if ( $myposts or $related_posts ) {
        foreach ( $myposts as $post ) :
					setup_postdata( $post );
            ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php
        endforeach;
				wp_reset_postdata();
				foreach ( $related_posts as $related ) :
					setup_postdata( $related );
					?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php
				endforeach;
        wp_reset_postdata();
    }
    ?>
</ul>

	<!-- /section -->
	</main>


<?php get_footer(); ?>
