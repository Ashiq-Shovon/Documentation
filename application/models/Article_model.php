<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * ADDING AN ARTICLE
     *
     * @return int
     */
    function add_article()
    {
        $data['article'] = $this->input->post('article');
        $data['slug'] = slugify($this->input->post('article'));
        $data['topic_id'] = $this->input->post('topic_id');

        $topic_details = $this->topic_model->get_topics_by_id($data['topic_id'])->row_array();
        $data['product_id'] = $topic_details['product_id'];

        if ($this->input->post('visibility')) {
            $data['visibility'] = $this->input->post('visibility');
        } else {
            $data['visibility'] = 0;
        }
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }

    /**
     * UPDATING AN EXISTING ARTICLE
     *
     * @param int $article_id
     * @return void
     */
    function edit_article($article_id)
    {
        $article_details = $this->get_articles_by_id($article_id)->row_array();
        $this->db->where('id', $article_details['topic_id']);

        if ($this->input->post('visibility')) {
            $data['visibility'] = $this->input->post('visibility');
        } else {
            $data['visibility'] = 0;
        }

        $data['topic_id'] = $this->input->post('topic_id');

        $topic_details = $this->topic_model->get_topics_by_id($data['topic_id'])->row_array();
        $data['product_id'] = $topic_details['product_id'];
        $data['article'] = $this->input->post('article');
        $data['slug'] = slugify($this->input->post('article'));

        $this->db->where('id', $article_id);
        $this->db->update('articles', $data);
    }

    /**
     * DELETING AN EXISTING ARTICLE
     *
     * @param int $article_id
     * @return void
     */
    function delete_article($article_id)
    {
        $this->db->where('id', $article_id);
        $this->db->delete('articles');
    }



    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SORTING THE EXISTING ARTICLES
     *
     * @param string $article_json
     * @return void
     */
    public function sort_articles($article_json)
    {
        $articles = json_decode($article_json);
        foreach ($articles as $key => $value) {
            $updater = array(
                'order' => $key + 1
            );
            $this->db->where('id', $value);
            $this->db->update('articles', $updater);
        }
    }


    /**
     * THIS FUNCTION RETURNS product DETAILS OF WHICH product IT BELONGS TO
     *
     * @param int $article_id
     * @return array
     */
    function product_details_by_article_id($article_id)
    {
        $article_details = $this->get_articles_by_id($article_id)->row_array();
        $topic_details = $this->topic_model->get_topics_by_id($article_details['topic_id'])->row_array();
        $product_details = $this->product_model->get_product_by_id($topic_details['product_id'])->row_array();
        return $product_details;
    }


    /**
     * FRONTEND QUERY : THIS FUNCTION IS FOR GETTING THE FIRST ARTICLE
     *
     * @param string $product_id
     * @return void
     */
    public function get_fist_article_for_an_applicaiton($product_id = "", $only_public = false)
    {
        $first_topic = $this->topic_model->get_topics('id', $product_id)->row_array();

        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('topic_id', $first_topic['id']);
        $this->db->order_by("order", "asc");
        return $this->db->get('articles');
    }

    /**
     * GET ARTICLES BY TOPIC ID ONLY
     *
     * @param int $topic_id
     * @return object
     */
    function get_articles($topic_id, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('topic_id', $topic_id);
        $this->db->order_by("order", "asc");
        return $this->db->get('articles');
    }


    /**
     * GETTING AN ARTICLE BY ID
     *
     * @param int $article_id
     * @return object
     */
    function get_articles_by_id($article_id, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('id', $article_id);
        return $this->db->get('articles');
    }



    /**
     * GETTING AN ARTICLE BY ITS OWN SLUG
     *
     * @param int $article_slug
     * @return object
     */
    function get_articles_by_slug($article_slug, $product_id, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('product_id', $product_id);
        $this->db->where('slug', $article_slug);
        return $this->db->get('articles');
    }

    /**
     * THIS FUNCTION IS USED FOR GETTING A SPECIFIC ARTICLE WITH product ID AND ARTICLE ITSELF SLUG
     *
     * @param int $product_id
     * @param string $article_slug
     * @return object
     */
    public function get_article_by_product_id($product_id = "", $article_slug = "", $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }

        if (empty($article_slug)) {
            $this->db->where('product_id', $product_id);
        } else {
            $this->db->where('product_id', $product_id);
            $this->db->where('slug', $article_slug);
        }

        return $this->db->get_where('articles');
    }
}
