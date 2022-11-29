<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('pdf');
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // Set the timezone
        date_default_timezone_set(get_settings('timezone'));
        
        // ENABLING CACHING
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    public function index()
    {
        $data['page_title'] = 'Creativeitem - We provide smart solutions for your business.';
        $data['page_name'] = 'pages/home';
        $data['meta_description'] = 'Creativeitem provides smart solutions for your business, offering software development services since 2011. Meet the team of top software engineers, designers, developers, and analysts to create complex IT products.';
        $data['meta_keyword'] = 'creativeitem, best software company, smart solutions,';
        $data['robots'] = 'index, follow';
        
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$index = $this->cache->file->get('index')) {
			$index = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('index', $index, 604800);
		}
		echo $index;
        */
    }

   

    public function about()
    {
        $data['page_title'] = 'Creativeitem - about';
        $data['page_name'] = 'pages/about';
        $data['meta_description'] = 'about';
        $data['meta_keyword'] = 'a, b, c, d';


        $this->load->view('index', $data);
    }

    public function blog()
    {
        if (isset($_GET['tag']) && !empty($_GET['tag'])) {
            $data['filter_blog'] = true;
            $data['page_sub_title_first_part'] = site_phrase('filtered');
            $data['page_sub_title_second_part'] = site_phrase('blogs');
            $blogs_obj = $this->blog_model->get_blog_by_tag($_GET['tag']);
            $filter_with = "tag";
        } elseif (isset($_GET['category']) && !empty($_GET['category'])) {
            $data['filter_blog'] = true;
            $data['page_sub_title_first_part'] = site_phrase('filtered');
            $data['page_sub_title_second_part'] = site_phrase('blogs');
            $blogs_obj = $this->blog_model->get_blog_by_category_slug($_GET['category']);
            $filter_with = "category";
        } elseif (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $data['filter_blog'] = true;
            $data['page_sub_title_first_part'] = site_phrase('filtered');
            $data['page_sub_title_second_part'] = site_phrase('blogs');
            $blogs_obj = $this->blog_model->get_blog_by_tag($_GET['keyword']);
            $filter_with = "keyword";
        } else {
            $data['filter_blog'] = false;
            $data['page_sub_title_first_part'] = site_phrase('latest');
            $data['page_sub_title_second_part'] = site_phrase('blog');
            $data['featured_blog'] = $this->blog_model->get_featured_blog(true)->row_array();
            $blogs_obj = $this->blog_model->get_all(true);
            $filter_with = "none";
        }
        $data['page_title'] = 'Creativeitem - Blog';
        $data['page_name'] = 'pages/blog';
        $data['meta_description'] = 'Academy lms meta description';
        $data['meta_keyword'] = 'a, b, c, d';
        $data['seo_title'] = 'seo_title_for_academy';

        $total_rows = $blogs_obj->num_rows();
        $page_size = 16;
        $config = pagintaion($total_rows, $page_size, site_url('blog'));
        $current_page = sanitize($this->input->get('page', 0));
        $data['blogs'] = $this->blog_model->paginate($page_size, $current_page, $filter_with)->result_array();
        $this->pagination->initialize($config);

        $this->load->view('index', $data);
    }

    public function blog_details($blog_slug)
    {
        $data['blog_details'] = $this->blog_model->get_blog_by_slug($blog_slug, true)->row_array();
        $data['page_name'] = 'pages/blog_details';
        $data['meta_keyword'] = $data['blog_details']['blog_tags'];
        $data['page_title'] = 'Creativeitem - '.$data['blog_details']['blog_title'];
        $data['meta_description'] = ellipsis($data['blog_details']['blog_excerpt'], 200);
        $data['most_popular_blog'] = $this->blog_model->most_popular_blog(true)->row_array();
        $data['related_blogs'] = $this->blog_model->get_related_blogs_by_category_id($data['blog_details']['blog_category_id'], $data['blog_details']['blog_id']);
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('blog/'.$blog_slug);
        $this->load->view('index', $data);
    }

    public function academy()
    {
        $data['page_title'] = 'Academy - Learning management system';
        $data['page_name'] = 'pages/academy';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$academy = $this->cache->file->get('academy')) {
			$academy = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('academy', $academy, 604800);
		}
		echo $academy;
        */
    }
    public function neoflex()
    {
        $data['page_title'] = 'Neoflex Movie Portal';
        $data['page_name'] = 'pages/neoflex';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }
    public function mastery()
    {
        $data['page_title'] = 'Mastery Subscription LMS';
        $data['page_name'] = 'pages/mastery';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }
    public function checkout()
    {
        $data['page_title'] = 'Checkout Online Grocery Store';
        $data['page_name'] = 'pages/checkout';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }
      public function ekushey()
    {
        $data['page_title'] = 'Academy - Learning management system';
        $data['page_name'] = 'pages/ekushey';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }
      public function bayanno()
    {
        $data['page_title'] = 'Academy - Learning management system';
        $data['page_name'] = 'pages/bayanno';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }
     public function atlas()
    {
        $data['page_title'] = 'Atlas Directory Listing';
        $data['page_name'] = 'pages/atlas';
        $data['meta_description'] = 'The most powerful online learning platform for all types of instructors..';
        $data['meta_keyword'] = 'academy, academy lms, best lms sotfware, ';
        $data['seo_title'] = 'seo_title_for_academy';
        $data['canonical'] = site_url('academy');
        $data['og_image'] = base_url('assets/pages/socialmedia/open-graph-img.png');
        
        $this->load->view('index', $data);

    }

    public function ekattor()
    {
        $data['page_title'] = '	Ekattor-School Management System ERP';
        $data['page_name'] = 'pages/ekattor1';
        $data['meta_description'] = 'Ekattor school erp is the best school echo system that combines teacher, student, parent and other school staffs in a single automation software';
        $data['meta_keyword'] = 'ekattor, ekattor school erp, best school management system,';
        $data['canonical'] = site_url('ekattor');
        $data['seo_title'] = 'seo_title_for_academy';
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$ekattor = $this->cache->file->get('ekattor')) {
			$ekattor = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('ekattor', $ekattor, 604800);
		}
		echo $ekattor;
        */
    }

    public function mitxen()
    {   
        redirect(site_url('learny'), 'refresh');
        
        $data['page_title'] = 'Mitxen -Learning management system';
        $data['page_name'] = 'pages/mitxen';
        $data['meta_description'] = 'Mitxen is best wordpress learning management system';
        $data['meta_keyword'] = 'mitxen, mitxen lms, best wordpress lms theme,';
        $data['seo_title'] = 'seo_title_for_academy';
        // CHECK IF THE NAVIGATION MENU IS TRANSPARENT OR NOT
        $data['is_transparent'] = false;

        $slug = "mitxen-lms";
        $data['product_details'] = $this->product_model->get_product_by_slug($slug)->row_array();
        $data['pricing_packages_yearly'] = $this->pricing_package_model->get_all_pricing_packages('slug', $slug, true, 'yearly');
        $data['pricing_packages_lifetime'] = $this->pricing_package_model->get_all_pricing_packages('slug', $slug, true, 'lifetime');
        
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$mitxen = $this->cache->file->get('mitxen')) {
			$mitxen = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('mitxen', $mitxen, 604800);
		}
		echo $mitxen;
        */
    }
    
    public function learny()
    {
        $data['page_title'] = 'Learny -Learning management system';
        $data['page_name'] = 'pages/learny';
        $data['meta_description'] = 'Learny is best wordpress learning management system';
        $data['meta_keyword'] = 'learny, learny lms, best wordpress lms theme,';
        $data['seo_title'] = 'seo_title_for_academy';
        // CHECK IF THE NAVIGATION MENU IS TRANSPARENT OR NOT
        $data['is_transparent'] = false;

        $slug = "learny-lms";
        $data['product_details'] = $this->product_model->get_product_by_slug($slug)->row_array();
        $data['pricing_packages_yearly'] = $this->pricing_package_model->get_all_pricing_packages('slug', $slug, true, 'yearly');
        $data['pricing_packages_lifetime'] = $this->pricing_package_model->get_all_pricing_packages('slug', $slug, true, 'lifetime');
        
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$mitxen = $this->cache->file->get('mitxen')) {
			$mitxen = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('mitxen', $mitxen, 604800);
		}
		echo $mitxen;
        */
    }

    /**
     * THIS FUNCTION WILL SHOW THE product LIST TO CHOOSE THE DOCUEMTATION FOR
     *
     * @return void
     */
    public function docs()
    {
        $data['page_title'] = 'Creativeitem - Documentation';
        $data['page_name'] = 'pages/doc-products';
        $data['meta_description'] = 'Academy lms meta description';
        $data['meta_keyword'] = 'a, b, c, d';
        $data['seo_title'] = 'seo_title_for_academy';
        
        $this->load->view('index', $data);
        
        /*
        // SAVING TO CACHE AND LOADING FROM CACHE
		if (!$docs = $this->cache->file->get('docs')) {
			$docs = $this->load->view('index', $data, true);

			// Save into the cache for 7 days
			$this->cache->file->save('docs', $docs, 604800);
		}
		echo $docs;
        */
    }

    /**
     * THIS FUNCTION WILL SHOW THE DOCUMENTATION DETAILS FOR AN product ARTICLE. IF NO ARTICLE IS SELECTED THEN IT WILL SHOW THE FIRST ONE
     *
     * @param string $product_slug
     * @param string $article_slug
     * @return void
     */
    public function documentation_details($product_slug = "", $article_slug = "")
	{
		$product_details = $this->product_model->get_product_by_slug($product_slug);
		if ($product_details->num_rows() == 0) {
			redirect(site_url('site/docs'), 'refresh');
		}

		$product_details = $product_details->row_array();
		$data['product_details'] = $product_details;
		if (empty($article_slug)) {
			$selected_article = $this->article_model->get_fist_article_for_an_applicaiton($product_details['id'], true);
			if ($selected_article->num_rows() == 0) {
				redirect(site_url('docs'), 'refresh');
			}
			$selected_article = $selected_article->row_array();
			
			redirect(site_url('docs/' . $product_slug . '/' . $selected_article['slug']), 'refresh');
		} else {
			$selected_article = $this->article_model->get_articles_by_slug($article_slug, $product_details['id'], true);
			if ($selected_article->num_rows() == 0) {
				redirect(site_url('docs'), 'refresh');
			}
			$selected_article = $selected_article->row_array();
			$selected_topic = $this->topic_model->get_topics_by_id($selected_article['topic_id'])->row_array();
		}
        
        
		$data['selected_article']   = $selected_article;
		$data['selected_topic']     = $selected_topic;
		$data['page_title'] 		= 	'Documentation - '.$product_details['name'];
		$data['page_name']			=	'pages/documentation';
		$data['meta_description']	=	'Academy lms meta description';
		$data['meta_keyword']		=	'docs, documentation,';
		$data['seo_title']		=	'seo_title_for_academy';
		$data['topics'] = $this->topic_model->get_topics('id', $product_details['id'], true)->result_array();

		$this->load->view('index', $data);
	}

    public function documentation_body($product_slug = "", $article_slug = "")
    {
        $product_details = $this->product_model->get_product_by_slug($product_slug)->row_array();
        $page_data['product_details'] = $product_details;

        $selected_article = $this->article_model->get_article_by_product_id($product_details['id'], $article_slug, true)->row_array();
        $page_data['selected_article'] = $selected_article;

        $this->load->view('pages/documentation-body', $page_data);
    }

    public function error_404()
    {
        $page_data['page_title'] = site_phrase('page_not_found');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'a, b, c, d';
        $page_data['seo_title'] = 'seo_title_for_academy';
        $page_data['page_name'] = 'pages/404';
        $this->load->view('index', $page_data);
    }

    /**
     * A PAGE FOR SUBSCRIPTION POLICY
     *
     * @return void
     */
    public function support_policy()
    {
        $page_data['page_title'] = site_phrase('support_policy');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'a, b, c, d';
        $page_data['seo_title'] = 'seo_title_for_academy';
        $page_data['page_name'] = 'pages/support-policy';
        $this->load->view('index', $page_data);
    }
    public function terms_and_condition()
    {
        $page_data['page_title'] = site_phrase('terms_and_condition');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'a, b, c, d';
        $page_data['seo_title'] = 'seo_title_for_academy';
        $page_data['page_name'] = 'pages/terms-and-condition';
        $this->load->view('index', $page_data);
    }

    public function privacy_policy()
    {
        $page_data['page_title'] = site_phrase('privacy_policy');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'a, b, c, d';
        $page_data['seo_title'] = 'seo_title_for_academy';
        $page_data['page_name'] = 'pages/privacy_policy';
        $this->load->view('index', $page_data);
    }
    public function license_policy()
    {
        $page_data['page_title'] = site_phrase('license_policy');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'a, b, c, d';
        $page_data['seo_title'] = 'seo_title_for_academy';
        $page_data['page_name'] = 'pages/license_policy';
        $this->load->view('index', $page_data);
    }
    
    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING ALL THE PRODUCT LIST AS ECOMMERCE VIEW
     * 
     */
     public function products()
    {
        $page_data['page_title'] = site_phrase('all_products');
        $page_data['meta_description'] = 'Academy lms meta description';
        $page_data['meta_keyword'] = 'academylms, ekattor school erp, bayanno hospital management system, Ekushey, neoflex, atlas, checkout, masterylms';
        $page_data['page_name'] = 'pages/products';

        $page_data['is_transparent'] = false;
        $this->load->view('index', $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR HANDLING BLOG POST LIKES. IT IS BEING DONE BY THE CACHE
     * @param int $blog_id
     * @param int $status if this is 1 that means the user liked it
     * @return void
     */
    public function react($blog_id, $status)
    {
        echo $this->blog_model->like_this_blog($blog_id, $status);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SUBSCRIBING TO OUR NEWSLETTER
     *
     * @return void
     */
    public function subscribe()
    {
        $email = htmlspecialchars($this->input->post('emailForSubscription'));
        $this->blog_model->subscribe($email);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR POSTING A COMMENT, IT HAS BEEN DONE WITH JQUERY AJAX
     *
     * @return void
     */
    public function post_comment()
    {
        if (isset($_POST['blogId']) && !empty($_POST['blogId']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['comment']) && !empty($_POST['comment']) && isset($_POST['gRecaptchaResponse']) && !empty($_POST['gRecaptchaResponse'])) {
            $response = $this->auth_model->validate_captcha($_POST['gRecaptchaResponse']);
            if ($response) {
                $this->blog_model->post_comment();
                $this->load->view('pages/comment-section', ['blog_id' => $_POST['blogId']]);
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR POSTING A REPLY, IT HAS BEEN DONE WITH JQUERY AJAX
     *
     * @return void
     */
    public function post_reply()
    {
        if (isset($_POST['commentId']) && !empty($_POST['commentId']) && isset($_POST['reply']) && !empty($_POST['reply']) && isset($_POST['blogId']) && !empty($_POST['blogId']) && $this->session->userdata('admin_login')) {
            $this->blog_model->post_reply();
            $this->load->view('pages/comment-section', ['blog_id' => $_POST['blogId']]);
        } else {
            echo false;
        }
    }

    /**
     * THIS FUNCTION CREATE A SIMPLE SESSION FOR KEEPING THE USER EMAIL FOR PAYMENT
     *
     * @return boolean
     */
    public function create_a_session()
    {
        $user_email = $this->security->xss_clean($this->input->post('userEmail'));
        if (!empty($user_email)) {
            $this->session->unset_userdata('checkout_user_email'); // destroying it first
            $this->session->set_userdata('checkout_user_email', $user_email);
            echo 1;
        } else {
            echo 0;
        }
    }
    
    

     /**
     * THIS FUNCTION DELETES A CACHE
     *
     * @return boolean
     */
    public function deletingCache() {
        // Deletes cache for index 
        echo $this->cache->delete('index');
    }


    public function show_ad($horizontal = "", $vertical = "", $product_slug = ""){
        if($product_slug){
            $product_id = $this->product_model->get_product_by_slug($product_slug)->row('id');
            $this->db->where('ads.product_id', $product_id);
        }

        $this->db->order_by('ads.ad_id', 'RANDOM');
        $this->db->where('ads.status', 1);
        $this->db->where('ad_dimensions.horizontal', $horizontal);
        $this->db->where('ad_dimensions.vertical', $vertical);
        $this->db->from('ads');
        $this->db->join('ad_dimensions', 'ad_dimensions.dimension_id = ads.ad_dimension_id');
        $page_data['ad'] = $this->db->get()->row_array();

        if(get_settings('ad_activity_on_frontend')):
            echo $this->load->view('ads/ad', $page_data, true);
        endif;
    }
    
    
    
    
}