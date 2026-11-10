<?php
/**
 * Template Name: Service - 5 Days Weight Loss (Legacy Redirect)
 *
 * Legacy static template: automatically 301-redirects to the dynamic CPT post.
 * @package Kosmic
 */

if (!defined('ABSPATH')) {
    exit;
}

$cpt = get_page_by_path('5-days-weight-loss', OBJECT, 'service');
$target_url = $cpt ? get_permalink($cpt->ID) : home_url('/programs/5-days-weight-loss/');
wp_safe_redirect($target_url, 301);
exit;
