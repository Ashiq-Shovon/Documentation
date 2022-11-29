<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
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
    function str_replace_first($search, $replace, $subject)
    {
        $search = '/'.preg_quote($search, '/').'/';
        return preg_replace($search, $replace, $subject, 2);
    }
    function add_product()
    {
        $data['name'] = $this->input->post('name');
        $data['sub_title'] = $this->input->post('sub_title');
        $data['type'] = $this->input->post('type');
        $data['slug'] = slugify($data['name']);

        // DUPLICATION CHECK
        if ($this->db->get_where('products', ['name' => $data['name']])->num_rows()) {
            $this->session->set_flashdata('error_message', get_phrase('this_product_already_exists'));
            redirect(site_url('admin/products'), 'refresh');
        }

        // product thumbnail adding
        if (!file_exists('uploads/thumbnails/products')) {
            mkdir('uploads/thumbnails/products', 0777, true);
        }
        if ($_FILES['thumbnail']['name'] == "") {
            $data['thumbnail'] = 'thumbnail.png';
        } else {
            $data['thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnails/products/' . $data['thumbnail']);
        }

        if ($_FILES['favicon']['name'] == "") {
            $data['favicon'] = 'favicon.png';
        } else {
            $data['favicon'] = md5(rand(10000000, 20000000)) . '.png';
            move_uploaded_file($_FILES['favicon']['tmp_name'], 'uploads/favicons/products/' . $data['favicon']);
        }

        $data['directory'] = $this->create_directory();
        $this->db->insert('products', $data);
    }

    /**
     * THIS FUNCTION CREATES DYNAMIC FOLDER FOR EACH PRODUCT AND CREATES DYNAMIC HTACCESS AND INDEX FILE FOR PREVENTING DIRECT FILE ACCESS
     *
     * @return string
     */
    private function create_directory()
    {
        // RANDOM NUMBER GENERATION
        $random_dirname = random(15);
        $relative_path = "uploads/resources/$random_dirname";

        if (!file_exists($relative_path)) {
            if (mkdir($relative_path, 0777)) {
                copy("assets/shield/.htaccess", "$relative_path/.htaccess");
                copy("assets/shield/index.html", "$relative_path/index.html");
                return $random_dirname;
            }
        }
        $this->create_directory();
    }

    /**
     * UPDATING AN EXISTING product
     * @param int $product_id
     * @return void
     */

    function edit_product($product_id)
    {
        $data['name'] = $this->input->post('name');
        $data['sub_title'] = $this->input->post('sub_title');
        $data['type'] = $this->input->post('type');
        $data['slug'] = slugify($data['name']);

        // DUPLICATION CHECK
        $this->db->where('name', $data['name']);
        $this->db->where('id !=', $product_id);
        $previous_entry = $this->db->get('products')->num_rows();
        if ($previous_entry) {
            $this->session->set_flashdata('error_message', get_phrase('this_product_already_exists'));
            redirect(site_url('admin/products'), 'refresh');
        }

        if ($_FILES['thumbnail']['name'] != "") {
            $data['thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnails/products/' . $data['thumbnail']);
        }

        if ($_FILES['favicon']['name'] != "") {
            $data['favicon'] = md5(rand(10000000, 20000000)) . '.png';
            move_uploaded_file($_FILES['favicon']['tmp_name'], 'uploads/favicons/products/' . $data['favicon']);
        }

        $this->db->where('id', $product_id);
        $this->db->update('products', $data);
    }

    /**
     * DELETING AN EXISTING APPLICAITON
     *
     * @param int $product_id
     * @return void
     */
    function delete_product($product_id)
    {
        $this->db->where('id', $product_id);
        $this->db->delete('products');
    }

    /**
     * GETTING ALL THE product
     */

    function get_products()
    {
        $this->db->order_by("order", "asc");
        return $this->db->get('products');
    }

    /**
     * GET AN product BY ID
     *
     * @param int $product_id
     * @return object
     */
    function get_product_by_id($product_id)
    {
        $this->db->where("id", $product_id);
        return $this->db->get('products');
    }

    /**
     * GET AN product BY SLUG
     *
     * @param string $product_slug
     * @return object
     */
    function get_product_by_slug($product_slug)
    {
        $this->db->where("slug", $product_slug);
        return $this->db->get('products');
    }

    /**
     * THIS FUNCTION RETURNS ALL THE product TYPES CREATED IN THIS SYSTEM
     *
     * @return void
     */
    public function get_product_types()
    {
        return $this->db->get('product_types');
    }

    /**
     * THIS FUNCTION RETURNS THE productS LIST BY product TYPE
     *
     * @param string $type
     * @return void
     */
    public function get_product_by_type($type)
    {
        return $this->db->get_where('products', ['type' => $type]);
    }

    /**
     * THIS FUNCTION RETURNS ALL THE PRODUCT FILES FOR A PRODUCT
     *
     * @param int $product_id
     * @return void
     */
    public function product_files($product_id)
    {
        return $this->db->get_where('product_files', ['product_id' => $product_id]);
    }

    /**
     * THIS FUNCTION ADDED PRODUCT FILE TO DATABASE
     *
     * @param int $product_id
     * @return object
     */
    public function add_product_file()
    {
        $product_id = $this->security->xss_clean($this->input->post('product_id'));
        $product_details = $this->get_product_by_id($product_id)->row_array();

        $data['product_file_title'] = $this->security->xss_clean($this->input->post('product_file_title'));
        $data['product_id'] = $product_id;
        $data['product_file_added'] = strtotime(date('D, d-M-Y'));
        if ($_FILES['product_file']['name'] != "") {
            $temp = explode(".", $_FILES["product_file"]["name"]);
            $newfilename = random(30) . '.' . end($temp);
            move_uploaded_file($_FILES["product_file"]["tmp_name"], "uploads/resources/" . $product_details['directory'] . "/" . $newfilename);
            $data['product_file'] = $newfilename;
        }

        $this->db->insert('product_files', $data);
        return $product_details;
    }

    /**
     * THIS FUNCTION DELETE PRODUCT FILE 
     *
     * @param int $product_file_id
     * @return object
     */
    public function delete_product_file($product_file_id)
    {
        $product_file_details = $this->db->get_where('product_files', ['product_file_id' => $product_file_id])->row_array();
        $product_details = $this->get_product_by_id($product_file_details['product_id'])->row_array();

        // REMOVING FILE FROM SERVER
        if (file_exists('uploads/resources/' . $product_details['directory'] . '/' . $product_file_details['product_file'])) {
            unlink('uploads/resources/' . $product_details['directory'] . '/' . $product_file_details['product_file']);
        }

        // DELETING PRODUCT FILE FROM DATABASE
        $this->db->where('product_file_id', $product_file_id);
        $this->db->delete('product_files');

        // REMOVING PRODUCT FILE FROM PRICING PACKAGE
        $this->db->where('pricing_package_product_files', $product_file_details['product_file']);
        $this->db->update('pricing_packages', ['pricing_package_product_files' => '']);

        return $product_details;
    }
}