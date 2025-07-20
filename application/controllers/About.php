<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
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
        //layout data
        $this->layoutData['content'] = $this->load->view('about/index', '', true);
        $this->load->view('layout/layout', $this->layoutData);
	}
}
