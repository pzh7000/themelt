<?php /* Template Name: Home Page Template */ get_header(); ?>
<!-- Homepage Template -->

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<div class="hero" data-stellar-background-ratio="0.5" style="background: url(<?php the_field('background_image'); ?>) no-repeat center; background-size:cover;">
				<div class="message-and-button">
					<h2 class="message"><?php the_field('message'); ?></h2>
					<?php

						$button = get_field('button');

						if( $button ):
							$button_url = $button['url'];
							$button_title = $button['title'];
							$button_target = $button['target'] ? $button['target'] : '_self';
							?>
							<a class="button" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
						<?php endif; ?>
					</div>

			</div>

			<div class="homepage__parallax-title">
				<div class="instagram-link">
					<!-- <h1><?php the_field('title'); ?></h1> -->
					<!-- <a href="https://www.instagram.com/earthsigndesign/" title="earth sign design instagram"><img id="home-instagram" src="http://earthsigndesign.test/wp-content/uploads/2018/12/instagram.png">
					<p>@earthsigndesign</p></a> -->
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</article>
					<!-- /article -->
				</div>
			</div>



		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
