<?php if (!defined('ABSPATH')) exit; get_header();
  // Cart / checkout / my-account are WooCommerce shortcode pages — give them full width, no card.
  $is_wc_page = function_exists('is_cart') && (is_cart() || is_checkout() || is_account_page());
?>
<section class="block">
  <div class="wrap<?php echo $is_wc_page ? ' woocommerce' : ''; ?>"<?php echo $is_wc_page ? '' : ' style="max-width:860px"'; ?>>
    <?php while (have_posts()): the_post(); ?>
      <?php if ($is_wc_page): ?>
        <div class="sec-head"><h1><?php the_title(); ?></h1></div>
        <?php the_content(); ?>
      <?php else: ?>
        <article class="page-body" style="margin-inline:auto">
          <h1 style="font-size:clamp(2rem,4vw,2.8rem);margin-bottom:18px"><?php the_title(); ?></h1>
          <div class="post-body"><?php the_content(); ?></div>
        </article>
        <div class="ctaband">
          <h2>Looking for a specific piece?</h2>
          <p>Tell us the room, the size and the colours — we weave to order.</p>
          <a class="btn btn-solid" href="<?php echo esc_url(pyarelal_wa_link()); ?>" target="_blank" rel="noopener">Chat with us on WhatsApp</a>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
</section>
<?php get_footer(); ?>
