<?php 

namespace BsTestimonial\Controllers;

use BsTestimonial\Models\Testimonial;
use BsTestimonial\Core\ControllerClass;

class TestimonialController extends ControllerClass {
    
    public function addActions(){
        add_action('admin_post_bs_saveTestimonial', [$this, 'save']);
    }

    public function adminMenu(){
        add_menu_page('Testimonials', 'Testimonials', 'edit_posts', 'bs_testimonials', [$this, 'index'], 'dashicons-format-quote', 15);
        add_submenu_page('', 'Manage Testimonials', 'Manage Testimonials', 'edit_posts', 'bsg_manageTestimonials', [$this, 'create']);
    }

    public function index(){
        return bsg_loadView('testimonial/index', '');
    }

    public function create(){
        return bsg_loadView('testimonial/create');
    }

    public function save(){
        $this->verifyNonce('_bs_testimonial_form_nonce', 'bsg_testimonial_form');
        $data = ['bsg_avatar' => 'ethos-logo-png.png',
                 'bsg_author' => 'test',
                 'bsg_designation' => 'test',
                 'bsg_content' => 'testset'];

        (new Testimonial())->save($data);
        return wp_redirect(admin_url('admin.php?page=bsg_testimonials'));
    }

    public function edit(){
        pr($_GET);
    }

    public function update(){
        pr($_POST);
    }

    public function delete(){
        pr($_POST);
    }
}