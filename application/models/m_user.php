<?php
Class M_user extends CI_Model
{
	public function login($email)
	{
		$mysql = " select *	from user where email='".$email."' ";
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
