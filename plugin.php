<?php

/*
 Plugin Name: BS-Testimonial
 Plugin URI: https://github.com/bluesuiter/bs-testimonials
 Description: Testimonials plugin.
 Version: 0.4.25
 Author: BlueSuiter
 Author URI: https://amitchauhan.net
 */

require_once plugin_dir_path(__FILE__) . 'bootstrap.php';

register_activation_hook(__FILE__, function () {
    (new \BsTestimonial\Migrations\Migration())->loadMigrations();
});
