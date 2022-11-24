<div class="card preview-std">
    <?php
    $images = get_field('gallery');
    if ($images) : ?>

        <section class="splide preview-slider" aria-label="Slideshow of Images">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    <i class="isax isax-arrow-left-3"></i>
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <i class="isax isax-arrow-right-3"></i>
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    <?php if (get_field('featured_video')) : ?>
                        <li class="splide__slide" data-splide-html-video="<?php the_field('video'); ?>">
                            
                        </li>
                    <?php else : ?>
                        <li class="splide__slide">
                            <img src="<?php the_post_thumbnail_url(); ?>">
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 0; $i < count($images) && $i < 3; $i++) {
                        $image = $images[$i];
                    ?>
                        <li class="splide__slide">
                            <img src="<?php echo $image['sizes']['large']; ?>">
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="actions">
                <?php the_favorites_button($post_id, $site_id); ?>
                <a class="btn icon light" href="<?php the_permalink() ?>"><i class="isax isax-maximize-4"></i></a>
            </div>
        </section>

    <?php else : ?>

        <section class="splide preview-slider empty" aria-label="Slideshow of Images">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        
                    </li>
                </ul>
            </div>

            <div class="actions">
                <?php the_favorites_button($post_id, $site_id); ?>
                <a class="btn icon light" href="<?php the_permalink() ?>"><i class="isax isax-maximize-4"></i></a>
            </div>

        </section>

    <?php endif; ?>
    <a class="metadata" href="<?php the_permalink() ?>">
        <p class="date med"><?php the_time(get_option('date_format')); ?></p>

        <h4><?php the_title(); ?></h4>

        <span class="hidden-details">
            <p class="med">
                <?php if (get_post_type() === 'dashboard') : ?>
                    This is a private dashboard that is password protected. There is no excerpt for this page.
                <?php else : ?>
                    <?php echo get_the_excerpt() ?>
                <?php endif; ?>
            </p>
            <div class="tag-list">
                <?php foreach ((get_the_category()) as $category) : ?>
                    <p class="tag sm" style="color: <?php echo get_field('tag_color', $category); ?>; background-color:<?php echo get_field('tag_color', $category); ?>20">
                        <?php echo $category->name; ?>
                    </p>
                <?php endforeach; ?>
                <?php if (get_post_type() === 'dashboard') : ?>
                    <p class="tag sm">
                        Dashboard
                    </p>
                <?php endif; ?>
            </div>
        </span>
    </a>
</div>