<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#2a2118">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
  $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
  $cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
  $acct_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
  $cart_n   = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
?>
<header class="site-header">
  <div class="topbar">
    <div class="wrap"><span>Free shipping on orders above <b>₹500</b> &nbsp;·&nbsp; Handmade &amp; <b>G.I. Tag Certified</b> &nbsp;·&nbsp; Woven in Varanasi</span></div>
  </div>
  <div class="wrap nav">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'Pyarelal'); ?> — home">
      <?php if (has_custom_logo()): ?>
        <?php echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, array('alt' => get_bloginfo('name'))); ?>
      <?php else: ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo.svg'); ?>" alt="Pyarelal Handloom">
      <?php endif; ?>
    </a>
    <span class="sp"></span>

    <nav class="navlinks" id="navdrop" aria-label="Primary">
      <a href="<?php echo esc_url($shop_url); ?>">Shop All</a>
      <a href="<?php echo esc_url(home_url('/product-category/rugs-carpets/')); ?>">Rugs &amp; Carpets</a>
      <a href="<?php echo esc_url(home_url('/product-category/dhurries/')); ?>">Dhurries</a>
      <a href="<?php echo esc_url(home_url('/product-category/mats/')); ?>">Mats</a>
      <a href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
    </nav>
    <div class="menu" aria-hidden="true">
      <a href="<?php echo esc_url($shop_url); ?>">Shop All</a>
      <a href="<?php echo esc_url(home_url('/product-category/rugs-carpets/')); ?>">Rugs &amp; Carpets</a>
      <a href="<?php echo esc_url(home_url('/product-category/dhurries/')); ?>">Dhurries</a>
      <a href="<?php echo esc_url(home_url('/product-category/mats/')); ?>">Mats</a>
      <a href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
    </div>

    <div class="nav-icons">
      <a class="icon-btn" href="<?php echo esc_url($shop_url); ?>" aria-label="Search / Shop">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
      </a>
      <a class="icon-btn" href="<?php echo esc_url($acct_url); ?>" aria-label="My account">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
      </a>
      <a class="icon-btn" href="<?php echo esc_url($cart_url); ?>" aria-label="Cart">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6h15l-1.5 9h-12z"/><circle cx="9" cy="20" r="1.4"/><circle cx="18" cy="20" r="1.4"/><path d="M6 6L5 3H2"/></svg>
        <span class="cart-count" id="cartCount"<?php echo $cart_n ? '' : ' style="display:none"'; ?>><?php echo (int) $cart_n; ?></span>
      </a>
      <button class="navtoggle" id="navtoggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navdrop"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
<div class="nav-backdrop" id="navBackdrop"></div>
<main id="main">
