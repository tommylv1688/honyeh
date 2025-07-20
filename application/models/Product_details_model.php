<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_details_model extends CI_Model {

	const DB_NAME = 'product_details';

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @return bool true on success, false on failure
	 */
	public function createUser($title, $s_title, $content_details, $img_url, $getProject, $getType)
	{
		//取得最後ordee
		$last_id = $this->db->limit(1)->order_by('order', 'desc')->get(self::DB_NAME)->row('order');
		$data = array(
			'title'           => $title,
			's_title'         => $s_title,
			'img_url'         => $img_url,
			'create_dt'  	  => date('Y-m-d H:i:s'),
			'order'           => $last_id + 1,
			'content_details' => $content_details,
			'project'    	  => $getProject,
			'type'       	  => $getType,
			'lang'            => $this->session->dataLang
		);

		return $this->db->insert(self::DB_NAME, $data);
	}

	/**
	 * update order By Id(array) order(array)
	 * @return bool true on success, false on failure
	 */
	public function updateOrderById($ids, $orders)
	{
		$check = true;
		foreach ($ids as $key => $id) {
			if (!$this->db->update(self::DB_NAME, array('order' => $orders[$key]), array('id' => $id))) {
				$check = false;
			}
		}
		return $check;
	}

	/**
	 * update
	 * @return bool true on success, false on failure
	 */
	public function updateFieldById($id, $title, $s_title, $content_details, $img_url, $getProject, $getType)
	{
		$data = array(
			'title'   => $title,
			's_title'   => $s_title,
			'content_details'   => $content_details,
			'img_url'   => $img_url,
			'project' => $getProject,
			'type' => $getType,
		);
		return $this->db->update(self::DB_NAME, $data, array('id' => $id));
	}

	/**
	 * delete By Id
	 * @return bool true on success, false on failure
	 */
	public function deleteById($id)
	{
		return $this->db->delete(self::DB_NAME, array('id' => $id));
	}

	/**
	 * 區分語言
	 * 
	 * @return array
	 */
	public function getAllData()
	{
		return $this->db->order_by('order', 'asc')->get_where(self::DB_NAME, array('lang' => $this->session->dataLang))->result_array();
	}

	/**
	 * get_user function.
	 * 
	 * @return array
	 */
	public function getAllDataByField($project, $type)
	{
		$where = array(
			'project' => $project,
			'type'    => $type,
			'lang'    => $this->session->dataLang
		);
		return $this->db->order_by('order', 'asc')->get_where(self::DB_NAME, $where)->result_array();
	}

	/**
	 * @return array
	 */
	public function getAllDataByProJect($project)
	{
		$where = array(
			'project' => $project,
			'lang'    => $this->session->dataLang
		);
		return $this->db->order_by('order', 'asc')->get_where(self::DB_NAME, $where)->result_array();
	}

	/**
	 * get_user by id.
	 * @return array
	 */
	public function selectById($id)
	{
		return $this->db->get_where(self::DB_NAME, array('id' => $id), 1)->result_array();
	}

	/**
	 * get field (string) by id
	 * @return array
	 */
	public function getFieldById($field, $id)
	{
		$result = $this->db->select($field)->get_where(self::DB_NAME, array('id' => $id), 1)->result_array();
		return $result[0][$field];
	}

	/**
	 * 取得首頁小輪播圖
	 * @return array
	 */
	public function getIndexSbanner()
	{
		return $this->db->select()->get_where(self::DB_NAME, array('index_s_banner' => 1))->result_array();
	}
}