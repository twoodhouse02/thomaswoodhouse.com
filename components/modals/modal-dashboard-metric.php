<div id="modal-metric-<?php echo get_row_index(); ?>" class="modal">
    <div class="modal-header">
        <h4><?php the_sub_field('group_heading') ?></h4> <br>
    </div>
    <div class="modal-progress">
        <span class="progress-label">
            <p class="sm">Progress:</p>
            <p class="sm"><?php echo $percentComplete ?>%</p>
        </span>
        <progress id="file" value="<?php echo $percentComplete ?>" max="100"> <?php echo $percentComplete ?>% </progress>
    </div>
    <div class="modal-content">
        <?php
        if (have_rows('tasks')) : ?>
            <ul class="dashboard-to-do">
                <?php
                while (have_rows('tasks')) : the_row();
                ?>
                    <li class="<?php if (get_sub_field('completed')) {
                                    echo 'complete';
                                } ?>"><?php the_sub_field('task'); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>