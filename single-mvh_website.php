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

                        $website_title = get_the_title();
                        $website_url = get_field('website');
                        
                        echo '
                            <h2>Viewing history for ' . $website_title . '</h2>
                            <a class="muted" href="' . $website_url . '">' . $website_url . '</a>
                        ';
                    }
                }
            ?>

            <div class="history">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $post_meta = get_post_meta(get_the_ID());

                            foreach (array_reverse($post_meta, true) as $key => $value) {
                                if (!str_contains($key, 'status_code_')) continue;

                                $date = date('Y-m-d H:i:s', substr($key, 12));

                                echo '
                                    <div class="history-item">
                                        <div>
                                            <h3>' . $date . '</h3>
                                        </div>

                                        <div>
                                            <p class="muted">Status Code 0</p>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>