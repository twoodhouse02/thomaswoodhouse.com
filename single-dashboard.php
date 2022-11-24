<?php
/* 
  Template Name: Dashboard 
*/
?>

<?php get_header(); ?>




<!--Password Protected Beginning-->
<?php if (!post_password_required($post)) : ?>

  <!--Dashboard-Specific Modals-->
  <?php if (get_field('enable_documents')) : ?>
    <?php include get_theme_file_path('/components/modals/modal-dashboard-documents.php'); ?>
  <?php endif; ?>
  <?php if (get_field('enable_links')) : ?>
    <?php include get_theme_file_path('/components/modals/modal-dashboard-links.php'); ?>
  <?php endif; ?>
  <?php if (get_field('enable_pricing')) : ?>
    <?php include get_theme_file_path('/components/modals/modal-dashboard-pricing.php'); ?>
  <?php endif; ?>
  <?php if (get_field('enable_creative_brief')) : ?>
    <?php include get_theme_file_path('/components/modals/modal-dashboard-creative-brief.php'); ?>
  <?php endif; ?>

  <?php include get_theme_file_path('/components/modals/modal-dashboard-task-form.php'); ?>
  <?php include get_theme_file_path('/components/modals/modal-dashboard-help.php'); ?>

  <div id="site-content">

    <!-- Get total percentage of project complete:  -->

    <?php if (have_rows('task_group')) : ?>
      <?php
      //Set Variables
      $totalTasks = 0;
      $completedTasks = 0;
      ?>
      <?php while (have_rows('task_group')) : the_row(); ?>

        <?php // Get the % of completed projects 
        $array = get_sub_field('tasks');

        foreach ($array as $item) {
          $totalTasks++;
          if ($item['completed']) {
            $completedTasks++;
          }
        }
        ?>

      <?php endwhile; ?>
      <?php $projectPercentComplete = ceil($completedTasks / $totalTasks * 100) ?>
    <?php endif; ?>

    <hero class="standard post dashboard">
      <div class="post-details">
        <h1><?php wp_title(''); ?> Dashboard</h1>

        <div class="bottom">
          <?php if ($projectPercentComplete == 100) : ?>
            <p class="tag success">
              <i class="isax isax-tick-circle"></i> Project Complete
            </p>
          <?php else : ?>
            <span class="total-progress">
              <span class="progress-label">
                <p class="sm">Total Progress:</p>
                <p class="sm"><?php echo $projectPercentComplete ?>%</p>
              </span>
              <progress id="totalProgress" value="<?php echo $projectPercentComplete ?>" max="100"> <?php echo $projectPercentComplete ?>% </progress>
            </span>
          <?php endif; ?>
          <div class="details">
            <div class="dates">
              <?php if (get_field('start_date')) : ?>
                <span class="labeled-field">
                  <p class="sm">Start Date</p>
                  <p class="content"><?php the_field('start_date') ?></p>
                </span>
              <?php endif; ?>
              <?php if (get_field('end_date')) : ?>
                <span class="labeled-field">
                  <p class="sm">Estimated End Date</p>
                  <p class="content"><?php the_field('end_date') ?></p>
                </span>
              <?php endif; ?>
            </div>

            <div class="actions">
              <span data-aos="zoom-in" data-aos-duration="300" data-aos-delay="500"><?php the_favorites_button($post_id, $site_id); ?></span>
            </div>
          </div>

        </div>
      </div>
    </hero>

    <main id="primary" class="site-main">
      <?php if (get_field('enable_alert')) : ?>
        <div class="alert <?php the_field('alert_type'); ?> margin-b-4x">
          <div class="pulse <?php the_field('alert_type'); ?>"></div>
          <div class="content">
            <h5><?php the_field('alert_title'); ?></h5>
            <p class="med"><?php the_field('alert_paragraph'); ?></p>
          </div>
        </div>
      <?php endif; ?>

      <div class="col-2-1 reverse-stack">
        <div>
          <div class="metrics">
            <?php include get_theme_file_path('/components/dashboard-metrics/load-metrics.php'); ?>
          </div>
        </div>

        <div class="sidebar">

          <?php include get_theme_file_path('/components/dashboard-metrics/dashboard-tools.php'); ?>

          <?php include get_theme_file_path('/components/dashboard-metrics/primary-contact.php'); ?>

          <?php include get_theme_file_path('/components/dashboard-metrics/customer-tasks.php'); ?>

        </div>
      </div>

    </main>

  </div>





  <!--Password Protected Form-->
<?php else : ?>
  <div id="site-content">
    <?php echo get_the_password_form(); ?>
    <!--Password Protected End-->
  </div>
<?php endif; ?>




<?php

get_footer();
