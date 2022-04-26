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

		$conditional = "WHERE status = 1 ";

		if($id_category != '') {
			$conditional .= "AND id_category=".$id_category."";
		}

		$mysql = "SELECT * FROM content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
}
?>
