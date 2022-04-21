<?php
Class M_search extends CI_Model
{
	public function listdata($params=array())
	{
		$keyword = isset($params["keyword"])?$params["keyword"]:'';

		$conditional = " WHERE status = 1 ";

		if($keyword != '') {
			$conditional .= "
				AND title like '%".$this->db->escape_str($keyword)."%'
				OR summary like '%".$this->db->escape_str($keyword)."%'
				OR body like '%".$this->db->escape_str($keyword)."%'
			";
		}

		$mysql = "select * from content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
}
?>
