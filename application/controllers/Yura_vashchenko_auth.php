<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yura_vashchenko_auth extends Controller_Base
{
    public $__load_default = true;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('yura_vashchenko_crud_model');
        $this->load->helper(array('form', 'url'));
    }
    
    /*
     * Authentication Section
     */
    public function login()
    {
        $this->data['seo_title'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_description'] = $_SERVER['REQUEST_URI'];
        $this->data['seo_keywords'] = $_SERVER['REQUEST_URI'];
        $this->data['logo'] = 'Yura Test Work';
        
        $this->data['page_center'] = 'yura_vashchenko_auth/login';
        $this->__render('outside/yura_main_template');
    }

    public function login_request()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == !FALSE) {

            $result = $this->ion_auth->login($this->input->post('email',true), $this->input->post('password',true));

            if ($result) {
                echo '<script>window.location.replace("http://sandbox1.esy.es/ci3/yura_vashchenko_crud/");</script>';
            } else {
                echo '<div>Incorrect data</div>';
            }

        } else {
            echo '<div>' . validation_errors() . '</div>';
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('/yura_vashchenko_auth/login/');
        die();
    }
}