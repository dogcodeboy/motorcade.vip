<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>
<section class="mc-section">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
