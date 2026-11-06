<?php
if (!defined('ABSPATH')) exit;

/**
 * Pyarelal theme — setup, assets, SEO/schema, analytics.
 * WooCommerce store for plkart.com (Pyarelal Handloom & Handicraft).
 * No page builder. Products, cart, orders stay in WooCommerce — this theme
 * only styles and wraps them. Deploys via WP Pusher (git push → live).
 */

if (!defined('PLKART_PHONE'))    define('PLKART_PHONE', '+91 70525 15960'); // display
if (!defined('PLKART_PHONE2'))   define('PLKART_PHONE2', '+91 91409 49060');
if (!defined('PLKART_WA'))       define('PLKART_WA', '917052515960');       // wa.me digits
if (!defined('PLKART_EMAIL'))    define('PLKART_EMAIL', 'rakeshkumarmaurya931@gmail.com');
if (!defined('PLKART_ADDR'))     define('PLKART_ADDR', 'Vill. Pure, Post Kachhawa Road, Dist. Varanasi — 221313, Uttar Pradesh, India');

/* ---------------------------------------------------------------- setup */
function pyarelal_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // WooCommerce support (required so WC uses this theme's templates cleanly)
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'pyarelal_setup');

/* ---------------------------------------------------------------- assets */
function pyarelal_assets() {
    wp_enqueue_style(
        'pyarelal-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500&family=Hanken+Grotesk:wght@400;500;600;700&family=Noto+Serif+Devanagari:wght@500;600&display=swap',
        array(), null
    );
    wp_enqueue_style('pyarelal-style', get_stylesheet_uri(), array(), '1.0.2');
    wp_enqueue_script('pyarelal-app', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'pyarelal_assets');

/* -------------------------------------------- settings helper + includes */
function pyarelal_opt($key, $default = '') {
    $v = get_theme_mod('pyarelal_' . $key, $default);
    return ($v === '' || $v === null) ? $default : $v;
}

require get_template_directory() . '/inc/customizer.php';
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woo.php';
}

/* --------------------------------------------- WhatsApp helper (wa.me) */
function pyarelal_wa_link($text = 'Hi Pyarelal, I saw your website and I have a question about a rug.') {
    return 'https://wa.me/' . pyarelal_opt('wa', PLKART_WA) . '?text=' . rawurlencode($text);
}

/* --------------------------------------------- SEO: meta + structured data */
function pyarelal_head() {
    // Store-wide Organization/LocalBusiness schema.
    $ld = array(
        '@context' => 'https://schema.org',
        '@type'    => 'Store',
        '@id'      => home_url('/#store'),
        'name'     => get_bloginfo('name') ?: 'Pyarelal Handloom & Handicraft',
        'url'      => home_url('/'),
        'image'    => get_template_directory_uri() . '/assets/logo.svg',
        'telephone'=> '+917052515960',
        'email'    => pyarelal_opt('email', PLKART_EMAIL),
        'priceRange' => '₹₹',
        'areaServed' => 'IN',
        'description' => 'Handmade, hand-knotted rugs, carpets, dhurries and mats — G.I. tag certified and woven in the Varanasi (Bhadohi–Mirzapur) belt.',
        'address'  => array(
            '@type' => 'PostalAddress',
            'streetAddress'   => 'Vill. Pure, Post Kachhawa Road',
            'addressLocality' => 'Varanasi',
            'addressRegion'   => 'Uttar Pradesh',
            'postalCode'      => '221313',
            'addressCountry'  => 'IN',
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($ld) . '</script>' . "\n";

    if (is_front_page()) {
        $desc = pyarelal_opt('meta_desc', 'Handmade rugs, hand-knotted carpets, dhurries & mats — G.I. tag certified, woven in Varanasi. Free shipping on orders above ₹500. Join the Indian art movement — Pyarelal.');
        echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
        echo '<meta property="og:type" content="website"><meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    }
}
add_action('wp_head', 'pyarelal_head', 5);

/* --------------------------------------------- Analytics (GA4 + Meta Pixel) */
function pyarelal_analytics() {
    $ga = preg_replace('/[^A-Za-z0-9\-]/', '', (string) pyarelal_opt('ga4_id', ''));
    $px = preg_replace('/[^0-9]/', '', (string) pyarelal_opt('pixel_id', ''));
    if ($ga) {
        echo "\n<!-- Google Analytics (GA4) -->\n";
        echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr($ga) . '"></script>' . "\n";
        echo '<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("js",new Date());gtag("config","' . esc_js($ga) . '");</script>' . "\n";
    }
    if ($px) {
        echo "\n<!-- Meta Pixel -->\n";
        echo '<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","' . esc_js($px) . '");fbq("track","PageView");</script>' . "\n";
        echo '<noscript><img height="1" width="1" style="display:none" alt="" src="https://www.facebook.com/tr?id=' . esc_attr($px) . '&ev=PageView&noscript=1"/></noscript>' . "\n";
    }
}
add_action('wp_head', 'pyarelal_analytics', 1);
