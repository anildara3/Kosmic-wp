<?php
/**
 * Demo Data Seeder for Kosmic Studio 4 Danz
 *
 * Populates CPTs and ACF fields with full existing static website content,
 * so the site remains 100% complete and fully dynamic from the WordPress dashboard.
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

function kosmic_run_demo_import() {
    if (get_option('kosmic_cpt_imported_v1')) {
        return;
    }

    // ==========================================
    // 1. POPULATE SERVICES CPT
    // ==========================================
    $services_data = array(
        array(
            'title'     => 'Bollywood & Tollywood Dance',
            'slug'      => 'bollywood-dance',
            'num'       => '01',
            'badge'     => 'Flagship Dance Program',
            'fee'       => '₹2,500 / month',
            'subtitle'  => 'Tollywood Freestyle, Bollywood, Contemporary, Salsa & Hip-Hop tailored for beginners, kids, and advanced dancers.',
            'content'   => 'Learn energetic hook steps, graceful expressions, and trendsetting movie choreography designed by Tollywood union choreographer Mahesh Master. Having trained under Lawrence Master and worked in 40+ film projects, our studio provides authentic film-industry coaching.',
            'benefits'  => "Authentic film choreography taught by active industry dancers\nHigh-energy stamina building with multi-style versatility\nAnnual grand stage showcase opportunities with live audience\nBatches for kids, teens, ladies, and working professionals\n100% fully air-conditioned studios with spring wooden flooring",
            'icon'      => kosmic_asset('img/icon/service_1_1.svg'),
        ),
        array(
            'title'     => '5-Days-5-Variation Weight Loss',
            'slug'      => '5-days-weight-loss',
            'num'       => '02',
            'badge'     => 'Signature Flagship Program',
            'fee'       => '₹3,000 / month',
            'subtitle'  => 'Our signature daily dynamic workout routine combining aerobics, cardio dance, strength conditioning, and core slimming.',
            'content'   => "Traditional gym routines often fail because the human body adapts to monotonous exercises within weeks, hitting an inevitable plateau. Kosmic Studio's proprietary 5-Days-5-Variation System, curated by Tollywood Choreographer C. Mahesh Babu, guarantees that your muscles, cardiovascular system, and metabolism never get bored.\n\nBy cycling through five distinct movement methodologies Monday to Friday in our premium air-conditioned studios, members burn between 500 to 750 calories per 60-minute session while shedding between 3 to 6 kg safely in their first 6 to 8 weeks.",
            'benefits'  => "Safe & Sustainable: Average weight loss of 3 to 6 kg per month with improved metabolic health\n100% Air-Conditioned: Train in comfortable, climate-controlled studios\nSeparate Ladies Batches: Privacy, comfort, and camaraderie with certified female instructors\nNo Monotony: Five completely different workout formats every single week\nFree Trial Demo Class: Experience the energy firsthand before committing!",
            'icon'      => kosmic_asset('img/icon/service_1_2.svg'),
        ),
        array(
            'title'     => 'Zumba & Aerobics Fitness',
            'slug'      => 'zumba-fitness',
            'num'       => '03',
            'badge'     => 'Cardio Dance Party',
            'fee'       => '₹2,200 / month',
            'subtitle'  => 'Electrifying music-driven cardio dance sessions that burn 500-700 calories per session while having a blast.',
            'content'   => 'Electrifying dance party sessions that burn up to 600+ calories per class. Specially structured batches for ladies and working professionals with peppy Latin and Bollywood playlists.',
            'benefits'  => "Burn 500-700 calories per session without feeling like working out\nSeparate exclusive batches for ladies with dedicated female instructors\nEnhances cardiovascular stamina, agility, and overall flexibility\nDynamic playlist mixing Latin, Reggaeton, Bollywood, and Tollywood hits\nMorning and evening batch slots available across both studios",
            'icon'      => kosmic_asset('img/icon/service_1_3.svg'),
        ),
        array(
            'title'     => 'Kuchipudi Classical Dance',
            'slug'      => 'kuchipudi-classical',
            'num'       => '04',
            'badge'     => 'Classical Heritage',
            'fee'       => '₹2,200 / month',
            'subtitle'  => 'Rooted in ancient tradition, teaching expressive mudras, rhythmic footwork, and authentic classical discipline under Saikrupa.',
            'content'   => 'Learn authentic Kuchipudi classical art from certified classical gurus. Classes cover basic adavus, jatis, hastas (hand gestures), facial expressions (abhinaya), and stage performances.',
            'benefits'  => "Deep immersion into classical Indian mudras, rhythm, and abhinaya\nStructured curriculum preparing students for graded examinations and arangetram\nDevelops physical grace, poise, balance, and cultural reverence\nGuidance under Guru Saikrupa with patient individual mentorship\nOpen to kids aged 5+ and adult classical enthusiasts",
            'icon'      => kosmic_asset('img/icon/service_2_1.svg'),
        ),
        array(
            'title'     => 'Gymnastics & Kids Acrobatics',
            'slug'      => 'gymnastics-kids',
            'num'       => '05',
            'badge'     => 'Kids Special (Age 4+)',
            'fee'       => '₹2,200 / month',
            'subtitle'  => 'Build flexibility, cartwheels, flips, core strength, and agility for young athletes and aspiring performers.',
            'content'   => 'Safe and patient acrobatics training for young children. From front rolls and backbends to cartwheels, aerial stunts, and flexibility stretching, our coaches ensure injury-free fun.',
            'benefits'  => "Certified safety landing mats and child-friendly spotting techniques\nSignificantly enhances spinal flexibility, balance, and core strength\nPrepares kids for school sports, dance competitions, and martial arts\nBoosts confidence, body awareness, and athletic posture from young age\nSpecial weekend and after-school batch timings",
            'icon'      => kosmic_asset('img/icon/service_2_2.svg'),
        ),
        array(
            'title'     => 'Power Yoga & Wellness',
            'slug'      => 'yoga-wellness',
            'num'       => '06',
            'badge'     => 'Mind & Body Balance',
            'fee'       => '₹2,000 / month',
            'subtitle'  => 'Mind-body healing, flexibility, breathwork, and posture correction guided by certified masters Ramani & Lakshmi.',
            'content'   => 'Discover the restorative power of traditional yoga combined with modern dynamic flows. Focuses on stress relief, joint mobility, core strengthening, and guided pranayama breathwork.',
            'benefits'  => "Relieves chronic back pain, stiff neck, and joint immobility\nCombines dynamic Ashtanga flows with restorative Yin postures\nGuided pranayama (breathwork) and meditation to alleviate daily stress\nImproves digestion, sleep quality, and long-term vitality\nCertified instructors Ramani & Lakshmi with patient individual corrections",
            'icon'      => kosmic_asset('img/icon/service_2_3.svg'),
        ),
        array(
            'title'     => 'Keyboard, Guitar & Veena',
            'slug'      => 'music-classes',
            'num'       => '07',
            'badge'     => 'Instrumental & Vocal',
            'fee'       => '₹2,000 / month',
            'subtitle'  => 'Western keyboard, acoustic guitar chords, Carnatic vocal music, and classical veena instrumental classes.',
            'content'   => 'Complete music academy training under one roof. Learn sheet music, chords, scales, ragas, and performance pieces on keyboard, acoustic guitar, veena, or Carnatic vocal.',
            'benefits'  => "Both Western staff notation and Indian classical raga training\nIndividual one-on-one attention for fast instrument mastery\nKeyboard, acoustic guitar, veena, and classical vocal available\nRegular recitals and school competition preparation\nWeekend and weekday evening batches suited for students and working adults",
            'icon'      => kosmic_asset('img/icon/service_2_1.svg'),
        ),
        array(
            'title'     => 'Drawing & Abacus (Kids)',
            'slug'      => 'drawing-abacus',
            'num'       => '08',
            'badge'     => 'Mental Math & Fine Arts',
            'fee'       => '₹1,800 / month',
            'subtitle'  => 'Speed mathematics calculations and fine arts drawing classes to develop kids into all-rounders in school.',
            'content'   => 'Sharpen your child\'s mental math agility and creative visual thinking through our accredited abacus and fine arts sketching modules.',
            'benefits'  => "Speed mental arithmetic calculation techniques without calculators\nEnhances memory retention, focus, and analytical logic for school\nFine arts pencil sketching, oil pastels, water coloring, and canvas art\nCertificates awarded at completion of each graded level\nFriendly and nurturing classroom environment",
            'icon'      => kosmic_asset('img/icon/service_2_2.svg'),
        ),
        array(
            'title'     => 'Wedding Choreography & Sangeeth',
            'slug'      => 'wedding-choreography',
            'num'       => '09',
            'badge'     => 'Special Events',
            'fee'       => 'Custom Package',
            'subtitle'  => 'Bespoke bridal, groom, and family dance choreography for sangeeth ceremonies, weddings, and corporate celebrations.',
            'content'   => 'Make your wedding unforgettable with customized choreography by Tollywood choreographer Mahesh Master. From couple romance routines to grand family flashmobs!',
            'benefits'  => "Custom song editing, mixing, and thematic musical curation\nChoreography designed for all dancing levels (even non-dancers look fabulous!)\nHome rehearsal options or studio rehearsals in private AC halls\nCouple entry concepts, flash mob coordination, and family sangeeth acts\nDirected by experienced movie dance choreographer Master Mahesh",
            'icon'      => kosmic_asset('img/icon/service_2_3.svg'),
        ),
    );

    foreach ($services_data as $s) {
        $existing = get_page_by_path($s['slug'], OBJECT, 'service');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'   => $s['title'],
                'post_name'    => $s['slug'],
                'post_content' => $s['content'],
                'post_status'  => 'publish',
                'post_type'    => 'service',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'service_number', $s['num']);
                update_post_meta($post_id, 'service_badge', $s['badge']);
                update_post_meta($post_id, 'service_fee', $s['fee']);
                update_post_meta($post_id, 'service_subtitle', $s['subtitle']);
                update_post_meta($post_id, 'service_benefits', $s['benefits']);
                update_post_meta($post_id, 'service_batch_info', 'Mon to Fri Batches • Morning & Evening');
                update_post_meta($post_id, 'service_icon', $s['icon']);
            }
        }
    }

    // ==========================================
    // 2. POPULATE INSTRUCTORS CPT
    // ==========================================
    $instructors_data = array(
        array(
            'title'       => 'C. Mahesh Babu (Mahesh Maddy)',
            'desig'       => 'Founder & Master Choreographer',
            'badge'       => 'Founder',
            'spotlight'   => 1,
            'bio'         => '15+ yrs experience, Lawrence Master disciple, 40+ film choreography projects.',
            'content'     => 'Trained for 3 intensive years directly under legendary dance director Lawrence Master, Mahesh Master has choreographed and danced in 30+ to 40+ movies across Telugu and Hindi film industries. Having directed the dance and fitness journeys of over 3,000 students in Hyderabad, Master Mahesh is renowned for creating championship winners, wedding spectacles, and life-changing weight loss transformations.',
            'img'         => kosmic_asset('img/mahesh_master.jpg'),
        ),
        array(
            'title'       => 'Saikrupa',
            'desig'       => 'Kuchipudi Classical Guru',
            'badge'       => 'Classical',
            'spotlight'   => 0,
            'bio'         => "Specializing in Kuchipudi's expressive movements, graceful footwork, traditional mudras, and storytelling through classical dance.",
            'content'     => 'Guru Saikrupa brings a lifelong dedication to the ancient art of Kuchipudi. Her classes emphasize authentic posture, tala precision, and evocative facial expressions.',
            'img'         => kosmic_asset('img/team/team_3_3.jpg'),
        ),
        array(
            'title'       => 'Kranthi',
            'desig'       => 'Hip Hop Dance Instructor',
            'badge'       => 'Hip-Hop',
            'spotlight'   => 0,
            'bio'         => 'Led by Kranthi & experienced street dancers. Master the foundational rhythm of popping, locking, breaking, and footwork.',
            'content'     => 'Specialist in street popping, locking, breaking, and contemporary hip-hop with extensive battle and stage competition experience.',
            'img'         => kosmic_asset('img/team/team_3_2.jpg'),
        ),
        array(
            'title'       => 'Indu & Lakshmi',
            'desig'       => 'Zumba & 5-Days-5-Variation Trainers',
            'badge'       => 'Fitness',
            'spotlight'   => 0,
            'bio'         => 'Certified Zumba specialists creating high-energy, fun, and safe fat-burning workouts for ladies.',
            'content'     => 'Leading our signature 5-Days-5-Variation and Zumba sessions, Indu and Lakshmi create an empowering, welcoming community where hundreds have achieved their weight loss goals.',
            'img'         => kosmic_asset('img/team/team_3_4.jpg'),
        ),
        array(
            'title'       => 'Ashok',
            'desig'       => 'Gymnastics & Acrobatics Coach',
            'badge'       => 'Gymnastics',
            'spotlight'   => 0,
            'bio'         => 'Safety-certified gymnastics coach specializing in childhood flexibility, backbends, and cartwheels.',
            'content'     => 'Passionate about nurturing balance, spatial agility, and core athletic strength in young athletes starting as young as 4 years old.',
            'img'         => kosmic_asset('img/team/team_3_5.jpg'),
        ),
        array(
            'title'       => 'Ramani & Lakshmi',
            'desig'       => 'Yoga & Wellness Instructors',
            'badge'       => 'Yoga',
            'spotlight'   => 0,
            'bio'         => 'Experienced masters in Ashtanga vinyasa, breathing techniques, and posture rehabilitation.',
            'content'     => 'Guiding students toward holistic health, mindfulness, spinal strength, and emotional calm through structured traditional yogic practices.',
            'img'         => kosmic_asset('img/team/team_3_1.jpg'),
        ),
    );

    foreach ($instructors_data as $i) {
        $existing = get_page_by_title($i['title'], OBJECT, 'instructor');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'   => $i['title'],
                'post_content' => $i['content'],
                'post_status'  => 'publish',
                'post_type'    => 'instructor',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'instructor_designation', $i['desig']);
                update_post_meta($post_id, 'instructor_badge', $i['badge']);
                update_post_meta($post_id, 'instructor_short_desc', $i['bio']);
                update_post_meta($post_id, 'instructor_is_spotlight', $i['spotlight']);
                update_post_meta($post_id, 'instructor_facebook', 'https://facebook.com/');
                update_post_meta($post_id, 'instructor_instagram', 'https://instagram.com/');
                update_post_meta($post_id, 'instructor_youtube', 'https://youtube.com/');
            }
        }
    }

    // ==========================================
    // 3. POPULATE TESTIMONIALS CPT
    // ==========================================
    $testimonials_data = array(
        array(
            'name'   => 'Sriram',
            'batch'  => 'Dance Student',
            'rating' => 5,
            'text'   => "It's better than what I expected. The behavior and dance composition of the master was too good. I recommend you all to join this Dance studio. Thank you Mahesh master!",
            'avatar' => kosmic_asset('img/testimonial/testi_3_1.jpg'),
        ),
        array(
            'name'   => 'Pooja R.',
            'batch'  => 'Padmarao Nagar Member',
            'rating' => 5,
            'text'   => 'I have been to Kosmic dance studio and I experienced the best feeling. The best studio in Padmarao Nagar Secunderabad and about choreographer he is humble and down to earth person. So inspiring and motivating. I will surely recommend Kosmic dance studio for all ages.',
            'avatar' => kosmic_asset('img/testimonial/testi_3_2.jpg'),
        ),
        array(
            'name'   => 'Bhavana K.',
            'batch'  => 'Zumba & Fitness Student',
            'rating' => 5,
            'text'   => 'Kosmic Dance Session taken by Mahesh sir is just awesome. This is a great place to learn dance, Mahesh sir is the best teacher I have. His sense of humor is an added plus for ladies such as myself, who had no experience in dancing, so the lessons are not only informative but so enjoyable at the same time!',
            'avatar' => kosmic_asset('img/testimonial/testi_3_3.jpg'),
        ),
        array(
            'name'   => 'Ravi Teja',
            'batch'  => 'Competition Team Dancer',
            'rating' => 5,
            'text'   => "Kosmic Studio 4 Danz (A/C dance studio) has been running for 15+ years and more than 3,000 students have passed out as dancers. Whenever the dancers of this studio go for a competition, all the other dancers fix 1st prize for Kosmic! There's a sense of magic in this studio.",
            'avatar' => kosmic_asset('img/testimonial/testi_3_4.jpg'),
        ),
        array(
            'name'   => 'Sunitha M.',
            'batch'  => 'Proud Parent • Shivam Road',
            'rating' => 5,
            'text'   => 'The best dance training institute in twin cities. Multi-style dance training institute for all age groups. With Yoga, Classical music, keyboard & guitar, abacus maths training, and dance in Kosmic all under one roof, my kid became an all-rounder in school!',
            'avatar' => kosmic_asset('img/testimonial/testi_3_5.jpg'),
        ),
        array(
            'name'   => 'Ananya S.',
            'batch'  => 'Kuchipudi & Dance Student',
            'rating' => 5,
            'text'   => 'Dancing is an art and not everyone is an artist, but we have such a genius artist in Mr. Mahesh Babu commonly known as Mahesh Maddy. You will experience unbelievable teaching in this studio. Kindly do visit and encourage your kids!',
            'avatar' => kosmic_asset('img/testimonial/testi_3_6.jpg'),
        ),
    );

    foreach ($testimonials_data as $t) {
        $existing = get_page_by_title($t['name'], OBJECT, 'testimonial');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'   => $t['name'],
                'post_content' => $t['text'],
                'post_status'  => 'publish',
                'post_type'    => 'testimonial',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'testimonial_text', $t['text']);
                update_post_meta($post_id, 'testimonial_batch', $t['batch']);
                update_post_meta($post_id, 'testimonial_rating', $t['rating']);
                update_post_meta($post_id, 'testimonial_avatar', $t['avatar']);
            }
        }
    }

    // ==========================================
    // 4. POPULATE GALLERY CATEGORIES & ITEMS
    // ==========================================
    $categories = array(
        'tollywood' => 'Tollywood & Stage',
        'kids'      => 'Kids & Acrobatics',
        'fitness'   => 'Weight Loss & Zumba',
        'classical' => 'Kuchipudi Classical',
        'studio'    => 'Studio Sessions',
    );

    $cat_ids = array();
    foreach ($categories as $slug => $name) {
        $term = term_exists($name, 'gallery_category');
        if (!$term) {
            $created = wp_insert_term($name, 'gallery_category', array('slug' => $slug));
            if (!is_wp_error($created)) {
                $cat_ids[$slug] = $created['term_id'];
            }
        } else {
            $cat_ids[$slug] = is_array($term) ? $term['term_id'] : $term;
        }
    }

    $gallery_data = array(
        array(
            'title' => 'Dance First, Think Later • Kids Batch',
            'tag'   => 'Kids Acrobatics',
            'cat'   => 'kids',
            'img'   => kosmic_asset('img/kosmic/Dance-first-think-later-Kids-Dance.jpg'),
        ),
        array(
            'title' => 'Music Made Visible • Evening Session',
            'tag'   => 'Studio Life',
            'cat'   => 'studio',
            'img'   => kosmic_asset('img/kosmic/Dance-is-Music-Made-Visible-evening.jpg'),
        ),
        array(
            'title' => 'Hidden Language of Soul • Choreography',
            'tag'   => 'Tollywood Beats',
            'cat'   => 'tollywood',
            'img'   => kosmic_asset('img/kosmic/Dance-IS-the-Hidden-Language-of-the-solu-Evening-batch.jpg'),
        ),
        array(
            'title' => 'High-Energy Zumba • Monday to Friday',
            'tag'   => 'Weight Loss Fitness',
            'cat'   => 'fitness',
            'img'   => kosmic_asset('img/kosmic/Zumba-class-Mon-to-Friday.jpg'),
        ),
        array(
            'title' => 'Morning Wellness • Power Yoga Session',
            'tag'   => 'Mind & Body',
            'cat'   => 'studio',
            'img'   => kosmic_asset('img/feature/feature_1_1.jpg'),
        ),
        array(
            'title' => 'Graceful Mudras • Classical Kuchipudi',
            'tag'   => 'Classical Heritage',
            'cat'   => 'classical',
            'img'   => kosmic_asset('img/normal/dance_2.png'),
        ),
    );

    foreach ($gallery_data as $g) {
        $existing = get_page_by_title($g['title'], OBJECT, 'gallery_item');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'  => $g['title'],
                'post_status' => 'publish',
                'post_type'   => 'gallery_item',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'gallery_tag', $g['tag']);
                update_post_meta($post_id, 'gallery_image', $g['img']);
                if (isset($cat_ids[$g['cat']])) {
                    wp_set_object_terms($post_id, array((int)$cat_ids[$g['cat']]), 'gallery_category');
                }
            }
        }
    }

    // ==========================================
    // 5. POPULATE PRICING PLANS CPT
    // ==========================================
    $pricing_data = array(
        array(
            'title'    => 'Monthly Dance Pass',
            'subtitle' => 'Bollywood, Tollywood & Hip-Hop',
            'price'    => '₹2,500',
            'period'   => '/ month',
            'featured' => 0,
            'features' => "3 Sessions per week (12 classes/mo)\nTollywood & Bollywood Choreography\n100% Air-Conditioned Studio Access\nAnnual Stage Showcase Eligibility\nMorning or Evening Batch Flexibility",
            'btn_text' => 'Enroll in Dance Pass',
        ),
        array(
            'title'    => '5-Days Weight Loss',
            'subtitle' => 'Signature Fitness & Fat Burn Routine',
            'price'    => '₹3,000',
            'period'   => '/ month',
            'featured' => 1,
            'features' => "5 Sessions/week (Mon to Fri)\nZumba + Aerobics + Tabata + Yoga\nSeparate Ladies-Only Batches\nWeekly Weight & Inches Tracking\nCertified Nutrition & Diet Guide",
            'btn_text' => 'Join Weight Loss Batch',
        ),
        array(
            'title'    => 'Kids Acrobatics / Classical',
            'subtitle' => 'Gymnastics, Kuchipudi or Fine Arts',
            'price'    => '₹2,200',
            'period'   => '/ month',
            'featured' => 0,
            'features' => "2-3 Sessions per week (Weekend options)\nCertified Gymnastics Crash Mats\nKuchipudi Mudras & Tala Training\nSchool Competition Coaching\nPatient 1-on-1 Spotter Mentorship",
            'btn_text' => 'Enroll Your Child',
        ),
    );

    foreach ($pricing_data as $p) {
        $existing = get_page_by_title($p['title'], OBJECT, 'pricing_plan');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'  => $p['title'],
                'post_status' => 'publish',
                'post_type'   => 'pricing_plan',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'plan_subtitle', $p['subtitle']);
                update_post_meta($post_id, 'plan_price', $p['price']);
                update_post_meta($post_id, 'plan_period', $p['period']);
                update_post_meta($post_id, 'plan_featured', $p['featured']);
                update_post_meta($post_id, 'plan_features', $p['features']);
                update_post_meta($post_id, 'plan_btn_text', $p['btn_text']);
                update_post_meta($post_id, 'plan_btn_url', '#contact-sec');
            }
        }
    }

    // ==========================================
    // 6. POPULATE CLASS SCHEDULE CPT
    // ==========================================
    $schedule_data = array(
        array('title' => '5-Days-5-Variation Weight Loss (Ladies)', 'time' => '06:00 AM – 07:00 AM', 'days' => 'Mon – Fri', 'inst' => 'Pooja Reddy / Mahesh Master', 'badge' => 'Ladies Special', 'style' => 'badge-ladies'),
        array('title' => 'Power Yoga & Mindfulness Stretch', 'time' => '07:00 AM – 08:00 AM', 'days' => 'Mon – Fri', 'inst' => 'Divya Sri', 'badge' => 'All Levels', 'style' => 'badge-batch'),
        array('title' => 'High-Energy Zumba Cardio Party', 'time' => '08:00 AM – 09:00 AM', 'days' => 'Mon – Fri', 'inst' => 'Pooja Reddy', 'badge' => 'Ladies Special', 'style' => 'badge-ladies'),
        array('title' => 'Gymnastics & Kids Acrobatics', 'time' => '04:30 PM – 05:30 PM', 'days' => 'Mon, Wed, Fri', 'inst' => 'Karthik Verma', 'badge' => 'Kids (Age 4-12)', 'style' => 'badge-batch'),
        array('title' => 'Bollywood & Freestyle Kids Dance', 'time' => '05:30 PM – 06:30 PM', 'days' => 'Mon, Wed, Fri', 'inst' => 'Vikram Rao / Mahesh Master', 'badge' => 'Kids & Teens', 'style' => 'badge-batch'),
        array('title' => '5-Days Weight Loss & Aerobics', 'time' => '06:30 PM – 07:30 PM', 'days' => 'Mon – Fri', 'inst' => 'Pooja Reddy', 'badge' => 'Evening Ladies', 'style' => 'badge-ladies'),
        array('title' => 'Hip-Hop, Breaking & Tollywood', 'time' => '07:30 PM – 08:30 PM', 'days' => 'Mon – Fri', 'inst' => 'Kranthi / Mahesh Master', 'badge' => 'Teens & Adults', 'style' => 'badge-batch'),
    );

    foreach ($schedule_data as $sc) {
        $existing = get_page_by_title($sc['title'], OBJECT, 'class_schedule');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'  => $sc['title'],
                'post_status' => 'publish',
                'post_type'   => 'class_schedule',
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'schedule_time', $sc['time']);
                update_post_meta($post_id, 'schedule_days', $sc['days']);
                update_post_meta($post_id, 'schedule_instructor', $sc['inst']);
                update_post_meta($post_id, 'schedule_badge', $sc['badge']);
                update_post_meta($post_id, 'schedule_badge_style', $sc['style']);
            }
        }
    }

    // Mark as completed
    update_option('kosmic_cpt_imported_v1', 1);
}
add_action('init', 'kosmic_run_demo_import', 30);

