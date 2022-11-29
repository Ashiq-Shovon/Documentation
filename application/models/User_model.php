<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }


    public function get_all_user($user_id = 0)
    {
        if ($user_id > 0) {
            return $this->db->select('*')
                ->from('users as users')
                ->where('users.id', $user_id)
                ->join('roles as roles', 'users.role_id = roles.role_id', 'LEFT')
                ->get();
        }
        return $this->db->select('*')
            ->from('users as users')
            ->join('roles as roles', 'users.role_id = roles.role_id', 'LEFT')
            ->get();
    }


    public function get_user_image_url($user_id)
    {
        $user_data = $this->get_user_by_id($user_id);
        if (file_exists('uploads/thumbnails/users/' . $user_data['thumbnail']))
            return base_url() . 'uploads/thumbnails/users/' . $user_data['thumbnail'];
        else
            return base_url() . 'uploads/thumbnails/users/placeholder.png';
    }

    /**
     * THIS FUNCTION REGISTER A CUSTOMER TO THE SYSTEM
     *
     * @param string $name
     * @param string $email
     * @return void
     */
    public function signup_user_after_successful_payment($name, $email)
    {
        if (!empty($email) && !empty($name)) {
            $send_mail = false;
            $raw_password = random(5);
            $this->db->where('email', $email);
            $user_data = $this->db->get('users');
            if ($user_data->num_rows() == 0) {
                $send_mail = true;
                $data['name'] = $name;
                $data['email'] = $email;
                $data['password'] = sha1($raw_password);
                $data['role_id'] = 2;
                $data['status'] = 1;
                $data['registration_date'] = strtotime(date('D, d-M-Y'));
                $this->db->insert('users', $data);
                $data['id'] = $this->db->insert_id();
                $user_data = $data;
            } else {
                $user_data = $user_data->row_array();
            }
            $user_data['send_mail'] = $send_mail;
            $user_data['raw_password'] = $raw_password;
            return $user_data;
        } else {
            $this->session->set_flashdata('error_message', site_phrase('bad_request'));
            redirect(site_url(), 'refresh');
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR UPDATING USER PROFILE
     *
     * @return void
     */
    public function update_user_profile($user_id = "")
    {
        $user_id = !empty($user_id) ? $user_id : $this->session->userdata('user_id');
        if (!empty($user_id)) {
            $previous_data = $this->user_model->get_user_by_id($user_id);


            $email = strtolower(htmlspecialchars($this->input->post('email')));
            $name = htmlspecialchars($this->input->post('name'));

            if (email_duplication($email, $user_id) && !empty($email) && !empty($name)) {
                $data['name'] = $name;
                $data['email'] = $email;
                $data['about'] = htmlspecialchars($this->input->post('about'));
                $data['designation'] = htmlspecialchars($this->input->post('designation'));
                $data['last_modified'] = strtotime(date('D, d-M-Y'));
                $data['role_id'] = isset($_POST['role_id']) ? $_POST['role_id'] : $previous_data['role_id'];
            } else {
                $this->session->set_flashdata('error_message', site_phrase('data_can_not_be_empty'));
                redirect(site_url(), 'refresh');
            }

            // UPLOAD THUMBNAIL
            if (!empty($_FILES['user_image']['name'])) {
                $data['thumbnail']  = $this->upload('thumbnails/users', $_FILES['user_image'], $previous_data["thumbnail"]);
            }

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);

            $this->session->set_userdata('name', $data['name']);

            return true;
        } else {
            $this->session->set_flashdata('error_message', site_phrase('you_are_not_authorized'));
            redirect(site_url(), 'refresh');
        }
    }

    function upload($thing, $new_file, $previous_file = NULL)
    {
        // REMOEV THE PREVIOUS FILE FIRST
        if (!empty($previous_file) && $previous_file != "placeholder.png") {
            if (file_exists("uploads/$thing/$previous_file")) {
                unlink("uploads/$thing/$previous_file");
            }
        }

        // UPLOAD NEW FILE
        if (!empty($new_file['tmp_name'])) {
            $file_name = random(20) . '.jpg';
            $uploaded_image = "uploads/$thing/" . $file_name;
            return move_uploaded_file($new_file['tmp_name'], $uploaded_image) ? $file_name : "placeholder.png";
        }

        return "placeholder.png";
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR UPDATING USER PASSWORD
     *
     * @return void
     */
    public function update_password()
    {
        $logged_in_user_id = $this->session->userdata('user_id');
        $previous_data = $this->get_user_by_id($logged_in_user_id);

        // DO NOT SANITIZE PASSWORDS, IT CAN CARRY SPECIAL CHARACTERS
        $current_password = sha1(required($this->input->post('current_password')));
        $new_password = sha1(required($this->input->post('new_password')));
        $confirm_password = sha1(required($this->input->post('confirm_password')));

        // CHECK PASSWORDS
        if ($previous_data['password'] == $current_password && $new_password == $confirm_password) {
            $data['password'] = $new_password;
            $this->db->where('id', $logged_in_user_id);
            $this->db->update('users', $data);
            return true;
        }
        return false;
    }

    public function add_user()
    {
        $validity = email_duplication($this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['name'] = html_escape($this->input->post('name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $data['about'] = html_escape($this->input->post('about'));
            $data['designation'] = html_escape($this->input->post('designation'));
            $data['role_id'] = html_escape($this->input->post('role_id'));

            $data['registration_date'] = strtotime(date("Y-m-d H:i:s"));
            $data['status'] = 1;

            // UPLOAD THUMBNAIL
            if (!empty($_FILES['user_image']['name'])) {
                $data['thumbnail']  = $this->upload('thumbnails/users', $_FILES['user_image']);
            }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR DELETING A USER
     *
     * @param int $user_id
     * @return void
     */
    public function delete_user($user_id)
    {
        $previous_data = $this->get_user_by_id($user_id);
        if ($previous_data['role_id'] != 1) {
            $this->db->where('id', $user_id);
            $this->db->delete('users');
            return true;
        }
        return false;
    }
}
