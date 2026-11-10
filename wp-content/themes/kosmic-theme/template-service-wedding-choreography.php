<?php
/**
 * Template Name: Service - Wedding Choreography (Legacy Redirect)
 *
 * Legacy static template: automatically 301-redirects to the dynamic CPT post.
 * @package Kosmic
 */

if (!defined('ABSPATH')) {
    exit;
}

$cpt = get_page_by_path('wedding-choreography', OBJECT, 'service');
$target_url = $cpt ? get_permalink($cpt->ID) : home_url('/programs/wedding-choreography/');
wp_safe_redirect($target_url, 301);
exit;
