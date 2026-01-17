<?php
if (!defined('ABSPATH')) { exit; }

function motorcade_trust_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height' => 120,
    'width'  => 400,
    'flex-height' => true,
    'flex-width'  => true,
  ));

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'motorcade-trust'),
    'footer'  => __('Footer Menu', 'motorcade-trust'),
  ));
}
add_action('after_setup_theme', 'motorcade_trust_setup');

function motorcade_trust_assets() {
  wp_enqueue_style('motorcade-trust-style', get_stylesheet_uri(), array(), '1.1.1');
}
add_action('wp_enqueue_scripts', 'motorcade_trust_assets');
/* BEGIN MOTORCADE_BRANDING_CUSTOMIZER */
if ( ! function_exists( 'motorcade_register_branding_customizer' ) ) {
  function motorcade_register_branding_customizer( $wp_customize ) {

    $wp_customize->add_section(
      'motorcade_branding',
      array(
        'title'       => __( 'Motorcade Branding', 'motorcade-trust' ),
        'priority'    => 30,
        'description' => __( 'Upload your badge + optional wordmark and toggle how they appear in the header.', 'motorcade-trust' ),
      )
    );

    // Primary logo (badge/shield)
    $wp_customize->add_setting(
      'motorcade_brand_logo_primary',
      array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'motorcade_brand_logo_primary',
        array(
          'label'     => __( 'Primary logo (badge/shield)', 'motorcade-trust' ),
          'section'   => 'motorcade_branding',
          'mime_type' => 'image',
        )
      )
    );

    // Secondary logo (optional wordmark)
    $wp_customize->add_setting(
      'motorcade_brand_logo_secondary',
      array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'motorcade_brand_logo_secondary',
        array(
          'label'       => __( 'Secondary logo (optional wordmark)', 'motorcade-trust' ),
          'description' => __( 'Upload a wordmark image if you want “badge + wordmark” mode.', 'motorcade-trust' ),
          'section'     => 'motorcade_branding',
          'mime_type'   => 'image',
        )
      )
    );

    // Display mode toggle
    $wp_customize->add_setting(
      'motorcade_brand_logo_mode',
      array(
        'default'           => 'primary_secondary',
        'sanitize_callback' => function( $value ) {
          $allowed = array( 'primary', 'primary_secondary' );
          return in_array( $value, $allowed, true ) ? $value : 'primary_secondary';
        },
      )
    );
    $wp_customize->add_control(
      'motorcade_brand_logo_mode',
      array(
        'type'    => 'radio',
        'label'   => __( 'Header logo mode', 'motorcade-trust' ),
        'section' => 'motorcade_branding',
        'choices' => array(
          'primary'           => __( 'Badge only', 'motorcade-trust' ),
          'primary_secondary' => __( 'Badge + wordmark', 'motorcade-trust' ),
        ),
      )
    );

    // Sizing
    $wp_customize->add_setting(
      'motorcade_brand_logo_height',
      array(
        'default'           => 44,
        'sanitize_callback' => 'absint',
      )
    );
    $wp_customize->add_control(
      'motorcade_brand_logo_height',
      array(
        'type'        => 'number',
        'label'       => __( 'Logo height (px)', 'motorcade-trust' ),
        'description' => __( 'Applies to the primary logo; secondary is scaled automatically.', 'motorcade-trust' ),
        'section'     => 'motorcade_branding',
        'input_attrs' => array(
          'min'  => 28,
          'max'  => 72,
          'step' => 1,
        ),
      )
    );
  }
}
add_action( 'customize_register', 'motorcade_register_branding_customizer' );

if ( ! function_exists( 'motorcade_render_brandbar' ) ) {
  function motorcade_render_brandbar() {
    // Front-end only
    if ( is_admin() ) {
      return;
    }

    $primary_id   = absint( get_theme_mod( 'motorcade_brand_logo_primary', 0 ) );
    $secondary_id = absint( get_theme_mod( 'motorcade_brand_logo_secondary', 0 ) );
    $mode         = get_theme_mod( 'motorcade_brand_logo_mode', 'primary_secondary' );
    $height       = max( 28, min( 72, absint( get_theme_mod( 'motorcade_brand_logo_height', 44 ) ) ) );

    $has_primary   = $primary_id > 0;
    $has_secondary = $secondary_id > 0 && $mode === 'primary_secondary';

    echo '<div class="motorcade-brandbar" role="banner">';
    echo '<div class="motorcade-brandbar__inner">';

    echo '<a class="motorcade-brandbar__home" href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr__( 'Home', 'motorcade-trust' ) . '">';

    if ( $has_primary ) {
      echo wp_get_attachment_image(
        $primary_id,
        'full',
        false,
        array(
          'class'    => 'motorcade-brandbar__logo motorcade-brandbar__logo--primary',
          'style'    => 'height:' . esc_attr( $height ) . 'px;width:auto;',
          'loading'  => 'eager',
          'decoding' => 'async',
        )
      );
    } else {
      echo '<span class="motorcade-brandbar__text">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
    }

    if ( $has_secondary ) {
      $secondary_height = max( 20, (int) round( $height * 0.72 ) );
      echo wp_get_attachment_image(
        $secondary_id,
        'full',
        false,
        array(
          'class'    => 'motorcade-brandbar__logo motorcade-brandbar__logo--secondary',
          'style'    => 'height:' . esc_attr( $secondary_height ) . 'px;width:auto;',
          'loading'  => 'eager',
          'decoding' => 'async',
        )
      );
    }

    echo '</a>';
    echo '</div></div>';
  }
}
add_action( 'wp_body_open', 'motorcade_render_brandbar', 5 );
/* END MOTORCADE_BRANDING_CUSTOMIZER */
// MOTORCADE_BRAND_CUSTOMIZER BEGIN
/**
 * Motorcade Branding — Shield-only assets
 * Managed by Ansible (Playbook 30). Do not edit inside markers.
 */
add_action('customize_register', function($wp_customize) {
  $section = 'motorcade_branding';

  if (!$wp_customize->get_section($section)) {
    $wp_customize->add_section($section, [
      'title'       => 'Motorcade Branding',
      'priority'    => 25,
      'description' => 'Shield-only branding (repo-managed).',
    ]);
  }

  // Show always-on brand bar (recommended for recognition / trust)
  $wp_customize->add_setting('motorcade_brandbar_enabled', [
    'default'           => true,
    'sanitize_callback' => function($v){ return (bool)$v; }
  ]);
  $wp_customize->add_control('motorcade_brandbar_enabled', [
    'type'    => 'checkbox',
    'section' => $section,
    'label'   => 'Show Brand Bar (shield icon in header)',
  ]);

  // Shield badge URL (image control)
  $wp_customize->add_setting('motorcade_logo_badge_url', [
    'default'           => 'https://motorcade.vip/wp-content/uploads/motorcade/branding/motorcade-badge-64.png',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'motorcade_logo_badge_url', [
    'label'   => 'Shield badge image',
    'section' => $section,
    'settings'=> 'motorcade_logo_badge_url',
  ]));

  // Header logo (shield only)
  $wp_customize->add_setting('motorcade_logo_header_url', [
    'default'           => 'https://motorcade.vip/wp-content/uploads/motorcade/branding/motorcade-header-logo-light.png',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'motorcade_logo_header_url', [
    'label'   => 'Header logo (shield)',
    'section' => $section,
    'settings'=> 'motorcade_logo_header_url',
  ]));
});

/**
 * Render Motorcade shield logo.
 */
function motorcade_brand_logo_html($args = []) {
  $defaults = [
    'class' => 'mc-brand-logo',
    'alt'   => 'Motorcade Security Solutions',
  ];
  $args = array_merge($defaults, is_array($args) ? $args : []);

  $src = get_theme_mod('motorcade_logo_header_url', 'https://motorcade.vip/wp-content/uploads/motorcade/branding/motorcade-header-logo-light.png');
  $src = esc_url($src);
  return '<img class="'.esc_attr($args['class']).'" src="'.$src.'" alt="'.esc_attr($args['alt']).'" loading="eager" decoding="async" />';
}

/**
 * Brand Bar: guarantees visible branding even if header template doesn't output the Custom Logo.
 * Shield-only; no wordmark text.
 */
add_action('wp_body_open', function(){
  if (!get_theme_mod('motorcade_brandbar_enabled', true)) return;

  $logo = motorcade_brand_logo_html(['class' => 'mc-brand-logo mc-brand-logo--bar']);
  $home = esc_url(home_url('/'));
  echo '<div class="mc-brandbar" role="banner">'
     . '<a class="mc-brandbar__link" href="'.$home.'" rel="home" aria-label="Motorcade">'
     . $logo
     . '</a>'
     . '</div>';
}, 5);

// If the theme uses the WordPress Custom Logo, replace it with our shield asset.
add_filter('get_custom_logo', function($html){
  if (!$html) return $html;
  $logo = motorcade_brand_logo_html(['class' => 'custom-logo']);
  $home = esc_url(home_url('/'));
  return '<a href="'.$home.'" class="custom-logo-link mc-brand-link" rel="home" aria-label="Motorcade">'.$logo.'</a>';
}, 20);
// MOTORCADE_BRAND_CUSTOMIZER END
// MOTORCADE_FAVICON BEGIN
/**
 * Motorcade Favicon / Site Icon (Deterministic, repo-managed)
 * Managed by Ansible (Playbook 31). Do not edit inside markers.
 */
add_action('wp_head', function () {
  $base = 'https://motorcade.vip/wp-content/uploads/motorcade/branding';
  $icon512 = esc_url($base . '/motorcade-site-icon-512.png');
  $badge256 = esc_url($base . '/motorcade-badge-256.png');
  echo "\n<link rel=\"icon\" href=\"{$badge256}\" sizes=\"256x256\">\n";
  echo "<link rel=\"icon\" href=\"{$icon512}\" sizes=\"512x512\">\n";
  echo "<link rel=\"apple-touch-icon\" href=\"{$icon512}\" sizes=\"512x512\">\n";
}, 1);
// MOTORCADE_FAVICON END
/* MOTORCADE_HEADER_BRANDING_OVERRIDE BEGIN */
/**
 * Motorcade Header Branding Override
 * Managed by Ansible (Playbook 31). Do not edit inside markers.
 *
 * Purpose:
 * - Provide a working toggle for "Badge only" vs "Badge + Wordmark"
 * - Provide a working size/scale control
 * - Avoid unreadable baked-in wordmark images by rendering text cleanly
 * - Keep branding calm, clear, and trust-forward.
 */
add_action('customize_register', function($wp_customize){
  $section = 'motorcade_branding';

  // Ensure section exists (created by Playbook 30, but we don't assume ordering)
  if (!$wp_customize->get_section($section)) {
    $wp_customize->add_section($section, [
      'title'       => 'Motorcade Branding',
      'priority'    => 25,
      'description' => 'Header logo options (Ansible-managed).',
    ]);
  }

  // Header mode (badge vs combo)
  $wp_customize->add_setting('motorcade_header_brand_mode', [
    'default'           => 'combo',
    'sanitize_callback' => function($v){
      return in_array($v, ['badge','combo'], true) ? $v : 'combo';
    }
  ]);
  $wp_customize->add_control('motorcade_header_brand_mode', [
    'type'    => 'radio',
    'section' => $section,
    'label'   => 'Header branding',
    'choices' => [
      'badge' => 'Logo only (badge)',
      'combo' => 'Logo + wordmark (recommended)',
    ],
    'priority' => 3,
  ]);

  // Scale (percentage)
  $wp_customize->add_setting('motorcade_header_logo_scale', [
    'default'           => 125,
    'sanitize_callback' => function($v){
      $v = intval($v);
      if ($v < 90) $v = 90;
      if ($v > 180) $v = 180;
      return $v;
    }
  ]);
  $wp_customize->add_control('motorcade_header_logo_scale', [
    'type'        => 'range',
    'section'     => $section,
    'label'       => 'Header logo size',
    'input_attrs' => [
      'min'  => 90,
      'max'  => 180,
      'step' => 5,
    ],
    'priority' => 4,
  ]);
}, 20);

/**
 * Replace theme custom logo output with Motorcade header branding (badge or badge+wordmark).
 * We run AFTER Playbook 30's filter so this setting always takes effect.
 */
add_filter('get_custom_logo', function($html){
  $badge = get_theme_mod('motorcade_logo_badge_url', '');
  if (!$badge) return $html;

  $mode  = get_theme_mod('motorcade_header_brand_mode', 'combo');
  $scale = intval(get_theme_mod('motorcade_header_logo_scale', 110));
  if ($scale < 90) $scale = 90;
  if ($scale > 150) $scale = 150;

  $home = esc_url(home_url('/'));
  $badge = esc_url($badge);

  $style = '--mc-header-scale: '.$scale.';';

  // Badge only
  if ($mode === 'badge') {
    return '<a href="'.$home.'" class="custom-logo-link mc-headerbrand" rel="home" aria-label="Motorcade" style="'.$style.'">'
         . '<img class="custom-logo mc-headerbrand__badge" src="'.$badge.'" alt="Motorcade" loading="eager" decoding="async" />'
         . '</a>';
  }

  // Combo (badge + wordmark text)
  return '<a href="'.$home.'" class="custom-logo-link mc-headerbrand mc-headerbrand--combo" rel="home" aria-label="Motorcade" style="'.$style.'">'
       . '<img class="custom-logo mc-headerbrand__badge" src="'.$badge.'" alt="Motorcade" loading="eager" decoding="async" />'
       . '<span class="mc-headerbrand__wordmark" aria-hidden="true">'
       .   '<span class="mc-headerbrand__name">MOTORCADE</span>'
       .   '<span class="mc-headerbrand__tag">SECURITY SOLUTIONS</span>'
       . '</span>'
       . '</a>';
}, 99);
/* MOTORCADE_HEADER_BRANDING_OVERRIDE END */
// MOTORCADE_BRAND_OVERRIDE31 BEGIN
/**
 * Motorcade Branding — Header render override (Playbook 31)
 * Purpose: ensure the header honors Motorcade Customizer toggles and size controls.
 * Managed by Ansible. Do not edit inside markers.
 */
if (!function_exists('motorcade_brand__normalized_mode')) {
  function motorcade_brand__normalized_mode() {
    // Try multiple keys (we've had UI duplicates over time).
    $candidates = [
      'motorcade_logo_mode',
      'motorcade_header_branding',
      'motorcade_brand_header_mode',
      'motorcade_logo_variant',
    ];
    $raw = '';
    foreach ($candidates as $k) {
      $v = get_theme_mod($k, '');
      if (is_string($v) && $v !== '') { $raw = $v; break; }
    }
    $raw = strtolower(trim((string)$raw));

    // Normalize to: 'badge' or 'badge_wordmark'
    $badge_vals = ['badge', 'badge_only', 'logo_only', 'logo only', 'logo', 'shield'];
    $bw_vals    = ['badge_wordmark', 'badge+wordmark', 'badge + wordmark', 'logo+wordmark', 'logo + wordmark', 'wordmark', 'combo', 'header_combo', 'logo + wordmark (recommended)'];

    if (in_array($raw, $badge_vals, true)) return 'badge';
    if (in_array($raw, $bw_vals, true)) return 'badge_wordmark';

    // Safest default for brand recognition: badge + wordmark
    return 'badge_wordmark';
  }
}

if (!function_exists('motorcade_brand__header_logo_html')) {
  function motorcade_brand__header_logo_html() {
    $mode  = motorcade_brand__normalized_mode();

    $badge = get_theme_mod('motorcade_logo_badge_url', '');
    $word  = get_theme_mod('motorcade_logo_wordmark_url', '');
    $combo = get_theme_mod('motorcade_logo_header_combo_url', '');

    // Size controls (support multiple keys)
    $size_pct = intval(get_theme_mod('motorcade_logo_size', 0));
    if ($size_pct <= 0) $size_pct = intval(get_theme_mod('motorcade_header_logo_size', 0));

    $height_px = intval(get_theme_mod('motorcade_logo_height', 0));
    if ($height_px <= 0) $height_px = intval(get_theme_mod('motorcade_header_logo_height', 0));
    if ($height_px <= 0) $height_px = 44; // default

    // If percent is provided, scale height around a sane base.
    if ($size_pct > 0) {
      $base = 44;
      $height_px = intval(round($base * ($size_pct / 100.0)));
      if ($height_px < 28) $height_px = 28;
      if ($height_px > 84) $height_px = 84;
    }

    $badge = esc_url($badge);
    $word  = esc_url($word);
    $combo = esc_url($combo);

    $alt = 'Motorcade Security Solutions';

    // Badge-only: single shield.
    if ($mode === 'badge') {
      $src = $badge ?: $combo ?: $word;
      if (!$src) return '';
      $style = 'height:' . intval($height_px) . 'px;width:auto;max-height:' . intval($height_px) . 'px;display:block;';
      return '<img class="mc-brand-img mc-brand-badge" src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" style="' . esc_attr($style) . '" loading="eager" decoding="async" />';
    }

    // Badge + wordmark: render as TWO assets (prevents baked-in overlap in combo files)
    if ($badge && $word) {
      $badge_h = $height_px;
      $word_h  = intval(round($height_px * 0.60));
      if ($word_h < 16) $word_h = 16;

      $badge_style = 'height:' . intval($badge_h) . 'px;width:auto;max-height:' . intval($badge_h) . 'px;display:block;';
      $word_style  = 'height:' . intval($word_h)  . 'px;width:auto;max-height:' . intval($word_h)  . 'px;display:block;';

      return '<span class="mc-brand-lockup" aria-label="' . esc_attr($alt) . '">' .
               '<img class="mc-brand-img mc-brand-badge" src="' . $badge . '" alt="" aria-hidden="true" style="' . esc_attr($badge_style) . '" loading="eager" decoding="async" />' .
               '<img class="mc-brand-img mc-brand-wordmark" src="' . $word  . '" alt="' . esc_attr($alt) . '" style="' . esc_attr($word_style) . '" loading="eager" decoding="async" />' .
             '</span>';
    }

    // Fallback: if only one asset exists, use combo or whichever is available.
    $src = $combo ?: $word ?: $badge;
    if (!$src) return '';
    $style = 'height:' . intval($height_px) . 'px;width:auto;max-height:' . intval($height_px) . 'px;display:block;';
    return '<img class="mc-brand-img" src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" style="' . esc_attr($style) . '" loading="eager" decoding="async" />';
  }
}


// Strongest possible override: replace Custom Logo output with our computed HTML honoring mode/size.
add_filter('get_custom_logo', function($html){
  $logo = motorcade_brand__header_logo_html();
  if (!$logo) return $html;

  $home = esc_url(home_url('/'));
  return '<a href="' . $home . '" class="custom-logo-link mc-brand-link" rel="home" aria-label="Motorcade">' . $logo . '</a>';
}, 999);

// Header CSS: avoid overlap, keep readable, never "double print" site title next to logo.
add_action('wp_enqueue_scripts', function(){
  $css = '
    .mc-header .custom-logo-link.mc-brand-link { display:flex; align-items:center; gap:12px; line-height:1; }
    .mc-header .mc-brand-lockup { display:flex; align-items:center; gap:10px; }
    .mc-header .custom-logo-link img, .mc-header img.mc-brand-img { height:auto; max-width:100%; }

    /* Hide theme-printed title when our branding is active */
    .mc-header .mc-brand .site-title,
    .mc-header .mc-brand .mc-site-title,
    .mc-header .site-branding .site-title { display:none !important; }

  ';
  if (function_exists('wp_add_inline_style')) {
    wp_add_inline_style('motorcade-trust-style', $css);
  }
}, 50);
// MOTORCADE_BRAND_OVERRIDE31 END
// BEGIN MC-RISK-DOM-HOOK (36o) BEGIN // END MC-RISK-DOM-HOOK (36o)
add_action('wp_enqueue_scripts', function () {
  // Risk section DOM hook (adds .mc-risk class at runtime)
  wp_enqueue_script(
    'mc-risk-dom-hook',
    get_stylesheet_directory_uri() . '/assets/js/mc_risk_dom_hook.js',
    array(),
    null,
    true
  );
});
// BEGIN MC-RISK-DOM-HOOK (36o) END // END MC-RISK-DOM-HOOK (36o)
