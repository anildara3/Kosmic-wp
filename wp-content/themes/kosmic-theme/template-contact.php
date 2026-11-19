<?php
/**
 * Template Name: Contact Us Page
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone1       = kosmic_get_option('phone_1', '+91 97033 66311');
$phone2       = kosmic_get_option('phone_2', '+91 95026 26988');
$phone_shivam = kosmic_get_option('phone_shivam', '+91 75698 16060');
$email        = kosmic_get_option('email_address', 'kosmicstudio4danz@gmail.com');
$hours_w      = kosmic_get_option('hours_weekdays', 'Mon - Sat: 06:00 AM - 09:00 PM');
$hours_s      = kosmic_get_option('hours_sundays', 'Sun: 07:00 AM - 01:00 PM (Special batches & master workshops)');

$branch1_name    = kosmic_get_option('branch1_name', 'Padmarao Nagar Studio (Secunderabad)');
$branch1_address = kosmic_get_option('branch1_address', '6-1-289/7, 2nd Flr, Rd No 3, Above Ratnadeep, Secunderabad - 500025');
$branch1_phone   = kosmic_get_option('branch1_phone', '+91 97033 66311 / +91 95026 26988');
$branch1_map     = get_field('contact_map1_iframe') ?: (get_field('contact_map_iframe') ?: kosmic_get_option('branch1_map'));
$branch1_share   = kosmic_get_option('branch1_share_url', 'https://share.google/lXIBoCp1X0G6Sg652');

$branch2_name    = kosmic_get_option('branch2_name', 'Shivam Road Branch (Hyderabad)');
$branch2_address = kosmic_get_option('branch2_address', '3rd Flr, MIG-80, Opp Union Bank, Bathukamma Kunta, DD Colony, Hyderabad - 500013');
$branch2_phone   = kosmic_get_option('branch2_phone', '+91 75698 16060 / +91 97033 66311');
$branch2_map     = get_field('contact_map2_iframe') ?: kosmic_get_option('branch2_map');
$branch2_share   = kosmic_get_option('branch2_share_url', 'https://share.google/iSgAhoAlyU3e7h0qJ');
$cf7_override = get_field('contact_cf7_shortcode');
$contact_sub   = get_field('contact_subtitle') ?: 'Get In Touch';
$contact_title = get_field('contact_title') ?: "Let's Talk to Mahesh Master & Expert Team";
$contact_desc  = get_field('contact_desc') ?: 'Book your free trial class, discuss fitness goals, or register for upcoming dance batches in Hyderabad & Secunderabad.';
$contact_img   = get_field('contact_image') ?: kosmic_asset('img/normal/contact_1.png');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>

<!-- 3 Contact Info Cards (Dynamic from Studio Settings) -->
<div class="space bg-dark">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <!-- Location Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div>
                        <div class="contact-info_icon">
                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                        </div>
                        <h4 class="contact-info_title">Our Studio Locations</h4>
                        <div class="contact-info_text">
                            <p class="mb-2"><strong>Padmarao Nagar (Secunderabad):</strong><br><?php echo esc_html(kosmic_get_option('branch1_address')); ?></p>
                            <p class="mb-0"><strong>Shivam Road (Hyderabad):</strong><br><?php echo esc_html(kosmic_get_option('branch2_address')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call & WhatsApp Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div>
                        <div class="contact-info_icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h4 class="contact-info_title">Call / WhatsApp Anytime</h4>
                        <div class="contact-info_text">
                            <p class="mb-2">
                                <strong>Mahesh Master:</strong><br>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>"><?php echo esc_html($phone1); ?></a>
                            </p>
                            <p class="mb-2">
                                <strong>Secunderabad Office:</strong><br>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone2)); ?>"><?php echo esc_html($phone2); ?></a>
                            </p>
                            <p class="mb-2">
                                <strong>Shivam Road Branch:</strong><br>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_shivam)); ?>"><?php echo esc_html($phone_shivam); ?></a>
                            </p>
                            <p class="mb-0">
                                <strong>Email:</strong><br>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timings Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div>
                        <div class="contact-info_icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <h4 class="contact-info_title">Class &amp; Studio Timings</h4>
                        <div class="contact-info_text">
                            <p class="mb-2">
                                <strong>Monday to Saturday:</strong><br>
                                <?php echo esc_html($hours_w); ?>
                            </p>
                            <p class="mb-2">
                                <strong>Sunday:</strong><br>
                                <?php echo esc_html($hours_s); ?>
                            </p>
                            <p class="mb-0 text-white-50" style="font-size: 13px;">
                                &bull; Morning &amp; Evening Batches Available<br>
                                &bull; Separate Batches for Kids &amp; Ladies
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form Section (Integrated with Contact Form 7) -->
<div class="space-bottom overflow-hidden bg-dark" id="contact-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contact-image">
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
                // Render Contact Form 7
                $fallback_form = '<form action="mailto:' . esc_attr($email) . '" method="POST" class="contact-us-form">
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
                            <textarea name="message" rows="4" class="form-control" placeholder="Your Message / Fitness Goals"></textarea>
                        </div>
                        <div class="contact-form-btn col-12">
                            <button type="submit" class="th-btn blue-btn w-100">Send Message &amp; Book Free Demo</button>
                        </div>
                    </div>
                </form>';

                if (!empty($cf7_override)) {
                    echo kosmic_render_cf7($cf7_override, $fallback_form);
                } else {
                    echo kosmic_render_cf7('Kosmic Studio Trial & Contact Form', $fallback_form);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="shape-mockup ripple-animation d-none d-xl-block" data-bottom="15%" data-left="5%">
        <img src="<?php echo kosmic_asset('img/shape/shape_7.png'); ?>" alt="shape">
    </div>
    <div class="shape-mockup jump d-none d-xl-block" data-top="-45%" data-right="0%">
        <img src="<?php echo kosmic_asset('img/shape/contact_shape.svg'); ?>" alt="shape">
    </div>
</div>

<!-- Google Maps - Dual Branch Locations (Dynamic from Studio Settings) -->
<section class="space bg-dark" id="branch-maps-sec">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Our Locations</span>
            <h2 class="sec-title text-white">Find Us On Google Maps</h2>
            <p class="text-white-50" style="max-width: 650px; margin: 0 auto;">Visit our two fully air-conditioned studios in Secunderabad and Hyderabad. Get real-time directions or navigate directly to each branch below.</p>
        </div>
        <div class="row gy-4">
            <!-- Branch 1: Padmarao Nagar Studio -->
            <div class="col-lg-6">
                <div class="feature-card-dark d-flex flex-column h-100">
                    <div class="mb-3">
                        <span class="text-white-50" style="font-size: 13px;"><i class="fa-solid fa-clock me-1 text-danger"></i> <?php echo esc_html($hours_w); ?></span>
                    </div>
                    <h3 class="text-white mb-2" style="font-size: 24px; font-weight: 700;"><?php echo esc_html($branch1_name); ?></h3>
                    <p class="text-white-50 mb-2"><i class="fa-sharp fa-solid fa-location-dot me-2 text-danger"></i><?php echo esc_html($branch1_address); ?></p>
                    <p class="text-white-50 mb-3"><i class="fa-solid fa-phone me-2 text-danger"></i>Phone: <?php echo esc_html($branch1_phone); ?></p>
                    <div class="branch-map-embed mb-4" style="border-radius: 12px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1);">
                        <iframe src="<?php echo esc_url($branch1_map); ?>" width="100%" height="320" style="border:0; display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-auto">
                        <a href="<?php echo esc_url($branch1_share); ?>" target="_blank" rel="noopener noreferrer" class="th-btn blue-btn w-100 text-center">
                            <i class="fa-solid fa-diamond-turn-right me-2"></i>Open in Google Maps / Get Directions
                        </a>
                    </div>
                </div>
            </div>

            <!-- Branch 2: Shivam Road Branch -->
            <div class="col-lg-6">
                <div class="feature-card-dark d-flex flex-column h-100">
                    <div class="mb-3">
                        <span class="text-white-50" style="font-size: 13px;"><i class="fa-solid fa-clock me-1 text-info"></i> <?php echo esc_html($hours_w); ?></span>
                    </div>
                    <h3 class="text-white mb-2" style="font-size: 24px; font-weight: 700;"><?php echo esc_html($branch2_name); ?></h3>
                    <p class="text-white-50 mb-2"><i class="fa-sharp fa-solid fa-location-dot me-2 text-info"></i><?php echo esc_html($branch2_address); ?></p>
                    <p class="text-white-50 mb-3"><i class="fa-solid fa-phone me-2 text-info"></i>Phone: <?php echo esc_html($branch2_phone); ?></p>
                    <div class="branch-map-embed mb-4" style="border-radius: 12px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1);">
                        <iframe src="<?php echo esc_url($branch2_map); ?>" width="100%" height="320" style="border:0; display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-auto">
                        <a href="<?php echo esc_url($branch2_share); ?>" target="_blank" rel="noopener noreferrer" class="th-btn blue-btn w-100 text-center">
                            <i class="fa-solid fa-diamond-turn-right me-2"></i>Open in Google Maps / Get Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
