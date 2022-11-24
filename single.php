<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mason
 */

get_header();
?>
<!--Password Protection Begin-->
<?php if (!post_password_required($post)) : ?>


	<!-- Begin Page-specific Modals: -->

	<div id="modal-contact" class="modal">
		<div class="modal-header">
			<h4>I'm working on it...</h4> <br>
		</div>
		<div class="modal-content">
			<p>Contact functionality coming soon...</p>
		</div>
	</div>

	<!-- End Page-specific Modals -->

	<div id="site-content">


		<?php if (get_field('featured_video')) : ?>
			<hero class="standard post video">
				<video autoplay playsinline muted loop>
					<source src="<?php the_field('video'); ?>" type="video/mp4">
					Your browser does not support HTML5 video.
				</video>
				<div class="post-details">
					<h1><?php wp_title(''); ?></h1>

					<div class="bottom">
						<p>
							<?php the_time('F d, Y'); ?>
						</p>
						<div class="actions">
							<span data-aos="zoom-in" data-aos-duration="300" data-aos-delay="500"><?php the_favorites_button($post_id, $site_id); ?></span>
							<a data-aos="zoom-in" data-aos-duration="300" data-aos-delay="600" class="btn icon light sharePage"><i class="isax isax-export-2"></i></a>
						</div>
					</div>
				</div>
			</hero>
		<?php else : ?>
			<hero class="standard post" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
				<div class="post-details">
					<h1><?php wp_title(''); ?></h1>

					<div class="bottom">
						<p>
							<?php the_time('F d, Y'); ?>
						</p>
						<div class="actions">
							<span data-aos="zoom-in" data-aos-duration="300" data-aos-delay="500"><?php the_favorites_button($post_id, $site_id); ?></span>
							<a data-aos="zoom-in" data-aos-duration="300" data-aos-delay="600" class="btn icon light sharePage"><i class="isax isax-export-2"></i></a>
						</div>
					</div>
				</div>
			</hero>
		<?php endif; ?>




		<main id="primary" class="site-main col-2-1 post-main">
			<div class="col-1">
				<div class="tag-list">
					<?php foreach ((get_the_category()) as $category) : ?>
						<p class="tag sm" style="color: <?php echo get_field('tag_color', $category); ?>; background-color:<?php echo get_field('tag_color', $category); ?>20">
							<?php echo $category->name; ?>
						</p>
					<?php endforeach; ?>
				</div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
				<?php endwhile; endif; ?>


				<?php
				$images = get_field('gallery');
				if ($images) : ?>
					<div class="gallery grid">
						<?php foreach ($images as $image) : ?>
							<a class="gallery_image grid-item" rel="lightbox" href="<?php echo esc_url($image['url']); ?>" style="background-image: url(<?php echo esc_url($image['sizes']['medium']); ?>);">
								<img src="<?php echo esc_url($image['sizes']['medium']); ?>" />
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
			<div class="col-2">
				<div class="similar-projects col-filled">
					<h4>Similar Projects</h4>
					<?php
					// Define our WP Query Parameters
					$the_query = new WP_Query(array(
						'category__in'   => wp_get_post_categories($post->ID),
						'posts_per_page' => 3,
						'post__not_in'   => array($post->ID)
					)); ?>

					<?php
					// Start our WP Query
					while ($the_query->have_posts()) : $the_query->the_post();
					?>
						<a href="<?php the_permalink() ?>">
							<?php
							$images = get_field('gallery');
							if ($images) : ?>
								<ul class="preview-images">
									<?php for ($i = 0; $i < count($images) && $i < 3; $i++) {
										$image = $images[$i];
									?>
										<li style="background-image: url(<?php echo esc_url($image['sizes']['thumbnail']); ?>);">
										</li>
									<?php
									}
									?>
								</ul>
							<?php endif; ?>
							<span>
								<p class="date med"><?php the_time(get_option('date_format')); ?></p>
								<h5><?php the_title(); ?></h5>
							</span>
							<i class="isax isax-maximize-4"></i>
						</a>


					<?php
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="col-filled side-actions">
					<?php the_favorites_button($post_id, $site_id); ?>
					<a class="btn icon tooltip sharePage" data-title="Share Project"><i class="isax isax-export-2"></i></a>
					<a class="btn icon tooltip" data-title="Let's get Creative" href="#modal-contact" rel="modal:open"><i class="isax isax-messages-2"></i></a>
				</div>

			</div>

		</main><!-- #main -->

		<!--Password Protected Form-->
	<?php else : ?>
		<?php echo get_the_password_form(); ?>
		<!--Password Protected End-->
	<?php endif; ?>

	</div>

	<?php include get_theme_file_path('/components/postnav.php'); ?>


	<?php
	get_sidebar();
	get_footer();
