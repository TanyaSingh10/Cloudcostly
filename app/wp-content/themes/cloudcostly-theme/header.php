<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header style="display:flex; justify-content:space-between; padding:15px; background:#111827; color:white;">
  <h1>CloudCostly</h1>

  <?php
  wp_nav_menu([
    'theme_location' => 'primary',
    'container' => false
  ]);
  ?>
</header>
