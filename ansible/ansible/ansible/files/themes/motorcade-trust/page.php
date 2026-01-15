<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>
<section class="mc-section">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="mc-card mc-card-pad">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </article>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
