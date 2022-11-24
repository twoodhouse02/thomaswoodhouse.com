<?php if (get_field('enable_primary_contact')) : ?>
    <div class="col-filled margin-b-3x">
        <h4>Primary Contact</h4>
        <div class="sidebar-inner-card">
            <span class="inner-card-heading">
                <i class="isax isax-user"></i>
                <p><?php the_field('primary_contact'); ?></p>
            </span>

            <span class="content">
                <?php if (get_field('primary_email')) : ?>
                    <p>
                        <i class="isax isax-sms"></i>
                        <?php the_field('primary_email'); ?>
                    </p>
                <?php endif; ?>

                <?php if (get_field('primary_phone')) : ?>
                    <p>
                        <i class="isax isax-call"></i>
                        <?php the_field('primary_phone'); ?>
                    </p>
                <?php endif; ?>

            </span>

        </div>
    </div>
<?php endif; ?>