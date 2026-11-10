<?php
/**
 * Template Name: Class Schedule Page
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact_url = kosmic_page_url('contact-us', '/contact');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>Class Schedule</li>
            </ul>
        </div>
    </div>
</div>

<!-- Schedule Section (Dynamic from CPT: class_schedule) -->
<div class="space bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Flexible Batch Timings</span>
            <h2 class="sec-title text-white">Morning &amp; Evening Batches for Both Studios</h2>
            <p class="text-white-50 mx-auto" style="max-width: 650px;">Choose between Padmarao Nagar (Secunderabad) and Shivam Road (Hyderabad) studios. All studios are 100% air-conditioned.</p>
        </div>

        <div class="schedule-table-wrap table-responsive">
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Timing</th>
                        <th>Program / Style</th>
                        <th>Days</th>
                        <th>Instructor</th>
                        <th>Batch Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $schedule_query = new WP_Query(array(
                        'post_type'      => 'class_schedule',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order date',
                        'order'          => 'ASC',
                    ));

                    if ($schedule_query->have_posts()) :
                        while ($schedule_query->have_posts()) :
                            $schedule_query->the_post();
                            $slot_id   = get_the_ID();
                            $time      = get_field('schedule_time') ?: '06:00 AM – 07:00 AM';
                            $days      = get_field('schedule_days') ?: 'Mon – Fri';
                            $inst      = get_field('schedule_instructor') ?: 'Faculty';
                            $badge     = get_field('schedule_badge') ?: 'All Levels';
                            $style     = get_field('schedule_badge_style') ?: 'badge-batch';
                    ?>
                            <tr>
                                <td><span class="time-slot"><i class="fa-regular fa-clock"></i> <?php echo esc_html($time); ?></span></td>
                                <td><strong class="text-white"><?php the_title(); ?></strong></td>
                                <td><?php echo esc_html($days); ?></td>
                                <td><?php echo esc_html($inst); ?></td>
                                <td><span class="<?php echo esc_attr($style); ?>"><?php echo esc_html($badge); ?></span></td>
                                <td><a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn btn-sm" style="padding: 8px 16px; font-size: 12px;">Book Batch</a></td>
                            </tr>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
get_footer();
