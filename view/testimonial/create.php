<div class="wrap">
    <h1 class="wp-heading-inline">Add Testimonials</h1>
    <form method="post" action="<?php echo admin_url('admin-post.php') ?>" name="create_testimonial">
        <div class="row p-3">
            <div class="col-3">
                <label class="text-center">
                    <?php echo get_avatar('', 256, '', '', array('force_default' => true)); ?>
                    <input class="d-none" type="file" name="bst_avatar" id="bst_avatar" />
                </label>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="label">Author</label>
                        <input type="text" class="w-100" required name="bst_author" id="bst_author" placeholder="Author" />
                    </div>
                    <div class="col-12 mb-3">
                        <label class="label">Designation</label>
                        <input type="text" class="w-100" name="bst_designation" id="bst_designation" placeholder="Designation" />
                    </div>
                    <div class="col-12 mb-3">
                        <label class="label">Star</label>
                        <p>
                            <input type="radio" name="bst_star" value="1" />&#9733;
                            <input type="radio" name="bst_star" value="1" />&#9733; &#9733;
                            <input type="radio" name="bst_star" value="1" />&#9733; &#9733; &#9733;
                            <input type="radio" name="bst_star" value="1" />&#9733; &#9733; &#9733; &#9733;
                            <input type="radio" name="bst_star" value="1" />&#9733; &#9733; &#9733; &#9733; &#9733;
                        </p>
                    </div>
                    <div class="col-12">
                        <?php
                        wp_editor('', 'meta_content_editor', array(
                            'wpautop'       =>  true,
                            'media_buttons' =>  false,
                            'textarea_name' =>  'bst_content',
                            'textarea_rows' =>  5,
                            'teeny'         =>  true,
                        ));
                        ?>
                    </div>
                </div>
                <input type="hidden" name="action" value="bs_saveTestimonial" />
                <?php wp_nonce_field('_bst_testimonial_form_nonce', 'bst_testimonial_form'); ?>
                <button type="submit" class="my-2 button button-primary">Submit</button>
            </div>
        </div>
    </form>
</div>