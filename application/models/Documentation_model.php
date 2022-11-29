<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documentation_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }


    /**
     * GETTING ALL THE DOCUMENTATION BY ITS ARTICLE ID
     *
     * @param string $article_id
     * @return object
     */
    function get_all_documentation($article_id = '', $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('article_id', $article_id);
        return $this->db->get('documentation');
    }


    /**
     * DOCUMENTATION ARE BEING INSERTED AND UPDATED BY THIS FUNCTION
     *
     * @return void
     */
    function update_documentation()
    {
        // Edit article first
        $article_data['article'] = $this->input->post('article');
        $article_data['slug'] = slugify($this->input->post('article'));
        $this->db->where('id', $this->input->post('article_id'));
        $this->db->update('articles', $article_data);

        // Update or insert documentation against an article
        $article_details = $this->article_model->get_articles_by_id($this->input->post('article_id'))->row_array();
        $data['documentation'] = reformat_image_path($this->input->post('documentation', false));

        if ($this->input->post('visibility')) {
            $data['visibility'] = $this->input->post('visibility');
        } else {
            $data['visibility'] = 0;
        }

        if ($this->db->get_where('documentation', array('article_id' => $this->input->post('article_id')))->num_rows() > 0) {
            $this->db->where('article_id', $this->input->post('article_id'));
            $this->db->update('documentation', $data);
        } else {
            $data['article_id'] = $this->input->post('article_id');
            $this->db->insert('documentation', $data);
        }

        return $article_details;
    }
}
