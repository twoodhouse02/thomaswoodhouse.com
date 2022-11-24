<a href="#modal-metric-<?php echo get_row_index(); ?>" rel="modal:open">
    <div class="card dashboard-metric">
        <i class="isax isax-maximize-4"></i>
        <canvas id="dashboard<?php echo get_row_index(); ?>" class="metric" width="100" height="100"></canvas>
        <div class="details">
            <h4 class="text-center"><?php the_sub_field('group_heading') ?></h4>
            <?php if ($totalTasks == $completedTasks) : ?>
                <p class="tag sm success">
                    Complete
                </p>
            <?php else : ?>
                <p class="text-center">
                    <?php $tasksRemaining = $totalTasks - $completedTasks; ?>
                    <?php echo $tasksRemaining ?>

                    <?php if ($tasksRemaining == 1) : ?>
                        Task

                    <?php else : ?>

                        Tasks
                    <?php endif; ?>

                    Remaining

                </p>
            <?php endif; ?>
        </div>
    </div>
</a>