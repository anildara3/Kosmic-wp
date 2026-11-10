<?php
/**
 * Single Service Template (Custom Post Type: service)
 *
 * Fully dynamic via WordPress Dashboard & ACF Free.
 *
 * @package Kosmic
 * @version 1.0.8
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $service_id = get_the_ID();
    $badge      = get_field('service_badge', $service_id) ?: get_post_meta($service_id, 'service_badge', true) ?: 'Flagship Program';
    $subtitle   = get_field('service_subtitle', $service_id) ?: get_post_meta($service_id, 'service_subtitle', true) ?: get_the_excerpt();
    $fee        = get_field('service_fee', $service_id) ?: get_post_meta($service_id, 'service_fee', true);
    $batch_info = get_field('service_batch_info', $service_id) ?: get_post_meta($service_id, 'service_batch_info', true);
    $variations = get_field('service_variations', $service_id) ?: get_post_meta($service_id, 'service_variations', true);
    $benefits   = get_field('service_benefits', $service_id) ?: get_post_meta($service_id, 'service_benefits', true);
    $img1       = get_field('service_inner_img_1', $service_id) ?: get_post_meta($service_id, 'service_inner_img_1', true);
    $img2       = get_field('service_inner_img_2', $service_id) ?: get_post_meta($service_id, 'service_inner_img_2', true);

    $main_img   = has_post_thumbnail() ? get_the_post_thumbnail_url($service_id, 'full') : kosmic_asset('img/service/service_details.jpg');
    $phone1     = kosmic_get_option('phone_1', '+91 97033 66311');
    $whatsapp   = kosmic_get_option('whatsapp_number', '919703366311');
    $services_url = kosmic_page_url('services-programs', '/services');
    $contact_url  = kosmic_page_url('contact-us', '/contact');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kosmic'); ?></a></li>
                <li><a href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Services &amp; Programs', 'kosmic'); ?></a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- Service Details Content + Sidebar Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="row">
            <!-- Main Content (8 cols) -->
            <div class="col-lg-8 mb-40 mb-lg-0">
                <div class="page-single">
                    <div class="page-single-img mb-30" style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                        <img src="<?php echo esc_url($main_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; object-fit: cover; max-height: 480px;">
                    </div>

                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-20">
                        <span class="badge" style="background-color: #EB0029; font-size: 13px; padding: 8px 16px; border-radius: 8px; font-weight: 700;"><?php echo esc_html($badge); ?></span>
                        <?php if (!empty($fee)) : ?>
                            <span class="badge" style="background-color: #6B2AE6; font-size: 13px; padding: 8px 16px; border-radius: 8px; font-weight: 700;"><?php echo esc_html($fee); ?></span>
                        <?php endif; ?>
                    </div>

                    <h2 class="service-title text-white mb-20" style="font-size: 32px; font-weight: 800; line-height: 1.35;"><?php the_title(); ?></h2>

                    <?php if (!empty($subtitle)) : ?>
                        <p class="service-subtitle text-white-50 lead mb-25" style="font-size: 18px; font-weight: 500; line-height: 1.6;"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($batch_info)) : ?>
                        <div class="service-batch-card d-flex align-items-center gap-3 p-3 mb-30" style="background: rgba(107, 42, 230, 0.12); border: 1px solid rgba(107, 42, 230, 0.3); border-radius: 12px;">
                            <i class="fa-solid fa-clock fs-4" style="color: #6B2AE6;"></i>
                            <div>
                                <span class="d-block text-white" style="font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;"><?php esc_html_e('Batch Timings &amp; Schedule', 'kosmic'); ?></span>
                                <span class="text-white-50" style="font-size: 15px; font-weight: 500;"><?php echo esc_html($batch_info); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="service-description text-white-50 mb-35" style="font-size: 16px; line-height: 1.85;">
                        <?php the_content(); ?>
                    </div>

                    <?php if (!empty($variations)) : ?>
                        <!-- Curriculum / Variations Breakdown -->
                        <div class="variations-section mb-40">
                            <?php echo wp_kses_post($variations); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Mid Article Images -->
                    <?php if (!empty($img1) || !empty($img2)) : ?>
                        <div class="row gy-3 mt-10 mb-40">
                            <?php if (!empty($img1)) : ?>
                                <div class="col-sm-6">
                                    <img src="<?php echo esc_url($img1); ?>" alt="<?php the_title_attribute(); ?>" style="border-radius: 14px; width: 100%; height: 230px; object-fit: cover; box-shadow: 0 6px 20px rgba(0,0,0,0.15);">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($img2)) : ?>
                                <div class="col-sm-6">
                                    <img src="<?php echo esc_url($img2); ?>" alt="<?php the_title_attribute(); ?>" style="border-radius: 14px; width: 100%; height: 230px; object-fit: cover; box-shadow: 0 6px 20px rgba(0,0,0,0.15);">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Key Program Benefits -->
                    <?php if (!empty($benefits)) :
                        $benefit_lines = array_filter(array_map('trim', explode("\n", $benefits)));
                        if (!empty($benefit_lines)) : ?>
                            <h3 class="service-benefits-title text-white mb-20" style="font-size: 24px; font-weight: 700;"><?php esc_html_e('Key Program Benefits:', 'kosmic'); ?></h3>
                            <ul class="service-benefits-list text-white-50 mb-40" style="list-style: none; padding-left: 0; line-height: 2.1; font-size: 15px;">
                                <?php foreach ($benefit_lines as $line) : ?>
                                    <li class="d-flex align-items-start gap-2 mb-2">
                                        <i class="fa-solid fa-circle-check text-danger mt-1 flex-shrink-0"></i>
                                        <span><?php echo esc_html($line); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif;
                    endif; ?>

                    <div class="d-flex flex-wrap gap-3 mt-4 pt-4" style="border-top: 1px solid rgba(255,255,255,0.08);">
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn"><?php esc_html_e('Book Free Trial Class', 'kosmic'); ?></a>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" class="th-btn white-btn"><i class="fa-solid fa-phone me-2"></i><?php esc_html_e('Call Studio', 'kosmic'); ?></a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener" class="th-btn blue-border-btn style3"><i class="fab fa-whatsapp me-2"></i><?php esc_html_e('WhatsApp Us', 'kosmic'); ?></a>
                    </div>
                </div>
            </div>

            <!-- Sidebar (4 cols) -->
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <!-- Widget 1: All Programs Navigation (Dynamic from CPT: service) -->
                    <div class="widget-card-dark">
                        <h4 class="widget-title-dark"><?php esc_html_e('All Training Programs', 'kosmic'); ?></h4>
                        <ul class="widget-service-list">
                            <?php
                            $all_services = get_posts(array(
                                'post_type'      => 'service',
                                'posts_per_page' => -1,
                                'orderby'        => 'meta_value_num menu_order title',
                                'meta_key'       => 'service_number',
                                'order'          => 'ASC',
                            ));
                            $current_id = get_the_ID();
                            foreach ($all_services as $s) :
                                $is_active = ($s->ID === $current_id) ? 'active' : '';
                                $num_badge = get_post_meta($s->ID, 'service_number', true);
                            ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($s->ID)); ?>" class="<?php echo esc_attr($is_active); ?>">
                                        <span class="cat-name"><?php echo esc_html($s->post_title); ?></span>
                                        <?php if (!empty($num_badge)) : ?>
                                            <span class="cat-count"><?php echo esc_html($num_badge); ?></span>
                                        <?php else : ?>
                                            <i class="fa-solid fa-arrow-right" style="font-size: 12px;"></i>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Widget 2: Studio Information -->
                    <div class="widget-card-dark">
                        <h4 class="widget-title-dark"><?php esc_html_e('Studio Information', 'kosmic'); ?></h4>
                        <div class="text-white-50" style="font-size: 14px; line-height: 1.8;">
                            <div class="mb-3">
                                <strong class="text-white d-block mb-1"><i class="fa-solid fa-location-dot text-danger me-2"></i>Padmarao Nagar (Secunderabad):</strong>
                                <span><?php echo esc_html(kosmic_get_option('branch1_address')); ?></span>
                            </div>
                            <div class="mb-3">
                                <strong class="text-white d-block mb-1"><i class="fa-solid fa-location-dot text-info me-2"></i>Shivam Road (DD Colony):</strong>
                                <span><?php echo esc_html(kosmic_get_option('branch2_address')); ?></span>
                            </div>
                            <div class="mb-3">
                                <strong class="text-white d-block mb-1"><i class="fa-solid fa-clock text-warning me-2"></i>Class Timings:</strong>
                                <span><?php echo esc_html(kosmic_get_option('hours_weekdays')); ?></span><br>
                                <span><?php echo esc_html(kosmic_get_option('hours_sundays')); ?></span>
                            </div>
                            <div>
                                <strong class="text-white d-block mb-1"><i class="fa-solid fa-phone text-success me-2"></i>Call Directly:</strong>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" class="text-white"><?php echo esc_html($phone1); ?></a>
                            </div>
                        </div>
                    </div>

                    <!-- Widget 3: Quick Demo Booking Callout -->
                    <div class="widget-card-dark" style="background: linear-gradient(135deg, rgba(107, 42, 230, 0.35) 0%, rgba(235, 0, 41, 0.35) 100%); border-color: #EB0029; text-align: center;">
                        <span class="badge mb-3" style="background-color: #EB0029; font-size: 12px; padding: 6px 14px; border-radius: 8px; font-weight: 700;"><?php esc_html_e('100% Free Demo', 'kosmic'); ?></span>
                        <h4 class="text-white mb-2" style="font-size: 22px; font-weight: 800;"><?php esc_html_e('Experience Kosmic Firsthand!', 'kosmic'); ?></h4>
                        <p class="text-white-50 mb-4" style="font-size: 13px;"><?php esc_html_e('Book a free trial demo class and meet Master Mahesh Babu.', 'kosmic'); ?></p>
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn w-100 mb-2"><?php esc_html_e('Book Free Demo Now', 'kosmic'); ?></a>
                        <a href="tel:+919703366311" class="text-white" style="font-size: 13px;"><i class="fa-solid fa-phone me-1 text-danger"></i> +91 9703366311</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<?php
endwhile;

get_footer();
