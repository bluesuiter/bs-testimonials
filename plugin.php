<?php

/*
 Plugin Name: Bs Testimonial
 Plugin URI: 
 Description: Bs Testimonial
 Version: 0.4.25
 Author: BlueSuiter's
 Author URI: 
 */

require_once plugin_dir_path(__FILE__) . 'bootstrap.php';

register_activation_hook(__FILE__, function () {
    (new \BsTestimonial\Migrations\Migration())->loadMigrations();
});
