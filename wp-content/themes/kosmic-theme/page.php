<?php
/**
 * Standard Page Template
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
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Page Content -->
<section class="space bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php
                while (have_posts()) : the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('page-content-box'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="mb-35">
                                <?php the_post_thumbnail('large', array('class' => 'w-100', 'style' => 'border-radius: 16px; object-fit: cover; max-height: 440px;')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content text-white-50" style="font-size: 16px; line-height: 1.8;">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
