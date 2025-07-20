<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    private $language;
    private $layoutData;
    private $urlData;

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

        $this->load->model('product_project_model');
        $this->load->model('product_type_model');
        $this->load->model('product_details_model');

        //判斷active
        $this->urlData = $this->uri->uri_to_assoc(3);

        if (isset($this->urlData['project'])) {
            $active = $this->urlData['project'];
        } else {
            $active = 'product';
        }

        //設定layout data
        $this->layoutData = array(
            'left_active' => $active,
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
     * 產品類型類表
     */
    public function productTypeList()
    {
        if ($this->session->systemLevel) {
            $actionIsOpen = true;
        } else {
            $actionIsOpen = false;
        }

        //data
        $data = array(
            'lang' => $this->lang->line('product_type_list'),
            'data' => $this->product_type_model->getAllDataByField($this->urlData['project']),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'actionIsOpen' => $actionIsOpen,
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_type_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 列表
     */
    public function productDetailsList()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_details_list'),
            'data' => $this->product_details_model->getAllDataByField($this->urlData['project'], $this->urlData['type']),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productDetailsAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_details_add'),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productDetailsAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            $title = $this->input->post('title');
            $s_title = $this->input->post('s_title');
            $img_url = json_encode($this->input->post('img_url'));
            $content_details = $this->input->post('content_details');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');

            if ($this->product_details_model->createUser($title, $s_title, $content_details, $img_url, $getProject, $getType)) {
                redirect('product/productDetailsList/project/'.$getProject.'/type/'.$getType);
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 編輯
     */
    public function productDetailsEdit()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_details_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'userData' => $this->product_details_model->selectById($this->urlData['id']),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function productDetailsEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('getId');
            $title = $this->input->post('title');
            $img_url = json_encode($this->input->post('img_url'));
            $content_details = $this->input->post('content_details');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');
            $s_title = $this->input->post('s_title');

            if ($this->product_details_model->updateFieldById($id, $title, $s_title, $content_details, $img_url, $getProject, $getType)) {
                redirect('product/productDetailsList/project/'.$getProject.'/type/'.$getType);
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * delete
     */
    public function productDetailsDelete()
    {
        $id = $this->input->post('id');

        if ($this->product_details_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * order
     */
    public function productDetailsOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->product_details_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }
}
