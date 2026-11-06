<?php
if (!defined('ABSPATH')) exit;

/**
 * WooCommerce integration for the Pyarelal theme.
 * Replaces WooCommerce's default page wrapper + sidebar with the theme's own
 * container, sets the grid density, and keeps the header cart count live.
 * Products, orders and settings all stay inside WooCommerce — untouched here.
 */

/* ---- content wrapper: use the theme's container, drop the default sidebar ---- */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', function () {
    echo '<div class="woo-wrap"><div class="woo-main">';
}, 10);
add_action('woocommerce_after_main_content', function () {
    echo '</div></div>';
}, 10);

/* ---- grid density ---- */
add_filter('loop_shop_columns', function () { return 3; });
add_filter('loop_shop_per_page', function () { return 12; });
add_filter('woocommerce_related_products_args', function ($args) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
});

/* ---- keep the header cart count in sync after AJAX add-to-cart ---- */
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
    ob_start();
    ?><span class="cart-count" id="cartCount"<?php echo $count ? '' : ' style="display:none"'; ?>><?php echo (int) $count; ?></span><?php
    $fragments['#cartCount'] = ob_get_clean();
    return $fragments;
});

/* ---- when Free shipping is available, hide the other rates ----
   Orders ≥ ₹500 (free-shipping minimum) then show only "Free shipping";
   orders below ₹500 still show the ₹99 flat rate. */
add_filter('woocommerce_package_rates', function ($rates) {
    $free = array();
    foreach ($rates as $rate_id => $rate) {
        if ('free_shipping' === $rate->method_id) {
            $free[$rate_id] = $rate;
        }
    }
    return !empty($free) ? $free : $rates;
}, 100);
