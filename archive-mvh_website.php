<?php
    $incidents = 0;
    $incident = NULL;

    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $post_meta = get_post_meta(get_the_ID());

            foreach ($post_meta as $key => $value) {
                if (!$key == 'status_code') continue;

                $status_code_data = mvh_get_status_code_data($value[0]);

                if ($status_code_data['status'] == 'Offline') {
                    $incidents++;
                    $incident = get_the_title();
                }
            }
        }
    }
?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <div class="wrapper">
            <div class="stats-grid">
                <div class="stats-grid-item active-incident">
                    <p>Active Incidents</p>
                    <h3><?php echo $incidents ?></h3>
                </div>

                <div class="stats-grid-item lifetime-incident">
                    <p>Lifetime Incidents</p>
                    <h3><?php echo $incidents ?></h3>
                </div>

                <div class="stats-grid-item latest-incident">
                    <p>Latest Incident</p>
                    <h3><?php echo ($incident ? $incident : 'None'); ?></h3>
                </div>

                <div class="stats-grid-item uptime">
                    <div>
                        <p>Last 24 hours</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>Last 7 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>Last 30 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>Last 365 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>
                </div>
            </div>

            <div class="active-websites">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);

                            $website_permalink = get_the_permalink();
                            $website_title = get_the_title();
                            $website_url = get_field('website');

                            $status_code_data = mvh_get_status_code_data($status_code_meta);

                            echo '
                                <a class="active-websites-item" href="' . $website_permalink . '">
                                    <div>
                                        <h3>' . $website_title . '</h3>
                                        <p><span class="dot ' . $status_code_data['color'] . '"></span>' . $status_code_data['status'] . '</p>
                                    </div>

                                    <div>
                                        <p class="muted">' . $website_url . '</p>
                                        <p class="muted">Status Code ' . $status_code_meta . '</p>
                                    </div>
                                </a>
                            ';
                        }
                    }
                ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>