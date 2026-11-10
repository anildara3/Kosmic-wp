<?php
/**
 * Footer template for Kosmic Studio 4 Danz theme - Dynamic with WordPress Menus & Studio Settings
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone1       = kosmic_get_option('phone_1', '+91 97033 66311');
$phone2       = kosmic_get_option('phone_2', '+91 95026 26988');
$phone_shivam = kosmic_get_option('phone_shivam', '+91 75698 16060');
$email        = kosmic_get_option('email_address', 'kosmicstudio4danz@gmail.com');
$hours_w      = kosmic_get_option('hours_weekdays', 'Mon - Sat: 06:00 AM - 09:00 PM');
$hours_s      = kosmic_get_option('hours_sundays', 'Sun: 07:00 AM - 01:00 PM');
$about_txt    = kosmic_get_option('footer_about_text');
$copyright    = kosmic_get_option('footer_copyright');
$contact_url  = kosmic_page_url('contact-us', '/contact');
$about_url    = kosmic_page_url('about-us', '/about');
$services_url = kosmic_page_url('services-programs', '/services');
?>
        <!-- Footer -->
        <footer class="footer-wrapper footer-layout1" data-bg-src="<?php echo kosmic_asset('img/bg/footer_bg_1.png'); ?>">
            <div class="widget-area">
                <div class="container">
                    <div class="row justify-content-between">
                        <!-- Column 1: ABOUT US -->
                        <div class="col-md-6 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                            <div class="footer-widget">
                                <h3 class="widget_title"><?php esc_html_e('ABOUT US', 'kosmic'); ?></h3>
                                <div class="th-widget-about">
                                    <p class="about-text mb-4">
                                        <?php echo esc_html($about_txt); ?>
                                    </p>
                                    <div class="office-hour mb-4">
                                        <h4 class="title mb-2"><?php esc_html_e('Opening Hours:', 'kosmic'); ?></h4>
                                        <div class="office-hour-details">
                                            <div><?php echo esc_html($hours_w); ?></div>
                                            <div><?php echo esc_html($hours_s); ?></div>
                                        </div>
                                    </div>
                                    <div class="th-social-wrapper">
                                        <h6 class="social-title mb-3"><?php esc_html_e('Follow Us:', 'kosmic'); ?></h6>
                                        <div class="d-flex align-items-center gap-3 footer-social-links">
                                            <a href="<?php echo esc_url(kosmic_get_option('social_facebook')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
                                            <a href="<?php echo esc_url(kosmic_get_option('social_instagram')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="footer-social-icon"><i class="fab fa-instagram"></i></a>
                                            <a href="<?php echo esc_url(kosmic_get_option('social_youtube')); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
                                            <a href="<?php echo esc_url(kosmic_get_option('social_twitter')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="footer-social-icon"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: CONTACT & BRANCHES -->
                        <div class="col-md-6 col-lg-4 col-xl-4 mb-4 mb-lg-0">
                            <div class="footer-widget">
                                <h3 class="widget_title"><?php esc_html_e('CONTACT & BRANCHES', 'kosmic'); ?></h3>
                                <div class="th-widget-contact" style="max-width: 100%;">
                                    <div class="footer-contact-item">
                                        <div class="footer-contact-icon">
                                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="footer-contact-content">
                                            <strong><?php echo esc_html(kosmic_get_option('branch1_name')); ?>:</strong>
                                            <div class="address-text"><?php echo esc_html(kosmic_get_option('branch1_address')); ?></div>
                                            <div class="phone-text">
                                                <i class="fa-solid fa-phone"></i>
                                                Phone: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>"><?php echo esc_html($phone1); ?></a> / <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone2)); ?>"><?php echo esc_html($phone2); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-contact-item">
                                        <div class="footer-contact-icon">
                                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="footer-contact-content">
                                            <strong><?php echo esc_html(kosmic_get_option('branch2_name')); ?>:</strong>
                                            <div class="address-text"><?php echo esc_html(kosmic_get_option('branch2_address')); ?></div>
                                            <div class="phone-text">
                                                <i class="fa-solid fa-phone"></i>
                                                Phone: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_shivam)); ?>"><?php echo esc_html($phone_shivam); ?></a> / <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>"><?php echo esc_html($phone1); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-contact-item">
                                        <div class="footer-contact-icon email-icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="footer-contact-content d-flex align-items-center">
                                            <a href="mailto:<?php echo esc_attr($email); ?>" class="email-link"><?php echo esc_html($email); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: RECENT POSTS -->
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="footer-widget">
                                <h3 class="widget_title"><?php esc_html_e('RECENT POSTS', 'kosmic'); ?></h3>
                                <div class="recent-post-wrap">
                                    <?php
                                    $recent_posts_query = new WP_Query(array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => 3,
                                        'post_status'    => 'publish',
                                    ));

                                    if ($recent_posts_query->have_posts()) :
                                        while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post();
                                    ?>
                                        <div class="recent-post">
                                            <div class="media-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail('kosmic-recent-thumb'); ?>
                                                    <?php else : ?>
                                                        <img src="<?php echo kosmic_asset('img/blog/recent-post-2-3.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <div class="recent-post-meta">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa-regular fa-calendar-days me-1"></i><?php echo get_the_date('d M, Y'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                    ?>
                                        <div class="recent-post">
                                            <div class="media-img">
                                                <a href="<?php echo esc_url(home_url('/blog')); ?>"><img src="<?php echo kosmic_asset('img/blog/recent-post-2-3.jpg'); ?>" alt="Blog Image"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="post-title"><a href="<?php echo esc_url(home_url('/blog')); ?>">How 5-Days Dance Format Reinvents Weight Loss</a></h4>
                                                <div class="recent-post-meta">
                                                    <a href="<?php echo esc_url(home_url('/blog')); ?>"><i class="fa-regular fa-calendar-days me-1"></i>24 Oct, 2025</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Centered Row: QUICK LINKS (Dynamic with WordPress Menu) -->
                    <div class="footer-quicklinks footer-widget text-center">
                        <h3 class="widget_title"><?php esc_html_e('QUICK LINKS', 'kosmic'); ?></h3>
                        <?php
                        if (has_nav_menu('footer_quicklinks')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_quicklinks',
                                'container'      => false,
                                'menu_class'     => 'quick-links-horizontal',
                                'items_wrap'     => '<ul class="quick-links-horizontal">%3$s</ul>',
                                'fallback_cb'    => false,
                            ));
                        } else {
                        ?>
                            <ul class="quick-links-horizontal">
                                <li><a href="<?php echo esc_url($about_url); ?>">About Us</a></li>
                                <li><a href="<?php echo esc_url($services_url); ?>">All Classes</a></li>
                                <li><a href="<?php echo esc_url(home_url('/instructors')); ?>">Our Instructors</a></li>
                                <li><a href="<?php echo esc_url(home_url('/class-schedule')); ?>">Class Schedule</a></li>
                                <li><a href="<?php echo esc_url(home_url('/gallery')); ?>">Studio Gallery</a></li>
                                <li><a href="<?php echo esc_url($contact_url); ?>">Contact Us</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <p class="copyright-text">
                                <?php echo wp_kses_post($copyright); ?>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-copyright-right">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/terms-conditions')); ?>">Terms &amp; Policies</a></li>
                                    <li><a href="<?php echo esc_url($contact_url); ?>">Studio Locations</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/pricing')); ?>">Fee Structure</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll Top -->
        <div class="scroll-top red-scroll-top">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>

        <script>
        (function() {
            function updateThemeButtons(mode) {
                var isLight = (mode === 'light');
                var buttons = document.querySelectorAll('.theme-mode-toggler');
                buttons.forEach(function(btn) {
                    btn.setAttribute('title', isLight ? 'Switch to Dark Mode' : 'Switch to Light Mode');
                    btn.setAttribute('aria-label', isLight ? 'Switch to Dark Mode' : 'Switch to Light Mode');
                });
            }

            function setTheme(mode) {
                var footer = document.querySelector('.footer-wrapper');
                var teamSec = document.querySelector('.team-sec-wrapper');
                var ctaSec = document.querySelector('.cta-area-three');
                var footerBg = '<?php echo esc_url(kosmic_asset("img/bg/footer_bg_1.png")); ?>';
                var teamBg = '<?php echo esc_url(kosmic_asset("img/bg/team_bg_3.png")); ?>';
                var ctaBg = '<?php echo esc_url(kosmic_asset("img/bg/cta_1_2.png")); ?>';

                if (mode === 'light') {
                    document.body.classList.add('light-mode');
                    document.documentElement.classList.add('light-mode');
                    if (footer) footer.style.backgroundImage = 'none';
                    if (teamSec) teamSec.style.backgroundImage = 'none';
                    if (ctaSec) ctaSec.style.backgroundImage = 'none';
                } else {
                    document.body.classList.remove('light-mode');
                    document.documentElement.classList.remove('light-mode');
                    if (footer) footer.style.backgroundImage = 'url(' + footerBg + ')';
                    if (teamSec) teamSec.style.backgroundImage = 'url(' + teamBg + ')';
                    if (ctaSec) ctaSec.style.backgroundImage = 'url(' + ctaBg + ')';
                }
                try {
                    localStorage.setItem('kosmic_theme_mode', mode);
                } catch(e) {}
                updateThemeButtons(mode);
            }

            // Sync on load
            var saved = 'dark';
            try {
                saved = localStorage.getItem('kosmic_theme_mode') || 'dark';
            } catch(e) {}
            setTheme(saved);

            // Click listener
            document.addEventListener('click', function(e) {
                var btn = e.target.closest('.theme-mode-toggler');
                if (!btn) return;
                e.preventDefault();
                var current = document.body.classList.contains('light-mode') ? 'light' : 'dark';
                var next = (current === 'light') ? 'dark' : 'light';
                setTheme(next);
            });
        })();
        </script>

        <?php wp_footer(); ?>
    </body>
</html>
