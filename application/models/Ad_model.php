<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ad_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * ADDING NEW product
     */
    function ad_activity_on_frontend(){
        if(get_settings('ad_activity_on_frontend')){
            $this->db->where('key', 'ad_activity_on_frontend');
            $this->db->update('settings', array('value' => 0));
        }else{
            $this->db->where('key', 'ad_activity_on_frontend');
            $this->db->update('settings', array('value' => 1));
        }
    }

    function get_ad_dimensions($dimension_id = ""){
        if($dimension_id > 0){
            $this->db->where('dimension_id', $dimension_id);
        }
        return $this->db->get('ad_dimensions');
    }

    function get_ads($ad_id = ""){
        if($ad_id > 0){
            $this->db->where('ad_id', $ad_id);
        }
        return $this->db->get('ads');
    }

    function get_filtered_ads(){
        $product_id = $_GET['product_id'];
        $dimension_id = $_GET['dimension_id'];
        if($product_id != 'all' && $product_id != ""){
            $this->db->where('product_id', $product_id);
        }
        if($dimension_id != 'all' && $dimension_id != ""){
            $this->db->where('ad_dimension_id', $dimension_id);
        }
        return $this->db->get('ads');
    }

    function ad_create(){
        $data['title'] = htmlspecialchars($this->input->post('title'));
        $data['product_id'] = htmlspecialchars($this->input->post('product'));
        $data['ad_dimension_id'] = htmlspecialchars($this->input->post('dimension'));

        $image_path = $_FILES['ad_image']['name'];
        if($image_path){
            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
            $data['ad_image'] = md5(rand(1000000, 99999999)).'.'.$image_ext;
            move_uploaded_file($_FILES['ad_image']['tmp_name'], 'uploads/ad/thumbnails/' . $data['ad_image']);
        }

        $data['link_to_click'] = htmlspecialchars($this->input->post('url'));
        $data['status'] = 1;

        $this->db->insert('ads', $data);
    }

    function ad_update($ad_id = ""){
        $data['title'] = htmlspecialchars($this->input->post('title'));
        $data['product_id'] = htmlspecialchars($this->input->post('product'));
        $data['ad_dimension_id'] = htmlspecialchars($this->input->post('dimension'));

        $image_path = $_FILES['ad_image']['name'];
        if($image_path){
            unlink('uploads/ad/thumbnails/' . $this->ad_model->get_ads($ad_id)->row('ad_image'));

            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
            $data['ad_image'] = md5(rand(1000000, 99999999)).'.'.$image_ext;
            move_uploaded_file($_FILES['ad_image']['tmp_name'], 'uploads/ad/thumbnails/' . $data['ad_image']);
        }

        $data['link_to_click'] = htmlspecialchars($this->input->post('url'));

        $this->db->where('ad_id', $ad_id);
        $this->db->update('ads', $data);
    }

    function ad_status($ad_id = ""){
        $current_status = $this->get_ads($ad_id)->row('status');
        if($current_status){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $this->db->where('ad_id', $ad_id);
        $this->db->update('ads', $data);
    }

    function ad_delete($ad_id = ""){
        unlink('uploads/ad/thumbnails/' . $this->ad_model->get_ads($ad_id)->row('ad_image'));

        $this->db->where('ad_id', $ad_id);
        $this->db->delete('ads');
    }
















}