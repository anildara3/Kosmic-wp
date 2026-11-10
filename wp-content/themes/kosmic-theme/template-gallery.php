<?php
/**
 * Template Name: Studio Gallery Page
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
                <li>Photo &amp; Video Memories</li>
            </ul>
        </div>
    </div>
</div>

<!-- Filterable Gallery Grid Section (Dynamic from CPT: gallery_item) -->
<div class="space bg-dark">
    <div class="container">
        <div class="title-area text-center mb-40">
            <span class="sub-title style1">Moments Of Motion</span>
            <h2 class="sec-title text-white">Glimpses of Rhythm, Passion &amp; Energy</h2>
        </div>

        <!-- Filter Buttons (Dynamic from Taxonomy: gallery_category) -->
        <div class="filter-menu-indicator filter-menu-active">
            <button class="filter-btn active" data-filter="*">All Moments</button>
            <?php
            $terms = get_terms(array(
                'taxonomy'   => 'gallery_category',
                'hide_empty' => true,
            ));
            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) :
            ?>
                    <button class="filter-btn" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></button>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- Gallery Items (Dynamic from CPT) -->
        <div class="row filter-active gy-4">
            <?php
            $gallery_query = new WP_Query(array(
                'post_type'      => 'gallery_item',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ));

            if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) :
                    $gallery_query->the_post();
                    $item_id    = get_the_ID();
                    $media_type = get_field('gallery_media_type', $item_id) ?: get_post_meta($item_id, 'gallery_media_type', true) ?: 'photo';
                    $video_url  = get_field('gallery_video_url', $item_id) ?: get_post_meta($item_id, 'gallery_video_url', true);
                    $video_info = !empty($video_url) ? kosmic_parse_video_url($video_url) : false;
                    $is_video   = ($media_type === 'video' || !empty($video_url)) && !empty($video_info);

                    $custom_img = has_post_thumbnail() ? get_the_post_thumbnail_url($item_id, 'full') : (get_field('gallery_image', $item_id) ?: get_post_meta($item_id, 'gallery_image', true));
                    if (empty($custom_img) && $is_video && !empty($video_info['thumbnail'])) {
                        $img_url = $video_info['thumbnail'];
                    } else {
                        $img_url = !empty($custom_img) ? $custom_img : kosmic_asset('img/kosmic/Dance-first-think-later-Kids-Dance.jpg');
                    }

                    $tag = get_field('gallery_tag', $item_id) ?: get_post_meta($item_id, 'gallery_tag', true) ?: 'Studio Life';
                    
                    // Get assigned categories for filter classes
                    $item_terms = get_the_terms($item_id, 'gallery_category');
                    $filter_classes = '';
                    if (!empty($item_terms) && !is_wp_error($item_terms)) {
                        foreach ($item_terms as $it) {
                            $filter_classes .= ' ' . $it->slug;
                        }
                    }
                    if ($is_video) {
                        $filter_classes .= ' is-video';
                    }
            ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 filter-item<?php echo esc_attr($filter_classes); ?>">
                        <div class="gallery-card <?php echo $is_video ? 'has-video' : 'is-photo'; ?>">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 280px; object-fit: cover; border-radius: 14px;">
                            
                            <?php if ($is_video) : ?>
                                <!-- Video Platform Badge (Top Left) -->
                                <span class="gallery-video-badge <?php echo esc_attr($video_info['platform']); ?>">
                                    <i class="<?php echo esc_attr($video_info['icon_class']); ?> me-1"></i><?php echo esc_html($video_info['badge_label']); ?>
                                </span>
                                <!-- Center Glowing Play Button -->
                                <a href="<?php echo esc_url($video_info['embed_url']); ?>" class="gallery-play-btn popup-video" title="<?php the_title_attribute(); ?>">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            <?php endif; ?>

                            <div class="gallery-overlay">
                                <?php if ($is_video) : ?>
                                    <a href="<?php echo esc_url($video_info['embed_url']); ?>" class="gallery-zoom-icon popup-video" title="<?php the_title_attribute(); ?>"><i class="fa-solid fa-play"></i></a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url($img_url); ?>" class="gallery-zoom-icon popup-image" title="<?php the_title_attribute(); ?>"><i class="fa-solid fa-plus"></i></a>
                                <?php endif; ?>
                                <span class="gallery-tag"><?php echo esc_html($tag); ?></span>
                                <h4 class="gallery-title"><?php the_title(); ?></h4>
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

<!-- Call To Action -->
<div class="space-bottom bg-dark">
    <div class="container">
        <div class="kosmic-gradient-cta" style="background: linear-gradient(135deg, #6B2AE6 0%, #EB0029 100%); border-radius: 20px; padding: 45px 30px; text-align: center; color: #ffffff;">
            <h2 class="text-white mb-3" style="font-size: 32px; font-weight: 800;">Want Your Child or Yourself on Our Next Stage Showcase?</h2>
            <p class="mb-4 mx-auto" style="max-width: 600px; font-size: 16px; opacity: 0.95;">Visit our Padmarao Nagar or Shivam Road studios for a free trial class and batch placement test.</p>
            <a href="<?php echo esc_url($contact_url); ?>" class="th-btn white-btn" style="color: #161921 !important; font-weight: 700; padding: 16px 36px;">Book Free Trial Demo Now</a>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    if ($('.filter-active').length > 0 && $.fn.imagesLoaded) {
        $('.filter-active').imagesLoaded(function() {
            var $grid = $('.filter-active').isotope({
                itemSelector: '.filter-item',
                filter: '*',
                percentPosition: true,
                masonry: {
                    columnWidth: '.filter-item'
                }
            });

            $('.filter-menu-active').on('click', 'button', function(e) {
                e.preventDefault();
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
                $(this).addClass('active').siblings('.active').removeClass('active');
            });
        });
    }

    // Video Lightbox Popup (YouTube, Instagram Reels, Facebook)
    if ($.fn.magnificPopup) {
        $('.popup-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade mfp-video-popup',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                        '<div class="mfp-close"></div>' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>' +
                      '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: function(url) {
                            var m = url.match(/[\\?&]v=([^&#]*)/);
                            if (m && m[1]) return m[1];
                            var s = url.match(/shorts\/([^&#\/?]*)/);
                            if (s && s[1]) return s[1];
                            var e = url.match(/embed\/([^&#\/?]*)/);
                            if (e && e[1]) return e[1];
                            return null;
                        },
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                    },
                    youtu_be: {
                        index: 'youtu.be/',
                        id: function(url) {
                            var m = url.match(/youtu\.be\/([^&#\/?]*)/);
                            return (m && m[1]) ? m[1] : '';
                        },
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                    },
                    instagram: {
                        index: 'instagram.com',
                        id: function(url) {
                            var clean = url.split('?')[0].replace(/\/+$/, '');
                            return clean + '/embed/';
                        },
                        src: '%id%'
                    },
                    facebook: {
                        index: 'facebook.com',
                        id: function(url) {
                            return encodeURIComponent(url);
                        },
                        src: 'https://www.facebook.com/plugins/video.php?href=%id%&show_text=0&autoplay=1'
                    },
                    fb_watch: {
                        index: 'fb.watch',
                        id: function(url) {
                            return encodeURIComponent(url);
                        },
                        src: 'https://www.facebook.com/plugins/video.php?href=%id%&show_text=0&autoplay=1'
                    }
                }
            }
        });
    }
});
</script>

<?php
get_footer();
