<?php if (!defined('ABSPATH')) exit; get_header(); ?>
<section class="block">
  <div class="wrap" style="max-width:780px">
    <?php while (have_posts()): the_post(); ?>
      <a href="<?php echo esc_url(home_url('/blog/')); ?>" style="color:var(--terra);font-weight:600;font-size:.9rem">&larr; All journal entries</a>
      <article>
        <p class="eyebrow" style="margin-top:18px"><?php echo esc_html(get_the_date()); ?> &middot; <?php echo esc_html(max(1, ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 200))); ?> min read</p>
        <h1 style="font-size:clamp(2rem,4.4vw,3rem);margin:12px 0 22px"><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()): ?>
          <div style="border-radius:14px;overflow:hidden;margin-bottom:26px;border:1px solid var(--line)"><?php the_post_thumbnail('large', array('style' => 'width:100%;display:block;height:auto')); ?></div>
        <?php endif; ?>
        <div class="post-body"><?php the_content(); ?></div>
      </article>
      <div class="ctaband">
        <h2>Bring a Pyarelal home</h2>
        <p>Handmade rugs, carpets, dhurries &amp; mats — woven in Varanasi.</p>
        <a class="btn btn-solid" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">Shop the collection &rarr;</a>
      </div>
    <?php endwhile; ?>
  </div>
</section>
<?php get_footer(); ?>
