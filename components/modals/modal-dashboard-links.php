<div id="modal-dashboard-links" class="modal">
    <div class="modal-header">
        <h4>Project Links</h4> <br>
    </div>
    <div class="modal-content">
        <?php if (have_rows('links')) : ?>
            <ul class="links">
                <?php while (have_rows('links')) : the_row(); ?>
                    <li>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                        
                            <span>
                                <i class="isax isax-link-21"></i>
                                <p><?php the_sub_field('link_title'); ?></p>
                            </span>

                            <span>
                                <?php if (get_sub_field('desktop_ready')) : ?>
                                    <p class="tag sm success">
                                        Desktop Ready
                                    </p>
                                <?php endif; ?>
                                <?php if (get_sub_field('mobile_ready')) : ?>
                                    <p class="tag sm success">
                                        Mobile Ready
                                    </p>
                                <?php endif; ?>
                            </span>

                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>