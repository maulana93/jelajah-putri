<?php
Class M_cover extends CI_Model
{
	public function get_data($id="")
	{
		$condition = "";
		if($id){
			$condition = " AND id='".$id."'";
		}
		$mysql = "
				select * from cover where 1=1
				".$condition."
			";
		$query = $this->db->query($mysql);
		if ($query->num_rows()>0)
			{
				return $query->result();
			}
		else
			{
				return array();
			}
	}
}
?>
