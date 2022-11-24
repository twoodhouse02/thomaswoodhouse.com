<?php get_header(); ?>

<div id="site-content">
    <hero>
        <h1 class="<?php the_field('text_style') ?>"><?php the_field('page_title') ?></h1>
        <?php if (get_field('hero_cta')) : ?>
            <a class="btn simple <?php the_field('text_style') ?>" href="<?php the_field('cta_link') ?>"><?php the_field('cta_text') ?></a>
        <?php endif; ?>
        <div class="overlay" style="opacity:<?php the_field('hero_overlay') ?>;"></div>
        <?php if (get_field('featured_video')) : ?>
            <video autoplay playsinline muted loop>
                <source src="<?php the_field('video'); ?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        <?php else : ?>
            <div class="hero-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></div>
        <?php endif; ?>
    </hero>

    <main id="primary" class="site-main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="margin-wrapper">
                    <?php the_content(); ?>
                </div>
        <?php endwhile;
        endif; ?>

        <?php if (get_field('enable_alert', 'options') && get_field('alert_location', 'options') == 'home') : ?>
            <?php include get_theme_file_path('/components/options-alert.php'); ?>
        <?php endif; ?>

        <div class="recent-heading">
            <h2>Recent Projects</h2>
            <a class="btn hide-768" href="/projects">View All Projects</a>
        </div>

        <!-- 3 Recent Posts -->

        <div class="grid-cards-compact fade-out-siblings">

            <?php
            // Define our WP Query Parameters
            $the_query = new WP_Query(array('posts_per_page' => 3, 'offset' => 0)); ?>

            <?php
            // Start our WP Query
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>

                <?php include get_theme_file_path('/components/card-preview.php'); ?>

            <?php
            // Repeat the process and reset once it hits the limit
            endwhile;
            wp_reset_postdata();
            ?>

        </div>

        <a class="btn full-width margin-t-3x show-768" href="/projects">View All Projects</a>


    </main>
</div>

<?php get_footer(); ?>