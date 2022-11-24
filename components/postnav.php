<section id="postnav">


    <span class="nav-items">
        <?php
        $prev_post = get_adjacent_post(false, '', false);
        if (!empty($prev_post)) {
            echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">
        <i class="isax isax-arrow-left-3"></i>
         <span>
            <p class="sm">Previous</p>
            <h5>' . $prev_post->post_title . '</h5>
        </span>
    </a>';
        }
        ?>



        <?php
        $prev_post = get_adjacent_post(false, '', true);
        if (!empty($prev_post)) {
            echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">
        <span>
            <p class="sm">Up Next</p>
            <h5>' . $prev_post->post_title . '</h5>
        </span>
        <i class="isax isax-arrow-right-3"></i>
    </a>';
        }
        ?>

    </span>

</section>