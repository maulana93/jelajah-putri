<?php
Class M_image extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}

		$mysql = "select * from image ".$conditional." order by id DESC";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['image'] = isset($params["image"])?$params["image"]:'';

		$insert = $this->db->insert('image', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$image = isset($params["image"])?$params["image"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,image = '".$this->db->escape_str($image)."'
		";
					
		$select = $this->db->query("
			UPDATE image
			SET
				".$data."
			WHERE
				id = ".$this->db->escape_str($id)."
		");

		if($select){
			return 'success';
		} else {
			return 'failed';
		}
	}

	function delete_data($id){
		$this->db->where('id', $id);
		$this->db->delete('image');
	}
}
?>
