<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $language;
    private $layoutData;

    /**
     * setting
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isLogin) {
            redirect('login');
        }
        $this->language = $this->session->adminLanguage;

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_admin_file_name'), $this->session->adminLanguage);
        } else {
            $this->lang->load($this->config->item('language_admin_file_name'), 'chinese');
        }

        //取出左邊項目名稱
        $this->load->model('product_project_model');

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'account',
            'layout'  => $this->lang->line('layout'),
            'project' => $this->product_project_model->getAllData(),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }

    /**
     * 更換語系
     */
    public function changeLanguage()
    {
        $this->session->set_userdata('adminLanguage', $this->input->post('lang'));
    }

	/**
	 * 帳號設定列表
	 */
	public function accountList()
	{
        $this->load->model('account_model');

        //account data
        $accountData = array(
            'account' => $this->lang->line('account_list'),
            'account_data' => $this->account_model->getAllData(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('admin/account_list', $accountData, true);
		$this->load->view('admin/layout', $this->layoutData);
	}

    /**
     * 帳號新增
     */
    public function accountAdd()
    {
        //account data
        $accountData = array(
            'account' => $this->lang->line('account_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('admin/account_add', $accountData, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號編輯
     */
    public function accountEdit()
    {
        $this->load->model('account_model');

        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //account data
        $accountData = array(
            'account' => $this->lang->line('account_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->account_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('admin/account_edit', $accountData, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function accountAddPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        
        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|is_unique[account.username]', array('is_unique' => 'This username already exists'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->account_model->createUser($username, $password)) {
                redirect('admin/accountList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 帳號編輯post
     */
    public function accountEditPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        
        // set validation rules
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('id');
            $password = $this->input->post('password');

            if ($this->account_model->updatePasswordById($id, $password)) {
                redirect('admin/accountList');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * 帳號刪除
     */
    public function accountDelete()
    {
        $this->load->model('account_model');
        $id = $this->input->post('id');

        if ($this->account_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 帳號刪除
     */
    public function accountOrder()
    {
        $this->load->model('account_model');
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->account_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }
}
