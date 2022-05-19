<?php
Class M_kanal extends CI_Model
{
	public function listdata($params=array())
	{
		$slug = isset($params["slug"])?$params["slug"]:'';

		$conditional = " WHERE status = 1 ";

		if($slug != '') {
			$conditional .= "AND slug = '".$this->db->escape_str($slug)."'";
		}

		$mysql = "select * from category ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function listContent($params=array())
	{
		$id_exclude = isset($params["id_exclude"])?$params["id_exclude"]:'';
		$id_category = isset($params["id_category"])?$params["id_category"]:'';
		$last_id = isset($params['last_id'])?$params['last_id']:'';
		$order = isset($params["order"])?$params["order"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = "WHERE status = 1 ";

		if($id_exclude != '') {
			$conditional .= " AND id != ".$id_exclude."";
		}

		if($id_category != '') {
			$conditional .= " AND id_category= ".$id_category."";
		}

		if($last_id != '') {
			$conditional .= " AND id < ".$last_id;
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
