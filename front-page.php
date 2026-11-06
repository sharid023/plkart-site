<?php if (!defined('ABSPATH')) exit; get_header();
  $has_wc   = class_exists('WooCommerce');
  $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
  $hero_img = pyarelal_opt('hero_image', '');
  // Inline woven-rug motif, used wherever a real image isn't set yet.
  $rug_svg = '<svg viewBox="0 0 400 500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Hand-knotted rug motif" style="width:100%;height:100%;display:block">'
    . '<rect width="400" height="500" fill="#eee3c9"/>'
    . '<rect x="18" y="18" width="364" height="464" fill="none" stroke="#b25736" stroke-width="10"/>'
    . '<rect x="40" y="40" width="320" height="420" fill="none" stroke="#b0863f" stroke-width="4"/>'
    . '<g fill="none" stroke="#3e4a46" stroke-width="3">'
    . '<path d="M200 70 L330 200 L200 330 L70 200 Z"/><path d="M200 120 L285 200 L200 280 L115 200 Z"/>'
    . '</g>'
    . '<path d="M200 150 L250 200 L200 250 L150 200 Z" fill="#b25736"/>'
    . '<circle cx="200" cy="200" r="16" fill="#cf9a3b"/>'
    . '<g fill="#b25736"><circle cx="200" cy="384" r="7"/><circle cx="170" cy="400" r="5"/><circle cx="230" cy="400" r="5"/></g>'
    . '<g fill="#3e4a46"><circle cx="70" cy="70" r="7"/><circle cx="330" cy="70" r="7"/><circle cx="70" cy="430" r="7"/><circle cx="330" cy="430" r="7"/></g>'
    . '</svg>';
?>

<!-- HERO -->
<section class="hero">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <p class="eyebrow"><?php echo esc_html(pyarelal_opt('hero_eyebrow', 'Handmade in Varanasi')); ?></p>
      <h1><?php echo wp_kses_post(pyarelal_opt('hero_headline', 'Crafted by hand. <em>Made to belong.</em>')); ?></h1>
      <p class="lead"><?php echo esc_html(pyarelal_opt('hero_sub', 'Discover the artistry of India through handcrafted rugs and carpets that bring warmth, character and timeless beauty to your home.')); ?> <span class="dev">हाथ से बुना हर धागा।</span></p>
      <div class="hero-actions">
        <a class="btn btn-solid btn-lg" href="<?php echo esc_url($shop_url); ?>">Explore the Collection</a>
        <a class="btn btn-ghost btn-lg" href="#story">Discover Our Craft</a>
      </div>
      <div class="hero-meta">
        <div><b>120–400</b><span>Knots / sq. inch</span></div>
        <div><b>100%</b><span>Hand finished</span></div>
        <div><b>G.I.</b><span>Tag certified</span></div>
      </div>
    </div>
    <div class="hero-art">
      <?php if ($hero_img): ?>
        <img src="<?php echo esc_url($hero_img); ?>" alt="Hand-knotted rug by Pyarelal">
      <?php else: ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/hero-rug.svg'); ?>" alt="Hand-knotted rug by Pyarelal">
      <?php endif; ?>
      <span class="tag-float tag-1"><span class="dot"></span>Pure wool &amp; silk</span>
      <span class="tag-float tag-2"><span class="dot"></span>Natural dyes</span>
    </div>
  </div>
</section>

<!-- TRUST -->
<div class="trust">
  <div class="wrap">
    <div class="t"><svg viewBox="0 0 24 24"><path d="M12 2l7 3v6c0 5-3 7.5-7 9-4-1.5-7-4-7-9V5z"/><path d="M9 12l2 2 4-4"/></svg><div><b>G.I. Tag Certified</b><span>Authentic handicraft</span></div></div>
    <div class="t"><svg viewBox="0 0 24 24"><path d="M3 7h18v10H3z"/><path d="M3 11h18"/><path d="M7 7V5h10v2"/></svg><div><b>Free Shipping</b><span>On orders above ₹500</span></div></div>
    <div class="t"><svg viewBox="0 0 24 24"><path d="M12 3v18"/><path d="M5 8l7-5 7 5"/><path d="M5 8v8l7 5 7-5V8"/></svg><div><b>Hand-knotted</b><span>Never mass-produced</span></div></div>
    <div class="t"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><div><b>Talk to us</b><span>WhatsApp support</span></div></div>
  </div>
</div>

<!-- SHOP BY CATEGORY -->
<section class="block">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Shop by category</p><h2>Find the weave for every room.</h2></div>
    <div class="cat-grid">
      <?php
      $cats = array(
        array('rugs-carpets', 'Rugs &amp; Carpets', 'Hand-knotted statements'),
        array('dhurries',     'Dhurries',          'Flat-woven &amp; reversible'),
        array('mats',         'Mats',              'Doormats &amp; small weaves'),
        array('runners',      'Runners',           'For halls &amp; stairs'),
      );
      foreach ($cats as $c):
        $term = $has_wc ? get_term_by('slug', $c[0], 'product_cat') : null;
        $link = $term ? get_term_link($term) : home_url('/product-category/' . $c[0] . '/');
        $thumb = '';
        if ($has_wc && $term && ($tid = get_term_meta($term->term_id, 'thumbnail_id', true))) {
          $thumb = wp_get_attachment_image_url($tid, 'medium');
        }
      ?>
        <a class="cat-card" href="<?php echo esc_url($link); ?>">
          <div class="ph"><?php if ($thumb): ?><img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($c[1])); ?>"><?php else: echo $rug_svg; endif; ?></div>
          <div class="cap"><b><?php echo wp_kses_post($c[1]); ?></b><span><?php echo wp_kses_post($c[2]); ?></span></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if ($has_wc): ?>
<!-- FEATURED COLLECTION -->
<section class="block" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Featured collection</p><h2>Pieces worth coming home to.</h2></div>
    <?php
      // Show "featured" products if any are marked; otherwise the newest pieces.
      $has_featured = function_exists('wc_get_products')
        ? count(wc_get_products(array('status' => 'publish', 'limit' => 1, 'featured' => true, 'return' => 'ids'))) > 0
        : false;
      if ($has_featured) {
        echo do_shortcode('[products limit="8" columns="4" visibility="featured"]');
      } else {
        echo do_shortcode('[products limit="8" columns="4" orderby="date" order="DESC"]');
      }
    ?>
    <div class="center" style="margin-top:28px"><a class="btn btn-dark btn-lg" href="<?php echo esc_url($shop_url); ?>">View the full collection &rarr;</a></div>
  </div>
</section>
<?php endif; ?>

<!-- STORY -->
<section class="block" id="story" style="background:var(--surface);border-block:1px solid var(--line)">
  <div class="wrap split">
    <div class="art-panel"><?php echo $rug_svg; ?></div>
    <div>
      <p class="eyebrow">Our story</p>
      <h2>An art form woven through generations.</h2>
      <p>Pyarelal began where India's finest carpets have always been born — the weaving villages around Varanasi, in the Bhadohi–Mirzapur belt. What started as one family's loom is now a workshop of master artisans carrying a craft passed from hand to hand, knot to knot.</p>
      <p class="muted">We don't manufacture rugs. We weave them — slowly, by hand, the way they have always been made.</p>
      <div class="hero-actions"><a class="btn btn-dark" href="<?php echo esc_url(home_url('/our-story/')); ?>">Read our story</a></div>
    </div>
  </div>
</section>

<!-- THE CRAFT -->
<section class="block">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">The craft</p><h2>Every knot, tied by hand.</h2><p>From raw wool, silk and cotton — dyed in natural colour and dried in the sun — to warp and weft pulled tight and each knot tied by hand across the design. A single large carpet can take months to complete.</p></div>
    <div class="specs">
      <div class="spec"><b>Natural dyes</b><span>Madder, indigo, saffron</span><small>Colour drawn from root, leaf and mineral — settled in the sun, built to last for generations.</small></div>
      <div class="spec"><b>Hand-knotted</b><span>Row upon row</span><small>Warp and weft pulled tight, each knot tied by hand across the design — never mass-produced.</small></div>
      <div class="spec"><b>G.I. certified</b><span>Government of India</span><small>Recognised by the Office of the Development Commissioner (Handicrafts) — proof of genuine regional craft.</small></div>
    </div>
  </div>
</section>

<!-- WHY PYARELAL -->
<section class="block" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head center"><p class="eyebrow">The Pyarelal promise</p><h2>Why collectors choose us.</h2></div>
    <div class="reviews">
      <div class="review"><div class="stars">★★★★★</div><p>Made to order in the size and colourway you choose — your room, your rug, not a warehouse copy.</p><cite>Woven to order<span>Custom sizes welcome</span></cite></div>
      <div class="review"><div class="stars">★★★★★</div><p>Pure wool, silk and cotton with natural dyes — a surface that only grows richer with the years.</p><cite>Honest materials<span>No synthetic shortcuts</span></cite></div>
      <div class="review"><div class="stars">★★★★★</div><p>A real workshop of master artisans behind every piece — talk to us on WhatsApp before you buy.</p><cite>People, not a factory<span>Direct from the loom</span></cite></div>
    </div>
  </div>
</section>

<!-- CLOSING BANNER -->
<section class="block" style="padding-top:0">
  <div class="wrap">
    <div class="banner">
      <p class="eyebrow">Join us</p>
      <h2>Join the Indian Art Movement.</h2>
      <p>Bring home the work of real hands — and a small part of a living Indian art form.</p>
      <div class="hero-actions" style="justify-content:center">
        <a class="btn btn-solid btn-lg" href="<?php echo esc_url($shop_url); ?>">Shop the collection</a>
        <a class="btn btn-ghost btn-lg" style="color:var(--surface);border-color:rgba(242,233,214,.4)" href="<?php echo esc_url(pyarelal_wa_link()); ?>" target="_blank" rel="noopener">Chat on WhatsApp</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
