<?php
/* 
  Template Name: Me 
*/
?>

<?php get_header(); ?>




<!--Password Protected Beginning-->
<?php if (!post_password_required($post)) : ?>

  <div id="site-content">

    <main id="primary" class="site-main bio-page">
      <div class="card simple bio">
        <img src="<?php the_field('profile_picture'); ?>">
        <div>
          <h2 class="text-center"><?php the_field('welcome'); ?></h2>
          <p>
            <?php the_field('bio'); ?>
          </p>
          <p class="margin-0 text-center">
            <?php if (have_rows('ctas')) : ?>
              <?php while (have_rows('ctas')) : the_row(); ?>
                <a class="btn simple dark <?php the_sub_field('classes_optional'); ?>" <?php if (get_sub_field('link')) : ?>href="<?php the_sub_field('link'); ?>" target="_blank" <?php endif; ?>><i class="isax isax-<?php the_sub_field('icon'); ?>"></i> <?php the_sub_field('text'); ?></a>
              <?php endwhile; ?>
              <?php if (get_field('resume', 'options')) : ?>
                <a class="btn simple dark" href="<?php the_field('resume', 'options'); ?>" target="_blank" ><i class="isax isax-import-2"></i> Download Resume</a>
              <?php endif; ?>
            <?php endif; ?>
          </p>
        </div>
      </div>

      <h3>Recent Experience</h3>

      <?php if (have_rows('experience')) : ?>
        <div class="experiences">
          <?php while (have_rows('experience')) : the_row(); ?>
            <div class="card simple work">
              <div class="header">
                <span class="details">
                  <h5><?php the_sub_field('title'); ?></h5>
                  <?php if (get_sub_field('include_link')) : ?>
                    <a href="<?php the_sub_field('org_link'); ?>" target="_blank">
                      <i class="isax isax-link-21"></i>
                    <?php endif; ?>
                    <p class="org"><?php the_sub_field('organization_name'); ?></p>
                    <?php if (get_sub_field('include_link')) : ?>
                    </a>
                  <?php endif; ?>
                </span>
                <?php if (get_sub_field('present_job')) : ?>
                  <div class="pulse success"></div>
                <?php endif; ?>
              </div>

              <p class="med description">
                <?php the_sub_field('description'); ?>
              </p>
              <span class="date">
                <p>
                  <?php the_sub_field('start_date'); ?>
                </p>
                <i class="isax isax-arrow-right-3"></i>
                <?php if (get_sub_field('present_job')) : ?>
                  <p>Today</p>
                <?php else : ?>
                  <p>
                    <?php the_sub_field('end_date'); ?>
                  </p>
                <?php endif; ?>
              </span>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <h3>Education</h3>

      <?php if (have_rows('education')) : ?>
        <div class="experiences">
          <?php while (have_rows('education')) : the_row(); ?>
            <div class="card simple work">
              <div class="header">
                <span class="details">
                  <h5><?php the_sub_field('school'); ?></h5>
                  <p class="org"><?php the_sub_field('program_type'); ?></p>
                </span>
              </div>

              <p class="med description">
                <?php the_sub_field('program'); ?>
              </p>
              <span class="date">
                <p>
                  Completed: <?php the_sub_field('completed_date'); ?>
                </p>
              </span>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <h3>Proficiencies</h3>

      <div class="card accent-1 proficiencies">

        <?php if (have_rows('proficiencies')) : ?>

          <?php while (have_rows('proficiencies')) : the_row(); ?>
            <ul class="proficiency-list">
              <h5><?php the_sub_field('category'); ?></h5>
              <?php if (have_rows('items')) : ?>
                <?php while (have_rows('items')) : the_row(); ?>
                  <li>
                    <p class="med"><?php the_sub_field('item_name'); ?></p>
                  </li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>


    </main>



    <!--Password Protected Form-->
  <?php else : ?>
    <?php echo get_the_password_form(); ?>
    <!--Password Protected End-->
  <?php endif; ?>




  </div>

  <?php

  get_footer();
