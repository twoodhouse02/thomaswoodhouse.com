<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mason
 */

get_header();
?>

<main id="primary" class="site-main">

	<div id="dashboard-search-container">
		<div class="card accent-1 search-box">
			<lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_cgfdhxgx.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
			<p>Sorry, the page you are looking for either can't be found or doesn't exist.</p>
			<a class="btn" href="/">Bring me home</a>
		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
