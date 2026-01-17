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
        <?php
  // Motorcade: Always render theme-asset header logo for consistent branding.
  // WP Custom Logo can be re-enabled later by reverting this patch.
  $mc_logo = esc_url( get_template_directory_uri() . '/assets/images/brand/motorcade-header-logo-dark.png' );
  echo '<a class="custom-logo-link" href="' . esc_url( home_url('/') ) . '" rel="home">'
     . '<img class="custom-logo" src="' . $mc_logo . '" alt="' . esc_attr( get_bloginfo('name') ) . '" width="160" height="48" />'
     . '</a>';
?>
        
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
 