<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	const DB_NAME = 'account';

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
	public function createUser($username, $password)
	{
		//取得最後ordee
		$last_id = $this->db->limit(1)->order_by('order', 'desc')->get(self::DB_NAME)->row('order');
		$data = array(
			'username'   => $username,
			'password'   => base64_encode($password),
			'create_dt'  => date('Y-m-d H:i:s'),
			'order'      => $last_id + 1,
		);

		return $this->db->insert(self::DB_NAME, $data);
	}

	/**
	 * check user for login
	 *
	 * @return bool true on success, false on failure
	 */
	public function checkUser($username, $password)
	{
		$this->db->select('password');
		$this->db->from(self::DB_NAME);
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');


		return (base64_decode($hash) == $password) ? 1 : 0;
	}

	/**
	 * get level
	 *
	 * @return 1 or 0
	 */
	public function checkLevel($username)
	{
		$result = $this->db->get_where(self::DB_NAME, array('username' => $username), 1)->result_array();
		return $result[0]['level'];
	}

	/**
	 * get level
	 *
	 * @return 1 or 0
	 */
	public function geIdByUsername($username)
	{
		$result = $this->db->get_where(self::DB_NAME, array('username' => $username), 1)->result_array();
		return $result[0]['id'];
	}

	/**
	 * update Password By Id
	 * @return bool true on success, false on failure
	 */
	public function updatePasswordById($id, $password)
	{
		$data = array(
			'password'   => base64_encode($password),
		);

		return $this->db->update(self::DB_NAME, $data, array('id' => $id));
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
		if (!$this->session->systemLevel) {
			return $this->db->order_by('order', 'asc')->get_where(self::DB_NAME, array('level' => 0))->result_array();
		} else {
			return $this->db->order_by('order', 'asc')->get(self::DB_NAME)->result_array();
		}
	}

	/**
	 * get_user by id.
	 * @return array
	 */
	public function selectById($id)
	{
		return $this->db->get_where(self::DB_NAME, array('id' => $id), 1)->result_array();
	}
}