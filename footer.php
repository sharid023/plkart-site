<?php if (!defined('ABSPATH')) exit;
  $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?>
</main>
<footer class="site-footer">
  <div class="wrap">
    <div class="cols">
      <div class="brandline">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo-light.svg'); ?>" alt="Pyarelal Handloom"></a>
        <p>Handmade rugs, carpets, dhurries &amp; mats — woven with love in Varanasi, India. <span class="dev">हाथ से बुना हर धागा।</span> Join the Indian art movement.</p>
        <p class="contact">&#128222; <b><?php echo esc_html(pyarelal_opt('phone', PLKART_PHONE)); ?></b> &nbsp;/&nbsp; <?php echo esc_html(pyarelal_opt('phone2', PLKART_PHONE2)); ?><br>&#9993; <?php echo esc_html(pyarelal_opt('email', PLKART_EMAIL)); ?></p>
        <div class="pay-row"><span>UPI</span><span>Cards</span><span>Net Banking</span><span>COD</span></div>
      </div>
      <div>
        <h4>Shop</h4>
        <a href="<?php echo esc_url($shop_url); ?>">All Pieces</a>
        <a href="<?php echo esc_url(home_url('/product-category/rugs-carpets/')); ?>">Rugs &amp; Carpets</a>
        <a href="<?php echo esc_url(home_url('/product-category/dhurries/')); ?>">Dhurries</a>
        <a href="<?php echo esc_url(home_url('/product-category/mats/')); ?>">Mats</a>
      </div>
      <div>
        <h4>Company</h4>
        <a href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a>
        <a href="<?php echo esc_url(home_url('/the-craft/')); ?>">The Craft</a>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
        <a href="<?php echo esc_url(pyarelal_wa_link()); ?>" target="_blank" rel="noopener">WhatsApp</a>
      </div>
      <div>
        <h4>Help</h4>
        <a href="<?php echo esc_url(home_url('/shipping-delivery/')); ?>">Shipping &amp; Delivery</a>
        <a href="<?php echo esc_url(home_url('/returns-refunds/')); ?>">Returns &amp; Refunds</a>
        <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')); ?>">Track / My Account</a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a>
      </div>
    </div>
    <div class="legal">
      Pyarelal Handloom &amp; Handicraft &middot; <?php echo esc_html(PLKART_ADDR); ?><br>
      Our work carries the Geographical Indication (G.I.) tag, recognised by the Office of the Development Commissioner (Handicrafts), Government of India. Colours and knot counts are described as accurately as possible; because every piece is handmade, slight variation is natural and part of its character.
      &copy; <?php echo esc_html(date('Y')); ?> Pyarelal. All rights reserved.
    </div>
  </div>
</footer>

<a class="wa-float" href="<?php echo esc_url(pyarelal_wa_link()); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M16 3C8.82 3 3 8.82 3 16c0 2.3.62 4.46 1.7 6.32L3 29l6.86-1.67A12.9 12.9 0 0 0 16 29c7.18 0 13-5.82 13-13S23.18 3 16 3z" fill="#25D366"/><path d="M12.3 9.6c-.24-.53-.5-.54-.72-.55l-.62-.01c-.21 0-.56.08-.85.4-.29.32-1.12 1.1-1.12 2.67 0 1.57 1.15 3.09 1.31 3.3.16.21 2.22 3.55 5.48 4.84 2.71 1.07 3.26.86 3.85.8.59-.05 1.9-.78 2.17-1.53.27-.75.27-1.39.19-1.53-.08-.13-.29-.21-.61-.37-.32-.16-1.9-.94-2.19-1.04-.29-.11-.5-.16-.72.16-.21.32-.82 1.04-1.01 1.25-.19.21-.37.24-.69.08-.32-.16-1.35-.5-2.57-1.59-.95-.85-1.59-1.89-1.78-2.21-.19-.32-.02-.49.14-.65.14-.14.32-.37.48-.56.16-.19.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.7-1.74-.96-2.38z" fill="#fff"/></svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
