<?php
/**
 * Template Name: About Us Page
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// ACF Fields for About page
$founder_sub   = get_field('about_founder_subtitle') ?: 'Founder & Artistic Director';
$founder_title = get_field('about_founder_title') ?: 'Directed by C. Mahesh Babu (Mahesh Maddy)';
$founder_exp   = get_field('about_founder_exp') ?: '15+';
$founder_expl  = get_field('about_founder_exp_label') ?: 'Years of Dance Excellence';
$founder_s1    = get_field('about_founder_story1') ?: 'Trained under eminent Tollywood choreographer Lawrence Master for over 3 years, Master Mahesh Babu has performed and assisted in 30+ to 40+ Telugu and Hindi films as a registered union choreographer and professional dancer.';
$founder_s2    = get_field('about_founder_story2') ?: 'In 2010, Master Mahesh established Kosmic Studio 4 Danz with a clear vision: to bring film-industry caliber dance instruction, high-energy fitness transformations, and holistic performing arts to Hyderabad and Secunderabad.';
$founder_img   = get_field('about_founder_image') ?: kosmic_asset('img/mahesh_master.jpg');

$stat1_num = get_field('stat1_number') ?: '15+';
$stat1_lbl = get_field('stat1_label') ?: 'Years of Dance Excellence';
$stat2_num = get_field('stat2_number') ?: '3000+';
$stat2_lbl = get_field('stat2_label') ?: 'Students & Dancers Trained';
$stat3_num = get_field('stat3_number') ?: '40+';
$stat3_lbl = get_field('stat3_label') ?: 'Tollywood & Hindi Film Projects';
$stat4_num = get_field('stat4_number') ?: '2 Studios';
$stat4_lbl = get_field('stat4_label') ?: 'Secunderabad & Hyderabad';

$contact_url  = kosmic_page_url('contact-us', '/contact');
$services_url = kosmic_page_url('services-programs', '/services');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>About Kosmic Studio 4 Danz</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main About Founder & Story Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-45 mb-lg-0">
                <div class="about-img-box">
                    <img src="<?php echo esc_url($founder_img); ?>" alt="<?php echo esc_attr($founder_title); ?>">
                    <div class="experience-tag">
                        <h3><?php echo esc_html($founder_exp); ?></h3>
                        <p><?php echo esc_html($founder_expl); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="title-area mb-30">
                    <span class="sub-title style1"><?php echo esc_html($founder_sub); ?></span>
                    <h2 class="sec-title text-white"><?php echo esc_html($founder_title); ?></h2>
                    <p class="text-white-50"><?php echo esc_html($founder_s1); ?></p>
                    <p class="text-white-50"><?php echo esc_html($founder_s2); ?></p>
                </div>
                <div class="row gy-3 mb-30">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(107, 42, 230, 0.2); display: flex; align-items: center; justify-content: center; color: #6B2AE6; font-size: 20px;">
                                <i class="fa-solid fa-snowflake"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-0" style="font-size: 16px;">100% Fully Air-Conditioned</h5>
                                <small class="text-white-50">Secunderabad &amp; Hyderabad</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(235, 0, 41, 0.2); display: flex; align-items: center; justify-content: center; color: #EB0029; font-size: 20px;">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-0" style="font-size: 16px;">3,000+ Dancers Trained</h5>
                                <small class="text-white-50">Kids, Teens &amp; Adults</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(107, 42, 230, 0.2); display: flex; align-items: center; justify-content: center; color: #6B2AE6; font-size: 20px;">
                                <i class="fa-solid fa-venus"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-0" style="font-size: 16px;">Separate Ladies Batches</h5>
                                <small class="text-white-50">Safe &amp; Supportive Environment</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(235, 0, 41, 0.2); display: flex; align-items: center; justify-content: center; color: #EB0029; font-size: 20px;">
                                <i class="fa-solid fa-fire"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-0" style="font-size: 16px;">Signature Weight Loss</h5>
                                <small class="text-white-50">5-Days-5-Variation Format</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap">
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Visit Our Studios</a>
                    <a href="<?php echo esc_url($services_url); ?>" class="th-btn white-btn ms-sm-3 mt-3 mt-sm-0">View All Programs</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Animated Milestones & Statistics -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-6 col-lg-3">
                <div class="counter-box-dark">
                    <div class="counter-number">
                        <span class="counter-number-val"><?php echo esc_html($stat1_num); ?></span>
                    </div>
                    <p class="counter-title"><?php echo esc_html($stat1_lbl); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="counter-box-dark">
                    <div class="counter-number">
                        <span class="counter-number-val"><?php echo esc_html($stat2_num); ?></span>
                    </div>
                    <p class="counter-title"><?php echo esc_html($stat2_lbl); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="counter-box-dark">
                    <div class="counter-number">
                        <span class="counter-number-val"><?php echo esc_html($stat3_num); ?></span>
                    </div>
                    <p class="counter-title"><?php echo esc_html($stat3_lbl); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="counter-box-dark">
                    <div class="counter-number">
                        <span class="counter-number-val"><?php echo esc_html($stat4_num); ?></span>
                    </div>
                    <p class="counter-title"><?php echo esc_html($stat4_lbl); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Kosmic Studio -->
<div class="space bg-dark" style="border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06);">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Why Kosmic Studio</span>
            <h2 class="sec-title text-white">Why We Are Hyderabad's #1 Dance Academy</h2>
            <p class="text-white-50 mx-auto" style="max-width: 620px;">Whether your goal is graceful classical dance, energetic weight loss, stage confidence for your child, or wedding choreography &ndash; Kosmic provides complete mentorship.</p>
        </div>
        <div class="row gy-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-dark text-center">
                    <div style="font-size: 38px; color: #EB0029; margin-bottom: 20px;"> 
                        <i class="fa-solid fa-film"></i>
                    </div>
                    <h4 class="text-white mb-2" style="font-size: 20px;">Tollywood Pedagogy</h4>
                    <p class="text-white-50" style="font-size: 14px;">Learn authentic choreography styles from Lawrence Master's protégé with real cinematic musicality and footwork.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-dark text-center">
                    <div style="font-size: 38px; color: #6B2AE6; margin-bottom: 20px;">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <h4 class="text-white mb-2" style="font-size: 20px;">5-Days-5-Variation</h4>
                    <p class="text-white-50" style="font-size: 14px;">A proprietary fitness system combining Zumba, Aerobics, Tabata, Bollywood cardio, and Power Yoga for rapid, healthy weight loss.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-dark text-center">
                    <div style="font-size: 38px; color: #EB0029; margin-bottom: 20px;">
                        <i class="fa-solid fa-child-reaching"></i>
                    </div>
                    <h4 class="text-white mb-2" style="font-size: 20px;">Acrobatics &amp; Kids Care</h4>
                    <p class="text-white-50" style="font-size: 14px;">Dedicated gymnastics and rhythm batches for children aged 4+ with patient, certified instructors building posture and flexibility.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-dark text-center">
                    <div style="font-size: 38px; color: #6B2AE6; margin-bottom: 20px;">
                        <i class="fa-solid fa-music"></i>
                    </div>
                    <h4 class="text-white mb-2" style="font-size: 20px;">Complete Arts Academy</h4>
                    <p class="text-white-50" style="font-size: 14px;">Beyond dance: Carnatic vocal, Veena, Western Keyboard, Guitar, Drawing, and Abacus all under one air-conditioned roof.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Studio Branches Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Our Locations</span>
            <h2 class="sec-title text-white">Visit Our 2 Fully Air-Conditioned Studios</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="feature-card-dark">
                    <div class="mb-3">
                        <span class="text-white-50" style="font-size: 13px;"><i class="fa-solid fa-clock me-1 text-danger"></i> <?php echo esc_html(kosmic_get_option('hours_weekdays')); ?></span>
                    </div>
                    <h3 class="text-white mb-2" style="font-size: 24px;"><?php echo esc_html(kosmic_get_option('branch1_name')); ?></h3>
                    <p class="text-white-50 mb-3"><i class="fa-sharp fa-solid fa-location-dot me-2 text-danger"></i><?php echo esc_html(kosmic_get_option('branch1_address')); ?></p>
                    <p class="text-white-50 mb-4"><i class="fa-solid fa-phone me-2 text-danger"></i>Phone: <?php echo esc_html(kosmic_get_option('branch1_phone')); ?></p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn w-100 text-center">Book Demo at Padmarao Nagar</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-card-dark">
                    <div class="mb-3">
                        <span class="text-white-50" style="font-size: 13px;"><i class="fa-solid fa-clock me-1 text-info"></i> <?php echo esc_html(kosmic_get_option('hours_weekdays')); ?></span>
                    </div>
                    <h3 class="text-white mb-2" style="font-size: 24px;"><?php echo esc_html(kosmic_get_option('branch2_name')); ?></h3>
                    <p class="text-white-50 mb-3"><i class="fa-sharp fa-solid fa-location-dot me-2 text-info"></i><?php echo esc_html(kosmic_get_option('branch2_address')); ?></p>
                    <p class="text-white-50 mb-4"><i class="fa-solid fa-phone me-2 text-info"></i>Phone: <?php echo esc_html(kosmic_get_option('branch2_phone')); ?></p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn w-100 text-center">Book Demo at Shivam Road</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
