<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yura_vashchenko_crud extends Controller_Base
{
    public $__load_default = true;

    public function __construct()
    {
        parent::__construct();

        // Check if user has access
        if (!$this->ion_auth->logged_in()) {
            redirect('/yura_vashchenko_auth/login');
        }

        // Loading libraries, models, helpers
        $this->load->library('form_validation');
        $this->load->model('yura_vashchenko_crud_model');
        $this->load->helper(array('form', 'url'));
    }

    /*
     *  Displays the main page
    */
    public function index()
    {
        // Get users quantity
        $this->data['users_count'] = $this->db->count_all('yurii_users');

        // SEO info
        $this->data['seo_title'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_description'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_keywords'] = $_SERVER['REQUEST_URI'];
        $this->data['logo'] = 'Yura Test Work';

        $this->data['page_center'] = 'yura_vashchenko_crud/index';
        $this->__render('outside/yura_main_template');
    }

    /*
     *  Get the section with users info
    */
    public function data()
    {
        $data['users'] = $this->yura_vashchenko_crud_model->getUsers();
        $this->load->view('outside/pages/yura_vashchenko_crud/data', $data);
    }

    /*
     *  Displays the Add User form
    */
    public function add()
    {
        $this->data['groups'] = $this->yura_vashchenko_crud_model->getGroups();

        // SEO info
        $this->data['seo_title'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_description'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_keywords'] = $_SERVER['REQUEST_URI'];
        $this->data['logo'] = 'Yura Test Work';

        $this->data['page_center'] = 'yura_vashchenko_crud/add';
        $this->__render('outside/yura_main_template');
    }

    /*
     *  Displays the Edit User form
    */
    public function edit($id)
    {
        if (!$this->data['user_info'] = $this->yura_vashchenko_crud_model->getUserInfo($id)) {
            redirect('/yura_vashchenko_crud/');
            die();
        }

        $this->data['groups'] = $this->yura_vashchenko_crud_model->getGroups();
        $this->data['groups_array'] = explode(',', $this->data['user_info']['groups']);

        // SEO info
        $this->data['seo_title'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_description'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_keywords'] = $_SERVER['REQUEST_URI'];
        $this->data['logo'] = 'Yura Test Work';

        $this->data['page_center'] = 'yura_vashchenko_crud/edit';
        $this->__render('outside/yura_main_template');
    }

    /*
     *  Validation of information and add user
    */
    public function add_request()
    {
        $this->form_validation->set_rules('first_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[yurii_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            echo '<span class="fail">' . validation_errors() . '</span>';
        } else {

            if($data['users'] = $this->yura_vashchenko_crud_model->addUser()) {
                echo '<span class="success">User was added</span>';
            } else {
                echo '<span class="fail">Failed</span>';
            }

        }
    }

    /*
     *  Validation of information and edit user info
    */
    public function edit_request($id)
    {
        $this->form_validation->set_rules('first_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            echo '<span class="fail">' . validation_errors() . '</span>';
        } else {
            $data['users'] = $this->yura_vashchenko_crud_model->updateUser($id);
            echo '<span class="success">User was updated</span>';
        }

    }

    /*
     *  Delete users and relationships with groups
    */
    public function delete_request()
    {
        if($this->yura_vashchenko_crud_model->deleteUser() !== false) {
            echo "<span class='success'>Deleted</span>";
        }
    }
}
