<?php
/**
 * Template Name: Single Service Generic (Legacy Redirect)
 *
 * Legacy static template: automatically 301-redirects to the dynamic CPT post.
 * @package Kosmic
 */

if (!defined('ABSPATH')) {
    exit;
}

$target_url = home_url('/services-programs/');
wp_safe_redirect($target_url, 301);
exit;
