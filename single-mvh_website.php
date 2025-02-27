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

                        $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);

                        $website_title = get_the_title();
                        
                        $status_code_data = mvh_get_status_code_data($status_code_meta);

                        echo '
                            <h2>Viewing history for ' . $website_title . '</h2>

                            <div class="history">
                                <div class="history-item">
                                    <div>
                                        <h3>' . $website_title . '</h3>
                                        <p><span class="dot ' . $status_code_data['color'] . '"></span>' . $status_code_data['status'] . '</p>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>