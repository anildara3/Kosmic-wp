<?php
/**
 * Template Name: Services & Programs Overview
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone1   = kosmic_get_option('phone_1', '+91 97033 66311');
$whatsapp = kosmic_get_option('whatsapp_number', '919703366311');
$contact_url = kosmic_page_url('contact-us', '/contact');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>Services &amp; Programs</li>
            </ul>
        </div>
    </div>
</div>

<!-- Section Intro -->
<section class="space-top bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">★ Top-Rated Academy in Hyderabad &amp; Secunderabad</span>
            <h2 class="sec-title text-white">Comprehensive Dance, Fitness &amp; Fine Arts Training</h2>
            <p class="text-white-50" style="max-width: 720px; margin: 0 auto; font-size: 16px; line-height: 1.7;">
                Whether you want to learn high-energy Tollywood choreography, lose weight with our signature 5-Days-5-Variation Zumba workouts, master Kuchipudi classical mudras, or nurture your child's gymnastic flexibility &amp; mental math speed, Kosmic Studio 4 Danz provides personalized attention in fully air-conditioned studios.
            </p>
        </div>
    </div>
</section>

<!-- Services Grid Section (Dynamic from CPT: service) -->
<section class="space bg-dark" id="service-grid">
    <div class="container">
        <div class="row gy-4">
            <?php
            $services_query = new WP_Query(array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'orderby'        => 'meta_value_num menu_order title',
                'meta_key'       => 'service_number',
                'order'          => 'ASC',
            ));

            if ($services_query->have_posts()) :
                $counter = 0;
                while ($services_query->have_posts()) :
                    $services_query->the_post();
                    $counter++;
                    $s_id     = get_the_ID();
                    $num      = get_field('service_number', $s_id) ?: get_post_meta($s_id, 'service_number', true) ?: sprintf('%02d', $counter);
                    $icon     = get_field('service_icon', $s_id) ?: get_post_meta($s_id, 'service_icon', true) ?: kosmic_asset('img/icon/service_1_' . (($counter % 3) + 1) . '.svg');
                    $subtitle = get_field('service_subtitle', $s_id) ?: get_post_meta($s_id, 'service_subtitle', true) ?: wp_trim_words(get_the_excerpt(), 18);
                    $badge    = get_field('service_badge', $s_id) ?: get_post_meta($s_id, 'service_badge', true);
                    $fee      = get_field('service_fee', $s_id) ?: get_post_meta($s_id, 'service_fee', true);
                    $link     = get_permalink();
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card-item">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-20">
                                    <div class="service-icon-box">
                                        <img src="<?php echo esc_url($icon); ?>" alt="<?php the_title_attribute(); ?>" style="max-width: 48px; max-height: 48px;">
                                    </div>
                                    <div class="badge-num"><?php echo esc_html($num); ?></div>
                                </div>

                                <!-- <div class="d-flex flex-wrap gap-2 mb-15">
                                    <//?php if (!empty($badge)) : ?>
                                        <span class="badge" style="background-color: #EB0029; font-size: 11px; padding: 5px 10px; border-radius: 6px;"><?php echo esc_html($badge); ?></span>
                                    <//?php endif; ?>
                                    <//?php if (!empty($fee)) : ?>
                                        <span class="badge" style="background-color: #6B2AE6; font-size: 11px; padding: 5px 10px; border-radius: 6px;"><?php echo esc_html($fee); ?></span>
                                    <//?php endif; ?>
                                </div> -->

                                <h3 class="box-title text-white mb-15" style="font-size: 22px;">
                                    <a href="<?php echo esc_url($link); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-white-50 mb-20" style="font-size: 15px; line-height: 1.6;">
                                    <?php echo esc_html($subtitle); ?>
                                </p>
                            </div>
                            <a href="<?php echo esc_url($link); ?>" class="th-btn blue-border-btn style3 w-100 text-center">Explore Program &amp; Enroll</a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Why Choose Kosmic Studio 4 Danz -->
<section class="space-bottom bg-dark">
    <div class="container">
        <div class="cta-area-three p-5" data-bg-src="<?php echo kosmic_asset('img/bg/cta_1_2.png'); ?>" style="border-radius: 20px; background-size: cover;">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <span class="sub-title style1 text-warning mb-10 d-inline-block">Why Train With Kosmic Studio 4 Danz?</span>
                    <h2 class="sec-title text-white mb-20">15+ Years of Excellence &bull; 3,000+ Dancers Created</h2>
                    <p class="text-white-50 mb-30" style="font-size: 16px; line-height: 1.7;">
                        Trained for 3 years under Tollywood legend Lawrence Master, C. Mahesh Babu brings authentic cinematic flair, strict technique, and a friendly, encouraging environment to every student. Experience fully air-conditioned studios with shock-absorbing wooden floors and top-tier sound acoustics.
                    </p>
                    <div class="row g-3 text-white">
                        <div class="col-sm-6">
                            <p class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i>Fully Air-Conditioned Studios</p>
                            <p class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i>Flexible Morning &amp; Evening Batches</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i>Separate Ladies &amp; Kids Batches</p>
                            <p class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i>State &amp; National Award-Winning Studio</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center mt-4 mt-lg-0">
                    <div class="p-4" style="background: rgba(22, 25, 33, 0.9); border-radius: 16px; border: 1px solid rgba(235, 0, 41, 0.4);">
                        <h3 class="text-white mb-10" style="font-size: 22px;">Book Free Trial Class</h3>
                        <p class="text-white-50 mb-20" style="font-size: 14px;">Speak directly with Mahesh Master and our instructors.</p>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" class="th-btn red-btn w-100 mb-2"><i class="fa-solid fa-phone me-2"></i>Call: <?php echo esc_html($phone1); ?></a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener" class="th-btn white-btn w-100"><i class="fab fa-whatsapp me-2"></i>WhatsApp Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Two Studio Locations -->
<section class="space-bottom bg-dark">
    <div class="container">
        <div class="title-area text-center mb-40">
            <span class="sub-title style1">Our Studio Locations</span>
            <h2 class="sec-title text-white">Visit Our A/C Dance Studios</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-6">
                <div class="p-4" style="border: 1px solid rgba(107, 42, 230, 0.4); border-radius: 16px; background: rgba(26, 30, 40, 0.9);">
                    <div class="d-flex align-items-center mb-20">
                        <i class="fa-solid fa-location-dot fs-2 text-warning me-3"></i>
                        <div>
                            <span class="badge bg-primary mb-1">Head Office Branch</span>
                            <h3 class="text-white mb-0" style="font-size: 22px;"><?php echo esc_html(kosmic_get_option('branch1_name')); ?></h3>
                        </div>
                    </div>
                    <p class="text-white-50 mb-15" style="font-size: 15px;">
                        <?php echo esc_html(kosmic_get_option('branch1_address')); ?>
                    </p>
                    <p class="text-white mb-20">
                        <i class="fa-solid fa-phone text-warning me-2"></i><?php echo esc_html(kosmic_get_option('branch1_phone')); ?>
                    </p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn style3 w-100 text-center">Book Class at Padmarao Nagar</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4" style="border: 1px solid rgba(107, 42, 230, 0.4); border-radius: 16px; background: rgba(26, 30, 40, 0.9);">
                    <div class="d-flex align-items-center mb-20">
                        <i class="fa-solid fa-location-dot fs-2 text-warning me-3"></i>
                        <div>
                            <span class="badge bg-success mb-1">New Branch</span>
                            <h3 class="text-white mb-0" style="font-size: 22px;"><?php echo esc_html(kosmic_get_option('branch2_name')); ?></h3>
                        </div>
                    </div>
                    <p class="text-white-50 mb-15" style="font-size: 15px;">
                        <?php echo esc_html(kosmic_get_option('branch2_address')); ?>
                    </p>
                    <p class="text-white mb-20">
                        <i class="fa-solid fa-phone text-warning me-2"></i><?php echo esc_html(kosmic_get_option('branch2_phone')); ?>
                    </p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn style3 w-100 text-center">Book Class at Shivam Road</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
