<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * TOPICS WILL BE RETREIVED EITHER FROM product SLUG OR product ID
     *
     * @param string $attribute
     * @param string $value
     * @return object
     */
    function get_topics($attribute = "", $value = "", $only_public = false)
    {
        if ($attribute == "slug") {
            $product_details = $this->product_model->get_product_by_slug($value)->row_array();
        } elseif ($attribute == "id") {
            $product_details = $this->product_model->get_product_by_id($value)->row_array();
        }

        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('product_id', $product_details['id']);
        $this->db->order_by("order", "asc");
        return $this->db->get('topics');
    }


    /**
     * GETTING TOPIC BY ID
     *
     * @param [type] $topic_id
     * @return object
     */
    function get_topics_by_id($topic_id, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('id', $topic_id);
        return $this->db->get('topics');
    }

    /**
     * GET A TOPIC BY ITS SLUG IDENTIFIER
     *
     * @param string $topic_slug
     * @return object
     */
    function get_topics_by_slug($topic_slug, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('visibility', 1);
        }
        $this->db->where('slug', $topic_slug);
        return $this->db->get('topics');
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SORTING THE TOPICS
     * @param string $topic_json
     * @return void
     */
    public function sort_topics($topic_json)
    {
        $topics = json_decode($topic_json);
        foreach ($topics as $key => $value) {
            $updater = array(
                'order' => $key + 1
            );
            $this->db->where('id', $value);
            $this->db->update('topics', $updater);
        }
    }

    /**
     * GET THE TOPIC IMAGE
     *
     * @param int $topic_id
     * @return string
     */
    function get_topic_image($topic_id)
    {
        $topic_details = $this->get_topics_by_id($topic_id)->row_array();
        if (file_exists('uploads/thumbnails/topic_thumbnails/' . $topic_details['thumbnail'])) {
            return base_url() . 'uploads/thumbnails/topic_thumbnails/' . $topic_details['thumbnail'];
        } else {
            return base_url() . 'uploads/thumbnails/topic_thumbnails/placeholder.png';
        }
    }

    /**
     * ADD A NEW TOPIC FOR DOCUMENTAION
     *
     * @return int
     */
    function add_topic()
    {
        $data['topic'] = $this->input->post('topic');
        $data['slug'] = slugify($this->input->post('topic'));
        $data['summary'] = $this->input->post('summary');
        $data['product_id'] = $this->input->post('product_id');
        if ($this->input->post('visibility')) {
            $data['visibility'] = $this->input->post('visibility');
        } else {
            $data['visibility'] = 0;
        }
        // category thumbnail adding
        if (!file_exists('uploads/thumbnails/topic_thumbnails')) {
            mkdir('uploads/thumbnails/topic_thumbnails', 0777, true);
        }
        if ($_FILES['topic_thumbnail']['name'] == "") {
            $data['thumbnail'] = 'topic-thumbnail.png';
        } else {
            $data['thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
            move_uploaded_file($_FILES['topic_thumbnail']['tmp_name'], 'uploads/thumbnails/topic_thumbnails/' . $data['thumbnail']);
        }
        $this->db->insert('topics', $data);

        return $this->db->insert_id();
    }

    /**
     * EDITING AN EXISTING TOPIC
     *
     * @param [type] $topic_id
     * @return void
     */
    function edit_topic($topic_id)
    {
        $data['topic'] = $this->input->post('topic');
        $data['slug'] = slugify($this->input->post('topic'));
        $data['summary'] = $this->input->post('summary');
        if ($this->input->post('visibility')) {
            $data['visibility'] = $this->input->post('visibility');
        } else {
            $data['visibility'] = 0;
        }
        // category thumbnail adding
        if (!file_exists('uploads/thumbnails/topic_thumbnails')) {
            mkdir('uploads/thumbnails/topic_thumbnails', 0777, true);
        }
        if ($_FILES['topic_thumbnail']['name'] != "") {
            $data['thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
            move_uploaded_file($_FILES['topic_thumbnail']['tmp_name'], 'uploads/thumbnails/topic_thumbnails/' . $data['thumbnail']);
        }
        $this->db->where('id', $topic_id);
        $this->db->update('topics', $data);
    }

    /**
     * DELETING AN EXISTING TOPIC
     *
     * @param [type] $topic_id
     * @return void
     */
    function delete_topic($topic_id)
    {
        // DELETE TOPIC FROM THE TOPIC TABLE
        $this->db->where('id', $topic_id);
        $this->db->delete('topics');

        // DELETE ARTICLES ALSO WHICH DOES HAVE THE TOPIC ID IN IT
        $this->db->where('topic_id', $topic_id);
        $this->db->delete('articles');
    }


    /**
     * THIS FUNCTION RETURNS product DETAILS OF WHICH product IT BELONGS TO
     *
     * @param int $topic_id
     * @return array
     */
    function product_details_by_topic_id($topic_id)
    {
        $topic_details = $this->get_topics_by_id($topic_id)->row_array();
        $product_details = $this->product_model->get_product_by_id($topic_details['product_id'])->row_array();
        return $product_details;
    }
}
