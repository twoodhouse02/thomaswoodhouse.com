<div id="modal-dashboard-creative-brief" class="modal">
    <div class="modal-header">
        <h4>Creative Brief</h4> <br>
    </div>
    <div class="modal-content">
        <?php if (have_rows('questions_and_answers')) : ?>
            <ul class="creativeBrief">
                <?php while (have_rows('questions_and_answers')) : the_row(); ?>
                    <li class="card accent-1 margin-b-3x">
                        <h5><?php the_sub_field('question'); ?></h5>
                        <p><?php the_sub_field('answer'); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>