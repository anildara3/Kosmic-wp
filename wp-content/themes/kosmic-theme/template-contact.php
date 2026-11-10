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
$map_iframe   = get_field('contact_map_iframe') ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.666930263435!2d78.50854297493566!3d17.427771783466185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb998495031b29%3A0x7d6f58dfb6cf1b09!2sPadmarao%20Nagar%2C%20Secunderabad%2C%20Telangana%20500025!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin';
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

<!-- Google Map Section (Dynamic Embed) -->
<?php if (!empty($map_iframe)) : ?>
<div class="map-sec">
    <iframe src="<?php echo esc_url($map_iframe); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<?php endif; ?>

<?php
get_footer();
