<?php
function order_menu_assets() {
    wp_enqueue_style(
        'order-menu-style',
        get_stylesheet_uri(),
        [],
        '1.0'
    );
}

add_action('wp_enqueue_scripts', 'order_menu_assets');
