<?php
/* Template Name: Dashboard */
get_header();
?>

<div style="padding:20px">
  <h2>Cloud Usage Dashboard</h2>

  <?php
  $args = array(
    'post_type' => 'resource',
    'posts_per_page' => -1
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    $total = 0;

    while ($query->have_posts()) {
      $query->the_post();

      $cost = get_post_meta(get_the_ID(), 'cost', true);
      $cost = $cost ? (int)$cost : 0;
      $total += $cost;

      echo "<p><strong>" . get_the_title() . "</strong> — ₹" . $cost . "</p>";
    }

    echo "<h3>Total Monthly Cost: ₹$total</h3>";
  } else {
    echo "<p>No cloud resources found.</p>";
  }

  wp_reset_postdata();
  ?>
</div>

<?php get_footer(); ?>
