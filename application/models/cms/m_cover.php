<?php
Class M_cover extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}
		if($status != '') {
			$conditional .= "AND status = '".$this->db->escape_str($status)."'";
		}
		if($limit != '') {
			$conditional .= "limit 0,".$this->db->escape_str($limit)."";
		}

		$mysql = "select * from cover ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
}
?>
