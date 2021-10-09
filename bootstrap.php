<?php

/* Include the autoloader so we can dynamically include the rest of the classes. */
require_once trailingslashit(dirname(__FILE__)) . 'inc/autoloader.php';
require_once trailingslashit(dirname(__FILE__)) . 'helper/helper-functions.php';

add_action('init', 'bs_testimonial_init');

if (!defined('bs_testimonial_path')) {
    define('bs_testimonial_path', trailingslashit(dirname(__FILE__)));
}

if (!defined('bs_testimonial_uri')) {
    define('bs_testimonial_uri', (plugin_dir_url(__FILE__).'assets'));
}

if (!defined('bs_testimonial_view')) {
    define('bs_testimonial_view', trailingslashit(dirname(__FILE__)) . "view/");
}

/**
 * Starts the plugin by initializing the meta box, its display, and then
 * sets the plugin in motion.
 */
function bs_testimonial_init() {
    $meta_box = new \BsTestimonial\Controllers\BsTestimonialController();
}