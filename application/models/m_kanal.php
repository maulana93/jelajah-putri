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
		$id_category = isset($params["id_category"])?$params["id_category"]:'';
		$last_id = isset($params['last_id'])?$params['last_id']:'';
		$limit = isset($params["limit"])?$params["limit"]:'';
		$id_exclude = isset($params["id_exclude"])?$params["id_exclude"]:'';

		$conditional = "WHERE status = 1 ";

		if($id_exclude != '') {
			$conditional .= " AND id != ".$id_exclude."";
		}

		if($id_category != '') {
			$conditional .= " AND id_category= ".$id_category."";
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
