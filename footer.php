<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mason
 */

?>

<footer id="colophon" class="site-footer">

    <h2>Looking to get started?</h2>

    <?php if (have_rows('footer_icons', 'options')) : ?>
        <div class="connect-icons">
            <?php while (have_rows('footer_icons', 'options')) : the_row();
                $icon = get_sub_field('icon_class', 'options');
                $text = get_sub_field('button_text', 'options');
                $link = get_sub_field('link', 'options');
                $attributes = get_sub_field('additional_html_attributes', 'options');
                $class = get_sub_field('class', 'options');
            ?>
                <a class="btn connect <?php echo $class ?>" <?php echo $attributes ?> <?php if ($link) : ?>href="<?php echo $link ?>" target="_blank" <?php endif; ?>>
                    <i class="isax isax-<?php echo $icon ?>"></i>
                    <h5><?php echo $text ?></h5>
                </a>
            <?php endwhile; ?>
            <!-- while: footer_icons -->
            <?php if (get_field('resume', 'options')) : ?>
                <a class="btn connect" href="<?php the_field('resume', 'options'); ?>" target="_blank">
                    <i class="isax isax-document-download"></i>
                    <h5>Resume</h5>
                </a>
            <?php endif; ?>
            </ul> <!-- menu-items -->
        <?php endif; ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>