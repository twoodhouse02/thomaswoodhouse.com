<?php if (have_rows('task_group')) : ?>

    <?php while (have_rows('task_group')) : the_row(); ?>

        <?php // Get the % of completed projects 
        $totalTasks = count(get_sub_field('tasks'));
        $array = get_sub_field('tasks');
        $completedTasks = 0;

        foreach ($array as $item) {
            if ($item['completed']) {
                $completedTasks++;
            }
        }

        $percentComplete = ceil($completedTasks /  $totalTasks * 100);

        ?>

        <?php include get_theme_file_path('/components/modals/modal-dashboard-metric.php'); ?>
        <?php include get_theme_file_path('/components/dashboard-metrics/metric.php'); ?>

        <script src="<?php get_template_directory_uri(); ?>/wp-content/themes/Mason/js/metric.js" defer>
            
        </script>

        <script>
            // let trackColorDynamic = getComputedStyle(document.body).getPropertyValue("--color-bg-accent-1");

            // if (document.body.classList.contains("dark-theme")){
            //     trackColorDynamic = getComputedStyle(document.body.dark-theme).getPropertyValue("--color-bg-accent-1");
            // }

            Chart.defaults.global.defaultFontFamily = "Inter Medium";
            var dashboard<?php echo get_row_index(); ?>config = {
                type: "radialGauge",
                data: {
                    labels: ["Metrics"],
                    datasets: [{
                        data: [<?php echo $percentComplete ?>],
                        backgroundColor: getComputedStyle(document.body).getPropertyValue("--color-btn"),
                        hoverBackgroundColor: getComputedStyle(document.body).getPropertyValue("--color-btn"),
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: false,
                    trackColor: getComputedStyle(document.body).getPropertyValue("--color-bg-accent-1"),
                    centerPercentage: 95,
                    centerArea: {
                        fontColor: getComputedStyle(document.body).getPropertyValue("--color-text"),
                        fontSize: 20,
                        fontStyle: '600',
                        text: function(value, options) {
                            return value + '%';
                        }
                    }
                },
            };
        </script>

    <?php endwhile; ?>

<?php endif; ?>


<?php if (have_rows('task_group')) : ?>
    <script>
        window.onload = function() {
            <?php while (have_rows('task_group')) : the_row(); ?>
                var dashboard<?php echo get_row_index(); ?> = document.getElementById("dashboard<?php echo get_row_index(); ?>").getContext("2d");
                window.myRadialGauge = new Chart(dashboard<?php echo get_row_index(); ?>, dashboard<?php echo get_row_index(); ?>config);
            <?php endwhile; ?>
        };
    </script>
<?php endif; ?>