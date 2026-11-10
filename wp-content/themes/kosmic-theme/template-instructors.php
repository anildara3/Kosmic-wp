<?php
/**
 * Template Name: Our Instructors Page
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact_url = kosmic_page_url('contact-us', '/contact');
$phone1      = kosmic_get_option('phone_1', '+91 97033 66311');
$phone1_clean = preg_replace('/[^0-9+]/', '', $phone1);
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>Choreographers &amp; Faculty</li>
            </ul>
        </div>
    </div>
</div>

<!-- Founder Spotlight Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="founder-spotlight">
            <div class="row align-items-center">
                <?php
                // Query spotlight founder
                $spotlight_query = new WP_Query(array(
                    'post_type'      => 'instructor',
                    'posts_per_page' => 1,
                    'meta_key'       => 'instructor_is_spotlight',
                    'meta_value'     => 1,
                ));

                if ($spotlight_query->have_posts()) :
                    while ($spotlight_query->have_posts()) :
                        $spotlight_query->the_post();
                        $spot_img   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : (get_post_meta(get_the_ID(), 'instructor_image', true) ?: kosmic_asset('img/mahesh_master.jpg'));
                        $spot_desig = get_field('instructor_designation') ?: 'Founder & Master Choreographer';
                        $spot_badge = get_field('instructor_badge') ?: 'Founder & Master Choreographer';
                ?>
                        <div class="col-lg-5 mb-4 mb-lg-0 text-center">
                            <img src="<?php echo esc_url($spot_img); ?>" alt="<?php the_title_attribute(); ?>" style="border-radius: 20px; max-width: 100%; border: 4px solid #6B2AE6; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        </div>
                        <div class="col-lg-7">
                            <span class="badge" style="background-color: #EB0029; font-size: 13px; padding: 8px 16px; margin-bottom: 15px;"><?php echo esc_html($spot_badge); ?></span>
                            <h2 class="text-white mb-2" style="font-size: 36px; font-weight: 800;"><?php the_title(); ?></h2>
                            <h5 style="color: #6B2AE6; font-weight: 600;" class="mb-3"><?php echo esc_html($spot_desig); ?></h5>
                            <div class="text-white-50 lead mb-4" style="line-height: 1.8;">
                                <?php the_content(); ?>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Book Master Class</a>
                                <a href="tel:<?php echo esc_attr($phone1_clean); ?>" class="th-btn white-btn"><i class="fa-solid fa-phone me-2"></i><?php echo esc_html($phone1); ?></a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Instructors Grid (Dynamic from CPT: instructor) -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Faculty &amp; Masters</span>
            <h2 class="sec-title text-white">Expert Dance, Fitness &amp; Arts Faculty</h2>
            <p class="text-white-50 mx-auto" style="max-width: 600px;">Every mentor at Kosmic Studio 4 Danz brings verified pedigree, stage experience, and patient individual guidance for kids, beginners, and advanced performers.</p>
        </div>
        <div class="row gy-4">
            <?php
            $instructors_query = new WP_Query(array(
                'post_type'      => 'instructor',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order title',
                'order'          => 'ASC',
            ));

            if ($instructors_query->have_posts()) :
                while ($instructors_query->have_posts()) :
                    $instructors_query->the_post();
                    $inst_id    = get_the_ID();
                    $inst_img   = has_post_thumbnail() ? get_the_post_thumbnail_url($inst_id, 'full') : (get_post_meta($inst_id, 'instructor_image', true) ?: kosmic_asset('img/mahesh_master.jpg'));
                    $inst_desig = get_field('instructor_designation') ?: 'Dance & Fitness Instructor';
                    $inst_badge = get_field('instructor_badge') ?: 'Instructor';
                    $inst_desc  = get_field('instructor_short_desc') ?: wp_trim_words(get_the_excerpt(), 18);
            ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="team-card-dark">
                            <div class="team-card-img">
                                <img src="<?php echo esc_url($inst_img); ?>" alt="<?php the_title_attribute(); ?>">
                                <span class="team-badge"><?php echo esc_html($inst_badge); ?></span>
                            </div>
                            <div class="team-card-body">
                                <h4 class="team-card-name"><?php the_title(); ?></h4>
                                <span class="team-card-desig"><?php echo esc_html($inst_desig); ?></span>
                                <p class="team-card-desc"><?php echo esc_html($inst_desc); ?></p>
                                <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-border-btn style3 btn-sm w-100">Book Session</a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>

<!-- Mentorship CTA Banner -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div style="background: linear-gradient(135deg, #6B2AE6 0%, #EB0029 100%); border-radius: 20px; padding: 50px 30px; text-align: center; color: #ffffff;">
            <h2 class="text-white mb-3" style="font-size: 32px; font-weight: 800;">Want to Train Under Tollywood Master Mahesh &amp; Faculty?</h2>
            <p class="mb-4 mx-auto" style="max-width: 650px; font-size: 16px; opacity: 0.95;">Book your free trial demo class today at our Padmarao Nagar (Secunderabad) or Shivam Road (Hyderabad) studio.</p>
            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn white-btn" style="color: #161921 !important; font-weight: 700; padding: 16px 36px;">Book Free Trial Demo Now</a>
        </div>
    </div>
</div>

<?php
get_footer();
