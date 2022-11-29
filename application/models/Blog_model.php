<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * THIS FUNCTION RETURN ALL BLOGS
     *
     * @return void
     */
    public function get_all($only_published = false)
    {
        if ($only_published) {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_visibility', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        } else {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        }
    }

    /**
     * THIS FUNCTION RETURN ALL BLOGS
     *
     * @return void
     */
    public function latest_blogs($limit = 3)
    {
        return $this->db->select('*')
            ->from('blogs as blogs')
            ->where('blogs.blog_visibility', 1)
            ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
            ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
            ->order_by('blogs.blog_date_added', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * THIS FUNCTION RETURNS ALL THE BLOGS BASED ON THEIR CATEGORY ID
     *
     * @param int $category_id
     * @return object
     */
    public function get_blog_by_category_id($category_id, $only_published = false)
    {
        if ($only_published) {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_visibility', 1)
                ->where('blogs.blog_category_id', $category_id)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        } else {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_category_id', $category_id)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING ALL THE BLOG USING THE CATEGORY SLUG
     *
     * @param string $category_slug
     * @return object
     */
    public function get_blog_by_category_slug($category_slug)
    {
        $category_details = $this->db->get_where('blog_categories', ['blog_category_slug' => $category_slug])->row_array();
        return $this->db->get_where('blogs', ['blog_category_id' => $category_details['blog_category_id'], 'blog_visibility' => 1]);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING ALL THE RELATED BLOG USING THE CATEGORY ID
     *
     * @param string $category_id
     * @return object
     */
    public function get_related_blogs_by_category_id($category_id = "", $current_blog_id = "")
    {
        $this->db->where('blog_category_id', $category_id);
        $this->db->where('blog_visibility', 1);
        $this->db->where('blog_id !=', $current_blog_id);
        return $this->db->get('blogs');
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING ALL THE BLOG USING THE KEYWORD OR TAGS
     *
     * @param string $tag
     * @return object
     */
    public function get_blog_by_tag($tag)
    {
        $this->db->like('blog_tags', $tag);
        return $this->db->get_where('blogs', ['blog_visibility' => 1]);
    }

    /**
     * COMMON PAGINATION FUNCTION FOR ALL
     */
    public function paginate($per_page, $page_number, $filter_with)
    {
        $offset = $page_number > 0 ? ($page_number - 1) * $per_page : 0;

        if ($filter_with == "tag" || $filter_with == "keyword") {
            $tag = isset($_GET['tag']) ? htmlspecialchars($_GET['tag']) : htmlspecialchars($_GET['keyword']);
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->limit($per_page, $offset)
                ->like('blog_tags', $tag)
                ->where('blogs.blog_visibility', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->order_by('blogs.blog_date_added', 'desc')
                ->get();
        } elseif ($filter_with == "category") {
            $category_slug = $_GET['category'];
            $category_details = $this->db->get_where('blog_categories', ['blog_category_slug' => $category_slug])->row_array();
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->limit($per_page, $offset)
                ->where('blogs.blog_category_id', $category_details['blog_category_id'])
                ->where('blogs.blog_visibility', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->order_by('blogs.blog_date_added', 'desc')
                ->get();
        } else {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->limit($per_page, $offset)
                ->where('blogs.blog_visibility', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->order_by('blogs.blog_date_added', 'desc')
                ->get();
        }
    }

    /**
     * THIS FUNCTION RETURN A SINGLE BLOG BASED ON THE SLUG
     *
     * @param slug $slug
     * @return void
     */
    public function get_blog_by_slug($slug, $only_published = false)
    {
        if ($only_published) {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_visibility', 1)
                ->where('blogs.blog_slug', $slug)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        } else {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_slug', $slug)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        }
    }


    /**
     * THIS FUNCTION RETURN A BLOG
     *
     * @return void
     */
    public function get_blog_by_id($blog_id, $only_published = false)
    {
        return $only_published ? $this->db->get_where('blogs', ['blog_id' => $blog_id, 'blog_visibility' => 1]) : $this->db->get_where('blogs', ['blog_id' => $blog_id]);
    }

    /**
     * THIS FUNCTION RETURNS ALL THE BLOG CATEGORIES
     *
     * @return void
     */
    public function get_all_categories()
    {
        return $this->db->get('blog_categories');
    }

    /**
     * THIS FUNCTION RETURN A SINGLE BLOG CATEGORY
     *
     * @param int $id
     * @return void
     */
    public function get_blog_category_by_id($id)
    {
        return $this->db->get_where('blog_categories', ['blog_category_id' => $id]);
    }

    /**
     * ADDING A BLOG CATEGORY
     *
     * @return void
     */
    public function add_blog_category()
    {
        $data['blog_category_name'] = htmlspecialchars($this->input->post('name'));
        $data['blog_category_slug'] = slugify(htmlspecialchars($this->input->post('name')));
        $this->db->insert('blog_categories', $data);
    }

    /**
     * EDITING A BLOG CATEGORY
     *
     * @param int $id
     * @return void
     */
    public function edit_blog_category($id)
    {
        $data['blog_category_name'] = htmlspecialchars($this->input->post('name'));
        $data['blog_category_slug'] = slugify(htmlspecialchars($this->input->post('name')));
        $this->db->where('blog_category_id', $id);
        $this->db->update('blog_categories', $data);
    }

    /**
     * DELETING A BLOG CATEGORY
     *
     * @param int $id
     * @return void
     */
    public function delete_blog_category($id)
    {
        $this->db->where('blog_category_id', $id);
        $this->db->delete('blog_categories');
    }


    /**
     * THIS FUNCTION STORES BLOGS
     *
     * @return void
     */
    public function store_blog()
    {
        $tags = $this->input->post('tags');
        if(!empty($tags) && isset($tags)) {
            $tags = str_replace(',', ', ', $tags);
        }else {
            $tags = "creativeitem, smart-solution";
        }
        $data['blog_title'] = htmlspecialchars($this->input->post('title'));
        $data['blog_slug'] = slugify(htmlspecialchars($this->input->post('title')));
        $data['blog_category_id'] = htmlspecialchars($this->input->post('blog_category_id'));
        $data['blog_tags'] = htmlspecialchars($tags);
        $data['blog_excerpt'] = htmlspecialchars($this->input->post('excerpt'));
        $data['blog_details'] = reformat_image_path($this->input->post('blog'), true);
        $data['blog_date_added'] = strtotime(date('D, d-M-Y'));
        $data['blog_blogger_id'] = $this->session->userdata('user_id');
        if ($this->input->post('visibility')) {
            $data['blog_visibility'] = 1;
        } else {
            $data['blog_visibility'] = 0;
        }

        if ($this->input->post('is_featured')) {
            $this->db->update('blogs', ['blog_is_featured' => 0]);
            $data['blog_is_featured'] = 1;
        } else {
            $data['blog_is_featured'] = 0;
        }

        if ($this->input->post('ability_to_comment')) {
            $this->db->update('blogs', ['ability_to_comment' => 0]);
            $data['ability_to_comment'] = 1;
        } else {
            $data['ability_to_comment'] = 0;
        }

        // category thumbnail adding
        if (!file_exists('uploads/thumbnails/blog_thumbnails')) {
            mkdir('uploads/thumbnails/blog_thumbnails', 0777, true);
        }
        if ($_FILES['blog_thumbnail']['name'] != "") {
            $data['blog_thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
            move_uploaded_file($_FILES['blog_thumbnail']['tmp_name'], 'uploads/thumbnails/blog_thumbnails/' . $data['blog_thumbnail']);
        }

        if (isset($_POST['blog_id']) && !empty($_POST['blog_id'])) {
            $this->db->where('blog_id', $_POST['blog_id']);
            $this->db->update('blogs', $data);
            return $_POST['blog_id'];
        } else {
            $this->db->insert('blogs', $data);
            return $this->db->insert_id();
        }
    }

    /**
     * DELETING A BLOG
     *
     * @param int $id
     * @return void
     */
    public function delete_blog($id)
    {
        $this->db->where('blog_category_id', $id);
        $this->db->delete('blogs');
    }

    /**
     * THIS FUNCTION RETURNS FEATURED BLOG
     *
     * @param boolean $only_published
     * @return void
     */
    public function get_featured_blog($only_published = false)
    {
        if ($only_published) {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_visibility', 1)
                ->where('blogs.blog_is_featured', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        } else {
            return $this->db->select('*')
                ->from('blogs as blogs')
                ->where('blogs.blog_is_featured', 1)
                ->join('users as users', 'blogs.blog_blogger_id = users.id', 'LEFT')
                ->join('blog_categories as blog_categories', 'blogs.blog_category_id = blog_categories.blog_category_id', 'LEFT')
                ->get();
        }
    }

    /**
     * THIS FUNCTION RETURNS AN ARRAY WITH BLOG CATEGORY AND NUMBER OF BLOGS
     *
     * @return array
     */
    public function get_category_wise_blog_number()
    {
        $blog_categories = $this->db->get('blog_categories')->result_array();
        $response = array();
        foreach ($blog_categories as $key => $blog_category) {
            $response[$key]['blog_category'] = $blog_category['blog_category_name'];
            $response[$key]['blog_category_slug'] = $blog_category['blog_category_slug'];
            $response[$key]['number_of_blogs'] = $this->get_blog_by_category_id($blog_category['blog_category_id'], true)->num_rows();
        }
        return $response;
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR ADDING A REACT TO THE BLOG
     *
     * @param int $blog_id
     * @param int $status
     * @return int
     */
    public function like_this_blog($blog_id, $status)
    {
        $blog_details = $this->db->get_where('blogs', ['blog_id' => $blog_id])->row_array();
        $new_number_of_reacts = $status ? $blog_details['blog_likes'] + 1 : $blog_details['blog_likes'] - 1;
        $new_number_of_reacts = $new_number_of_reacts >= 0 ? $new_number_of_reacts : 0;
        $this->db->where('blog_id', $blog_id);
        $this->db->update('blogs', ['blog_likes' => $new_number_of_reacts]);
        return $new_number_of_reacts;
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SUBSCRIBING
     *
     * @param string $email
     * @return void
     */
    public function subscribe($email)
    {
        if ($this->db->get_where('subscriptions', ['email' => $email])->num_rows() == 0) {
            $this->db->insert('subscriptions', ['email' => $email]);
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR RETURNING THE MOST POPULAR BLOG
     *
     * @return object
     */
    public function most_popular_blog($only_published = false)
    {
        if ($only_published) {
            $this->db->where('blog_visibility', 1);
        }
        $this->db->order_by('blog_likes', 'desc');
        return $this->db->get('blogs');
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR RETREIVING ALL THE COMMENTS FOR A BLOG
     *
     * @param int $blog_id
     * @return void
     */
    public function get_comments($blog_id)
    {
        $this->db->order_by('date_added', 'desc');
        return $this->db->get_where('comments', ['reply_of_comment_id' => 0, 'blog_id' => $blog_id, 'is_published' => 1]);
    }

    /**
     * GET COMMENTER IMAGE
     *
     * @param string $email
     * @return void
     */
    public function get_commenters_image($email)
    {
        $commenter_details = $this->db->get_where('users', ['email' => $email]);
        if ($commenter_details->num_rows() > 0) {
            $commenter_details = $commenter_details->row_array();
            return $this->user_model->get_user_image_url($commenter_details['id']);
        }

        return base_url() . 'uploads/thumbnails/users/placeholder.png';
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR RETURNING ALL THE REPLIES OF A BLOG
     *
     * @param int $blog_id
     * @return void
     */
    public function get_replies($blog_id)
    {
        $this->db->order_by('date_added', 'desc');
        return $this->db->get_where('comments', ['reply_of_comment_id' => $blog_id]);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR POSTING A COMMENT
     *
     * @return void
     */
    public function post_comment()
    {
        $data['blog_id'] = htmlspecialchars($_POST['blogId']);
        $data['commenter_name'] = htmlspecialchars($_POST['name']);
        $data['commenter_email'] = htmlspecialchars($_POST['email']);
        $data['comment'] = htmlspecialchars($_POST['comment']);
        $data['date_added'] = strtotime(date('D, d-M-Y h:i A'));

        $this->db->insert('comments', $data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR POSTING A REPLY
     *
     * @return void
     */
    public function post_reply()
    {
        $data['blog_id'] = htmlspecialchars($_POST['blogId']);
        $data['commenter_name'] = htmlspecialchars($this->session->userdata('name'));
        $data['commenter_email'] = htmlspecialchars($this->session->userdata('email'));
        $data['comment'] = htmlspecialchars($_POST['reply']);
        $data['reply_of_comment_id'] = htmlspecialchars($_POST['commentId']);
        $data['date_added'] = strtotime(date('D, d-M-Y h:i A'));

        $this->db->insert('comments', $data);
    }
}
