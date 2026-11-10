<?php
/**
 * Template Name: Testimonials Page
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact_url = kosmic_page_url('contact-us', '/contact');
?>

<!-- Breadcrumb Header -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>Real Reviews &amp; Success Stories</li>
            </ul>
        </div>
    </div>
</div>

<!-- Reviews Grid Section (Dynamic from CPT: testimonial) -->
<div class="space bg-dark">
    <div class="container">
        <div class="title-area text-center mb-50">
            <span class="sub-title style1">Google Rating 4.9 / 5.0</span>
            <h2 class="sec-title text-white">What Our Dancers &amp; Parents Say</h2>
            <p class="text-white-50 mx-auto" style="max-width: 620px;">Over 3,000 students and families have transformed their fitness, stage presence, and confidence with Kosmic Studio 4 Danz.</p>
        </div>
        <div class="row gy-4">
            <?php
            $testi_query = new WP_Query(array(
                'post_type'      => 'testimonial',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order date',
                'order'          => 'DESC',
            ));

            if ($testi_query->have_posts()) :
                $counter = 0;
                while ($testi_query->have_posts()) :
                    $testi_query->the_post();
                    $counter++;
                    $rating = intval(get_field('testimonial_rating')) ?: 5;
                    $batch  = get_field('testimonial_batch') ?: 'Dance & Fitness Member';
                    $text   = get_field('testimonial_text') ?: get_the_content();
                    $avatar = get_field('testimonial_avatar') ?: (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : kosmic_asset('img/testimonial/testi_3_' . (($counter % 6) + 1) . '.jpg'));
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="testi-card-dark">
                            <i class="fa-solid fa-quote-right testi-card-quote"></i>
                            <div>
                                <div class="testi-stars">
                                    <?php for ($s = 1; $s <= 5; $s++) : ?>
                                        <i class="fa-solid fa-star <?php echo $s <= $rating ? '' : 'text-secondary'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <p class="testi-text">&ldquo;<?php echo esc_html($text); ?>&rdquo;</p>
                            </div>
                            <div class="testi-author">
                                <img src="<?php echo esc_url($avatar); ?>" alt="<?php the_title_attribute(); ?>" class="testi-avatar">
                                <div>
                                    <h5 class="testi-name"><?php the_title(); ?></h5>
                                    <p class="testi-batch"><?php echo esc_html($batch); ?></p>
                                </div>
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
</div>

<!-- Video Testimonial Banner -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div class="video-banner-box">
            <img src="<?php echo kosmic_asset('img/normal/video_2.jpg'); ?>" alt="Kosmic Studio Dancers in Action">
            <div class="play-btn-overlay">
                <a href="https://www.youtube.com/watch?v=SZEflIVnhH8" class="popup-video play-icon-circle">
                    <i class="fa-solid fa-play"></i>
                </a>
                <h3 class="text-white mb-2" style="font-size: 28px; font-weight: 700;">Watch Our Students Dance &amp; Live Performances</h3>
                <p class="text-white-50 mb-0" style="max-width: 500px;">Catch live glimpses of annual showcases, Tollywood workshops, and Zumba fitness parties.</p>
            </div>
        </div>
    </div>
</div>

<!-- Call To Action -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div style="background: linear-gradient(135deg, #6B2AE6 0%, #EB0029 100%); border-radius: 20px; padding: 45px 30px; text-align: center; color: #ffffff;">
            <h2 class="text-white mb-3" style="font-size: 32px; font-weight: 800;">Ready to Start Your Dance or Fitness Journey?</h2>
            <p class="mb-4 mx-auto" style="max-width: 600px; font-size: 16px; opacity: 0.95;">Join thousands of inspired dancers in Padmarao Nagar (Secunderabad) and Shivam Road (Hyderabad). Book your free trial demo class today!</p>
            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn white-btn" style="color: #161921 !important; font-weight: 700; padding: 16px 36px;">Book Free Trial Demo Now</a>
        </div>
    </div>
</div>

<?php
get_footer();
