<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pricing_package_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }


    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING ALL THE PRICE PACKAGES AGAINST A PRODUCT
     *
     * @param string $product_attribute
     * @param string $product_value
     * @param boolean $only_public
     * @return object
     */
    public function get_all_pricing_packages($product_attribute = "", $product_value = "", $only_public = false, $package_duration = "")
    {
        if ($product_attribute == "slug") {
            $product_details = $this->product_model->get_product_by_slug($product_value)->row_array();
        } elseif ($product_attribute == "id") {
            $product_details = $this->product_model->get_product_by_id($product_value)->row_array();
        }

        if ($only_public) {
            $this->db->where('pricing_package_is_public', 1);
        }

        if (!empty($package_duration)) {
            $this->db->where('pricing_package_duration', $package_duration);
        }
        $this->db->where('pricing_package_product_id', $product_details['id']);
        return $this->db->get('pricing_packages');
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING THE PRICING PACKAGE BY ID
     *
     * @param int $id
     * @return object
     */
    public function get_pricing_package_by_id($id, $only_public = false)
    {
        if ($only_public) {
            return $this->db->get_where('pricing_packages', ['pricing_package_id' => $id, 'pricing_package_is_public' => 1]);
        }
        return $this->db->get_where('pricing_packages', ['pricing_package_id' => $id]);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING THE PRICING PACKAGE BY UNIQUE IDENTIFIER
     *
     * @param int $unique_identifier
     * @return object
     */
    public function get_pricing_package_by_identifier($unique_identifier, $only_public = false)
    {
        if ($only_public) {
            return $this->db->get_where('pricing_packages', ['pricing_package_identifier' => $unique_identifier, 'pricing_package_is_public' => 1]);
        }
        return $this->db->get_where('pricing_packages', ['pricing_package_identifier' => $unique_identifier]);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR STORING A PRICE PACKAGE
     *
     * @return void
     */
    public function add_price_package()
    {
        $data['pricing_package_name'] = $this->security->xss_clean($this->input->post('package_name'));
        $data['pricing_package_max_site'] = $this->security->xss_clean($this->input->post('maximum_number_of_site'));
        $data['pricing_package_regular_price'] = $this->security->xss_clean($this->input->post('regular_price'));
        $data['pricing_package_discounted_price'] = $this->security->xss_clean($this->input->post('discounted_price'));
        $data['pricing_package_has_discount'] = isset($_POST['has_discount']) && $_POST['has_discount'] ? 1 : 0;
        $data['pricing_package_product_id'] = $this->security->xss_clean($this->input->post('product_id'));
        $data['pricing_package_is_recommended'] = isset($_POST['is_recommended']) && $_POST['is_recommended'] ? 1 : 0;
        $data['pricing_package_is_public'] = isset($_POST['is_public']) && $_POST['is_public'] ? 1 : 0;
        $data['pricing_package_features'] = $this->security->xss_clean($this->input->post('features'));
        $data['pricing_package_is_free'] = isset($_POST['is_free']) && $_POST['is_free'] ? 1 : 0;
        $data['pricing_package_duration'] = $this->security->xss_clean($this->input->post('package_duration'));
        $data['pricing_package_color'] = $this->input->post('package_color');
        $data['pricing_package_product_files'] = $this->security->xss_clean($this->input->post('product_file'));

        $data['pricing_package_identifier'] = $this->generate_unique_identifier();

        // UPDATING ALL THE RECOMMENDED PACKAGES AS NON RECOMMENDED
        if ($data['pricing_package_is_recommended']) {
            $this->db->update('pricing_packages', ['pricing_package_is_recommended' => 0]);
        }

        $this->db->insert('pricing_packages', $data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR UPDATING A PRICE PACKAGE
     *
     * @param int $id
     * @return void
     */
    public function edit_price_package($id)
    {
        $data['pricing_package_name'] = htmlspecialchars($this->input->post('package_name'));
        $data['pricing_package_max_site'] = htmlspecialchars($this->input->post('maximum_number_of_site'));
        $data['pricing_package_regular_price'] = htmlspecialchars($this->input->post('regular_price'));
        $data['pricing_package_discounted_price'] = htmlspecialchars($this->input->post('discounted_price'));
        $data['pricing_package_has_discount'] = isset($_POST['has_discount']) && $_POST['has_discount'] ? 1 : 0;
        $data['pricing_package_product_id'] = htmlspecialchars($this->input->post('product_id'));
        $data['pricing_package_is_recommended'] = isset($_POST['is_recommended']) && $_POST['is_recommended'] ? 1 : 0;
        $data['pricing_package_is_public'] = isset($_POST['is_public']) && $_POST['is_public'] ? 1 : 0;
        $data['pricing_package_features'] = htmlspecialchars($this->input->post('features'));
        $data['pricing_package_is_free'] = isset($_POST['is_free']) && $_POST['is_free'] ? 1 : 0;
        $data['pricing_package_duration'] = htmlspecialchars($this->input->post('package_duration'));
        $data['pricing_package_color'] = $this->input->post('package_color');
        $data['pricing_package_product_files'] = $this->security->xss_clean($this->input->post('product_file'));
        // UPDATING ALL THE RECOMMENDED PACKAGES AS NON RECOMMENDED
        if ($data['pricing_package_is_recommended']) {
            $this->db->update('pricing_packages', ['pricing_package_is_recommended' => 0]);
        }

        $this->db->where('pricing_package_id', $id);
        $this->db->update('pricing_packages', $data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR DELETING A PRICE PACKAGE
     *
     * @param int $id
     * @return void
     */
    public function delete_price_package($id)
    {
        $this->db->where('pricing_package_id', $id);
        $this->db->delete('pricing_packages');
    }

    /**
     * THIS FUNCTION GENERATES A UNIQUE IDENTIFIER FOR PRICING PACKAGE
     *
     * @return string
     */
    public function generate_unique_identifier()
    {
        $unique_identifier = random(25);
        $previous_data = $this->db->get_where('pricing_packages', ['pricing_package_identifier' => $unique_identifier]);
        if ($previous_data->num_rows() > 0) {
            $this->generate_unique_identifier();
        }
        return $unique_identifier;
    }
}
