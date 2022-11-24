<div class="col-filled margin-b-3x customer-tasks">
    <h4>Your Tasks</h4>
    <?php if (have_rows('customer_tasks')) : ?>
        <?php while (have_rows('customer_tasks')) : the_row(); ?>
            <div class="sidebar-inner-card">
                <span class="inner-card-heading">
                    <i class="isax isax-tick-circle"></i>
                    <p><?php the_sub_field('task_name'); ?></p>
                </span>

                <p class="sm">
                    <?php the_sub_field('details'); ?>
                </p>

                <span class="content">
                    <?php if (get_sub_field('link')) : ?>
                        <a href="<?php the_sub_field('link'); ?>" target="_blank">
                            <i class="isax isax-link-21"></i>
                            <?php the_sub_field('link_title'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (get_sub_field('document')) : ?>
                        <a href="<?php the_sub_field('document'); ?>" target="_blank">
                            <i class="isax isax-document-1"></i>
                            <?php the_sub_field('document_title'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (in_array("Task Modal (Contact Form)", get_sub_field('attachments'))) : ?>
                        <a href="#modal-dashboard-task-form" rel="modal:open">
                            <i class="isax isax-messages-2"></i>
                            Open Contact Form
                        </a>
                    <?php endif; ?>

                </span>

            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="no-tasks">
            <i class="isax isax-tick-circle"></i>
            <p class="sm">You're all caught up! <br /> Please check back later.</p>
        </div>

    <?php endif; ?>

</div>