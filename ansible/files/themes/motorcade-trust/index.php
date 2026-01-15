<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>
<section class="mc-section">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="mc-card mc-card-pad" style="margin-bottom:14px;">
      <h2 style="margin:0 0 8px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div><?php the_excerpt(); ?></div>
    </article>
  <?php endwhile; else: ?>
    <div class="mc-card mc-card-pad">No content found.</div>
  <?php endif; ?>
</section>
<?php get_footer(); ?>
