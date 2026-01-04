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


/**
 * Enable WooCommerce AJAX add to cart on Salty Food page
 */
function enable_wc_ajax_add_to_cart_on_custom_page() {
    if ( is_page_template('page-salty-food.php') ) {
        wp_enqueue_script('wc-add-to-cart');
    }
}
add_action('wp_enqueue_scripts', 'enable_wc_ajax_add_to_cart_on_custom_page');


/**
 * Update cart counter (sticky cart)
 */
add_filter('woocommerce_add_to_cart_fragments', function ( $fragments ) {

    ob_start(); ?>
        <span class="cart-count">
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
    <?php

    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
});
