<?php
/**
 * Template Name: Blog Right Sidebar Page
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
                    <h1 class="breadcumb-title">Blog Right Sidebar</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                        <li>Post Details</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Single Post + Right Sidebar Section -->
        <div class="space bg-dark">
            <div class="container">
                <div class="row">
                    <!-- Main Article Content (8 cols) -->
                    <div class="col-lg-8 mb-40 mb-lg-0">
                        <div class="blog-single-box">
                            <div class="blog-single-img">
                                <img src="<?php echo kosmic_asset('img/blog/blog-s-1-1.jpg'); ?>" alt="5-Days-5-Variation Weight Loss">
                            </div>

                            <ul class="blog-meta-list">
                                <li><i class="fal fa-user"></i> By Mahesh Master</li>
                                <li><i class="fal fa-calendar-days"></i> 12 Nov, 2025</li>
                                <li><i class="fal fa-folder"></i> Weight Loss &amp; Fitness</li>
                                <li><i class="fal fa-comment"></i> 3 Comments</li>
                            </ul>

                            <h2 class="text-white mb-25" style="font-size: 32px; font-weight: 800; line-height: 1.35;">How the 5-Days-5-Variation Dance Fitness Program Reinvents Weight Loss in Hyderabad</h2>

                            <p class="text-white-50">Every year, thousands of people in Hyderabad purchase expensive gym memberships with immense determination, only to drop out by week four. The reason isnâ€™t a lack of discipline &ndash; it is the physiological reality of adaptation and psychological burnout. Running on a monotonous treadmill or lifting static weights under harsh fluorescent lighting fails to stimulate the emotional and neurologic reward centers that keep us returning day after day.</p>

                            <p class="text-white-50">At <strong>Kosmic Studio 4 Danz</strong>, we pioneered the <strong>5-Days-5-Variation System</strong> under the artistic and athletic direction of Tollywood Choreographer <strong>C. Mahesh Babu (Mahesh Maddy)</strong>. Our approach bridges the rigor of cardiovascular sports conditioning with the sheer exhilaration of dance, guaranteeing that every single day provides a fresh neurological and muscular stimulus.</p>

                            <!-- Pull Quote -->
                            <div class="blog-quote-dark">
                                <p>&ldquo;Dance is not merely physical movement &ndash; it is the exhilarating conversation between your rhythm and your soul. When you genuinely look forward to your workout, weight loss occurs as a natural, joyful byproduct.&rdquo;</p>
                                <cite>&mdash; C. Mahesh Babu (Founder &amp; Artistic Director, Kosmic Studio 4 Danz)</cite>
                            </div>

                            <h3 class="text-white mb-20" style="font-size: 24px; font-weight: 700;">Why Cycling Movements Beats Monotonous Exercise</h3>
                            <p class="text-white-50">When you engage in identical workouts repeatedly, your body optimizes energy expenditure, meaning you burn progressively fewer calories for the same effort. Our five-day rotation intentionally shocks your metabolism:</p>

                            <ul class="text-white-50 mb-30" style="line-height: 1.8;">
                                <li><strong>Monday (Latin Zumba):</strong> Targets large muscle groups with non-stop Latin rhythms, accelerating lymphatic drainage and calorie burn.</li>
                                <li><strong>Tuesday (Step Aerobics):</strong> Employs rhythmic elevation to firm hamstrings, quads, and lower core.</li>
                                <li><strong>Wednesday (Tollywood Tabata):</strong> 20 seconds of explosive dance intervals triggering post-exercise oxygen consumption (EPOC).</li>
                                <li><strong>Thursday (Floor Sculpting):</strong> Deep mat work sculpting the oblique muscles, waistline, and back posture.</li>
                                <li><strong>Friday (Power Yoga):</strong> Decompresses joints, stretches tight fascial tissue, and suppresses cortisol &ndash; the primary belly-fat hormone.</li>
                            </ul>

                            <!-- Mid Images -->
                            <div class="row gy-3 mb-35">
                                <div class="col-sm-6">
                                    <img src="<?php echo kosmic_asset('img/blog/blog_inner_1.jpg'); ?>" alt="Dance workout" style="border-radius: 12px; width: 100%; height: 220px; object-fit: cover;">
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo kosmic_asset('img/blog/blog_inner_2.jpg'); ?>" alt="Fitness stretch" style="border-radius: 12px; width: 100%; height: 220px; object-fit: cover;">
                                </div>
                            </div>

                            <p class="text-white-50">Furthermore, performing these workouts inside a <strong>100% fully air-conditioned dance hall</strong> allows participants to exercise intensely without suffocating heat exhaustion, especially during humid Hyderabad summers. Coupled with our separate ladies-only batches, every woman feels completely empowered and focused.</p>

                            <!-- Tags & Social Share -->
                            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-3 my-4" style="border-top: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08);">
                                <div class="tagcloud mb-2 mb-sm-0">
                                    <span class="text-white me-2" style="font-size: 14px; font-weight: 600;">Tags:</span>
                                    <a href="<?php echo esc_url(home_url('/blog')); ?>">#WeightLoss</a>
                                    <a href="<?php echo esc_url(home_url('/blog')); ?>">#Zumba</a>
                                    <a href="<?php echo esc_url(home_url('/blog')); ?>">#MaheshMaster</a>
                                    <a href="<?php echo esc_url(home_url('/blog')); ?>">#Hyderabad</a>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-white me-2" style="font-size: 14px; font-weight: 600;">Share:</span>
                                    <a href="#" class="text-white-50 me-2"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="text-white-50 me-2"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="text-white-50"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>

                            <!-- Author Biography Card -->
                            <div class="author-bio-card">
                                <img src="<?php echo kosmic_asset('img/blog/author_1.jpg'); ?>" alt="Mahesh Master" class="author-avatar">
                                <div>
                                    <h4 class="text-white mb-1" style="font-size: 20px;">C. Mahesh Babu (Mahesh Maddy)</h4>
                                    <span class="text-danger d-block mb-2" style="font-size: 13px; font-weight: 600;">Tollywood Film Choreographer &amp; Founder</span>
                                    <p class="text-white-50 mb-0" style="font-size: 13px; line-height: 1.6;">Lawrence Master protÃ©gÃ© with 15+ years experience and 3000+ dancers trained. Pioneer of the 5-Days-5-Variation dance fitness format in Hyderabad.</p>
                                </div>
                            </div>

                            <!-- Comments Section -->
                            <div class="comments-area mt-40">
                                <h3 class="text-white mb-30" style="font-size: 24px; font-weight: 700;">3 Comments on this Article</h3>

                                <div class="comment-card">
                                    <img src="<?php echo kosmic_asset('img/blog/comment-author-1.jpg'); ?>" alt="Sunitha" class="comment-avatar">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h5 class="text-white mb-0" style="font-size: 16px;">Sunitha G.</h5>
                                            <small class="text-white-50">Nov 13, 2025 at 10:20 AM</small>
                                        </div>
                                        <p class="text-white-50 mb-0" style="font-size: 14px;">I can personally vouch for this program! Lost 8.5 kg in 3 months at Padmarao Nagar studio. The Friday yoga stretch is pure therapy.</p>
                                    </div>
                                </div>

                                <div class="comment-card">
                                    <img src="<?php echo kosmic_asset('img/blog/comment-author-2.jpg'); ?>" alt="Kavitha" class="comment-avatar">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h5 class="text-white mb-0" style="font-size: 16px;">Kavitha Reddy</h5>
                                            <small class="text-white-50">Nov 14, 2025 at 2:45 PM</small>
                                        </div>
                                        <p class="text-white-50 mb-0" style="font-size: 14px;">Are the morning batches starting at 6:00 AM available at DD Colony Shivam Road? Would love to enroll!</p>
                                    </div>
                                </div>

                                <div class="comment-card" style="border-bottom: none;">
                                    <img src="<?php echo kosmic_asset('img/blog/comment-author-3.jpg'); ?>" alt="Mahesh Master" class="comment-avatar">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h5 class="text-white mb-0" style="font-size: 16px;">Mahesh Master (Author)</h5>
                                            <small class="text-white-50">Nov 14, 2025 at 4:10 PM</small>
                                        </div>
                                        <p class="text-white-50 mb-0" style="font-size: 14px;">Hi Kavitha garu, yes! We have 6:00 AM, 7:00 AM, and 8:00 AM morning batches active at Shivam Road. Please visit us for a free demo!</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Form -->
                            <div class="mt-40 pt-4" style="border-top: 1px solid rgba(255,255,255,0.08);">
                                <h3 class="mb-25" style="font-size: 22px; font-weight: 700;">Leave a Reply</h3>
                                <form action="#" class="row gy-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Full Name *" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email Address *" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="4" placeholder="Your Comment / Inquiry..." required></textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button type="submit" class="th-btn blue-btn">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar (4 cols) -->
                    <div class="col-lg-4">
                        <?php get_sidebar('blog'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer (Exact Screenshot Design) -->

<?php
get_footer();