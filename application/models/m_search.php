<?php
Class M_search extends CI_Model
{
	public function listdata($params=array())
	{
		$keyword = isset($params["keyword"])?$params["keyword"]:'';
		$order = isset($params["order"])?$params["order"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = " WHERE status = 1 ";

		if($keyword != '') {
			$conditional .= "
				AND title like '%".$this->db->escape_str($keyword)."%'
				OR summary like '%".$this->db->escape_str($keyword)."%'
				OR body like '%".$this->db->escape_str($keyword)."%'
			";
		}

		if($order == '') {
			$conditional .= " order by id desc";
		}

		if($limit != '') {
			$conditional .= " limit 0,".$limit;
		}

		$mysql = "select * from content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		$result = $this->__getPenulisContent($result);
		return $result;
	}
	public function listContent($params=array())
	{
		$last_id = isset($params['last_id'])?$params['last_id']:'';
		$keyword = isset($params["keyword"])?$params["keyword"]:'';
		$order = isset($params["order"])?$params["order"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = "WHERE status = 1 ";

		if($last_id != '') {
			$conditional .= " AND id < ".$last_id;
		}

		if($keyword != '') {
			$conditional .= "
				AND title like '%".$this->db->escape_str($keyword)."%'
				OR summary like '%".$this->db->escape_str($keyword)."%'
				OR body like '%".$this->db->escape_str($keyword)."%'
			";
		}

		if($order == '') {
			$conditional .= " order by id desc";
		}

		if($limit != '') {
			$conditional .= " limit 0,".$limit;
		}

		$mysql = "SELECT * FROM content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		$result = $this->__getPenulisContent($result);
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
