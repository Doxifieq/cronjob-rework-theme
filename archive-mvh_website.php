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
            <h1>Websites</h1>

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
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>