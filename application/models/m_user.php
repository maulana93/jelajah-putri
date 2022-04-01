<?php
Class M_user extends CI_Model
{
	public function login($email)
	{
		$mysql = " select *	from customers where email='".$email."' ";
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
	public function get_data($id="")
	{
		$condition = "";
		if($id){
			$condition = " AND id='".$id."'";
		}
		$mysql = "
				select * from customers where 1=1
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
