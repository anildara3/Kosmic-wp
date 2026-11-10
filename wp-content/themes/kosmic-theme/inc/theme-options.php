<?php
/**
 * Studio Settings (Theme Options) for Kosmic Studio 4 Danz
 *
 * Provides a clean, dynamic dashboard settings page for global studio data,
 * fully compatible with ACF Free and standard WordPress settings API.
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Studio Settings Admin Menu
 */
function kosmic_register_theme_options_page() {
    add_menu_page(
        esc_html__('Studio Settings', 'kosmic'),
        esc_html__('Studio Settings', 'kosmic'),
        'manage_options',
        'kosmic-settings',
        'kosmic_render_theme_options_page',
        'dashicons-admin-generic',
        59
    );
}
add_action('admin_menu', 'kosmic_register_theme_options_page');

/**
 * Register Settings in WordPress
 */
function kosmic_register_settings() {
    register_setting('kosmic_settings_group', 'kosmic_settings', 'kosmic_sanitize_settings');
}
add_action('admin_init', 'kosmic_register_settings');

function kosmic_sanitize_settings($input) {
    $sanitized = array();
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            if (in_array($key, array('branch1_map', 'branch2_map', 'footer_about_text'))) {
                $sanitized[$key] = wp_kses_post($value);
            } else {
                $sanitized[$key] = sanitize_text_field($value);
            }
        }
    }
    return $sanitized;
}

/**
 * Helper function to retrieve a setting value with fallback
 */
function kosmic_get_option($key, $default = '') {
    // 1. Check if ACF Options exists (for future ACF Pro compatibility)
    if (function_exists('get_field')) {
        $acf_val = get_field($key, 'option');
        if (!empty($acf_val)) {
            return $acf_val;
        }
    }

    // 2. Read from WordPress kosmic_settings option
    $options = get_option('kosmic_settings', array());
    if (isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }

    // 3. Defaults
    $defaults = array(
        'phone_1'           => '+91 97033 66311',
        'phone_2'           => '+91 95026 26988',
        'phone_shivam'      => '+91 75698 16060',
        'whatsapp_number'   => '919703366311',
        'email_address'     => 'kosmicstudio4danz@gmail.com',
        'hours_weekdays'    => 'Mon - Sat: 06:00 AM - 09:00 PM',
        'hours_sundays'     => 'Sun: 07:00 AM - 01:00 PM',
        'branch1_name'      => 'Padmarao Nagar Studio (Secunderabad)',
        'branch1_address'   => '6-1-289/7, 2nd Flr, Rd No 3, Above Ratnadeep, Secunderabad - 500025',
        'branch1_phone'     => '+91 97033 66311 / +91 95026 26988',
        'branch2_name'      => 'Shivam Road Branch (Hyderabad)',
        'branch2_address'   => '3rd Flr, MIG-80, Opp Union Bank, Bathukamma Kunta, DD Colony, Hyderabad - 500013',
        'branch2_phone'     => '+91 75698 16060 / +91 97033 66311',
        'social_facebook'   => 'https://www.facebook.com/mahesh.chillaka',
        'social_instagram'  => 'https://www.instagram.com/kosmic_studio_4danz/?hl=en',
        'social_youtube'    => 'https://www.youtube.com/user/mahesh8maddy',
        'social_twitter'    => 'https://twitter.com/kosmicstudio',
        'footer_about_text' => 'Passionate Choreographers With 15+ Years Experience Crafting Powerful Routines In Hyderabad. Professional Training In Weight Loss, Zumba, Classical & Kids Batches In 100% AC Studios.',
        'footer_copyright'  => 'Copyright &copy; ' . date('Y') . ' Kosmic Studio 4 Danz. All Rights Reserved. Directed by Master C. Mahesh Babu.',
    );

    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

/**
 * Render Studio Settings Admin Page
 */
function kosmic_render_theme_options_page() {
    $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'general';
    $settings = get_option('kosmic_settings', array());
    ?>
    <div class="wrap" style="max-width: 1000px; margin-top: 25px;">
        <h1 style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
            <span class="dashicons dashicons-admin-generic" style="font-size: 32px; width: 32px; height: 32px; color: #6B2AE6;"></span>
            <?php esc_html_e('Kosmic Studio 4 Danz - Global Site Settings', 'kosmic'); ?>
        </h1>
        <p class="description" style="font-size: 14px; margin-bottom: 25px;">
            <?php esc_html_e('Update studio contact details, branch locations, operating hours, social links, and footer info across the entire website from one central place.', 'kosmic'); ?>
        </p>

        <?php settings_errors(); ?>

        <h2 class="nav-tab-wrapper" style="margin-bottom: 25px;">
            <a href="?page=kosmic-settings&tab=general" class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e('Contact & Hours', 'kosmic'); ?>
            </a>
            <a href="?page=kosmic-settings&tab=branches" class="nav-tab <?php echo $active_tab === 'branches' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e('Branches & Locations', 'kosmic'); ?>
            </a>
            <a href="?page=kosmic-settings&tab=social" class="nav-tab <?php echo $active_tab === 'social' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e('Social Media Links', 'kosmic'); ?>
            </a>
            <a href="?page=kosmic-settings&tab=footer" class="nav-tab <?php echo $active_tab === 'footer' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e('Header & Footer', 'kosmic'); ?>
            </a>
        </h2>

        <form method="post" action="options.php" style="background: #fff; padding: 25px 35px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.06);">
            <?php
            settings_fields('kosmic_settings_group');

            // Pass existing values for tabs not currently active so they are not wiped
            foreach ($settings as $k => $v) {
                echo '<input type="hidden" name="kosmic_settings[' . esc_attr($k) . ']" value="' . esc_attr($v) . '">';
            }
            ?>

            <?php if ($active_tab === 'general') : ?>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="phone_1"><?php esc_html_e('Primary Phone / Mahesh Master', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[phone_1]" id="phone_1" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('phone_1')); ?>">
                            <p class="description"><?php esc_html_e('e.g. +91 97033 66311', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="phone_2"><?php esc_html_e('Secondary Phone / Secunderabad', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[phone_2]" id="phone_2" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('phone_2')); ?>">
                            <p class="description"><?php esc_html_e('e.g. +91 95026 26988', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="phone_shivam"><?php esc_html_e('Shivam Road Branch Phone', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[phone_shivam]" id="phone_shivam" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('phone_shivam')); ?>">
                            <p class="description"><?php esc_html_e('e.g. +91 75698 16060', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="whatsapp_number"><?php esc_html_e('WhatsApp Number (with country code)', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[whatsapp_number]" id="whatsapp_number" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('whatsapp_number')); ?>">
                            <p class="description"><?php esc_html_e('e.g. 919703366311 (digits only, no spaces or plus)', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email_address"><?php esc_html_e('Studio Email Address', 'kosmic'); ?></label></th>
                        <td>
                            <input type="email" name="kosmic_settings[email_address]" id="email_address" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('email_address')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hours_weekdays"><?php esc_html_e('Weekdays Working Hours', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[hours_weekdays]" id="hours_weekdays" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('hours_weekdays')); ?>">
                            <p class="description"><?php esc_html_e('e.g. Mon - Sat: 06:00 AM - 09:00 PM', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hours_sundays"><?php esc_html_e('Sundays Working Hours', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[hours_sundays]" id="hours_sundays" class="regular-text" value="<?php echo esc_attr(kosmic_get_option('hours_sundays')); ?>">
                            <p class="description"><?php esc_html_e('e.g. Sun: 07:00 AM - 01:00 PM', 'kosmic'); ?></p>
                        </td>
                    </tr>
                </table>

            <?php elseif ($active_tab === 'branches') : ?>
                <h3 style="margin-top: 10px; color: #6B2AE6;"><?php esc_html_e('Branch 1: Padmarao Nagar (Secunderabad)', 'kosmic'); ?></h3>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="branch1_name"><?php esc_html_e('Branch 1 Title', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[branch1_name]" id="branch1_name" class="large-text" value="<?php echo esc_attr(kosmic_get_option('branch1_name')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="branch1_address"><?php esc_html_e('Branch 1 Address', 'kosmic'); ?></label></th>
                        <td>
                            <textarea name="kosmic_settings[branch1_address]" id="branch1_address" rows="3" class="large-text"><?php echo esc_textarea(kosmic_get_option('branch1_address')); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="branch1_phone"><?php esc_html_e('Branch 1 Phones', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[branch1_phone]" id="branch1_phone" class="large-text" value="<?php echo esc_attr(kosmic_get_option('branch1_phone')); ?>">
                        </td>
                    </tr>
                </table>

                <hr style="margin: 30px 0;">

                <h3 style="color: #6B2AE6;"><?php esc_html_e('Branch 2: Shivam Road (DD Colony, Hyderabad)', 'kosmic'); ?></h3>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="branch2_name"><?php esc_html_e('Branch 2 Title', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[branch2_name]" id="branch2_name" class="large-text" value="<?php echo esc_attr(kosmic_get_option('branch2_name')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="branch2_address"><?php esc_html_e('Branch 2 Address', 'kosmic'); ?></label></th>
                        <td>
                            <textarea name="kosmic_settings[branch2_address]" id="branch2_address" rows="3" class="large-text"><?php echo esc_textarea(kosmic_get_option('branch2_address')); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="branch2_phone"><?php esc_html_e('Branch 2 Phones', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[branch2_phone]" id="branch2_phone" class="large-text" value="<?php echo esc_attr(kosmic_get_option('branch2_phone')); ?>">
                        </td>
                    </tr>
                </table>

            <?php elseif ($active_tab === 'social') : ?>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="social_facebook"><?php esc_html_e('Facebook URL', 'kosmic'); ?></label></th>
                        <td>
                            <input type="url" name="kosmic_settings[social_facebook]" id="social_facebook" class="large-text" value="<?php echo esc_attr(kosmic_get_option('social_facebook')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_instagram"><?php esc_html_e('Instagram URL', 'kosmic'); ?></label></th>
                        <td>
                            <input type="url" name="kosmic_settings[social_instagram]" id="social_instagram" class="large-text" value="<?php echo esc_attr(kosmic_get_option('social_instagram')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_youtube"><?php esc_html_e('YouTube Channel URL', 'kosmic'); ?></label></th>
                        <td>
                            <input type="url" name="kosmic_settings[social_youtube]" id="social_youtube" class="large-text" value="<?php echo esc_attr(kosmic_get_option('social_youtube')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_twitter"><?php esc_html_e('Twitter / X URL', 'kosmic'); ?></label></th>
                        <td>
                            <input type="url" name="kosmic_settings[social_twitter]" id="social_twitter" class="large-text" value="<?php echo esc_attr(kosmic_get_option('social_twitter')); ?>">
                        </td>
                    </tr>
                </table>

            <?php elseif ($active_tab === 'footer') : ?>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="footer_about_text"><?php esc_html_e('Footer About Us Text', 'kosmic'); ?></label></th>
                        <td>
                            <textarea name="kosmic_settings[footer_about_text]" id="footer_about_text" rows="4" class="large-text"><?php echo esc_textarea(kosmic_get_option('footer_about_text')); ?></textarea>
                            <p class="description"><?php esc_html_e('Appears in Column 1 of the website footer across all pages.', 'kosmic'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="footer_copyright"><?php esc_html_e('Copyright Bar Text', 'kosmic'); ?></label></th>
                        <td>
                            <input type="text" name="kosmic_settings[footer_copyright]" id="footer_copyright" class="large-text" value="<?php echo esc_attr(kosmic_get_option('footer_copyright')); ?>">
                            <p class="description"><?php esc_html_e('Appears in the bottom bar of the website.', 'kosmic'); ?></p>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <?php submit_button(esc_html__('Save Studio Settings', 'kosmic'), 'primary', 'submit', true, array('style' => 'background: #6B2AE6; border-color: #551db8;')); ?>
        </form>
    </div>
    <?php
}

