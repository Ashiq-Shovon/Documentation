<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Writer extends CI_Controller
{

    /**
     * CONSTRUCTOR
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->library('pdf');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        if (!$this->session->userdata('writer_login') == true) {
            redirect(site_url('404'), 'refresh');
        }
    }

    /**
     * INDEX FUNCTION
     *
     * @return void
     */
    public function index()
    {
        $this->documentation();
    }

    /**
     * TOPIC FUNCTION HANDLES TOPIC LIST VIEW
     *
     * @param string $product_slug
     * @return void
     */
    public function topics($product_slug = null)
    {
        if (empty($product_slug)) {
            $this->session->set_flashdata('error_message', get_phrase('you_have_choose_an_product_first'));
            redirect(site_url('writer/products'), 'refresh');
        }


        $product_details = $this->product_model->get_product_by_slug($product_slug)->row_array();
        $page_data['product_details'] = $product_details;
        $page_data['page_name'] = 'topics';
        $page_data['page_title'] = get_phrase('topics_and_aricles');
        $page_data['topics'] = $this->topic_model->get_topics('slug', $product_slug);
        $this->load->view('backend/index', $page_data);
    }

    /**
     * CRUD OPERATION OF TOPIC IS DONE HERE
     *
     * @param string $action
     * @param string $topic_id
     * @return void
     */
    public function topic_action($action = '', $topic_id = '')
    {
        if ($action == 'add') {
            $topic_id = $this->topic_model->add_topic();
            $product_details = $this->topic_model->product_details_by_topic_id($topic_id);
            $this->session->set_flashdata('flash_message', get_phrase('topic_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->topic_model->edit_topic($topic_id);
            $product_details = $this->topic_model->product_details_by_topic_id($topic_id);
            $this->session->set_flashdata('flash_message', get_phrase('topic_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $product_details = $this->topic_model->product_details_by_topic_id($topic_id);
            $this->topic_model->delete_topic($topic_id);
            $this->session->set_flashdata('flash_message', get_phrase('topic_has_been_deleted_successfully'));
        }

        redirect(site_url('writer/topics/' . $product_details['slug']), 'refresh');
    }

    /**
     * ARTICLE FUNCTION HANDLES ALL THE OPERATION OF AN ARTICLE
     *
     * @param string $action
     * @param string $article_id
     * @return void
     */
    public function article($action = '', $article_id = '')
    {
        if ($action == 'add') {
            $article_id = $this->article_model->add_article();
            $product_details = $this->article_model->product_details_by_article_id($article_id);
            $this->session->set_flashdata('flash_message', get_phrase('article_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->article_model->edit_article($article_id);
            $product_details = $this->article_model->product_details_by_article_id($article_id);
            $this->session->set_flashdata('flash_message', get_phrase('article_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $product_details = $this->article_model->product_details_by_article_id($article_id);
            $this->article_model->delete_article($article_id);
            $this->session->set_flashdata('flash_message', get_phrase('article_has_been_deleted_successfully'));
        }

        redirect(site_url('writer/topics/' . $product_details['slug']), 'refresh');
    }

    /**
     * THIS FUNCION IS RESPONSIBLE FOR SHOWING THE PRODUCT LIST
     *
     * @return void
     */
    public function documentation()
    {
        $page_data['page_name'] = 'documentation';
        $page_data['page_title'] = get_phrase('product_list');
        $page_data['products'] = $this->product_model->get_products()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * SHOW THE DOCUMENTATION BY THIS FUNCTION
     *
     * @param string $article_slug_with_id
     * @return void
     */
    public function documentation_details($article_slug_with_id = "")
    {
        $article_id = get_article_id($article_slug_with_id);
        $page_data['page_name'] = 'documentation_details';
        $page_data['page_title'] = get_phrase('documentation_details');
        $page_data['article_details'] = $this->article_model->get_articles_by_id($article_id)->row_array();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * STORING DOCUMENTATIONS BY THIS FUNCTION
     *
     * @return void
     */
    public function update_documentation()
    {
        $response = $this->documentation_model->update_documentation();
        $this->session->set_flashdata('flash_message', get_phrase('documentation_has_been_updated_successfully'));
        redirect(site_url('writer/documentation_details/' . $response['slug'] . '-' . $response['id']), 'refresh');
    }

    /**
     * SORT ARTICLES SILENTLY
     *
     * @return void
     */
    public function ajax_sort_article()
    {
        $article_json = $this->input->post('itemJSON');
        $this->article_model->sort_articles($article_json);
    }

    /**
     * SORT THE TOPICS SILENTLY
     *
     * @return void
     */
    public function ajax_sort_topic()
    {
        $topic_json = $this->input->post('itemJSON');
        $this->topic_model->sort_topics($topic_json);
    }


    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING AND ALL THE OPERATION FOR BLOG CATEGORY
     *
     * @param string $action
     * @param string $blog_category_id
     * @return void
     */
    public function blog_categories($action = '', $blog_category_id = '')
    {
        if ($action == 'add') {
            $blog_category_id = $this->blog_model->add_blog_category();
            $this->session->set_flashdata('flash_message', get_phrase('blog_category_has_been_added_successfully'));
            redirect(site_url('writer/blog_categories/'), 'refresh');
        } elseif ($action == 'edit') {
            $this->blog_model->edit_blog_category($blog_category_id);
            $this->session->set_flashdata('flash_message', get_phrase('blog_category_has_been_updated_successfully'));
            redirect(site_url('writer/blog_categories/'), 'refresh');
        } elseif ($action == 'delete') {
            $this->blog_model->delete_blog_category($blog_category_id);
            $this->session->set_flashdata('flash_message', get_phrase('blog_category_has_been_deleted_successfully'));
            redirect(site_url('writer/blog_categories/'), 'refresh');
        }

        $page_data['page_name'] = 'blog_categories';
        $page_data['page_title'] = get_phrase('blog_categories');
        $page_data['blog_categories'] = $this->blog_model->get_all_categories()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING THE BLOG LIST PAGE
     *
     * @return void
     */
    public function blogs()
    {
        $page_data['selected_category'] = (isset($_GET['selected_category_id']) && !empty($_GET['selected_category_id'])) ? htmlspecialchars($_GET['selected_category_id']) : "all";

        $page_data['page_name']         = 'blogs';
        $page_data['page_title']        = get_phrase('blogs');
        $page_data['blogs']             = $page_data['selected_category'] == "all" ? $this->blog_model->get_all()->result_array() : $this->blog_model->get_blog_by_category_id($page_data['selected_category'])->result_array();
        $page_data['blog_categories']   = $this->blog_model->get_all_categories()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * THIS FUNCTION DOES BLOG ACTION
     *
     * @param string $action
     * @return void
     */
    public function blog_action($action = "", $blog_id = "")
    {
        if ($action == "delete") {
            $this->db->blog_model->delete_blog($blog_id);
            $this->session->set_flashdata('flash_message', get_phrase('blog_has_been_deleted'));
            redirect(site_url('writer/blogs/'), 'refresh');
        } else {
            $blog_id = $this->blog_model->store_blog();
            $this->session->set_flashdata('flash_message', get_phrase('blog_has_been_stored'));
            redirect(site_url('writer/blog_form/' . $blog_id), 'refresh');
        }
    }

    /**
     * THIS FUNCTION RETURN BLOG FORM
     *
     * @param int $blog_id
     * @return void
     */
    public function blog_form($blog_id = 0)
    {
        $page_data['blog_id']           = $blog_id;
        $page_data['blog_categories']   = $this->blog_model->get_all_categories()->result_array();
        $page_data['page_name']         = 'blog_form';
        $page_data['page_title']        = get_phrase('blog_form');
        $this->load->view('backend/index', $page_data);
    }

    /**
     * THIS FUNCTION RETURNS MANAGE PROFILE FORM
     *
     * @param string $param1
     * @param string $param2
     * @param string $param3
     * @return void
     */
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'update_profile_info') {
            $this->user_model->update_user_profile($param2);
            redirect(site_url('writer/manage_profile'), 'refresh');
        }

        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        $this->load->view('backend/index', $page_data);
    }
    
    
    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING ALL THE ARTICLE
     *
     * @return void
     */
    public function select_article_to_export($product_slug = ""){
        $product_details = $this->product_model->get_product_by_slug($product_slug);
		if ($product_details->num_rows() > 0) {
		    
		    //Get topics
			$this->db->where('product_id', $product_details->row('id'));
			$this->db->where('visibility', 1);
            $this->db->order_by('order', 'asc');
            $page_data['all_topics'] = $this->db->get('topics');
            
            $this->load->view('backend/writer/select_article_to_export.php', $page_data);
		}else{
		    return false;
		}
        
    }
    
    /**
    * Download Documentation file as pdf
    **/
   public function export_documentation(){
        $selected_topic_ids = $this->input->post('selected_topic_id');
        
        $this->db->where_in('id', $selected_topic_ids);
        $this->db->where('visibility', 1);
        $this->db->order_by('order', 'asc');
        $page_data['topics'] = $this->db->get('topics')->result_array();
        $page_data['product'] = $this->db->get_where('products', array('id' => $page_data['topics']['product_id']))->row_array();
        

        
        $html = $this->load->view('backend/writer/documentationPdfView.php', $page_data, true);
        
        $this->pdf->loadHtml($html);
		$this->pdf->render();
		$this->pdf->stream("Documentation.pdf", array("Attachment"=>1));
		$this->pdf->set_paper('A4','landscape'); //Changed A4 to A3
		redirect(site_url('writer/documentation'), 'refresh');
    }
}