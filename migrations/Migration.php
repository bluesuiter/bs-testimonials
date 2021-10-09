<?php

namespace BsTestimonial\Migrations;

use BsTestimonial\Migrations\TestimonialTable as Testimonial;

class Migration
{
    private $bst_db_version = 1.0;

    public function loadMigrations()
    {
        (new Testimonial())->exec();

        add_option("bst_db_version", $this->bst_db_version);
    }

}
?>