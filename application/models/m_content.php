<?php
Class M_content extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE status = 1 ";

		if($id != '') {
			$conditional .= "AND id = ".$id."";
		}

		$mysql = "select * from content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		$result = $this->__getPenulisContent($result);
		$result = $this->__getCategory($result);
		return $result;
	}

	private function __getCategory($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id_category'] != '') {
					$result[$key]['category'] = $this->__getCategorySQL($value['id_category']);
				}else{
					$result[$key]['category'] = "";
				}
			}
		}

		return $result;
	}

	private function __getCategorySQL($id){
		$result = array();
		$query = $this->db->query("
			SELECT * FROM category WHERE status = 1 AND id=".$id."
		");
		$result = $query->result_array();
		return $result;
	}

	private function __getPenulisContent($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id_user'] != '') {
					$result[$key]['penulis'] = $this->__getPenulisContentSQL($value['id_user']);
				}else{
					$result[$key]['penulis'] = "";
				}
			}
		}

		return $result;
	}

	private function __getPenulisContentSQL($id_user){
		$result = array();
		$query = $this->db->query("
			SELECT * FROM user WHERE status = 1 AND id=".$id_user."
		");
		$result = $query->result_array();
		return $result;
	}
}
?>
