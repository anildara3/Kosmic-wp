<?php
/**
 * Template Name: Terms & Policies Page
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

<div class="breadcumb-wrapper" data-bg-src="<?php echo kosmic_asset('img/breadcumb/breadcumb-bg.jpg'); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="space bg-dark">
    <div class="container">
        <div class="terms-card">
            <?php
            while (have_posts()) :
                the_post();
                $content = get_the_content();
                if (!empty($content)) :
                    the_content();
                else :
            ?>
                    <h2 class="text-white mb-20" style="font-size: 26px;">1. Studio Etiquette &amp; Attire</h2>
                    <p class="text-white-50">Members must wear clean indoor dance sneakers or jazz shoes inside the studio hall. Barefoot dancing is permitted only for classical Kuchipudi and Yoga sessions. Street footwear is strictly prohibited on the wooden dance floors.</p>

                    <h2 class="text-white mt-35 mb-20" style="font-size: 26px;">2. Batch Timings &amp; Punctuality</h2>
                    <p class="text-white-50">Warm-up is crucial to prevent injury. Students arriving more than 15 minutes late may be asked to sit out the initial high-intensity choreography to avoid muscular strain.</p>

                    <h2 class="text-white mt-35 mb-20" style="font-size: 26px;">3. Fees &amp; Membership Validity</h2>
                    <p class="text-white-50">All monthly and quarterly passes are valid for the calendar duration purchased. Missed classes can be made up within the same month across alternative batch slots with prior instructor notice.</p>

                    <h2 class="text-white mt-35 mb-20" style="font-size: 26px;">4. Safety &amp; Medical Disclosure</h2>
                    <p class="text-white-50">Participants joining the 5-Days-5-Variation Weight Loss or high-intensity Zumba programs must disclose any pre-existing medical conditions, past injuries, or cardiovascular alerts to Master Mahesh Babu prior to commencement.</p>

                    <div class="mt-40 text-center">
                        <a href="<?php echo esc_url($contact_url); ?>" class="th-btn blue-btn">Contact Studio Office</a>
                    </div>
            <?php
                endif;
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
