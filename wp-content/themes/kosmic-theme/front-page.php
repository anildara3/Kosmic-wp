<?php
/**
 * Homepage Template (Front Page) - Dynamic with ACF Free, CPTs, and CF7
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$front_id = get_option('page_on_front') ?: get_the_ID();

// ACF Fields for Homepage
$hero_sub   = get_field('hero_subtitle', $front_id) ?: 'Top-Rated Dance & Fitness Academy in Hyderabad';
$hero_title = get_field('hero_title', $front_id) ?: 'Once a Dancer, is Always a Dancer';
$hero_desc  = get_field('hero_desc', $front_id) ?: '15+ Years of Excellence • 3,000+ Students Trained • Directed by Tollywood Master Choreographer C. Mahesh Babu. Multi-style dance, weight loss Zumba, and classical arts.';
$hero_btn_t = get_field('hero_btn_text', $front_id) ?: 'Join Free Trial Class';
$hero_btn_u = get_field('hero_btn_url', $front_id) ?: '#contact-sec';
$hero_vid_u = get_field('hero_video_url', $front_id) ?: 'https://www.youtube.com/user/mahesh8maddy';
$hero_img   = get_field('hero_image', $front_id) ?: kosmic_asset('img/hero/hero_img.png');

$about_sub   = get_field('home_about_subtitle', $front_id) ?: '15+ Years Of Artistic Excellence';
$about_title = get_field('home_about_title', $front_id) ?: "Join Hyderabad's Premier Modern Dance & Fitness Community";
$about_quote = get_field('home_about_quote', $front_id) ?: 'Trained for 3 years by eminent Tollywood choreographer Lawrence Master. Performed in 30 to 40 Telugu and Hindi movies as a background dancer & member of the Telugu Film Dancers Union.';
$about_p1    = get_field('home_about_p1', $front_id) ?: 'Kosmic Studio 4 Danz (A/C Dance Studio) was established by C. Mahesh Babu (Mahesh Maddy). Having trained more than 3,000 students over 15+ years, Kosmic is a home where students foster their artistic craft, develop healthy relations, build confidence, and stay fit.';
$about_p2    = get_field('home_about_p2', $front_id) ?: 'Many 1st place prizes in regional and state competitions were bagged by Kosmic dancers. From small children of age 4 to adult fitness enthusiasts, our students enjoy unbelievable, encouraging, and joyful teaching every single day.';
$about_img   = get_field('home_about_img', $front_id) ?: kosmic_asset('img/normal/about_3.png');

$h1_sub   = get_field('h1_subtitle', $front_id) ?: 'Urban Street & Choreography';
$h1_title = get_field('h1_title', $front_id) ?: 'Hip-Hop & Break Dance Class';
$h1_desc  = get_field('h1_desc', $front_id) ?: 'Led by Kranthi & experienced street dancers. Master the foundational rhythm of popping, locking, breaking, footwork, freestyle battles, and stage-ready choreography with infectious energy.';
$h1_img   = get_field('h1_img', $front_id) ?: kosmic_asset('img/normal/dance_1.png');

$h2_sub   = get_field('h2_subtitle', $front_id) ?: 'Weight Loss & Body Toning';
$h2_title = get_field('h2_title', $front_id) ?: '5-Days-5-Variation Fitness Class';
$h2_desc  = get_field('h2_desc', $front_id) ?: 'Say goodbye to monotonous workouts! Our 5-Days-5-Variation routine blends Zumba, Aerobics, Functional Strength, Cardio Dance, and Core Sculpting across weekdays. Proven to accelerate fat loss, improve stamina, and keep you energized.';
$h2_img   = get_field('h2_img', $front_id) ?: kosmic_asset('img/normal/dance_2.png');

$cta_title    = get_field('cta_title', $front_id) ?: 'Dance & Weight Loss Classes | Book Free Trial';
$cta_text     = get_field('cta_text', $front_id) ?: 'Train with Tollywood choreographers and certified fitness trainers. Burn calories, learn modern choreography, and tone your body with separate batches for all ages.';

$contact_sub   = get_field('home_contact_subtitle', $front_id) ?: 'Get In Touch';
$contact_title = get_field('home_contact_title', $front_id) ?: "Let's Talk to Mahesh Master & Expert Team";
$contact_desc  = get_field('home_contact_desc', $front_id) ?: 'Book your free trial class or inquire about batch timings for Dance, Zumba, Kuchipudi, Gymnastics or Music.';
$contact_img   = get_field('home_contact_image', $front_id) ?: kosmic_asset('img/normal/contact_1.png');
$contact_cf7   = get_field('home_contact_shortcode', $front_id) ?: 'Kosmic Studio Trial & Contact Form';

$phone1       = kosmic_get_option('phone_1', '+91 97033 66311');
$phone1_clean = preg_replace('/[^0-9+]/', '', $phone1);
$whatsapp     = kosmic_get_option('whatsapp_number', '919703366311');
$email        = kosmic_get_option('email_address', 'kosmicstudio4danz@gmail.com');
$contact_url  = kosmic_page_url('contact-us', '/contact');
$services_url = kosmic_page_url('services-programs', '/services');
?>

<!-- 1. Hero Section -->
<div class="th-hero-wrapper hero-3" id="hero">
    <div class="th-hero-bg" data-bg-src="<?php echo kosmic_asset('img/bg/hero_bg_1.jpg'); ?>"></div>
    <div class="container">
        <div class="hero-img jump">
            <img src="<?php echo esc_url($hero_img); ?>" alt="Dance Hero">
        </div>
        <div class="hero-style3">
            <span class="hero-subtitle"><i class="fa-solid fa-star text-warning me-2"></i><?php echo esc_html($hero_sub); ?></span>
            <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="text-white-50 mb-30" style="max-width: 580px; font-size: 17px; line-height: 1.6;">
                <?php echo esc_html($hero_desc); ?>
            </p>
            <div class="btn-group">
                <a href="<?php echo esc_url($hero_btn_u); ?>" class="th-btn blue-btn"><?php echo esc_html($hero_btn_t); ?></a>
                <div class="hero-btn">
                    <a href="<?php echo esc_url($hero_vid_u); ?>" class="play-btn border-play-btn popup-video">
                        <i class="fas fa-play"></i>
                    </a>
                    <div class="media-body">
                        <a href="<?php echo esc_url($hero_vid_u); ?>" class="btn-title popup-video">Watch Studio Reel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-anime-img">
        <img src="<?php echo kosmic_asset('img/shape/hero_shape.png'); ?>" alt="shape">
    </div>
</div>

<!-- 2. Quick Booking Bar (Integrated with Contact Form 7) -->
<div class="position-relative bg-dark space-top d-none">
    <div class="container">
        <?php
        $quick_fallback = '<form action="' . esc_url($contact_url) . '" method="GET" class="input-form">
            <div class="input-wrap">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number / Email" required>
                </div>
                <div class="form-group">
                    <select name="subject" class="form-select nice-select">
                        <option value="" disabled selected hidden>Select Program</option>
                        <option value="Dance">Bollywood &amp; Freestyle Dance</option>
                        <option value="Weight-Loss">5-Days-5-Variation Weight Loss</option>
                        <option value="Zumba">Zumba &amp; Aerobics</option>
                        <option value="Kuchipudi">Kuchipudi Classical Dance</option>
                        <option value="Gymnastics">Gymnastics &amp; Kids Acrobatics</option>
                        <option value="Yoga">Power Yoga &amp; Wellness</option>
                        <option value="Keyboard-Guitar">Keyboard &amp; Guitar</option>
                        <option value="Veena">Carnatic Vocal &amp; Veena</option>
                        <option value="Abacus-Drawing">Drawing &amp; Abacus (Kids)</option>
                    </select>
                </div>
                <div class="form-btn">
                    <button class="th-btn btn-fw blue-btn">Book Free Demo</button>
                </div>
            </div>
        </form>';

        echo kosmic_render_cf7('Kosmic Quick Booking Bar', $quick_fallback);
        ?>
    </div>
</div>

<!-- 3. Core Feature Cards -->
<section class="bg-dark space">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-card_img">
                        <img src="<?php echo kosmic_asset('img/feature/feature_1_1.jpg'); ?>" alt="Dance Classes">
                    </div>
                    <h3 class="feature-card_title">
                        <a href="#programs-sec">Bollywood, Tollywood &amp; Hip-Hop</a>
                    </h3>
                    <p class="feature-card_text">Master film choreography, street popping, locking, and energetic Tollywood moves from experienced movie dancers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-card_img">
                        <img src="<?php echo kosmic_asset('img/feature/feature_1_2.jpg'); ?>" alt="Weight Loss">
                    </div>
                    <h3 class="feature-card_title">
                        <a href="#programs-sec">5-Days-5-Variation &amp; Zumba</a>
                    </h3>
                    <p class="feature-card_text">Signature fat-burning weight loss and cardio fitness routine with 5 daily variations for maximum stamina and body toning.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-card_img">
                        <img src="<?php echo kosmic_asset('img/feature/feature_1_3.jpg'); ?>" alt="Kids & Classical">
                    </div>
                    <h3 class="feature-card_title">
                        <a href="#programs-sec">Kids Dance, Gymnastics &amp; Arts</a>
                    </h3>
                    <p class="feature-card_text">All-rounder development for kids aged 4+ covering flexibility, acrobatics, classical Kuchipudi, music, and drawing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. About Founder & Studio -->
<div class="overflow-hidden bg-dark" id="about-sec">
    <div class="about-sec-three bg-title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-6">
                    <div class="img-box4">
                        <div class="img4 movingX-reverse">
                            <img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr($about_title); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="title-area mb-20">
                        <span class="sub-title style1"><?php echo esc_html($about_sub); ?></span>
                        <h2 class="sec-title text-white"><?php echo esc_html($about_title); ?></h2>
                    </div>
                    <?php if (!empty($about_quote)) : ?>
                        <blockquote class="about-blockquote">
                            <p>&ldquo;<?php echo esc_html($about_quote); ?>&rdquo;</p>
                        </blockquote>
                    <?php endif; ?>
                    <p class="about-text mt-n2">
                        <?php echo esc_html($about_p1); ?>
                    </p>
                    <p class="about-text">
                        <?php echo esc_html($about_p2); ?>
                    </p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Join Our Dance Family</a>
                </div>
            </div>
        </div>
        <div class="shape-mockup ripple-animation d-none d-xxl-block" data-top="0%" data-left="0%">
            <img src="<?php echo kosmic_asset('img/shape/shape_7.png'); ?>" alt="Shape">
        </div>
    </div>
</div>

<!-- 5. Service Platform / Training Programs (Dynamic from CPT: service) -->
<section class="overflow-hidden service-area-three bg-dark space" id="programs-sec">
    <div class="container">
        <div class="service-wrapper">
            <div class="title-area">
                <span class="sub-title style1 mt-n1">Training Programs</span>
                <h2 class="sec-title mb-0 text-white">Our Dance, Fitness &amp; Arts Platform</h2>
            </div>
            <div class="service-btn">
                <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Book Free Trial Class</a>
            </div>
        </div>
        <div class="row slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true">
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
                    $icon     = get_field('service_icon', $s_id) ?: get_post_meta($s_id, 'service_icon', true) ?: kosmic_asset('img/icon/service_2_' . (($counter % 3) + 1) . '.svg');
                    $subtitle = get_field('service_subtitle', $s_id) ?: get_post_meta($s_id, 'service_subtitle', true) ?: wp_trim_words(get_the_excerpt(), 18);
                    $link     = get_permalink();
            ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-card">
                            <div class="service-card_inner">
                                <div class="service-card_icon">
                                    <img src="<?php echo esc_url($icon); ?>" alt="<?php the_title_attribute(); ?>" style="max-width: 44px; max-height: 44px;">
                                </div>
                                <div class="service-card_number" data-bg-src="<?php echo kosmic_asset('img/icon/service_1_1.jpg'); ?>"><?php echo esc_html($num); ?></div>
                            </div>
                            <div class="service-content">
                                <h3 class="service-card_title">
                                    <a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="service-card_text"><?php echo esc_html($subtitle); ?></p>
                                <a href="<?php echo esc_url($link); ?>" class="th-btn blue-border-btn style3">Learn More</a>
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
</section>

<!-- 6. Highlight Disciplines -->
<section class="bg-dark" id="classes">
    <div class="dance-sec-3 space bg-title overflow-hidden">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title fs-16 mt-n1">Find The Right Class For You</span>
                <h2 class="sec-title text-white">Choose Your Dance &amp; Fitness Discipline</h2>
            </div>
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="dance-image movingX">
                        <img src="<?php echo esc_url($h1_img); ?>" alt="<?php echo esc_attr($h1_title); ?>">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="dance-classes-wrapper">
                        <div class="title-area mb-20">
                            <span class="sub-title fs-md style3"><?php echo esc_html($h1_sub); ?></span>
                            <h3 class="sec-title text-white"><?php echo esc_html($h1_title); ?></h3>
                        </div>
                        <p class="about-text mt-n2">
                            <?php echo esc_html($h1_desc); ?>
                        </p>
                        <div class="dance-btn">
                            <a href="<?php echo esc_url($services_url); ?>" class="th-btn blue-btn">Explore Details</a>
                            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn white-btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup ripple-animation d-none d-xxl-block" data-top="32%" data-left="0%">
            <img src="<?php echo kosmic_asset('img/shape/shape_4.png'); ?>" alt="Shape">
        </div>
        <div class="shape-mockup d-none d-xxl-block" data-top="0%" data-right="0%">
            <img src="<?php echo kosmic_asset('img/shape/shape_5.png'); ?>" alt="shape">
        </div>
    </div>
</section>

<section class="bg-dark">
    <div class="dance-sec-3 space-bottom bg-title overflow-hidden">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6">
                    <div class="dance-image2 movingX-reverse">
                        <img src="<?php echo esc_url($h2_img); ?>" alt="<?php echo esc_attr($h2_title); ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title-area mb-20">
                        <span class="sub-title fs-md style3"><?php echo esc_html($h2_sub); ?></span>
                        <h3 class="sec-title text-white"><?php echo esc_html($h2_title); ?></h3>
                    </div>
                    <p class="about-text mt-n2">
                        <?php echo esc_html($h2_desc); ?>
                    </p>
                    <div class="dance-btn">
                        <a href="<?php echo esc_url($services_url); ?>" class="th-btn blue-btn">Explore Details</a>
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn white-btn">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup d-none d-xxl-block" data-bottom="0%" data-left="0%">
            <img src="<?php echo kosmic_asset('img/shape/shape_6.png'); ?>" alt="shape">
        </div>
        <div class="shape-mockup ripple-animation d-none d-xxl-block" data-top="0%" data-right="0%">
            <img src="<?php echo kosmic_asset('img/shape/shape_4.png'); ?>" alt="Shape">
        </div>
    </div>
    <div class="dance-button">
        <a href="<?php echo esc_url($services_url); ?>" class="th-btn btn-fw black-btn style3">View All 12+ Training Programs</a>
    </div>
</section>

<!-- 7. Testimonials (Dynamic from CPT: testimonial) -->
<section class="testimonial-area-three bg-dark space" id="testimonials-sec"; ?>">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title mt-n1">Student &amp; Parent Reviews</span>
            <h2 class="sec-title text-white mb-0">What Our Students &amp; Families Say</h2>
        </div>

        <?php
        $testi_posts = get_posts(array(
            'post_type'      => 'testimonial',
            'posts_per_page' => 8,
            'orderby'        => 'menu_order date',
            'order'          => 'DESC',
        ));

        if (!empty($testi_posts)) :
        ?>
            <!-- Avatar Nav Slide -->
            <div class="testi-grid-tab">
                <div class="tab-slide th-carousel" data-asnavfor=".testi-grid-slide" data-slide-show="5" data-lg-slide-show="5" data-md-slide-show="5" data-sm-slide-show="5" data-xs-slide-show="5" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true" data-sm-center-mode="true" data-xs-center-mode="true">
                    <?php
                    $counter = 0;
                    foreach ($testi_posts as $tp) :
                        $counter++;
                        $av = get_field('testimonial_avatar', $tp->ID) ?: (has_post_thumbnail($tp->ID) ? get_the_post_thumbnail_url($tp->ID, 'thumbnail') : kosmic_asset('img/testimonial/testi_3_' . (($counter % 6) + 1) . '.jpg'));
                    ?>
                        <div><div class="slide-img"><img src="<?php echo esc_url($av); ?>" alt="<?php echo esc_attr($tp->post_title); ?>"></div></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Content Slide -->
            <div class="testi-grid-area">
                <div class="th-carousel testi-grid-slide" data-asnavfor=".tab-slide" data-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true" data-infinite="true">
                    <?php
                    foreach ($testi_posts as $tp) :
                        $t_text  = get_field('testimonial_text', $tp->ID) ?: $tp->post_content;
                        $t_batch = get_field('testimonial_batch', $tp->ID) ?: 'Dance Member';
                    ?>
                        <div>
                            <div class="testi-grid">
                                <p class="testi-grid_text">&ldquo;<?php echo esc_html($t_text); ?>&rdquo;</p>
                                <div class="testi-grid_profile">
                                    <div class="media-body">
                                        <h3 class="testi-grid_name h6"><?php echo esc_html($tp->post_title); ?></h3>
                                        <span class="testi-grid_desig mb-n2"><?php echo esc_html($t_batch); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="testi-quote">
        <img src="<?php echo kosmic_asset('img/icon/quote_3_1.png'); ?>" alt="quote">
    </div>
</section>

<!-- 8. CTA Banner -->
<section class="bg-dark">
    <div class="container">
        <div class="cta-area-three" data-pos-for=".team-sec-wrapper" data-sec-pos="bottom-half" data-bg-src="<?php echo kosmic_asset('img/bg/cta_1_2.png'); ?>">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7 col-lg-7">
                    <div class="cta-content">
                        <h2 class="sec-title text-white mt-n2"><?php echo esc_html($cta_title); ?></h2>
                        <p class="cta-text">
                            <?php echo esc_html($cta_text); ?>
                        </p>
                    </div>
                    <div class="cta-btn2">
                        <a href="tel:<?php echo esc_attr($phone1_clean); ?>" class="th-btn blue-btn"><i class="fa-solid fa-phone me-2"></i>Call <?php echo esc_html($phone1); ?></a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener" class="th-btn white-btn"><i class="fab fa-whatsapp me-2"></i>WhatsApp Us</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="cta-image movingX">
                        <img src="<?php echo kosmic_asset('img\\normal\\cta_1.png'); ?>" alt="Kosmic Mobile App">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. Lead Instructors Team (Dynamic from CPT: instructor) -->
<section class="team-sec-three bg-dark" id="instructors-sec">
    <div class="team-sec-wrapper space bg-title" data-bg-src="<?php echo kosmic_asset('img/bg/team_bg_3.png'); ?>">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title mt-n1">Meet Our Lead Instructors</span>
                <h2 class="sec-title text-white">Our Professional Team of Artists</h2>
            </div>
            <div class="row teamSlide3 slider-shadow th-carousel" id="teamSlide3" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
                <?php
                $lead_instructors = get_posts(array(
                    'post_type'      => 'instructor',
                    'posts_per_page' => 8,
                    'orderby'        => 'menu_order title',
                    'order'          => 'ASC',
                ));

                foreach ($lead_instructors as $inst) :
                    $i_img   = has_post_thumbnail($inst->ID) ? get_the_post_thumbnail_url($inst->ID, 'full') : (get_post_meta($inst->ID, 'instructor_image', true) ?: kosmic_asset('img/mahesh_master.jpg'));
                    $i_desig = get_field('instructor_designation', $inst->ID) ?: 'Dance & Fitness Mentor';
                    $fb      = get_field('instructor_facebook', $inst->ID) ?: 'https://facebook.com/';
                    $tw      = get_field('instructor_twitter', $inst->ID) ?: 'https://twitter.com/';
                    $insta   = get_field('instructor_instagram', $inst->ID) ?: 'https://instagram.com/';
                    $yt      = get_field('instructor_youtube', $inst->ID) ?: 'https://youtube.com/';
                ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="th-team team-item">
                            <div class="team-img">
                                <img src="<?php echo esc_url($i_img); ?>" alt="<?php echo esc_attr($inst->post_title); ?>">
                            </div>
                            <div class="team-content">
                                <h3 class="team-title box-title">
                                    <a href="<?php echo esc_url($contact_url); ?>"><?php echo esc_html($inst->post_title); ?></a>
                                </h3>
                                <span class="team-desig"><?php echo esc_html($i_desig); ?></span>
                            </div>
                            <div class="team-social">
                                <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?php echo esc_url($tw); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                                <a href="<?php echo esc_url($insta); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                                <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- 10. Our Two Branches Showcase (Dynamic from Studio Settings) -->
<section class="bg-dark space" id="branches-sec">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Our Locations</span>
            <h2 class="sec-title text-white">Visit Our 2 Fully Air-Conditioned Studios</h2>
            <p class="text-white-50" style="max-width: 650px; margin: 0 auto 30px;">Two fully air-conditioned, state-of-the-art dance studios with spring wooden flooring and vibrant acoustics.</p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="feature-card-dark">
                    <div class="mb-3">
                        <span class="text-white-50" style="font-size: 13px;"><i class="fa-solid fa-clock me-1 text-danger"></i> <?php echo esc_html(kosmic_get_option('hours_weekdays')); ?></span>
                    </div>
                    <h3 class="text-white mb-2" style="font-size: 24px; font-weight: 700;"><?php echo esc_html(kosmic_get_option('branch1_name')); ?></h3>
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
                    <h3 class="text-white mb-2" style="font-size: 24px; font-weight: 700;"><?php echo esc_html(kosmic_get_option('branch2_name')); ?></h3>
                    <p class="text-white-50 mb-3"><i class="fa-sharp fa-solid fa-location-dot me-2 text-info"></i><?php echo esc_html(kosmic_get_option('branch2_address')); ?></p>
                    <p class="text-white-50 mb-4"><i class="fa-solid fa-phone me-2 text-info"></i>Phone: <?php echo esc_html(kosmic_get_option('branch2_phone')); ?></p>
                    <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn w-100 text-center">Book Demo at Shivam Road</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 11. Consultation & Contact Form (Integrated with Contact Form 7) -->
<div class="bg-dark space-top" id="contact-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contact-image style3">
                    <img src="<?php echo esc_url($contact_img); ?>" alt="<?php echo esc_attr($contact_title); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="title-area mt-n1 mb-35">
                    <span class="sub-title style1"><?php echo esc_html($contact_sub); ?></span>
                    <h2 class="sec-title text-white"><?php echo esc_html($contact_title); ?></h2>
                    <p class="text-white-50"><?php echo esc_html($contact_desc); ?></p>
                </div>

                <?php
                $home_contact_fallback = '<form action="mailto:' . esc_attr($email) . '" method="POST" class="contact-us-form style3">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Your Full Name" required>
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" required>
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control" name="number" placeholder="Phone Number" required>
                            <i class="fa-regular fa-phone-flip"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="branch" class="form-select nice-select">
                                <option value="Padmarao-Nagar">Padmarao Nagar, Secunderabad</option>
                                <option value="Shivam-Road">Shivam Road / DD Colony, Hyderabad</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <textarea name="message" rows="3" class="form-control" placeholder="Your Message / Fitness Goal"></textarea>
                        </div>
                        <div class="contact-form-btn col-12">
                            <button type="submit" class="th-btn blue-btn w-100">Book Free Trial Class</button>
                        </div>
                    </div>
                </form>';

                echo kosmic_render_cf7($contact_cf7, $home_contact_fallback);
                ?>
            </div>
        </div>
    </div>
    <div class="shape-mockup ripple-animation d-none d-xl-block" data-top="29%" data-left="6%">
        <img src="<?php echo kosmic_asset('img/shape/shape_8.png'); ?>" alt="shape">
    </div>
</div>

<!-- 12. Latest News & Articles (Dynamic Blog Posts) -->
<section class="blog-area-two bg-dark space" id="blog-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title mt-n1">Dance &amp; Fitness Insights</span>
            <h2 class="sec-title text-white">Our Latest News &amp; Articles</h2>
        </div>
        <div class="row blog-slide3 slider-shadow th-carousel" id="blogSlide1" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
            <?php
            $news_posts = get_posts(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ));

            if (!empty($news_posts)) :
                $c = 0;
                foreach ($news_posts as $np) :
                    $c++;
                    $np_img = has_post_thumbnail($np->ID) ? get_the_post_thumbnail_url($np->ID, 'kosmic-blog-thumb') : kosmic_asset('img/blog/blog_3_' . (($c % 3) + 1) . '.jpg');
            ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="<?php echo esc_url($np_img); ?>" alt="<?php echo esc_attr($np->post_title); ?>">
                            </div>
                            <div class="blog-meta">
                                <a href="<?php echo esc_url(get_permalink($np->ID)); ?>"><i class="fa-solid fa-calendar-days"></i><?php echo get_the_date('M d, Y', $np->ID); ?></a>
                                <a href="<?php echo esc_url(get_permalink($np->ID)); ?>"><i class="fa-solid fa-tags"></i>Fitness &amp; Dance</a>
                            </div>
                            <h3 class="blog-title box-title">
                                <a href="<?php echo esc_url(get_permalink($np->ID)); ?>"><?php echo esc_html($np->post_title); ?></a>
                            </h3>
                            <a href="<?php echo esc_url(get_permalink($np->ID)); ?>" class="th-btn blue-border-btn">Read More</a>
                        </div>
                    </div>
            <?php
                endforeach;
            else :
            ?>
                <div class="col-md-6 col-xl-4">
                    <div class="blog-card style3">
                        <div class="blog-img">
                            <img src="<?php echo kosmic_asset('img/blog/blog_3_1.jpg'); ?>" alt="Dance Weight Loss">
                        </div>
                        <div class="blog-meta">
                            <a href="#blog-sec"><i class="fa-solid fa-calendar-days"></i>Jan 15, 2026</a>
                            <a href="#blog-sec"><i class="fa-solid fa-tags"></i>Fitness &amp; Dance</a>
                        </div>
                        <h3 class="blog-title box-title">
                            <a href="#blog-sec">5 Ways Dance &amp; Zumba Accelerate Weight Loss Faster Than Traditional Gyms</a>
                        </h3>
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-border-btn">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="blog-card style3">
                        <div class="blog-img">
                            <img src="<?php echo kosmic_asset('img/blog/blog_3_2.jpg'); ?>" alt="Kids Development">
                        </div>
                        <div class="blog-meta">
                            <a href="#blog-sec"><i class="fa-solid fa-calendar-days"></i>Jan 20, 2026</a>
                            <a href="#blog-sec"><i class="fa-solid fa-tags"></i>Child Growth</a>
                        </div>
                        <h3 class="blog-title box-title">
                            <a href="#blog-sec">Why Kids Excel in School When Combining Dance, Gymnastics &amp; Abacus</a>
                        </h3>
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-border-btn">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="blog-card style3">
                        <div class="blog-img">
                            <img src="<?php echo kosmic_asset('img/blog/blog_3_3.jpg'); ?>" alt="Tollywood Dance">
                        </div>
                        <div class="blog-meta">
                            <a href="#blog-sec"><i class="fa-solid fa-calendar-days"></i>Jan 25, 2026</a>
                            <a href="#blog-sec"><i class="fa-solid fa-tags"></i>Choreography</a>
                        </div>
                        <h3 class="blog-title box-title">
                            <a href="#blog-sec">Inside Tollywood Choreography: Techniques &amp; Expression with Mahesh Master</a>
                        </h3>
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-border-btn">Read More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
