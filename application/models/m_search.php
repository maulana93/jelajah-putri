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
		return $result;
	}
	public function listContent($params=array())
	{
		$last_id = isset($params['last_id'])?$params['last_id']:'';
		$order = isset($params["order"])?$params["order"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';

		$conditional = "WHERE status = 1 ";

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
		return $result;
	}
}
?>
