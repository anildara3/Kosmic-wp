<?php
/**
 * Register Custom Post Types and Taxonomies for Kosmic Studio 4 Danz
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

function kosmic_register_custom_post_types() {

    // 1. Services & Programs CPT
    $service_labels = array(
        'name'               => esc_html__('Services & Programs', 'kosmic'),
        'singular_name'      => esc_html__('Service Program', 'kosmic'),
        'menu_name'          => esc_html__('Services', 'kosmic'),
        'add_new'            => esc_html__('Add New Service', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Service Program', 'kosmic'),
        'edit_item'          => esc_html__('Edit Service Program', 'kosmic'),
        'new_item'           => esc_html__('New Service Program', 'kosmic'),
        'view_item'          => esc_html__('View Service Program', 'kosmic'),
        'search_items'       => esc_html__('Search Services', 'kosmic'),
        'not_found'          => esc_html__('No services found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No services found in Trash', 'kosmic'),
    );

    $service_args = array(
        'labels'             => $service_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'programs', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-awards',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'),
    );
    register_post_type('service', $service_args);

    // 2. Instructors & Faculty CPT
    $instructor_labels = array(
        'name'               => esc_html__('Instructors & Faculty', 'kosmic'),
        'singular_name'      => esc_html__('Instructor', 'kosmic'),
        'menu_name'          => esc_html__('Instructors', 'kosmic'),
        'add_new'            => esc_html__('Add New Instructor', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Instructor', 'kosmic'),
        'edit_item'          => esc_html__('Edit Instructor', 'kosmic'),
        'new_item'           => esc_html__('New Instructor', 'kosmic'),
        'view_item'          => esc_html__('View Instructor', 'kosmic'),
        'search_items'       => esc_html__('Search Instructors', 'kosmic'),
        'not_found'          => esc_html__('No instructors found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No instructors found in Trash', 'kosmic'),
    );

    $instructor_args = array(
        'labels'             => $instructor_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'faculty', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'),
    );
    register_post_type('instructor', $instructor_args);

    // 3. Testimonials & Reviews CPT
    $testimonial_labels = array(
        'name'               => esc_html__('Testimonials', 'kosmic'),
        'singular_name'      => esc_html__('Testimonial', 'kosmic'),
        'menu_name'          => esc_html__('Testimonials', 'kosmic'),
        'add_new'            => esc_html__('Add New Testimonial', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Testimonial', 'kosmic'),
        'edit_item'          => esc_html__('Edit Testimonial', 'kosmic'),
        'new_item'           => esc_html__('New Testimonial', 'kosmic'),
        'view_item'          => esc_html__('View Testimonial', 'kosmic'),
        'search_items'       => esc_html__('Search Testimonials', 'kosmic'),
        'not_found'          => esc_html__('No testimonials found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No testimonials found in Trash', 'kosmic'),
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-format-quote',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'),
    );
    register_post_type('testimonial', $testimonial_args);

    // 4. Studio Gallery CPT
    $gallery_labels = array(
        'name'               => esc_html__('Studio Gallery', 'kosmic'),
        'singular_name'      => esc_html__('Gallery Item', 'kosmic'),
        'menu_name'          => esc_html__('Gallery', 'kosmic'),
        'add_new'            => esc_html__('Add New Photo', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Photo to Gallery', 'kosmic'),
        'edit_item'          => esc_html__('Edit Gallery Item', 'kosmic'),
        'new_item'           => esc_html__('New Gallery Item', 'kosmic'),
        'view_item'          => esc_html__('View Gallery Item', 'kosmic'),
        'search_items'       => esc_html__('Search Gallery', 'kosmic'),
        'not_found'          => esc_html__('No gallery items found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No gallery items found in Trash', 'kosmic'),
    );

    $gallery_args = array(
        'labels'             => $gallery_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-format-gallery',
        'show_in_rest'       => true,
        'supports'           => array('title', 'thumbnail', 'page-attributes', 'custom-fields'),
    );
    register_post_type('gallery_item', $gallery_args);

    // Register Gallery Categories Taxonomy
    $category_labels = array(
        'name'              => esc_html__('Gallery Categories', 'kosmic'),
        'singular_name'     => esc_html__('Gallery Category', 'kosmic'),
        'search_items'      => esc_html__('Search Categories', 'kosmic'),
        'all_items'         => esc_html__('All Categories', 'kosmic'),
        'parent_item'       => esc_html__('Parent Category', 'kosmic'),
        'parent_item_colon' => esc_html__('Parent Category:', 'kosmic'),
        'edit_item'         => esc_html__('Edit Category', 'kosmic'),
        'update_item'       => esc_html__('Update Category', 'kosmic'),
        'add_new_item'      => esc_html__('Add New Category', 'kosmic'),
        'new_item_name'     => esc_html__('New Category Name', 'kosmic'),
        'menu_name'         => esc_html__('Categories', 'kosmic'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'gallery-category'),
    );
    register_taxonomy('gallery_category', array('gallery_item'), $category_args);

    // 5. Pricing Plans CPT
    $pricing_labels = array(
        'name'               => esc_html__('Pricing Plans', 'kosmic'),
        'singular_name'      => esc_html__('Pricing Plan', 'kosmic'),
        'menu_name'          => esc_html__('Pricing Plans', 'kosmic'),
        'add_new'            => esc_html__('Add New Plan', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Pricing Plan', 'kosmic'),
        'edit_item'          => esc_html__('Edit Pricing Plan', 'kosmic'),
        'new_item'           => esc_html__('New Pricing Plan', 'kosmic'),
        'view_item'          => esc_html__('View Pricing Plan', 'kosmic'),
        'search_items'       => esc_html__('Search Plans', 'kosmic'),
        'not_found'          => esc_html__('No plans found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No plans found in Trash', 'kosmic'),
    );

    $pricing_args = array(
        'labels'             => $pricing_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-tickets-alt',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'page-attributes', 'custom-fields'),
    );
    register_post_type('pricing_plan', $pricing_args);

    // 6. Class Schedule CPT
    $schedule_labels = array(
        'name'               => esc_html__('Class Schedule', 'kosmic'),
        'singular_name'      => esc_html__('Schedule Slot', 'kosmic'),
        'menu_name'          => esc_html__('Class Schedule', 'kosmic'),
        'add_new'            => esc_html__('Add New Slot', 'kosmic'),
        'add_new_item'       => esc_html__('Add New Schedule Slot', 'kosmic'),
        'edit_item'          => esc_html__('Edit Schedule Slot', 'kosmic'),
        'new_item'           => esc_html__('New Schedule Slot', 'kosmic'),
        'view_item'          => esc_html__('View Schedule Slot', 'kosmic'),
        'search_items'       => esc_html__('Search Schedule', 'kosmic'),
        'not_found'          => esc_html__('No schedule slots found', 'kosmic'),
        'not_found_in_trash' => esc_html__('No schedule slots found in Trash', 'kosmic'),
    );

    $schedule_args = array(
        'labels'             => $schedule_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 10,
        'menu_icon'          => 'dashicons-calendar-alt',
        'show_in_rest'       => true,
        'supports'           => array('title', 'page-attributes', 'custom-fields'),
    );
    register_post_type('class_schedule', $schedule_args);
}
add_action('init', 'kosmic_register_custom_post_types');

