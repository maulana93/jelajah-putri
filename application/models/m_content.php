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
		return $result;
	}
}
?>
