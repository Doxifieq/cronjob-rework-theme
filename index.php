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
            <h1 class="page-title">Index</h1>

            <a href="websites">Websites</a>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>