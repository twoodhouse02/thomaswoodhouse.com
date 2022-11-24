<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mason
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/css/splide-extension-video.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/js/splide-extension-video.min.js"></script>


	<?php wp_head(); ?>
	<script>
		//DARK MODE INIT 
		//determines if the user has a set theme
		function detectColorScheme() {
			var theme = "light"; //default to light
			//local storage is used to override OS theme settings
			if (localStorage.getItem("theme")) {
				if (localStorage.getItem("theme") == "dark") {
					var theme = "dark";
				}
			} else if (!window.matchMedia) {
				//matchMedia method not supported
				return false;
			} else if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
				//OS theme setting detected as dark
				var theme = "dark";
			}

			//dark theme preferred, set document with a `data-theme` attribute
			if (theme == "dark") {
				document.documentElement.setAttribute("data-theme", "dark");
			}
		}
		detectColorScheme();
	</script>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<!-- site-wide modals -->
		<?php include get_theme_file_path('/components/modals/modal-favorites.php'); ?>
		<?php include get_theme_file_path('/components/modals/modal-contact.php'); ?>
		<?php include get_theme_file_path('/components/modals/modal-share-fallback.php'); ?>
		<?php if (get_field('open_modal', 'options')) : ?>
			<?php include get_theme_file_path('/components/modals/modal-alert.php'); ?>
		<?php endif; ?>



		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'mason'); ?></a>

		<header id="desktop_nav" class="site-header">
			<div class="site-branding">
				<a href="/">
					<h3 class="website-name-full">Woodhouse</h3>
				</a>
				<img class="website-icon" src="<?php site_icon_url() ?>">

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<div class="dark-mode">
				<label id="theme-switch" class="toggle" for="checkbox_theme">
					<input type="checkbox" id="checkbox_theme">
					<span class="toggle-switch"></span>
				</label>
				<p class="sm">Dark Mode</p>
			</div>

		</header><!-- #masthead -->

		<div id="launchBottomSheet"></div>

		<?php if (get_field('enable_alert', 'options') && get_field('alert_location', 'options') == 'global') : ?>
			<div class="site-area">
				<?php include get_theme_file_path('/components/options-alert.php'); ?>
			</div>
		<?php endif; ?>