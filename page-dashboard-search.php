<?php
/* 
  Template Name: Dashboard Search
*/
?>

<?php get_header(); ?>

<div id="site-content">
    <main id="primary" class="site-main">

        <div id="dashboard-search-container">
            <div class="card accent-1 search-box">
                <i class="isax isax-<?php the_field('icon'); ?>"></i>
                <h3 class="text-center"><?php the_field('heading'); ?></h3>
                <p class="text-center"><?php the_field('sub_heading'); ?></p>
                <div class="search_bar">
                    <form action="/" method="get" autocomplete="off">
                        <input type="text" name="s" placeholder="Type to Search" id="keyword" class="input_search" onkeyup="fetch()">
                    </form>
                    <ul class="search_result" id="datafetch"></ul>
                </div>
                <p class="sm text-center">Or <a href="/web-design/project-dashboard/">click here</a> to learn more about Project Dashboards</p>
            </div>
        </div>
    </main>
</div>


<?php

get_footer();
