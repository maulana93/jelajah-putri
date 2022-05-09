<?php
Class M_search extends CI_Model
{
	public function listdata($params=array())
	{
		$keyword = isset($params["keyword"])?$params["keyword"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = " WHERE status = 1 ";

		if($keyword != '') {
			$conditional .= "
				AND title like '%".$this->db->escape_str($keyword)."%'
				OR summary like '%".$this->db->escape_str($keyword)."%'
				OR body like '%".$this->db->escape_str($keyword)."%'
			";
		}

		if($limit != '') {
			$conditional .= " limit 0,".$limit;
		}

		$mysql = "select * from content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	public function listContent($params=array())
	{
		$id_category = isset($params["id_category"])?$params["id_category"]:'';
		$last_id = isset($params['last_id'])?$params['last_id']:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = "WHERE status = 1 ";

		if($id_category != '') {
			$conditional .= "AND id_category=".$id_category."";
		}

		if($last_id != '') {
			$conditional .= " AND id > ".$last_id;
		}

		if($limit != '') {
			$conditional .= " limit 0,".$limit;
		}

		$mysql = "SELECT * FROM content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
}
?>
