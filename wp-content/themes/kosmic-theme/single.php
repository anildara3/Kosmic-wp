<?php
/**
 * Single Blog Post Template
 *
 * @package Kosmic
 * @version 1.0.6
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
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kosmic'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'kosmic'); ?></a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Single Blog Content + Right Sidebar Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="row">
            <!-- Main Article Content (8 cols) -->
            <div class="col-lg-8 mb-40 mb-lg-0">
                <?php
                while (have_posts()) : the_post();
                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? $categories[0]->name : __('Fitness & Dance', 'kosmic');
                    $cat_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-box'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-single-img">
                                <?php the_post_thumbnail('large', array('class' => 'w-100', 'alt' => get_the_title())); ?>
                            </div>
                        <?php endif; ?>

                        <ul class="blog-meta-list">
                            <li><i class="fal fa-user"></i> <?php esc_html_e('By', 'kosmic'); ?> <?php the_author(); ?></li>
                            <li><i class="fal fa-calendar-days"></i> <?php echo get_the_date('d M, Y'); ?></li>
                            <li>
                                <i class="fal fa-folder"></i>
                                <a href="<?php echo esc_url($cat_link); ?>" class="text-inherit"><?php echo esc_html($cat_name); ?></a>
                            </li>
                            <li><i class="fal fa-comment"></i> <?php comments_number(__('0 Comments', 'kosmic'), __('1 Comment', 'kosmic'), __('% Comments', 'kosmic')); ?></li>
                        </ul>

                        <h2 class="blog-single-title text-white mb-25" style="font-size: 32px; font-weight: 800; line-height: 1.35;">
                            <?php the_title(); ?>
                        </h2>

                        <div class="entry-content text-white-50" style="font-size: 16px; line-height: 1.8;">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tags & Social Share -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-3 my-4" style="border-top: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <div class="tagcloud mb-2 mb-sm-0">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) :
                                    echo '<span class="text-white me-2" style="font-size: 14px; font-weight: 600;">' . esc_html__('Tags:', 'kosmic') . '</span>';
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">#' . esc_html($tag->name) . '</a> ';
                                    }
                                else :
                                    echo '<span class="text-white me-2" style="font-size: 14px; font-weight: 600;">' . esc_html__('Tags:', 'kosmic') . '</span>';
                                    echo '<a href="' . esc_url(home_url('/blog')) . '">#Dance</a> ';
                                    echo '<a href="' . esc_url(home_url('/blog')) . '">#Fitness</a> ';
                                endif;
                                ?>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-white me-2" style="font-size: 14px; font-weight: 600;"><?php esc_html_e('Share:', 'kosmic'); ?></span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="text-white-50 me-2" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="text-white-50 me-2" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="text-white-50" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>

                        <!-- Author Biography Card -->
                        <div class="author-bio-card">
                            <img src="<?php echo kosmic_asset('img/blog/author_1.jpg'); ?>" alt="Mahesh Master" class="author-avatar">
                            <div>
                                <h4 class="text-white mb-1" style="font-size: 20px;">C. Mahesh Babu (Mahesh Maddy)</h4>
                                <span class="text-danger d-block mb-2" style="font-size: 13px; font-weight: 600;"><?php esc_html_e('Tollywood Film Choreographer & Founder', 'kosmic'); ?></span>
                                <p class="text-white-50 mb-0" style="font-size: 13px; line-height: 1.6;">
                                    <?php esc_html_e('Lawrence Master protégé with 15+ years experience and 3000+ dancers trained. Pioneer of the 5-Days-5-Variation dance fitness format in Hyderabad.', 'kosmic'); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Right Sidebar (4 cols) -->
            <div class="col-lg-4">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
