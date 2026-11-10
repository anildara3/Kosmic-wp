<?php
/**
 * Register ACF Local Field Groups for Kosmic Studio 4 Danz
 *
 * Compatible with ACF Free (no Pro repeaters/options needed).
 * Uses native ACF fields: text, textarea, wysiwyg, image, number, select, true_false, tab.
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configure ACF JSON save/load points
 */
function kosmic_acf_json_save_point($path) {
    $path = get_template_directory() . '/acf-json';
    if (!file_exists($path)) {
        wp_mkdir_p($path);
    }
    return $path;
}
add_filter('acf/settings/save_json', 'kosmic_acf_json_save_point');

function kosmic_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'kosmic_acf_json_load_point');

/**
 * Register all local field groups
 */
function kosmic_register_acf_field_groups() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // ==========================================
    // 1. SERVICES & PROGRAMS FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_service',
        'title' => __('Service & Program Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_service_number',
                'label' => __('Service Number Badge', 'kosmic'),
                'name' => 'service_number',
                'type' => 'text',
                'instructions' => __('e.g. 01, 02, 03 (Display order on cards)', 'kosmic'),
                'default_value' => '01',
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_service_badge',
                'label' => __('Highlight Badge', 'kosmic'),
                'name' => 'service_badge',
                'type' => 'text',
                'instructions' => __('e.g. Signature Flagship Program, Popular, Kids Special', 'kosmic'),
                'default_value' => 'Flagship Program',
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_service_fee',
                'label' => __('Monthly Fee', 'kosmic'),
                'name' => 'service_fee',
                'type' => 'text',
                'instructions' => __('e.g. ₹2,500 / month', 'kosmic'),
                'wrapper' => array('width' => '34'),
            ),
            array(
                'key' => 'field_service_subtitle',
                'label' => __('Short Subtitle / Headline', 'kosmic'),
                'name' => 'service_subtitle',
                'type' => 'text',
                'instructions' => __('One-line description for the service card', 'kosmic'),
            ),
            array(
                'key' => 'field_service_icon',
                'label' => __('Service Icon Graphic', 'kosmic'),
                'name' => 'service_icon',
                'type' => 'image',
                'instructions' => __('Upload an icon (SVG or PNG)', 'kosmic'),
                'return_format' => 'url',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_service_batch_info',
                'label' => __('Batch Timings & Schedule', 'kosmic'),
                'name' => 'service_batch_info',
                'type' => 'text',
                'instructions' => __('e.g. Mon - Fri Batches • Morning & Evening', 'kosmic'),
                'default_value' => 'Mon - Fri Batches • Morning & Evening',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_service_variations',
                'label' => __('Curriculum / Weekly Variation Breakdown', 'kosmic'),
                'name' => 'service_variations',
                'type' => 'wysiwyg',
                'instructions' => __('Day-by-day or module breakdown shown on the single program page', 'kosmic'),
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key' => 'field_service_benefits',
                'label' => __('Key Program Benefits (1 per line)', 'kosmic'),
                'name' => 'service_benefits',
                'type' => 'textarea',
                'instructions' => __('Enter key highlights, 1 per line (Checkmark icons added automatically)', 'kosmic'),
                'rows' => 5,
            ),
            array(
                'key' => 'field_service_inner_img_1',
                'label' => __('Inner Gallery Photo 1', 'kosmic'),
                'name' => 'service_inner_img_1',
                'type' => 'image',
                'return_format' => 'url',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_service_inner_img_2',
                'label' => __('Inner Gallery Photo 2', 'kosmic'),
                'name' => 'service_inner_img_2',
                'type' => 'image',
                'return_format' => 'url',
                'wrapper' => array('width' => '50'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ));

    // ==========================================
    // 2. INSTRUCTORS & FACULTY FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_instructor',
        'title' => __('Instructor Profile Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_instructor_designation',
                'label' => __('Designation / Role Title', 'kosmic'),
                'name' => 'instructor_designation',
                'type' => 'text',
                'instructions' => __('e.g. Founder & Master Choreographer, Kuchipudi Classical Guru, Hip-Hop Instructor', 'kosmic'),
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_instructor_badge',
                'label' => __('Category Badge', 'kosmic'),
                'name' => 'instructor_badge',
                'type' => 'text',
                'instructions' => __('e.g. Founder, Classical, Hip-Hop, Zumba, Gymnastics', 'kosmic'),
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_instructor_short_desc',
                'label' => __('Short Bio / Description', 'kosmic'),
                'name' => 'instructor_short_desc',
                'type' => 'textarea',
                'instructions' => __('Brief summary shown on team cards', 'kosmic'),
                'rows' => 3,
            ),
            array(
                'key' => 'field_instructor_is_spotlight',
                'label' => __('Feature as Top Spotlight Founder', 'kosmic'),
                'name' => 'instructor_is_spotlight',
                'type' => 'true_false',
                'instructions' => __('Check to feature this instructor in the large spotlight banner on the Instructors page', 'kosmic'),
                'ui' => 1,
            ),
            array(
                'key' => 'field_instructor_facebook',
                'label' => __('Facebook URL', 'kosmic'),
                'name' => 'instructor_facebook',
                'type' => 'url',
                'wrapper' => array('width' => '25'),
            ),
            array(
                'key' => 'field_instructor_instagram',
                'label' => __('Instagram URL', 'kosmic'),
                'name' => 'instructor_instagram',
                'type' => 'url',
                'wrapper' => array('width' => '25'),
            ),
            array(
                'key' => 'field_instructor_youtube',
                'label' => __('YouTube URL', 'kosmic'),
                'name' => 'instructor_youtube',
                'type' => 'url',
                'wrapper' => array('width' => '25'),
            ),
            array(
                'key' => 'field_instructor_linkedin',
                'label' => __('LinkedIn / Twitter URL', 'kosmic'),
                'name' => 'instructor_linkedin',
                'type' => 'url',
                'wrapper' => array('width' => '25'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'instructor',
                ),
            ),
        ),
    ));

    // ==========================================
    // 3. TESTIMONIALS FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_testimonial',
        'title' => __('Testimonial / Review Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_testimonial_text',
                'label' => __('Review / Quote Text', 'kosmic'),
                'name' => 'testimonial_text',
                'type' => 'textarea',
                'instructions' => __('The student or parent review', 'kosmic'),
                'rows' => 4,
            ),
            array(
                'key' => 'field_testimonial_batch',
                'label' => __('Batch / Member Role / Location', 'kosmic'),
                'name' => 'testimonial_batch',
                'type' => 'text',
                'instructions' => __('e.g. 5-Days Weight Loss • Padmarao Nagar, Proud Parent, Dance Student', 'kosmic'),
                'wrapper' => array('width' => '60'),
            ),
            array(
                'key' => 'field_testimonial_rating',
                'label' => __('Star Rating (1 - 5)', 'kosmic'),
                'name' => 'testimonial_rating',
                'type' => 'number',
                'default_value' => 5,
                'min' => 1,
                'max' => 5,
                'wrapper' => array('width' => '40'),
            ),
            array(
                'key' => 'field_testimonial_avatar',
                'label' => __('Reviewer Photo / Avatar', 'kosmic'),
                'name' => 'testimonial_avatar',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
    ));

    // ==========================================
    // 4. STUDIO GALLERY FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_gallery',
        'title' => __('Gallery Item Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_gallery_tag',
                'label' => __('Category Tag / Subtitle', 'kosmic'),
                'name' => 'gallery_tag',
                'type' => 'text',
                'instructions' => __('e.g. Kids Acrobatics, Studio Life, Tollywood Beats, Weight Loss Fitness', 'kosmic'),
            ),
            array(
                'key' => 'field_gallery_image',
                'label' => __('Gallery Photo (or use Featured Image)', 'kosmic'),
                'name' => 'gallery_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'gallery_item',
                ),
            ),
        ),
    ));

    // ==========================================
    // 5. PRICING PLANS FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_pricing',
        'title' => __('Pricing Plan Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_plan_subtitle',
                'label' => __('Plan Subtitle', 'kosmic'),
                'name' => 'plan_subtitle',
                'type' => 'text',
                'instructions' => __('e.g. Bollywood, Tollywood & Hip-Hop, Signature Fitness & Fat Burn Routine', 'kosmic'),
            ),
            array(
                'key' => 'field_plan_price',
                'label' => __('Price', 'kosmic'),
                'name' => 'plan_price',
                'type' => 'text',
                'instructions' => __('e.g. ₹2,500', 'kosmic'),
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_plan_period',
                'label' => __('Billing Period', 'kosmic'),
                'name' => 'plan_period',
                'type' => 'text',
                'default_value' => '/ month',
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_plan_featured',
                'label' => __('Highlight as Featured / Popular', 'kosmic'),
                'name' => 'plan_featured',
                'type' => 'true_false',
                'instructions' => __('Adds glowing highlight style', 'kosmic'),
                'ui' => 1,
                'wrapper' => array('width' => '34'),
            ),
            array(
                'key' => 'field_plan_features',
                'label' => __('Plan Features List (1 per line)', 'kosmic'),
                'name' => 'plan_features',
                'type' => 'textarea',
                'instructions' => __('Enter features, one per line. Checkmark icons added automatically.', 'kosmic'),
                'rows' => 6,
            ),
            array(
                'key' => 'field_plan_btn_text',
                'label' => __('Button Text', 'kosmic'),
                'name' => 'plan_btn_text',
                'type' => 'text',
                'default_value' => 'Enroll in Pass',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_plan_btn_url',
                'label' => __('Button Link', 'kosmic'),
                'name' => 'plan_btn_url',
                'type' => 'text',
                'default_value' => '#contact-sec',
                'wrapper' => array('width' => '50'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pricing_plan',
                ),
            ),
        ),
    ));

    // ==========================================
    // 6. CLASS SCHEDULE FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_schedule',
        'title' => __('Class Schedule Slot Details', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_schedule_time',
                'label' => __('Time Slot', 'kosmic'),
                'name' => 'schedule_time',
                'type' => 'text',
                'instructions' => __('e.g. 06:00 AM – 07:00 AM', 'kosmic'),
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_schedule_days',
                'label' => __('Days', 'kosmic'),
                'name' => 'schedule_days',
                'type' => 'text',
                'instructions' => __('e.g. Mon – Fri, Mon Wed Fri, Sat & Sun', 'kosmic'),
                'wrapper' => array('width' => '33'),
            ),
            array(
                'key' => 'field_schedule_instructor',
                'label' => __('Instructor(s)', 'kosmic'),
                'name' => 'schedule_instructor',
                'type' => 'text',
                'instructions' => __('e.g. Pooja Reddy / Mahesh Master', 'kosmic'),
                'wrapper' => array('width' => '34'),
            ),
            array(
                'key' => 'field_schedule_badge',
                'label' => __('Batch Type Badge', 'kosmic'),
                'name' => 'schedule_badge',
                'type' => 'text',
                'instructions' => __('e.g. Ladies Special, All Levels, Kids (Age 4-12)', 'kosmic'),
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_schedule_badge_style',
                'label' => __('Badge Color Style', 'kosmic'),
                'name' => 'schedule_badge_style',
                'type' => 'select',
                'choices' => array(
                    'badge-ladies' => __('Ladies Special (Pink / Neon)', 'kosmic'),
                    'badge-batch'  => __('General / Kids (Blue / Purple)', 'kosmic'),
                ),
                'default_value' => 'badge-batch',
                'wrapper' => array('width' => '50'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'class_schedule',
                ),
            ),
        ),
    ));

    // ==========================================
    // 7. HOMEPAGE FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_front_page',
        'title' => __('Homepage Section Controls', 'kosmic'),
        'fields' => array(
            // TAB 1: HERO
            array(
                'key' => 'tab_home_hero',
                'label' => __('1. Hero Banner', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => __('Hero Subtitle', 'kosmic'),
                'name' => 'hero_subtitle',
                'type' => 'text',
                'default_value' => 'Top-Rated Dance & Fitness Academy in Hyderabad',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => __('Hero Main Title', 'kosmic'),
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Once a Dancer, is Always a Dancer',
            ),
            array(
                'key' => 'field_hero_desc',
                'label' => __('Hero Description', 'kosmic'),
                'name' => 'hero_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '15+ Years of Excellence • 3,000+ Students Trained • Directed by Tollywood Master Choreographer C. Mahesh Babu. Multi-style dance, weight loss Zumba, and classical arts.',
            ),
            array(
                'key' => 'field_hero_btn_text',
                'label' => __('Primary Button Text', 'kosmic'),
                'name' => 'hero_btn_text',
                'type' => 'text',
                'default_value' => 'Join Free Trial Class',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_btn_url',
                'label' => __('Primary Button Link', 'kosmic'),
                'name' => 'hero_btn_url',
                'type' => 'text',
                'default_value' => '#contact-sec',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_video_url',
                'label' => __('Reel Video URL (YouTube)', 'kosmic'),
                'name' => 'hero_video_url',
                'type' => 'text',
                'default_value' => 'https://www.youtube.com/user/mahesh8maddy',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_image',
                'label' => __('Hero Cutout Image', 'kosmic'),
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'url',
                'wrapper' => array('width' => '50'),
            ),

            // TAB 2: ABOUT STUDIO
            array(
                'key' => 'tab_home_about',
                'label' => __('2. About Studio Section', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_about_subtitle',
                'label' => __('About Subtitle', 'kosmic'),
                'name' => 'home_about_subtitle',
                'type' => 'text',
                'default_value' => '15+ Years Of Artistic Excellence',
            ),
            array(
                'key' => 'field_home_about_title',
                'label' => __('About Section Title', 'kosmic'),
                'name' => 'home_about_title',
                'type' => 'text',
                'default_value' => "Join Hyderabad's Premier Modern Dance & Fitness Community",
            ),
            array(
                'key' => 'field_home_about_quote',
                'label' => __('Blockquote', 'kosmic'),
                'name' => 'home_about_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Trained for 3 years by eminent Tollywood choreographer Lawrence Master. Performed in 30 to 40 Telugu and Hindi movies as a background dancer & member of the Telugu Film Dancers Union.',
            ),
            array(
                'key' => 'field_home_about_p1',
                'label' => __('About Paragraph 1', 'kosmic'),
                'name' => 'home_about_p1',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_home_about_p2',
                'label' => __('About Paragraph 2', 'kosmic'),
                'name' => 'home_about_p2',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_home_about_img',
                'label' => __('About Community Image', 'kosmic'),
                'name' => 'home_about_img',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB 3: HIGHLIGHT DISCIPLINES
            array(
                'key' => 'tab_home_highlights',
                'label' => __('3. Highlight Classes', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_h1_subtitle',
                'label' => __('Class 1 Subtitle', 'kosmic'),
                'name' => 'h1_subtitle',
                'type' => 'text',
                'default_value' => 'Urban Street & Choreography',
            ),
            array(
                'key' => 'field_h1_title',
                'label' => __('Class 1 Title', 'kosmic'),
                'name' => 'h1_title',
                'type' => 'text',
                'default_value' => 'Hip-Hop & Break Dance Class',
            ),
            array(
                'key' => 'field_h1_desc',
                'label' => __('Class 1 Description', 'kosmic'),
                'name' => 'h1_desc',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_h1_img',
                'label' => __('Class 1 Image', 'kosmic'),
                'name' => 'h1_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_h2_subtitle',
                'label' => __('Class 2 Subtitle', 'kosmic'),
                'name' => 'h2_subtitle',
                'type' => 'text',
                'default_value' => 'Weight Loss & Body Toning',
            ),
            array(
                'key' => 'field_h2_title',
                'label' => __('Class 2 Title', 'kosmic'),
                'name' => 'h2_title',
                'type' => 'text',
                'default_value' => '5-Days-5-Variation Fitness Class',
            ),
            array(
                'key' => 'field_h2_desc',
                'label' => __('Class 2 Description', 'kosmic'),
                'name' => 'h2_desc',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_h2_img',
                'label' => __('Class 2 Image', 'kosmic'),
                'name' => 'h2_img',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB 4: CTA BANNER
            array(
                'key' => 'tab_home_cta',
                'label' => __('4. Call To Action Banner', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_cta_title',
                'label' => __('CTA Title', 'kosmic'),
                'name' => 'cta_title',
                'type' => 'text',
                'default_value' => 'Sign Up For Modern Dance & Weight Loss Classes',
            ),
            array(
                'key' => 'field_cta_text',
                'label' => __('CTA Paragraph', 'kosmic'),
                'name' => 'cta_text',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Train under Tollywood movie choreographer Mahesh Master and certified fitness trainers. Separate batches for kids, teens, ladies, and working adults across Padmarao Nagar & Shivam Road DD Colony branches.',
            ),

            // TAB 5: CONTACT & BOOKING SECTION
            array(
                'key' => 'tab_home_contact',
                'label' => __('5. Contact Consultation Section', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_contact_subtitle',
                'label' => __('Contact Subtitle', 'kosmic'),
                'name' => 'home_contact_subtitle',
                'type' => 'text',
                'default_value' => 'Get In Touch',
            ),
            array(
                'key' => 'field_home_contact_title',
                'label' => __('Contact Section Title', 'kosmic'),
                'name' => 'home_contact_title',
                'type' => 'text',
                'default_value' => "Let's Talk to Mahesh Master & Expert Team",
            ),
            array(
                'key' => 'field_home_contact_desc',
                'label' => __('Contact Description', 'kosmic'),
                'name' => 'home_contact_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Book your free trial class or inquire about batch timings for Dance, Zumba, Kuchipudi, Gymnastics or Music.',
            ),
            array(
                'key' => 'field_home_contact_image',
                'label' => __('Contact Dancer Cutout Image', 'kosmic'),
                'name' => 'home_contact_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_home_contact_shortcode',
                'label' => __('Contact Form 7 Shortcode or Title', 'kosmic'),
                'name' => 'home_contact_shortcode',
                'type' => 'text',
                'default_value' => 'Kosmic Studio Trial & Contact Form',
                'instructions' => __('Enter CF7 form shortcode [contact-form-7 id="..."] or form title', 'kosmic'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
        ),
    ));

    // ==========================================
    // 8. ABOUT US PAGE FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_about_page',
        'title' => __('About Us Page Content Controls', 'kosmic'),
        'fields' => array(
            // TAB 1: FOUNDER STORY
            array(
                'key' => 'tab_about_founder',
                'label' => __('1. Founder & Story', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_founder_subtitle',
                'label' => __('Subtitle', 'kosmic'),
                'name' => 'about_founder_subtitle',
                'type' => 'text',
                'default_value' => 'Founder & Artistic Director',
            ),
            array(
                'key' => 'field_about_founder_title',
                'label' => __('Title', 'kosmic'),
                'name' => 'about_founder_title',
                'type' => 'text',
                'default_value' => 'Directed by C. Mahesh Babu (Mahesh Maddy)',
            ),
            array(
                'key' => 'field_about_founder_exp',
                'label' => __('Experience Tag Number', 'kosmic'),
                'name' => 'about_founder_exp',
                'type' => 'text',
                'default_value' => '15+',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_about_founder_exp_label',
                'label' => __('Experience Tag Label', 'kosmic'),
                'name' => 'about_founder_exp_label',
                'type' => 'text',
                'default_value' => 'Years of Dance Excellence',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_about_founder_story1',
                'label' => __('Story Paragraph 1', 'kosmic'),
                'name' => 'about_founder_story1',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Trained under eminent Tollywood choreographer Lawrence Master for over 3 years, Master Mahesh Babu has performed and assisted in 30+ to 40+ Telugu and Hindi films as a registered union choreographer and professional dancer.',
            ),
            array(
                'key' => 'field_about_founder_story2',
                'label' => __('Story Paragraph 2', 'kosmic'),
                'name' => 'about_founder_story2',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'In 2010, Master Mahesh established Kosmic Studio 4 Danz with a clear vision: to bring film-industry caliber dance instruction, high-energy fitness transformations, and holistic performing arts to Hyderabad and Secunderabad.',
            ),
            array(
                'key' => 'field_about_founder_image',
                'label' => __('Founder Photo', 'kosmic'),
                'name' => 'about_founder_image',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB 2: MILESTONES / STATS
            array(
                'key' => 'tab_about_stats',
                'label' => __('2. Milestones & Statistics', 'kosmic'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_stat1_number',
                'label' => __('Stat 1 Number', 'kosmic'),
                'name' => 'stat1_number',
                'type' => 'text',
                'default_value' => '15+',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat1_label',
                'label' => __('Stat 1 Label', 'kosmic'),
                'name' => 'stat1_label',
                'type' => 'text',
                'default_value' => 'Years of Dance Excellence',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat2_number',
                'label' => __('Stat 2 Number', 'kosmic'),
                'name' => 'stat2_number',
                'type' => 'text',
                'default_value' => '3000+',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat2_label',
                'label' => __('Stat 2 Label', 'kosmic'),
                'name' => 'stat2_label',
                'type' => 'text',
                'default_value' => 'Students & Dancers Trained',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat3_number',
                'label' => __('Stat 3 Number', 'kosmic'),
                'name' => 'stat3_number',
                'type' => 'text',
                'default_value' => '40+',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat3_label',
                'label' => __('Stat 3 Label', 'kosmic'),
                'name' => 'stat3_label',
                'type' => 'text',
                'default_value' => 'Tollywood & Hindi Film Projects',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat4_number',
                'label' => __('Stat 4 Number', 'kosmic'),
                'name' => 'stat4_number',
                'type' => 'text',
                'default_value' => '2 Studios',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_stat4_label',
                'label' => __('Stat 4 Label', 'kosmic'),
                'name' => 'stat4_label',
                'type' => 'text',
                'default_value' => 'Secunderabad & Hyderabad',
                'wrapper' => array('width' => '50'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
    ));

    // ==========================================
    // 9. CONTACT US PAGE FIELD GROUP
    // ==========================================
    acf_add_local_field_group(array(
        'key' => 'group_kosmic_contact_page',
        'title' => __('Contact Us Page Settings', 'kosmic'),
        'fields' => array(
            array(
                'key' => 'field_contact_subtitle',
                'label' => __('Contact Subtitle', 'kosmic'),
                'name' => 'contact_subtitle',
                'type' => 'text',
                'default_value' => 'Get In Touch',
            ),
            array(
                'key' => 'field_contact_title',
                'label' => __('Contact Section Title', 'kosmic'),
                'name' => 'contact_title',
                'type' => 'text',
                'default_value' => "Let's Talk to Mahesh Master & Expert Team",
            ),
            array(
                'key' => 'field_contact_desc',
                'label' => __('Contact Description', 'kosmic'),
                'name' => 'contact_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Book your free trial class, discuss fitness goals, or register for upcoming dance batches in Hyderabad & Secunderabad.',
            ),
            array(
                'key' => 'field_contact_image',
                'label' => __('Contact Dancer Cutout Image', 'kosmic'),
                'name' => 'contact_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_contact_cf7_shortcode',
                'label' => __('Contact Form 7 Shortcode (Optional Override)', 'kosmic'),
                'name' => 'contact_cf7_shortcode',
                'type' => 'text',
                'instructions' => __('Leave blank to use the default Kosmic Contact Form', 'kosmic'),
            ),
            array(
                'key' => 'field_contact_map_iframe',
                'label' => __('Google Maps Embed URL', 'kosmic'),
                'name' => 'contact_map_iframe',
                'type' => 'textarea',
                'instructions' => __('Paste the Google Maps embed src URL', 'kosmic'),
                'rows' => 3,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contact.php',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'kosmic_register_acf_field_groups');

