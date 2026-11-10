<?php
/**
 * Header template for Kosmic Studio 4 Danz theme - Dynamic with WordPress Menu & Studio Settings
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone1       = kosmic_get_option('phone_1', '+91 97033 66311');
$phone1_clean = preg_replace('/[^0-9+]/', '', $phone1);
$contact_url  = kosmic_page_url('contact-us', '/contact');
$about_url    = kosmic_page_url('about-us', '/about');
$services_url = kosmic_page_url('services-programs', '/services');
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : kosmic_asset('img/ksd-logo-full.png');
?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo kosmic_asset('img/ksd-favico.png'); ?>">
        <link rel="apple-touch-icon" href="<?php echo kosmic_asset('img/ksd-favico.png'); ?>">
        <meta name="theme-color" content="#6B2AE6">
        <script>
            (function() {
                try {
                    var m = localStorage.getItem('kosmic_theme_mode');
                    if (m === 'light') {
                        document.documentElement.classList.add('light-mode');
                    }
                } catch(e) {}
            })();
        </script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('theme-blue'); ?>>
        <script>
            (function() {
                try {
                    var m = localStorage.getItem('kosmic_theme_mode');
                    if (m === 'light') {
                        document.body.classList.add('light-mode');
                    }
                } catch(e) {}
            })();
        </script>
        <?php wp_body_open(); ?>

        <!-- Preloader -->
        <div class="preloader">
            <button class="th-btn blue-btn3 preloaderCls"><?php esc_html_e('Cancel Preloader', 'kosmic'); ?></button>
            <div class="preloader-inner">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 70px; width: auto; margin-bottom: 20px;">
                <span class="loader style3"></span>
            </div>
        </div>

        <!-- Offcanvas Shopping Cart / Enrollment Bag -->
        <div class="sidemenu-wrapper shopping-cart">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls style3">
                    <i class="far fa-times"></i>
                </button>
                <div class="widget woocommerce widget_shopping_cart style3">
                    <h3 class="widget_title style3"><?php esc_html_e('Class Enrollment', 'kosmic'); ?><span class="shape"></span></h3>
                    <div class="widget_shopping_cart_content">
                        <ul class="woocommerce-mini-cart cart_list product_list_widget">
                            <?php
                            $cart_services = get_posts(array(
                                'post_type'      => 'service',
                                'posts_per_page' => 5,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                            ));
                            foreach ($cart_services as $cs) :
                                $cs_fee = get_field('service_fee', $cs->ID) ?: '₹2,500';
                            ?>
                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                    <a href="<?php echo esc_url(get_permalink($cs->ID)); ?>">
                                        <img src="<?php echo kosmic_asset('img/feature/feature_1_1.jpg'); ?>" alt="Service Image"><?php echo esc_html($cs->post_title); ?>
                                    </a>
                                    <span class="quantity">Pass: <span class="woocommerce-Price-amount amount"><?php echo esc_html($cs_fee); ?></span></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="woocommerce-mini-cart__buttons buttons mt-3">
                            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn3 style7 wc-forward"><?php esc_html_e('Book Batch', 'kosmic'); ?></a>
                            <a href="tel:<?php echo esc_attr($phone1_clean); ?>" class="th-btn blue-btn3 style7 checkout wc-forward"><?php esc_html_e('Call Studio', 'kosmic'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Info Offcanvas Drawer -->
        <div class="sidemenu-wrapper style3">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls">
                    <i class="far fa-times"></i>
                </button>
                <div class="widget">
                    <div class="th-widget-about">
                        <div class="about-logo mb-25">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 60px; width: auto;">
                            </a>
                        </div>
                        <p><?php echo esc_html(kosmic_get_option('footer_about_text')); ?></p>
                        <div class="th-social style3 mt-20">
                            <h6 class="social-title"><?php esc_html_e('Follow Us:', 'kosmic'); ?></h6>
                            <a href="<?php echo esc_url(kosmic_get_option('social_facebook')); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo esc_url(kosmic_get_option('social_instagram')); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                            <a href="<?php echo esc_url(kosmic_get_option('social_youtube')); ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
                            <a href="<?php echo esc_url(kosmic_get_option('social_twitter')); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <h3 class="widget_title"><?php esc_html_e('Studio Highlights', 'kosmic'); ?></h3>
                    <div class="recent-post-wrap">
                        <?php
                        $drawer_services = get_posts(array(
                            'post_type'      => 'service',
                            'posts_per_page' => 3,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                        ));
                        foreach ($drawer_services as $ds) :
                            $d_batch = get_field('service_batch_info', $ds->ID) ?: 'Mon to Fri Batches';
                        ?>
                            <div class="recent-post style3">
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="<?php echo esc_url(get_permalink($ds->ID)); ?>"><?php echo esc_html($ds->post_title); ?></a></h4>
                                    <div class="recent-post-meta"><i class="fal fa-clock"></i> <?php echo esc_html($d_batch); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Search Box -->
        <div class="popup-search-box style3 d-none d-lg-block">
            <button class="searchClose">
                <i class="fal fa-times"></i>
            </button>
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" name="s" placeholder="<?php esc_attr_e('Search dance styles, fitness, yoga, music...', 'kosmic'); ?>" value="<?php echo get_search_query(); ?>">
                <button type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div>

        <!-- Mobile Drawer Navigation (Dynamic with Primary Menu) -->
        <div class="th-menu-wrapper">
            <div class="th-menu-area style3 text-center">
                <button class="th-menu-toggle style3">
                    <i class="fal fa-times"></i>
                </button>
                <div class="mobile-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 48px; width: auto;">
                    </a>
                </div>
                <div class="th-mobile-menu">
                    <?php
                    if (has_nav_menu('primary_menu') || has_nav_menu('mobile_menu')) {
                        wp_nav_menu(array(
                            'theme_location' => has_nav_menu('primary_menu') ? 'primary_menu' : 'mobile_menu',
                            'container'      => false,
                            'items_wrap'     => '<ul>%3$s</ul>',
                            'fallback_cb'    => false,
                        ));
                    } else {
                    ?>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li><a href="<?php echo esc_url($about_url); ?>">About Us</a></li>
                            <li><a href="<?php echo esc_url($services_url); ?>">Services &amp; Programs</a></li>
                            <li><a href="<?php echo esc_url(home_url('/instructors')); ?>">Instructors</a></li>
                            <li><a href="<?php echo esc_url(home_url('/testimonials')); ?>">Testimonials</a></li>
                            <li><a href="<?php echo esc_url(home_url('/gallery')); ?>">Gallery</a></li>
                            <li><a href="<?php echo esc_url(home_url('/pricing')); ?>">Pricing</a></li>
                            <li><a href="<?php echo esc_url(home_url('/class-schedule')); ?>">Schedule</a></li>
                            <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                            <li><a href="<?php echo esc_url($contact_url); ?>">Contact Us</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <header class="th-header header-layout3 header-absolute">
            <div class="sticky-wrapper">
                <div class="menu-area">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 52px; width: auto;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <?php
                                    if (has_nav_menu('primary_menu')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary_menu',
                                            'container'      => false,
                                            'items_wrap'     => '<ul>%3$s</ul>',
                                            'fallback_cb'    => false,
                                        ));
                                    } else {
                                    ?>
                                        <ul>
                                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                                            <li><a href="<?php echo esc_url($about_url); ?>">About Us</a></li>
                                            <li><a href="<?php echo esc_url($services_url); ?>">Services &amp; Programs</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/instructors')); ?>">Instructors</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/testimonials')); ?>">Testimonials</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/gallery')); ?>">Gallery</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/pricing')); ?>">Pricing</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/class-schedule')); ?>">Schedule</a></li>
                                            <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                                            <li><a href="<?php echo esc_url($contact_url); ?>">Contact Us</a></li>
                                        </ul>
                                    <?php } ?>
                                </nav>
                            </div>
                            <div class="col-auto">
                                <div class="header-button">
                                    <button type="button" class="icon-btn searchBoxToggler" title="<?php esc_attr_e('Search', 'kosmic'); ?>">
                                        <i class="fal fa-search"></i>
                                    </button>
                                    <button type="button" class="icon-btn theme-mode-toggler" id="themeModeToggler" title="<?php esc_attr_e('Switch Light/Dark Mode', 'kosmic'); ?>" aria-label="<?php esc_attr_e('Switch Light/Dark Mode', 'kosmic'); ?>">
                                        <i class="fal fa-sun-bright theme-icon-sun"></i>
                                        <i class="fal fa-moon theme-icon-moon"></i>
                                    </button>
                                    <button type="button" class="icon-btn fs-6 sideMenuToggler" title="<?php esc_attr_e('Studio Info', 'kosmic'); ?>">
                                        <i class="fa-thin fa-grid"></i>
                                    </button>
                                    <button type="button" class="th-menu-toggle style3 d-inline-block d-lg-none" title="<?php esc_attr_e('Open Menu', 'kosmic'); ?>">
                                        <i class="far fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
