<?php
/**
 * Archive Template (Categories, Tags, Authors, Dates)
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
            <h1 class="breadcumb-title"><?php the_archive_title(); ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kosmic'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'kosmic'); ?></a></li>
                <li><?php the_archive_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- Blog List & Sidebar Section -->
<div class="space bg-dark">
    <div class="container">
        <div class="row">
            <!-- Blog Posts Column (8 cols) -->
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <?php
                    $p_index = 0;
                    while (have_posts()) : the_post();
                        $p_index++;
                        $categories = get_the_category();
                        $cat_name = !empty($categories) ? $categories[0]->name : __('Fitness & Dance', 'kosmic');
                        $cat_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';

                        $post_thumb = has_post_thumbnail()
                            ? get_the_post_thumbnail_url(get_the_ID(), 'large')
                            : kosmic_asset('img/blog/blog_3_' . (($p_index % 3) + 1) . '.jpg');
                    ?>
                        <div class="blog-card-dark">
                            <div class="blog-card-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url($post_thumb); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                                <span class="blog-date-badge">
                                    <i class="fal fa-calendar-days me-1"></i> <?php echo get_the_date('d M, Y'); ?>
                                </span>
                            </div>
                            <div class="blog-card-content">
                                <ul class="blog-meta-list">
                                    <li><i class="fal fa-user"></i> <?php esc_html_e('By', 'kosmic'); ?> <?php the_author(); ?></li>
                                    <li>
                                        <i class="fal fa-folder"></i>
                                        <a href="<?php echo esc_url($cat_link); ?>" class="text-inherit"><?php echo esc_html($cat_name); ?></a>
                                    </li>
                                    <li><i class="fal fa-comment"></i> <?php comments_number(__('0 Comments', 'kosmic'), __('1 Comment', 'kosmic'), __('% Comments', 'kosmic')); ?></li>
                                </ul>
                                <h3 class="blog-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-white-50">
                                    <?php echo wp_trim_words(get_the_excerpt(), 34, '...'); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="th-btn blue-border-btn style3">
                                    <?php esc_html_e('Read Full Article', 'kosmic'); ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <?php
                    $pagination_links = paginate_links(array(
                        'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                        'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                        'type'      => 'array',
                    ));

                    if (!empty($pagination_links)) :
                    ?>
                        <div class="pagination-wrap">
                            <?php
                            foreach ($pagination_links as $link) {
                                if (strpos($link, 'current') !== false) {
                                    $link = str_replace('page-numbers current', 'pagination-btn active', $link);
                                } else {
                                    $link = str_replace('page-numbers', 'pagination-btn', $link);
                                }
                                echo $link;
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                <?php else : ?>
                    <div class="widget-card-dark text-center py-5">
                        <h3 class="text-white mb-3"><?php esc_html_e('No Articles Found in this Archive', 'kosmic'); ?></h3>
                        <p class="text-white-50 mb-4"><?php esc_html_e('Explore more tips and choreography articles on our blog.', 'kosmic'); ?></p>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="th-btn blue-btn"><?php esc_html_e('View All Blog Articles', 'kosmic'); ?></a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar Column (4 cols) -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
