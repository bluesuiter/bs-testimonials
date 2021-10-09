<?php

namespace BsTestimonial\Models;

use Exception;

class Testimonial {
    private $table = 'bsg_testimonials';

    public function get(){
        try{
            global $wpdb;
            $table = $wpdb->prefix.$this->table;
            $sqlQry = "SELECT * FROM $table tm";
            return $wpdb->get_results($sqlQry, 'ARRAY_A');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function save($data = array()){
        try{
            global $wpdb;
            $table = $wpdb->prefix.$this->table;
            $wpdb->insert($table, $data);
            return $wpdb->insert_id;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $data=array()){
        try{
            global $wpdb;
            $table = $wpdb->prefix.$this->table;
            $wpdb->update($table, $data, ['id' => $id]);
            return $wpdb->insert_id;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function nextId() {
        try{
            global $wpdb;
            $table = $wpdb->prefix.$this->table;
            return $wpdb->get_var("SELECT max(id) FROM $table");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * fetch and return testimonial
     * @param int $id testimonial id
     */
    public function getTestimonial($id) {
        try{
            global $wpdb;
            /** gallery */
            $table = $wpdb->prefix.$this->table;
            $sqlQry = "SELECT id, author, content, avatar, designation  
                        FROM $table gl WHERE id=$id";
            $result = $wpdb->get_row($sqlQry, 'ARRAY_A');
            return $result;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
