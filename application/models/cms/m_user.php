<?php
Class M_user extends CI_Model
{
	public function login($email)
	{		
		$mysql = " select *	from user where email='".$email."' ";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';
		$email = isset($params["email"])?$params["email"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}
		if($email != '') {
			$conditional .= "AND email = '".$this->db->escape_str($email)."'";
		}

		$mysql = "select * from user ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
		echo $mysql;
		die();
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['fullname'] = isset($params["fullname"])?$params["fullname"]:'';
		$data ['email'] = isset($params["email"])?$params["email"]:'';
		$data ['password'] = isset($params["password"])?$params["password"]:'';
		$data ['role'] = isset($params["role"])?$params["role"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('user', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$fullname = isset($params["fullname"])?$params["fullname"]:'';
		$email = isset($params["email"])?$params["email"]:'';
		$password = isset($params["password"])?$params["password"]:'';
		$role = isset($params["role"])?$params["role"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			fullname = '".$this->db->escape_str($fullname)."'
			,email = '".$this->db->escape_str($email)."'
			,password = '".$this->db->escape_str($password)."'
			,role = '".$this->db->escape_str($role)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE user
			SET
				".$data."
			WHERE
				id = ".$this->db->escape_str($id)."
		");

		if($select){
			return 'success';
		} else {
			return 'failed';
		}
	}

	function delete_data($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}
?>
