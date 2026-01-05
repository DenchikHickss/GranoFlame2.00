<?php
/**
 * Enqueue styles
 */
function order_menu_assets() {
    wp_enqueue_style(
        'order-menu-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'order_menu_assets');
