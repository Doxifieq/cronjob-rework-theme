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
            <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        echo '<h2>Viewing history for ' . get_the_title() . '</h2>';
                    }
                }
            ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>