<div class="alert <?php the_field('alert_type', 'options'); ?>">
    <div class="pulse <?php the_field('alert_type', 'options'); ?>"></div>
    <div class="content">
        <h5><?php the_field('alert_title', 'options'); ?></h5>
        <p class="med"><?php the_field('alert_paragraph', 'options'); ?></p>
        <?php if (get_field('alert_button', 'options')) : ?>
            <a class="btn simple dark" href="<?php the_field('alert_button_link', 'options'); ?>"  <?php if (get_field('open_modal', 'options')) : ?>rel="modal:open" <?php endif; ?>><?php the_field('alert_button', 'options'); ?></a>
        <?php endif; ?>
    </div>
</div>