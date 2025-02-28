<?php
    $active_incidents = 0;
    $lifetime_incidents = 0;
    $incident = NULL;

    $uptime_24h_count = 0;
    $uptime_24h = 100; //1440

    $uptime_7d_count = 0;
    $uptime_7d = 100;

    $uptime_30d_count = 0;
    $uptime_30d = 100;

    $uptime_365d_count = 0;
    $uptime_365d = 100;


    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $post_meta = get_post_meta(get_the_ID());

            foreach ($post_meta as $key => $value) {
                $status_code_data = mvh_get_status_code_data($value[0]);

                if ($status_code_data['status'] != 'Offline') continue;

                if ($key == 'status_code') {
                    $incident = get_the_title();
                    $active_incidents++;

                } elseif (str_contains($key, 'status_code_')) {
                    $time = substr($key, 12);

                    $lifetime_incidents++;

                    if ($time > strtotime('-24 hour')) $uptime_24h_count++;
                    if ($time > strtotime('-7 day')) $uptime_7d_count++;
                    if ($time > strtotime('-30 day')) $uptime_30d_count++;
                    if ($time > strtotime('-365 day')) $uptime_365d_count++;
                }
            }
        }
    }

    /*
        24h = 1440
        7d = 10080
        30d = 43200
        365d = 525600
    */

    $uptime_24h -= round(($uptime_24h_count * 5) / 1440 * 100, 6);
    $uptime_7d -= round(($uptime_7d_count * 5) / 10080 * 100, 6);
    $uptime_30d -= round(($uptime_30d_count * 5) / 43200 * 100, 6);
    $uptime_365d -= round(($uptime_365d_count * 5) / 525600 * 100, 6);
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
                    <h3><?php echo $active_incidents ?></h3>
                </div>

                <div class="stats-grid-item lifetime-incident">
                    <p>Lifetime Incidents</p>
                    <h3><?php echo $lifetime_incidents ?></h3>
                </div>

                <div class="stats-grid-item latest-incident">
                    <p>Latest Incident</p>
                    <h3><?php echo ($incident ? $incident : 'None'); ?></h3>
                </div>

                <div class="stats-grid-item uptime">
                    <div>
                        <p>Last 24 hours</p>
                        <h3><?php echo "$uptime_24h%"; ?></h3>
                        <p class="muted"><?php echo "$uptime_24h_count incidents"; ?></p>
                    </div>

                    <div>
                        <p>Last 7 days</p>
                        <h3><?php echo "$uptime_7d%"; ?></h3>
                        <p class="muted"><?php echo "$uptime_7d_count incidents"; ?></p>
                    </div>

                    <div>
                        <p>Last 30 days</p>
                        <h3><?php echo "$uptime_30d%"; ?></h3>
                        <p class="muted"><?php echo "$uptime_30d_count incidents"; ?></p>
                    </div>

                    <div>
                        <p>Last 365 days</p>
                        <h3><?php echo "$uptime_365d%"; ?></h3>
                        <p class="muted"><?php echo "$uptime_365d_count incidents"; ?></p>
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