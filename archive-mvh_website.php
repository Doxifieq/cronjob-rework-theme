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
            <h1 class="page-title">Websites</h1>

            <div class="stats-grid">
                <div class="stats-grid-item active-incident">
                    <p>Active Incidents</p>
                    <h3>0</h3>
                </div>

                <div class="stats-grid-item total-incident">
                    <p>Total Incidents</p>
                    <h3>0</h3>
                </div>

                <div class="stats-grid-item latest-incident">
                    <p>Latest Incident</p>
                    <h3>None</h3>
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
                <a class="active-websites-item">
                    <h3>Google</h3>
                    <p><span class="dot green"></span>Status Code: 200</p>
                    <p class="muted">0 total incidents</p>
                </a>

                <a class="active-websites-item">
                    <h3>Google</h3>
                    <p><span class="dot green"></span>Status Code: 200</p>
                    <p class="muted">0 total incidents</p>
                </a>

                <a class="active-websites-item">
                    <h3>Google</h3>
                    <p><span class="dot green"></span>Status Code: 200</p>
                    <p class="muted">0 total incidents</p>
                </a>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>