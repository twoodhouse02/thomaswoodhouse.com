<div id="modal-dashboard-documents" class="modal">
    <div class="modal-header">
        <h4>Project Documents</h4> <br>
    </div>
    <div class="modal-content">
        <?php if (have_rows('documents')) : ?>
            <ul class="table documents">
                <li class="header">
                    <span class="cell title">
                        <p>Document Title</p>
                    </span>

                    <span class="cell status">
                        <p>Status</p>
                    </span>

                    <span class="cell date">
                        <p>Last Updated</p>
                    </span>

                </li>
                <?php while (have_rows('documents')) : the_row(); ?>
                    <li>
                        <span class="cell title">
                            <a href="<?php the_sub_field('document'); ?>" target="_blank" class="document">
                                <p class="sm"><?php the_sub_field('file_title'); ?></p>
                            </a>
                        </span>

                        <span class="cell status">
                            <?php if (get_sub_field('document_status') != 'None') : ?>

                                <p class="tag sm 
                            <?php
                                if (get_sub_field('document_status') == 'Approved') :
                                    echo 'success';

                                elseif (get_sub_field('document_status') == 'Pending Approval') :
                                    echo 'caution';

                                elseif (get_sub_field('document_status') == 'Denied') :
                                    echo 'error';

                                else : echo 'notification';

                                endif;
                            ?>
                            
                            "><?php the_sub_field('document_status'); ?></p>
                            <?php endif; ?>
                        </span>

                        <span class="cell date">
                            <p class="sm"><?php the_sub_field('last_updated'); ?></p>
                        </span>

                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>