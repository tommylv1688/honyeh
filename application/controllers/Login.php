<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * setting
     */
    public function __construct()
    {
        parent::__construct();

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_admin_file_name'), $this->session->adminLanguage);
        } else {
            $this->lang->load($this->config->item('language_admin_file_name'), 'chinese');
        }
    }

    /**
     * 登入頁面
     */
    public function index()
    {
        if ($this->session->isLogin) {
            redirect('admin/accountList');
        }

        //layout data
        $data = array(
            'layout'  => $this->lang->line('layout'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        ); 

        $this->load->view('login/login', $data);
    }

    /**
     * 登入驗證
     */
    public function loginPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->account_model->checkUser($username, $password)) {
                //檔案上傳權限開啟
                $this->session->set_userdata('upload_image_file_manager', true);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('adminSystemId', $this->account_model->geIdByUsername($username));
                $this->session->set_userdata('isLogin', true);
                $this->session->set_userdata('systemLevel', $this->account_model->checkLevel($username));

                //設定預設中文版
                $this->session->set_userdata('dataLang', 'ch');
                redirect('admin/accountList');
            } else {
                echo "<script>alert('帳號或密碼錯誤');</script>";
                echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * 登出
     */
    public function logout()
    {
    	$this->session->unset_userdata('upload_image_file_manager');
    	$this->session->unset_userdata('username');
        $this->session->unset_userdata('isLogin');
        $this->session->unset_userdata('adminSystemId');
    	$this->session->unset_userdata('systemLevel');
    	redirect('login');
    }
}
