<?php
/**
 * 404 Error Template
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php esc_html_e('404 - Page Not Found', 'kosmic'); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kosmic'); ?></a></li>
                <li><?php esc_html_e('404 Error', 'kosmic'); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- 404 Content -->
<section class="space bg-dark text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="error-box py-5">
                    <div class="error-number" style="font-size: 100px; font-weight: 800; color: #6B2AE6; line-height: 1; margin-bottom: 20px;">404</div>
                    <h2 class="error-title text-white mb-20" style="font-size: 32px; font-weight: 700;"><?php esc_html_e('Oops! Step Out Of Rhythm?', 'kosmic'); ?></h2>
                    <p class="text-white-50 mb-40" style="max-width: 540px; margin-left: auto; margin-right: auto; font-size: 16px;">
                        <?php esc_html_e("The dance routine or page you're searching for might have moved, renamed, or temporarily paused.", 'kosmic'); ?>
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="th-btn blue-btn"><?php esc_html_e('Return to Homepage', 'kosmic'); ?></a>
                        <a href="<?php echo esc_url(home_url('/services')); ?>" class="th-btn white-btn"><?php esc_html_e('View All Classes', 'kosmic'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

