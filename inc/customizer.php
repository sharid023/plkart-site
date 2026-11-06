<?php
if (!defined('ABSPATH')) exit;

/**
 * No-code settings (Appearance → Customize → "Pyarelal …").
 * Lets the owner edit contact details, the hero and tracking IDs without code.
 */

add_action('customize_register', function ($wp) {

    /* ---- Contact & Links ---- */
    $wp->add_section('pyarelal_contact', array('title' => 'Pyarelal — Contact & Links', 'priority' => 30));
    $contact = array(
        'phone'  => array('Phone (display)', PLKART_PHONE, 'sanitize_text_field'),
        'phone2' => array('Second phone (display)', PLKART_PHONE2, 'sanitize_text_field'),
        'wa'     => array('WhatsApp number (digits with 91, e.g. 917052515960)', PLKART_WA, 'sanitize_text_field'),
        'email'  => array('Email', PLKART_EMAIL, 'sanitize_email'),
    );
    foreach ($contact as $k => $f) {
        $wp->add_setting('pyarelal_' . $k, array('default' => $f[1], 'sanitize_callback' => $f[2], 'transport' => 'refresh'));
        $wp->add_control('pyarelal_' . $k, array('label' => $f[0], 'section' => 'pyarelal_contact', 'type' => 'text'));
    }

    /* ---- Hero (homepage banner) ---- */
    $wp->add_section('pyarelal_hero', array('title' => 'Pyarelal — Hero (homepage)', 'priority' => 31));

    $wp->add_setting('pyarelal_hero_eyebrow', array('default' => 'Handmade in Varanasi', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_hero_eyebrow', array('label' => 'Eyebrow / tagline', 'section' => 'pyarelal_hero', 'type' => 'text'));

    $wp->add_setting('pyarelal_hero_headline', array('default' => 'Crafted by hand. <em>Made to belong.</em>', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_hero_headline', array('label' => 'Headline (wrap a phrase in <em>…</em> to colour it terracotta)', 'section' => 'pyarelal_hero', 'type' => 'text'));

    $wp->add_setting('pyarelal_hero_sub', array('default' => 'Discover the artistry of India through handcrafted rugs and carpets that bring warmth, character and timeless beauty to your home.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_hero_sub', array('label' => 'Sub-text', 'section' => 'pyarelal_hero', 'type' => 'textarea'));

    $wp->add_setting('pyarelal_hero_image', array('default' => '', 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh'));
    $wp->add_control(new WP_Customize_Image_Control($wp, 'pyarelal_hero_image', array(
        'label'       => 'Hero image (optional — a woven motif shows until you set one)',
        'description' => 'A tall rug/room photo works best (portrait, 4:5).',
        'section'     => 'pyarelal_hero',
    )));

    /* ---- SEO ---- */
    $wp->add_section('pyarelal_seo', array('title' => 'Pyarelal — SEO', 'priority' => 32));
    $wp->add_setting('pyarelal_meta_desc', array('default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_meta_desc', array('label' => 'Homepage meta description', 'description' => 'Leave blank to use the default. Install Rank Math / Yoast to control titles & descriptions at scale.', 'section' => 'pyarelal_seo', 'type' => 'textarea'));

    /* ---- Analytics & Tracking ---- */
    $wp->add_section('pyarelal_analytics', array('title' => 'Pyarelal — Analytics & Tracking', 'priority' => 33));
    $wp->add_setting('pyarelal_ga4_id', array('default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_ga4_id', array('label' => 'Google Analytics 4 ID', 'description' => 'e.g. G-XXXXXXXXXX', 'section' => 'pyarelal_analytics', 'type' => 'text'));
    $wp->add_setting('pyarelal_pixel_id', array('default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh'));
    $wp->add_control('pyarelal_pixel_id', array('label' => 'Meta (Facebook) Pixel ID', 'description' => 'the numeric Pixel ID from Meta Events Manager', 'section' => 'pyarelal_analytics', 'type' => 'text'));
});
