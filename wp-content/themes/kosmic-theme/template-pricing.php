<?php
/**
 * Template Name: Pricing & Fee Structure
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
                <li>Pricing Plans</li>
            </ul>
        </div>
    </div>
</div>

<!-- Pricing Cards Section (Dynamic from CPT: pricing_plan) -->
<div class="space bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Transparent Studio Pricing</span>
            <h2 class="sec-title text-white">Simple, Affordable Monthly Dance &amp; Fitness Passes</h2>
            <p class="text-white-50 mx-auto" style="max-width: 650px;">No hidden charges. Fully air-conditioned studios with professional Tollywood instruction, flexible morning &amp; evening batches, and ladies-only options.</p>
        </div>

        <div class="row gy-4 justify-content-center">
            <?php
            $pricing_query = new WP_Query(array(
                'post_type'      => 'pricing_plan',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ));

            if ($pricing_query->have_posts()) :
                while ($pricing_query->have_posts()) :
                    $pricing_query->the_post();
                    $plan_id   = get_the_ID();
                    $subtitle  = get_field('plan_subtitle');
                    $price     = get_field('plan_price') ?: '₹2,500';
                    $period    = get_field('plan_period') ?: '/ month';
                    $featured  = get_field('plan_featured');
                    $features  = get_field('plan_features');
                    $btn_text  = get_field('plan_btn_text') ?: 'Enroll in Pass';
                    $btn_url   = get_field('plan_btn_url') ?: $contact_url;
                    $card_cls  = $featured ? 'pricing-card-dark featured' : 'pricing-card-dark';
                    $btn_cls   = $featured ? 'th-btn blue-btn w-100' : 'th-btn blue-border-btn style3 w-100';
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="<?php echo esc_attr($card_cls); ?>">
                            <div>
                                <h3 class="plan-name"><?php the_title(); ?></h3>
                                <?php if (!empty($subtitle)) : ?>
                                    <p class="text-white-50 mb-0" style="font-size: 13px;"><?php echo esc_html($subtitle); ?></p>
                                <?php endif; ?>
                                <div class="price-tag"><?php echo esc_html($price); ?> <small><?php echo esc_html($period); ?></small></div>
                                
                                <?php if (!empty($features)) :
                                    $feature_items = array_filter(array_map('trim', explode("\n", $features)));
                                ?>
                                    <ul class="plan-features">
                                        <?php foreach ($feature_items as $fitem) : ?>
                                            <li><i class="fa-solid fa-circle-check"></i> <?php echo esc_html($fitem); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo esc_url($btn_url); ?>" class="<?php echo esc_attr($btn_cls); ?>"><?php echo esc_html($btn_text); ?></a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Free Demo Banner -->
        <div class="mt-60" style="background: linear-gradient(135deg, rgba(107, 42, 230, 0.3) 0%, rgba(235, 0, 41, 0.3) 100%); border: 1px solid #EB0029; border-radius: 20px; padding: 40px; text-align: center;">
            <h3 class="text-white mb-2" style="font-size: 28px; font-weight: 800;">Not Sure Which Program is Right for You?</h3>
            <p class="text-white-50 mb-4 mx-auto" style="max-width: 600px;">Book a 100% Free Trial Demo Class at our Padmarao Nagar or Shivam Road studio. Experience the energy firsthand before committing.</p>
            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Book Free Trial Demo Now</a>
        </div>
    </div>
</div>

<?php
get_footer();
