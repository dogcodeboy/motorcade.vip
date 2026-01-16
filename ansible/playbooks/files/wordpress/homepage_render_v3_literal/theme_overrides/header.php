<?php if (!defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="mc-header">
  <div class="mc-container">
    <div class="mc-header-inner">
      <div class="mc-brand">
        <?php if (function_exists('the_custom_logo') && has_custom_logo()) { the_custom_logo(); } ?>
        <div class="mc-brand-title"><?php bloginfo('name'); ?></div>
      </div>

      <nav class="mc-nav" aria-label="Primary navigation">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul>%3$s</ul>',
          ));
        ?>
      </nav>

      <div class="mc-ctas">
        <a class="mc-btn" href="/contact/">Talk to Security</a>
      </div>
    </div>
  </div>
</header>

<main class="mc-main">
  <div class="mc-container mc-content">
