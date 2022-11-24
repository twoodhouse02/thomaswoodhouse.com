<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mason
 */

get_header();

?>
<div id="site-content">
	<main id="primary" class="site-main">

		<h1>What are you interested in?</h1>

		<div class="card accent-1 margin-b-5x">
			<?php echo do_shortcode('[fe_widget]'); ?>
		</div>

		<?php if (have_posts()) : ?>

			<div id="all-projects" class="grid-cards-std fade-out-siblings">

				<?php while (have_posts()) : the_post(); ?>

					<?php include get_theme_file_path('/components/card-preview.php'); ?>

				<?php endwhile; ?>

			</div> <!-- End grid-cards -->

	</main><!-- #main -->

	<!-- then the pagination links -->

	<?php if (get_previous_posts_link() || get_next_posts_link()) : ?>
		<section id="pagination">
			<div class="nav-links">
				<?php previous_posts_link('<i class="isax isax-arrow-left-3"></i> More Recent Projects'); ?>
				<?php next_posts_link('Older Projects <i class="isax isax-arrow-right-3"></i>', $wp_query->max_num_pages); ?>
			</div>
		</section>
	<?php endif; ?>

<?php else : ?>

	<?php get_template_part('template-parts/content', 'none'); ?>

<?php endif; ?>

</div>

<?php
get_sidebar();
get_footer();
