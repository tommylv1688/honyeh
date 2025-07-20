<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexProduct extends CI_Controller {
    private $layoutData;
    private $urlData;

    /**
     * setting
     */
    public function __construct()
    {
    	parent::__construct();

        //設定預設中文版
        if (!isset($this->session->dataLang)) {
            $this->session->set_userdata('dataLang', 'ch');
        }
    }

	public function index()
	{
        //get db
        $this->load->model('product_details_model');
        $this->load->model('product_type_model');
        $this->load->model('config_model');

        //account data
        $data = array(
            'lang' => $this->lang->line('index'),
            'typeData' => $this->product_type_model->getAllDataByField(config_model::PROJECT_ID),
            'detailsData' => $this->product_details_model->getAllDataByProJect(config_model::PROJECT_ID),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexProduct/index', $data, true);
		$this->load->view('layout/layout', $this->layoutData);
	}

    public function productDetails()
    {
        $this->load->model('product_type_model');
        $this->load->model('product_details_model');
        $urlData = $this->uri->uri_to_assoc(3);

        //account data
        $data = array(
            'lang' => $this->lang->line('index'),
            'typeName' => $this->product_type_model->getFieldById('title', $urlData['type']),
            'detailsData' => $this->product_details_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexProduct/productDetails', $data, true);
        $this->load->view('layout/layout', $this->layoutData);
    }
}
