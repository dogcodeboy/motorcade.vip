<?php if (!defined('ABSPATH')) { exit; } ?>
<?php
$mc_brandbar_enabled = (bool) get_theme_mod('motorcade_brandbar_enabled', true);
$mc_has_logo = (function_exists('has_custom_logo') && has_custom_logo());
?>
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
        <?php if (!$mc_brandbar_enabled && !$mc_has_logo): ?>
          <div class="mc-brand-title"><?php bloginfo('name'); ?></div>
        <?php else: ?>
          <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
        <?php endif; ?>
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
        <a class="mc-btn mc-btn-ghost" href="/security-assessment/">Request an Assessment</a>
        <a class="mc-btn" href="/contact/">Talk to Security</a>
      </div>
    </div>
  </div>
</header>

<main class="mc-main">
  <div class="mc-container mc-content">
<!-- BEGIN MOTORCADE_BRAND_HEADER -->
<?php
/**
 * Motorcade Brand Header (managed)
 * Uses WP custom logo if set; falls back to theme asset logo.
 */
?>
<div class="mc-brand">
  <a class="mc-brand__link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Motorcade Security Solutions">
    <?php if (function_exists('has_custom_logo') && has_custom_logo()): ?>
      <?php the_custom_logo(); ?>
    <?php else: ?>
      <img class="mc-brand__logo" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/motorcade-shield.png'); ?>" alt="Motorcade Security Solutions">
    <?php endif; ?>            </a>
</div>
<!-- END MOTORCADE_BRAND_HEADER -->
