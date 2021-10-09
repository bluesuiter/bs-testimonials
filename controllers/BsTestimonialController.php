<?php

namespace BsTestimonial\Controllers;

use BsTestimonial\Controllers\TestimonialController;

class BsTestimonialController{
    
    public function __construct(){
        $this->addActions();
        add_action('admin_menu', [$this, 'adminPanel']);
        add_action('admin_enqueue_scripts', [$this, 'addAdminCss']);
    }

    public function addActions(){
        $objTestimonial = new TestimonialController();
        $objTestimonial->addActions();
    }

    public function adminPanel(){
        $objTestimonial = new TestimonialController();
        $objTestimonial->adminMenu();
    }

    public function addAdminCss(){
        if(strrpos(getArrayValue($_GET, 'page'), 'bsg_', 0) == 0){
            wp_register_script('_admin_bsg_Js', bs_testimonial_uri.'/admin/js/script.js', array('jquery'), '2.7', true);
            wp_register_style('_admin_bsg_Css', bs_testimonial_uri.'/admin/css/style.css', false, '1.6.25');
            wp_enqueue_script('_admin_bsg_Js');
            wp_enqueue_style('_admin_bsg_Css');
        }
    }

}
