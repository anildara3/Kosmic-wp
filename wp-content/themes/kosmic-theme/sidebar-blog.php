<?php
/**
 * Blog Sidebar Template
 *
 * @package Kosmic
 * @version 1.0.6
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<aside class="sidebar-area">
    <!-- 1. Search Widget -->
    <div class="widget-card-dark">
        <h4 class="widget-title-dark"><?php esc_html_e('Search Articles', 'kosmic'); ?></h4>
        <form class="search-box-widget" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" placeholder="<?php esc_attr_e('Search keywords...', 'kosmic'); ?>" value="<?php echo esc_attr(get_search_query()); ?>">
            <button type="submit" aria-label="<?php esc_attr_e('Search', 'kosmic'); ?>"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!-- 2. Author Profile Widget -->
    <div class="widget-card-dark text-center">
        <img src="<?php echo kosmic_asset('img/blog/author_1.jpg'); ?>" alt="Mahesh Master" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #6B2AE6; margin-bottom: 15px;">
        <h5 class="text-white mb-1" style="font-size: 18px;">C. Mahesh Babu</h5>
        <span class="text-danger d-block mb-3" style="font-size: 13px; font-weight: 500;"><?php esc_html_e('Founder & Tollywood Choreographer', 'kosmic'); ?></span>
        <p class="text-white-50" style="font-size: 13px; line-height: 1.6; margin-bottom: 0;">
            <?php esc_html_e('Lawrence Master protégé with 15+ years experience and 3000+ dancers trained. Sharing insights on film dance, fitness, and performing arts.', 'kosmic'); ?>
        </p>
    </div>

    <!-- 3. Categories Widget -->
    <div class="widget-card-dark">
        <h4 class="widget-title-dark"><?php esc_html_e('Categories', 'kosmic'); ?></h4>
        <ul class="widget-service-list">
            <?php
            $default_cat = get_option('default_category', 1);
            $categories = get_categories(array(
                'orderby'    => 'count',
                'order'      => 'DESC',
                'hide_empty' => true,
                'exclude'    => array($default_cat),
            ));
            if (!empty($categories)) :
                foreach ($categories as $cat) :
                    $is_active = is_category($cat->term_id) ? 'active' : '';
            ?>
                <li>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="<?php echo esc_attr($is_active); ?>">
                        <span class="cat-name"><?php echo esc_html($cat->name); ?></span>
                        <span class="cat-count">(<?php echo esc_html($cat->count); ?>)</span>
                    </a>
                </li>
            <?php
                endforeach;
            else :
            ?>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><span class="cat-name">Weight Loss &amp; Fitness</span> <span class="cat-count">(14)</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><span class="cat-name">Tollywood Choreography</span> <span class="cat-count">(9)</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><span class="cat-name">Zumba &amp; Aerobics</span> <span class="cat-count">(12)</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><span class="cat-name">Kuchipudi Classical</span> <span class="cat-count">(8)</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><span class="cat-name">Kids Acrobatics &amp; Care</span> <span class="cat-count">(11)</span></a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- 4. Recent Posts Widget -->
    <div class="widget-card-dark">
        <h4 class="widget-title-dark"><?php esc_html_e('Recent Articles', 'kosmic'); ?></h4>
        <?php
        $recent_posts = get_posts(array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'post_status'    => 'publish',
        ));
        if (!empty($recent_posts)) :
            $total_r = count($recent_posts);
            $r_count = 0;
            foreach ($recent_posts as $rp) :
                $r_count++;
                $r_thumb = has_post_thumbnail($rp->ID) ? get_the_post_thumbnail_url($rp->ID, 'thumbnail') : kosmic_asset('img/blog/recent-post-1-' . (($r_count % 4) + 1) . '.jpg');
                $border_style = ($r_count === $total_r) ? 'style="border-bottom: none; margin-bottom: 0; padding-bottom: 0;"' : '';
        ?>
            <div class="recent-post-item" <?php echo $border_style; ?>>
                <div class="recent-post-thumb">
                    <img src="<?php echo esc_url($r_thumb); ?>" alt="<?php echo esc_attr($rp->post_title); ?>">
                </div>
                <div>
                    <h5 class="recent-post-title">
                        <a href="<?php echo esc_url(get_permalink($rp->ID)); ?>"><?php echo esc_html($rp->post_title); ?></a>
                    </h5>
                    <small class="text-white-50"><i class="fal fa-calendar me-1"></i> <?php echo get_the_date('d M, Y', $rp->ID); ?></small>
                </div>
            </div>
        <?php
            endforeach;
        else :
        ?>
            <p class="text-white-50 mb-0"><?php esc_html_e('No recent articles yet.', 'kosmic'); ?></p>
        <?php endif; ?>
    </div>

    <!-- 5. Popular Tags Widget -->
    <div class="widget-card-dark">
        <h4 class="widget-title-dark"><?php esc_html_e('Popular Tags', 'kosmic'); ?></h4>
        <div class="tagcloud">
            <?php
            $tags = get_tags(array(
                'orderby'    => 'count',
                'order'      => 'DESC',
                'number'     => 12,
                'hide_empty' => false,
            ));
            if (!empty($tags)) :
                foreach ($tags as $t) :
            ?>
                <a href="<?php echo esc_url(get_tag_link($t->term_id)); ?>">#<?php echo esc_html($t->name); ?></a>
            <?php
                endforeach;
            else :
            ?>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#Zumba</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#Tollywood</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#WeightLoss</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#MaheshMaster</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#HyderabadDance</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">#Secunderabad</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- 6. Studio Demo Class Banner -->
    <div class="widget-card-dark" style="background: linear-gradient(135deg, rgba(107, 42, 230, 0.35) 0%, rgba(235, 0, 41, 0.35) 100%); border-color: #EB0029; text-align: center;">
        <h4 class="text-white mb-2" style="font-size: 22px; font-weight: 800;"><?php esc_html_e('Book a Free Demo Class!', 'kosmic'); ?></h4>
        <p class="text-white-50 mb-3" style="font-size: 13px;"><?php esc_html_e("Experience Hyderabad's best air-conditioned dance studio with our master choreographers.", 'kosmic'); ?></p>
        <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="th-btn blue-btn w-100 mb-2"><?php esc_html_e('Claim Free Demo Pass', 'kosmic'); ?></a>
        <a href="tel:+919703366311" class="text-white" style="font-size: 13px;"><i class="fa-solid fa-phone me-1 text-danger"></i> +91 9703366311</a>
    </div>
</aside>

