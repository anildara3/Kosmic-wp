<?php
/**
 * Contact Form 7 Setup and Custom Styling Integration for Kosmic Studio 4 Danz
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Disable Contact Form 7 automatic <p> and <br> injection which breaks layout
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Automatically create or update default CF7 forms with rich dark layout
 */
function kosmic_setup_default_cf7_forms() {
    if (!class_exists('WPCF7_ContactForm')) {
        return;
    }

    // 1. Quick Demo Booking Form (For Homepage Bar)
    $quick_id = kosmic_get_cf7_id('Kosmic Quick Booking Bar');
    $quick_form_content = '<div class="input-wrap">
    <div class="form-group">
        [text* your-name class:form-control class:kosmic-dark-input placeholder "Your Name"]
    </div>
    <div class="form-group">
        [tel* your-phone class:form-control class:kosmic-dark-input placeholder "Phone Number / Email"]
    </div>
    <div class="form-group">
        [select your-program class:form-select class:kosmic-dark-input "Select Program" "Bollywood & Freestyle Dance" "5-Days-5-Variation Weight Loss" "Zumba & Aerobics" "Kuchipudi Classical Dance" "Gymnastics & Kids Acrobatics" "Power Yoga & Wellness" "Keyboard & Guitar" "Carnatic Vocal & Veena" "Drawing & Abacus (Kids)"]
    </div>
    <div class="form-btn">
        [submit class:th-btn class:btn-fw class:blue-btn "Book Free Demo"]
    </div>
</div>';

    if (!$quick_id) {
        $form = WPCF7_ContactForm::get_template();
        $form->set_title('Kosmic Quick Booking Bar');
        $form->set_properties(array('form' => $quick_form_content));
        $form->save();
    } else {
        $cf = wpcf7_contact_form($quick_id);
        if ($cf && $cf->prop('form') !== $quick_form_content) {
            $cf->set_properties(array('form' => $quick_form_content));
            $cf->save();
        }
    }

    // 2. Full Consultation & Trial Booking Form (For Contact Page & Home Contact Section)
    $full_id = kosmic_get_cf7_id('Kosmic Studio Trial & Contact Form');
    $full_form_content = '<div class="row gy-3">
    <div class="col-md-6">
        <label class="form-label kosmic-form-label mb-2">Your Full Name <span class="required-star" style="color: #EB0029;">*</span></label>
        [text* your-name class:form-control class:kosmic-dark-input placeholder "Your Full Name"]
    </div>
    <div class="col-md-6">
        <label class="form-label kosmic-form-label mb-2">Your Email Address <span class="required-star" style="color: #EB0029;">*</span></label>
        [email* your-email class:form-control class:kosmic-dark-input placeholder "Your Email Address"]
    </div>
    <div class="col-md-6">
        <label class="form-label kosmic-form-label mb-2">Phone Number <span class="required-star" style="color: #EB0029;">*</span></label>
        [tel* your-phone class:form-control class:kosmic-dark-input placeholder "Phone Number"]
    </div>
    <div class="col-md-6">
        <label class="form-label kosmic-form-label mb-2">Select Preferred Branch</label>
        [select your-branch class:form-select class:kosmic-dark-input "Padmarao Nagar, Secunderabad" "Shivam Road / DD Colony, Hyderabad"]
    </div>
    <div class="col-12">
        <label class="form-label kosmic-form-label mb-2">Select Program / Inquiry Type</label>
        [select your-program class:form-select class:kosmic-dark-input "Bollywood & Freestyle Dance" "5-Days-5-Variation Weight Loss" "Zumba & Aerobics Fitness" "Kuchipudi Classical Dance" "Gymnastics & Kids Acrobatics" "Power Yoga & Wellness" "Western Keyboard & Guitar" "Carnatic Vocal & Veena" "Drawing & Abacus (Kids)" "Wedding / Sangeeth Choreography" "General Inquiry & Demo Class"]
    </div>
    <div class="col-12">
        <label class="form-label kosmic-form-label mb-2">Your Message / Fitness Goals</label>
        [textarea your-message class:form-control class:kosmic-dark-input 30x4 placeholder "Your Message / Fitness Goals (e.g. Weight loss, preferred timings, age of student, demo request)"]
    </div>
    <div class="col-12 mt-3">
        [submit class:th-btn class:blue-btn class:w-100 "Book Free Trial Class"]
    </div>
</div>';

    if (!$full_id) {
        $form = WPCF7_ContactForm::get_template();
        $form->set_title('Kosmic Studio Trial & Contact Form');
        $form->set_properties(array('form' => $full_form_content));
        $form->save();
    } else {
        $cf = wpcf7_contact_form($full_id);
        if ($cf && $cf->prop('form') !== $full_form_content) {
            $cf->set_properties(array('form' => $full_form_content));
            $cf->save();
        }
    }
}
add_action('init', 'kosmic_setup_default_cf7_forms', 20);

/**
 * Helper to get a CF7 form ID by title (handles entities like & and &amp;)
 */
function kosmic_get_cf7_id($title) {
    if (!class_exists('WPCF7_ContactForm')) {
        return 0;
    }

    global $wpdb;
    $title_raw = trim($title);
    $title_ent = esc_html($title_raw);

    $id = $wpdb->get_var($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'wpcf7_contact_form' AND post_status = 'publish' AND (post_title = %s OR post_title = %s) ORDER BY ID ASC LIMIT 1",
        $title_raw,
        $title_ent
    ));

    return $id ? intval($id) : 0;
}

/**
 * Helper to render CF7 form with fallback
 */
function kosmic_render_cf7($form_identifier, $fallback_html = '') {
    if (shortcode_exists('contact-form-7')) {
        // If it's a full shortcode string [contact-form-7 ...]
        if (strpos($form_identifier, '[contact-form-7') !== false) {
            return do_shortcode($form_identifier);
        }

        // If numeric ID
        if (is_numeric($form_identifier) && $form_identifier > 0) {
            return do_shortcode('[contact-form-7 id="' . intval($form_identifier) . '"]');
        }

        // If title string
        $form_id = kosmic_get_cf7_id($form_identifier);
        if ($form_id) {
            return do_shortcode('[contact-form-7 id="' . intval($form_id) . '"]');
        }
    }

    return $fallback_html;
}

/**
 * Global Styling adjustments for all form fields, labels, inputs and submit buttons
 * Guarantees visible labels, dark input backgrounds, and styled buttons across the site.
 */
function kosmic_cf7_custom_styles() {
    ?>
    <style id="kosmic-dark-forms-css">
        /* 1. Visible labels on dark backgrounds */
        body:not(.light-mode) .wpcf7 label,
        body:not(.light-mode) .wpcf7-form label,
        body:not(.light-mode) .contact-us-form label,
        body:not(.light-mode) .input-form label,
        body:not(.light-mode) #contact-sec label,
        body:not(.light-mode) .bg-dark label,
        body:not(.light-mode) .form-label,
        body:not(.light-mode) .kosmic-form-label {
            color: #ffffff !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            margin-bottom: 8px !important;
            display: inline-block !important;
            letter-spacing: 0.3px !important;
            opacity: 1 !important;
        }

        /* 2. Dark background for all input fields, textareas, selects */
        body:not(.light-mode) .wpcf7 input[type="text"],
        body:not(.light-mode) .wpcf7 input[type="email"],
        body:not(.light-mode) .wpcf7 input[type="tel"],
        body:not(.light-mode) .wpcf7 input[type="url"],
        body:not(.light-mode) .wpcf7 input[type="number"],
        body:not(.light-mode) .wpcf7 input[type="date"],
        body:not(.light-mode) .wpcf7 textarea,
        body:not(.light-mode) .wpcf7 select,
        body:not(.light-mode) .wpcf7 .form-control,
        body:not(.light-mode) .wpcf7 .form-select,
        body:not(.light-mode) .contact-us-form input:not([type="submit"]),
        body:not(.light-mode) .contact-us-form textarea,
        body:not(.light-mode) .contact-us-form select,
        body:not(.light-mode) .contact-us-form .form-control,
        body:not(.light-mode) .contact-us-form .form-select,
        body:not(.light-mode) .input-form input:not([type="submit"]),
        body:not(.light-mode) .input-form select,
        body:not(.light-mode) .input-form .form-control,
        body:not(.light-mode) #contact-sec input:not([type="submit"]),
        body:not(.light-mode) #contact-sec textarea,
        body:not(.light-mode) #contact-sec select,
        body:not(.light-mode) .kosmic-dark-input {
            background-color: #1a1f2c !important;
            background: #1a1f2c !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.16) !important;
            border-radius: 10px !important;
            height: 56px;
            padding: 0 20px !important;
            font-size: 15px !important;
            font-family: inherit !important;
            width: 100% !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25) inset !important;
            transition: all 0.3s ease-in-out !important;
            display: block !important;
        }

        /* 3. Textarea dark styling */
        body:not(.light-mode) .wpcf7 textarea,
        body:not(.light-mode) .contact-us-form textarea,
        body:not(.light-mode) #contact-sec textarea,
        body:not(.light-mode) textarea.kosmic-dark-input {
            height: auto !important;
            min-height: 125px !important;
            padding: 16px 20px !important;
            line-height: 1.6 !important;
            resize: vertical !important;
        }

        /* 4. Select dropdown options dark styling */
        body:not(.light-mode) .wpcf7 select,
        body:not(.light-mode) .contact-us-form select,
        body:not(.light-mode) #contact-sec select,
        body:not(.light-mode) select.kosmic-dark-input {
            appearance: auto !important;
            -webkit-appearance: menulist !important;
            padding-right: 35px !important;
            cursor: pointer !important;
        }

        body:not(.light-mode) .wpcf7 select option,
        body:not(.light-mode) .contact-us-form select option,
        body:not(.light-mode) #contact-sec select option,
        body:not(.light-mode) select.kosmic-dark-input option {
            background-color: #161921 !important;
            color: #ffffff !important;
            padding: 10px 15px !important;
        }

        /* 5. Dark mode placeholder text */
        body:not(.light-mode) .wpcf7 input::placeholder,
        body:not(.light-mode) .wpcf7 textarea::placeholder,
        body:not(.light-mode) .contact-us-form input::placeholder,
        body:not(.light-mode) .contact-us-form textarea::placeholder,
        body:not(.light-mode) .input-form input::placeholder,
        body:not(.light-mode) .kosmic-dark-input::placeholder {
            color: #8e97a6 !important;
            opacity: 1 !important;
        }
        body:not(.light-mode) .wpcf7 input::-webkit-input-placeholder,
        body:not(.light-mode) .wpcf7 textarea::-webkit-input-placeholder,
        body:not(.light-mode) .contact-us-form input::-webkit-input-placeholder,
        body:not(.light-mode) .contact-us-form textarea::-webkit-input-placeholder,
        body:not(.light-mode) .input-form input::-webkit-input-placeholder,
        body:not(.light-mode) .kosmic-dark-input::-webkit-input-placeholder {
            color: #8e97a6 !important;
            opacity: 1 !important;
        }

        /* 6. Active Focus Glow state in dark mode */
        body:not(.light-mode) .wpcf7 input:focus,
        body:not(.light-mode) .wpcf7 textarea:focus,
        body:not(.light-mode) .wpcf7 select:focus,
        body:not(.light-mode) .contact-us-form input:focus,
        body:not(.light-mode) .contact-us-form textarea:focus,
        body:not(.light-mode) .contact-us-form select:focus,
        body:not(.light-mode) .input-form input:focus,
        body:not(.light-mode) .input-form select:focus,
        body:not(.light-mode) .kosmic-dark-input:focus {
            background-color: #212838 !important;
            background: #212838 !important;
            border-color: #6B2AE6 !important;
            box-shadow: 0 0 0 3px rgba(107, 42, 230, 0.35), 0 2px 8px rgba(0, 0, 0, 0.3) inset !important;
            outline: none !important;
            color: #ffffff !important;
        }

        /* 7. Hover state in dark mode */
        body:not(.light-mode) .wpcf7 input:hover,
        body:not(.light-mode) .wpcf7 textarea:hover,
        body:not(.light-mode) .wpcf7 select:hover,
        body:not(.light-mode) .contact-us-form input:hover,
        body:not(.light-mode) .contact-us-form textarea:hover,
        body:not(.light-mode) .contact-us-form select:hover,
        body:not(.light-mode) .kosmic-dark-input:hover {
            border-color: rgba(107, 42, 230, 0.7) !important;
        }

        /* =====================================================================
           LIGHT MODE FORM CONTRAST & LEGIBILITY RULES
           Guarantees 100% visible dark labels, clean crisp light input fields,
           and perfect dropdown contrast in Light Mode.
           ===================================================================== */
        body.light-mode .wpcf7 label,
        body.light-mode .wpcf7-form label,
        body.light-mode .contact-us-form label,
        body.light-mode .input-form label,
        body.light-mode #contact-sec label,
        body.light-mode .form-label,
        body.light-mode .kosmic-form-label,
        body.light-mode .wpcf7 form p > label {
            color: #161921 !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            margin-bottom: 8px !important;
            display: inline-block !important;
            opacity: 1 !important;
        }

        /* Override any inline style on labels in light mode */
        body.light-mode .wpcf7 label[style],
        body.light-mode #contact-sec label[style],
        body.light-mode .contact-us-form label[style] {
            color: #161921 !important;
        }

        body.light-mode .wpcf7 input[type="text"],
        body.light-mode .wpcf7 input[type="email"],
        body.light-mode .wpcf7 input[type="tel"],
        body.light-mode .wpcf7 input[type="url"],
        body.light-mode .wpcf7 input[type="number"],
        body.light-mode .wpcf7 input[type="date"],
        body.light-mode .wpcf7 textarea,
        body.light-mode .wpcf7 select,
        body.light-mode .wpcf7 .form-control,
        body.light-mode .wpcf7 .form-select,
        body.light-mode .contact-us-form input:not([type="submit"]),
        body.light-mode .contact-us-form textarea,
        body.light-mode .contact-us-form select,
        body.light-mode .contact-us-form .form-control,
        body.light-mode .contact-us-form .form-select,
        body.light-mode .input-form input:not([type="submit"]),
        body.light-mode .input-form select,
        body.light-mode .input-form .form-control,
        body.light-mode #contact-sec input:not([type="submit"]),
        body.light-mode #contact-sec textarea,
        body.light-mode #contact-sec select,
        body.light-mode .kosmic-dark-input {
            background-color: #f8fafc !important;
            background: #f8fafc !important;
            color: #161921 !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 10px !important;
            height: 56px;
            padding: 0 20px !important;
            font-size: 15px !important;
            font-family: inherit !important;
            width: 100% !important;
            box-shadow: none !important;
            transition: all 0.3s ease-in-out !important;
            display: block !important;
        }

        body.light-mode .wpcf7 textarea,
        body.light-mode .contact-us-form textarea,
        body.light-mode #contact-sec textarea,
        body.light-mode textarea.kosmic-dark-input {
            height: auto !important;
            min-height: 125px !important;
            padding: 16px 20px !important;
            line-height: 1.6 !important;
            resize: vertical !important;
        }

        body.light-mode .wpcf7 select,
        body.light-mode .contact-us-form select,
        body.light-mode #contact-sec select,
        body.light-mode select.kosmic-dark-input {
            appearance: auto !important;
            -webkit-appearance: menulist !important;
            padding-right: 35px !important;
            cursor: pointer !important;
        }

        body.light-mode .wpcf7 select option,
        body.light-mode .contact-us-form select option,
        body.light-mode #contact-sec select option,
        body.light-mode select.kosmic-dark-input option {
            background-color: #ffffff !important;
            color: #161921 !important;
            padding: 10px 15px !important;
        }

        /* jQuery Nice Select Plugin Elements */
        body.light-mode .nice-select {
            background-color: #f8fafc !important;
            background: #f8fafc !important;
            color: #161921 !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 10px !important;
            box-shadow: none !important;
        }

        body.light-mode .nice-select:hover,
        body.light-mode .nice-select.open,
        body.light-mode .nice-select:focus {
            background-color: #ffffff !important;
            border-color: #6b2ae6 !important;
            box-shadow: 0 0 0 3px rgba(107, 42, 230, 0.15) !important;
        }

        body.light-mode .nice-select .current {
            color: #161921 !important;
            font-weight: 500 !important;
        }

        body.light-mode .nice-select:after {
            border-bottom: 2px solid #161921 !important;
            border-right: 2px solid #161921 !important;
        }

        body.light-mode .nice-select .list {
            background-color: #ffffff !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        body.light-mode .nice-select .option {
            color: #161921 !important;
            background-color: #ffffff !important;
            font-weight: 400 !important;
        }

        body.light-mode .nice-select .option:hover,
        body.light-mode .nice-select .option.focus,
        body.light-mode .nice-select .option.selected.focus {
            background-color: #f1f5f9 !important;
            color: #6b2ae6 !important;
            font-weight: 600 !important;
        }

        body.light-mode .nice-select .option.selected {
            color: #6b2ae6 !important;
            font-weight: 700 !important;
        }

        body.light-mode .wpcf7 input::placeholder,
        body.light-mode .wpcf7 textarea::placeholder,
        body.light-mode .contact-us-form input::placeholder,
        body.light-mode .contact-us-form textarea::placeholder,
        body.light-mode .input-form input::placeholder,
        body.light-mode .kosmic-dark-input::placeholder {
            color: #94a3b8 !important;
            opacity: 1 !important;
        }

        body.light-mode .wpcf7 input:focus,
        body.light-mode .wpcf7 textarea:focus,
        body.light-mode .wpcf7 select:focus,
        body.light-mode .contact-us-form input:focus,
        body.light-mode .contact-us-form textarea:focus,
        body.light-mode .contact-us-form select:focus,
        body.light-mode .input-form input:focus,
        body.light-mode .input-form select:focus,
        body.light-mode #contact-sec input:focus,
        body.light-mode #contact-sec textarea:focus,
        body.light-mode .kosmic-dark-input:focus {
            background-color: #ffffff !important;
            background: #ffffff !important;
            border-color: #6B2AE6 !important;
            box-shadow: 0 0 0 3px rgba(107, 42, 230, 0.15) !important;
            outline: none !important;
            color: #161921 !important;
        }

        body.light-mode .wpcf7 input:hover,
        body.light-mode .wpcf7 textarea:hover,
        body.light-mode .wpcf7 select:hover,
        body.light-mode .contact-us-form input:hover,
        body.light-mode .contact-us-form textarea:hover,
        body.light-mode .contact-us-form select:hover,
        body.light-mode .kosmic-dark-input:hover {
            border-color: #94a3b8 !important;
        }

        /* 8. Styled Submit Button */
        .wpcf7 input[type="submit"],
        .wpcf7 .wpcf7-submit,
        .wpcf7 button[type="submit"],
        #contact-sec input[type="submit"],
        #contact-sec button[type="submit"],
        .contact-us-form button[type="submit"],
        .contact-us-form input[type="submit"],
        .input-form button[type="submit"],
        .input-form input[type="submit"] {
            background: linear-gradient(135deg, #6B2AE6 0%, #4e19b4 100%) !important;
            color: #ffffff !important;
            font-size: 16px !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px !important;
            text-transform: capitalize !important;
            height: 56px !important;
            line-height: 56px !important;
            padding: 0 35px !important;
            border: none !important;
            border-radius: 10px !important;
            width: 100% !important;
            display: inline-block !important;
            text-align: center !important;
            cursor: pointer !important;
            box-shadow: 0 4px 18px rgba(107, 42, 230, 0.45) !important;
            transition: all 0.35s ease-in-out !important;
            margin-top: 10px !important;
        }

        .wpcf7 input[type="submit"]:hover,
        .wpcf7 .wpcf7-submit:hover,
        .wpcf7 button[type="submit"]:hover,
        #contact-sec input[type="submit"]:hover,
        #contact-sec button[type="submit"]:hover,
        .contact-us-form button[type="submit"]:hover,
        .contact-us-form input[type="submit"]:hover,
        .input-form button[type="submit"]:hover,
        .input-form input[type="submit"]:hover {
            background: linear-gradient(135deg, #EB0029 0%, #b80020 100%) !important;
            box-shadow: 0 6px 22px rgba(235, 0, 41, 0.5) !important;
            transform: translateY(-2px) !important;
            color: #ffffff !important;
        }

        /* 9. Contact Form 7 spans & wrappers */
        .wpcf7-form-control-wrap {
            display: block !important;
            width: 100% !important;
            margin-bottom: 5px !important;
        }

        .wpcf7 form p {
            margin-bottom: 18px !important;
        }

        body:not(.light-mode) .wpcf7 form p > label {
            display: block !important;
            width: 100% !important;
            color: #ffffff !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            margin-bottom: 8px !important;
        }

        /* 10. CF7 Notices, validation tips, and spinners */
        .wpcf7-spinner { display: block; margin: 12px auto; background-color: #6B2AE6; }
        .wpcf7-not-valid-tip { color: #EB0029 !important; font-size: 13px !important; margin-top: 6px !important; display: block !important; }
        .wpcf7-response-output {
            margin: 15px 0 0 !important;
            padding: 14px 20px !important;
            border-radius: 10px !important;
            font-size: 14px !important;
            border: 1px solid #6B2AE6 !important;
            background: rgba(107, 42, 230, 0.2) !important;
            color: #ffffff !important;
        }
        .wpcf7 form.sent .wpcf7-response-output {
            border-color: #28a745 !important;
            background: rgba(40, 167, 69, 0.2) !important;
        }
        .wpcf7 form.invalid .wpcf7-response-output,
        .wpcf7 form.unaccepted .wpcf7-response-output {
            border-color: #EB0029 !important;
            background: rgba(235, 0, 41, 0.2) !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'kosmic_cf7_custom_styles', 9999);
