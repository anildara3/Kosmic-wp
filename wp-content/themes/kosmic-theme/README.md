# Kosmic Studio 4 Danz - Custom WordPress Theme (PHP)

A custom, responsive, high-performance WordPress theme created for **Kosmic Studio 4 Danz** (Hyderabad's premier dance studio & fitness academy directed by Tollywood Master Choreographer C. Mahesh Babu).

---

## 🎨 Design & Structure Preservation
- **100% Visual Fidelity**: Every CSS animation, neon glow effect, button hover, slick slider, counter, modal, and drawer interaction is preserved exactly as in your static HTML design.
- **Approved Inspected Footer**: Incorporates the 3-column + horizontal Quick Links + copyright bar footer layout across all pages.
- **All 26 Pages Converted**: Available as native WordPress core templates and custom page templates.
- **Dynamic Asset Loading**: All CSS, JavaScript, and media assets are enqueued properly through `functions.php` and referenced via `kosmic_asset()`.

---

## 📦 Theme Structure
```
kosmic-theme/
├── assets/
│   ├── css/               # bootstrap, fontawesome, magnific-popup, slick, style.css
│   ├── fonts/             # FontAwesome & webfonts
│   ├── img/               # Studio photos, logos, hero banners, icons
│   └── js/                # slick, bootstrap, counterup, magnific, isotope, main.js
├── screenshot.png         # Theme preview in WP Appearance > Themes
├── style.css              # Main WordPress theme declaration stylesheet
├── functions.php          # Theme setup, enqueues, menu registration, helper functions
├── header.php             # Unified header with preloader, drawers, cart, and navigation
├── footer.php             # Inspected 3-column footer with dynamic recent posts & links
├── front-page.php         # Dedicated homepage template (index.html)
├── index.php              # Fallback blog archive with pagination
├── page.php               # Standard WordPress default page template
├── single.php             # Single blog post template with sidebar & comments
├── archive.php            # Category, tag, and date archive template
├── 404.php                # Custom 404 error page
├── template-about.php     # Template Name: About Us Page
├── template-services.php  # Template Name: Services & Programs Overview
├── template-instructors.php # Template Name: Our Instructors Page
├── template-testimonials.php # Template Name: Testimonials Page
├── template-gallery.php   # Template Name: Studio Gallery Page
├── template-pricing.php   # Template Name: Pricing & Fee Structure
├── template-schedule.php  # Template Name: Class Schedule Page
├── template-contact.php   # Template Name: Contact Us Page
├── template-terms.php     # Template Name: Terms & Policies Page
├── template-blog-list.php # Template Name: Blog List Page
├── template-blog-sidebar.php # Template Name: Blog Right Sidebar Page
├── template-service-5-days-weight-loss.php
├── template-service-bollywood-dance.php
├── template-service-zumba-fitness.php
├── template-service-kuchipudi-classical.php
├── template-service-gymnastics-kids.php
├── template-service-wedding-choreography.php
├── template-service-yoga-wellness.php
├── template-service-music-classes.php
├── template-service-drawing-abacus.php
└── template-single-service.php
```

---

## 🚀 How to Install and Activate

### Method 1: WordPress Admin (One-Click Zip Upload)
1. In your WordPress Admin dashboard, navigate to **Appearance > Themes**.
2. Click **Add New Theme**, then click **Upload Theme**.
3. Select the `kosmic-theme.zip` file located in `e:\Projects\SEO\Dance\kosmic-theme.zip`.
4. Click **Install Now**, then click **Activate**.

### Method 2: Manual / FTP
1. Copy or upload the `kosmic-theme` folder directly into your WordPress installation at:
   `wp-content/themes/kosmic-theme/`
2. Go to **Appearance > Themes** and click **Activate** on **Kosmic Studio 4 Danz**.

---

## ⚙️ Initial Setup & Recommended Pages

### 1. Set the Homepage
1. Go to **Pages > Add New** and create a page titled **Home**.
2. Go to **Settings > Reading**.
3. Under **Your homepage displays**, select **A static page**.
4. Set **Homepage** to **Home**, and click **Save Changes**.
*(WordPress will automatically use `front-page.php` to render your complete homepage).*

### 2. Creating Inner Pages with Custom Templates
In **Pages > Add New**, create pages and assign the corresponding template under **Page Attributes > Template**:
- **About Us** -> Template: `About Us Page`
- **Services & Programs** -> Template: `Services & Programs Overview`
- **Our Instructors** -> Template: `Our Instructors Page`
- **Testimonials** -> Template: `Testimonials Page`
- **Studio Gallery** -> Template: `Studio Gallery Page`
- **Pricing & Fees** -> Template: `Pricing & Fee Structure`
- **Class Schedule** -> Template: `Class Schedule Page`
- **Contact Us** -> Template: `Contact Us Page`
- **Terms & Policies** -> Template: `Terms & Policies Page`
- **5 Days Weight Loss** -> Template: `Service - 5 Days Weight Loss`
- **Bollywood Dance** -> Template: `Service - Bollywood & Tollywood Dance`
- **Zumba Fitness** -> Template: `Service - Zumba & Aerobics Fitness`
- **Kuchipudi Classical** -> Template: `Service - Kuchipudi Classical Dance`
- **Kids Gymnastics** -> Template: `Service - Gymnastics & Kids Acrobatics`
- **Wedding Choreography** -> Template: `Service - Wedding Choreography`
- **Yoga & Wellness** -> Template: `Service - Yoga & Wellness`
- **Music Classes** -> Template: `Service - Music Classes`
- **Drawing & Abacus** -> Template: `Service - Drawing, Painting & Abacus`

---

## 📞 Studio Branches
- **Padmarao Nagar Studio (Secunderabad)**: 6-1-289/7, 2nd Flr, Above Ratnadeep, Secunderabad - 500025. Phone: +91 97033 66311 / +91 95026 26988
- **Shivam Road Branch (Hyderabad)**: 3rd Flr, MIG-80, Opp Union Bank, Bathukamma Kunta, DD Colony, Hyderabad - 500013. Phone: +91 75698 16060 / +91 97033 66311

