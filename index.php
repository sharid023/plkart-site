<?php if (!defined('ABSPATH')) exit; get_header(); ?>
<section class="block">
  <div class="wrap" style="max-width:860px">
    <?php if (have_posts()): ?>
      <div class="sec-head"><p class="eyebrow">The Journal</p><h2><?php echo is_home() ? 'From the loom' : wp_strip_all_tags(get_the_archive_title()); ?></h2></div>
      <?php while (have_posts()): the_post(); ?>
        <article style="background:var(--surface);border:1px solid var(--line);border-radius:16px;padding:26px;margin-bottom:18px">
          <h2 style="font-size:1.5rem;margin-bottom:6px"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="muted" style="font-size:.86rem;margin-bottom:12px"><?php echo esc_html(get_the_date()); ?></p>
          <div class="post-body" style="line-height:1.7"><?php the_excerpt(); ?></div>
          <p style="margin-top:14px"><a class="btn btn-ghost" href="<?php the_permalink(); ?>">Read more &rarr;</a></p>
        </article>
      <?php endwhile; the_posts_pagination(array('mid_size' => 1)); ?>
    <?php else: ?>
      <div class="sec-head"><h2>Nothing here yet</h2><p>Add posts from wp-admin to start the journal and grow your SEO content.</p></div>
      <a class="btn btn-solid" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">Go to the shop &rarr;</a>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
