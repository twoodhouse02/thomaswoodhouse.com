<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package mason
 */

get_header();
?>
<div id="site-content">
	<main id="primary" class="site-main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					Results for:
					<?php print(get_search_query()) ?>
				</h1>
			</header><!-- .page-header -->

			<div id="all-projects" class="grid-cards-std">

				<?php while (have_posts()) : the_post(); ?>

					<?php include get_theme_file_path('/components/card-preview.php'); ?>

				<?php endwhile; ?>

			</div> <!-- End grid-cards -->

		<?php else : ?>

			<div id="dashboard-search-container">
				<div class="card accent-1 search-box">
					<lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_cgfdhxgx.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
					<p>Sorry, there are no results for that search.</p>
					<a class="btn" href="/dashboard-search/">Return to search</a>
				</div>
			</div>

		<?php endif; ?>

	</main><!-- #main -->
</div>
<?php
get_sidebar();
get_footer();
