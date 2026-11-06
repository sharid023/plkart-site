<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<?php if (is_shop() || is_product_taxonomy()): ?>
  <div class="woo-banner">
    <div class="wrap">
      <p class="eyebrow">The Collection</p>
      <h1><?php woocommerce_page_title(); ?></h1>
      <?php
        if (is_product_taxonomy()) {
          $desc = term_description();
          if ($desc) echo '<p>' . wp_kses_post($desc) . '</p>';
        } else {
          echo '<p>Handmade rugs, hand-knotted carpets, dhurries and mats — each one woven to order in the size and colourway you choose.</p>';
        }
      ?>
    </div>
  </div>
<?php endif; ?>

<section class="woo-page">
  <?php woocommerce_content(); ?>
</section>

<?php get_footer(); ?>
