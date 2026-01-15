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
