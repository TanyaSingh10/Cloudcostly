<?php
/*
Plugin Name: CloudCostly Core
Description: Adds cloud resources and cost meta field
*/

function cloudcostly_resource_post_type() {
  register_post_type('resource', [
    'public' => true,
    'label' => 'Cloud Resources',
    'supports' => ['title'],
    'menu_icon' => 'dashicons-cloud'
  ]);
}
add_action('init', 'cloudcostly_resource_post_type');


/* Add Cost Meta Box */
function cloudcostly_add_cost_metabox() {
  add_meta_box(
    'cloudcostly_cost',
    'Monthly Cost (₹)',
    'cloudcostly_cost_callback',
    'resource'
  );
}
add_action('add_meta_boxes', 'cloudcostly_add_cost_metabox');

function cloudcostly_cost_callback($post) {
  $value = get_post_meta($post->ID, 'cost', true);
  echo '<input type="number" name="cloudcostly_cost" value="' . esc_attr($value) . '" />';
}

function cloudcostly_save_cost($post_id) {
  if (isset($_POST['cloudcostly_cost'])) {
    update_post_meta($post_id, 'cost', sanitize_text_field($_POST['cloudcostly_cost']));
  }
}
add_action('save_post', 'cloudcostly_save_cost');
