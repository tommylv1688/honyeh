<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_project_model extends CI_Model {

	const DB_NAME = 'product_project';

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
	public function createUser($title)
	{
		//取得最後order
		$last_id = $this->db->limit(1)->order_by('order', 'desc')->get(self::DB_NAME)->row('order');
		$data = array(
			'title'      => $title,
			'create_dt'  => date('Y-m-d H:i:s'),
			'order'      => $last_id + 1,
			'lang'       => $this->session->dataLang
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
	 * update Password By Id
	 * @return bool true on success, false on failure
	 */
	public function updateFieldById($id, $title)
	{
		$data = array(
			'title'   => $title,
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
	 * get_user function.
	 * 
	 * @return array
	 */
	public function getAllData()
	{
		return $this->db->order_by('order', 'asc')->get_where(self::DB_NAME, array('lang' => $this->session->dataLang))->result_array();
	}

	/**
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
}