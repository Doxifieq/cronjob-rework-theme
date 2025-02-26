<?php

function mvh_get_status_code_data($status_code) {
    switch ($status_code) {
        case '200':
            return ['color' => 'green', 'status' => 'Online'];

        case '0':
        case '404':
        case '408':
        case '500':
        case '501':
        case '502':
        case '503':
        case '504':
            return ['color' => 'red', 'status' => 'Offline'];

        default:
            return ['color' => 'yellow', 'status' => 'Unknown'];
    }
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-rework-theme/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');