<?php

namespace BsTestimonial\Controllers;

use BsTestimonial\Models\Testimonial;
use BsTestimonial\Core\ControllerClass;

class TestimonialController extends ControllerClass
{

    public function addActions()
    {
        add_action('admin_post_bs_saveTestimonial', [$this, 'save']);
    }

    public function adminMenu()
    {
        add_menu_page('Testimonials', 'Testimonials', 'edit_posts', 'bs_testimonials', [$this, 'index'], 'dashicons-format-quote', 15);
        add_submenu_page('bs_testimonials', 'Manage Testimonials', 'Manage Testimonials', 'edit_posts', 'bs_manageTestimonials', [$this, 'create']);
        add_submenu_page('', '', '', 'edit_posts', 'bst_saveTestimonials', [$this, 'save']);
    }

    public function index()
    {
        return bst_loadView('testimonial/index', '');
    }

    public function create()
    {
        return bst_loadView('testimonial/create');
    }

    public function save()
    {
        $this->verifyNonce('_bst_testimonial_form_nonce', 'bst_testimonial_form');
        pr($_POST);
        die;
        $data = [
            'avatar' => 'ethos-logo-png.png',
            'author' => sanitize_text_field($_POST['bst_author']),
            'designation' => sanitize_text_field($_POST['bst_designation']),
            'content' => htmlspecialchars($_POST['bst_content'], ENT_QUOTES)
        ];

        (new Testimonial())->save($data);
        return wp_redirect(admin_url('admin.php?page=bs_testimonials'));
    }

    public function edit()
    {
        pr($_GET);
    }

    public function update()
    {
        pr($_POST);
    }

    public function delete()
    {
        pr($_POST);
    }
}
