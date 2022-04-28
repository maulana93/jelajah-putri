<?php
Class M_banner extends CI_Model
{
	public function listdata($params=array())
	{
		$mysql = "select * from banner WHERE status = 1";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
}
?>
