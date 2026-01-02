<?php
function cloudcostly_theme_setup() {
  add_theme_support('title-tag');

  register_nav_menus([
    'primary' => 'Primary Menu'
  ]);
}

function cloudcostly_enqueue_assets() {
  wp_enqueue_style(
    'cloudcostly-style',
    get_stylesheet_uri(),
    [],
    time()
  );
}

add_action('after_setup_theme', 'cloudcostly_theme_setup');
add_action('wp_enqueue_scripts', 'cloudcostly_enqueue_assets');
