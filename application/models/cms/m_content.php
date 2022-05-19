<?php
Class M_content extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}

		$mysql = "select * from content ".$conditional." order by id DESC";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		$result = $this->__getCategory($result);
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['slug'] = isset($params["slug"])?$params["slug"]:'';
		$data ['id_category'] = isset($params["id_category"])?$params["id_category"]:'';
		$data ['summary'] = isset($params["summary"])?$params["summary"]:'';
		$data ['body'] = isset($params["body"])?$params["body"]:'';
		$data ['id_user'] = isset($params["id_user"])?$params["id_user"]:'';
		$data ['is_headline'] = isset($params["is_headline"])?$params["is_headline"]:'';
		$data ['datecreated'] = isset($params["datecreated"])?$params["datecreated"]:'';
		$data ['image'] = isset($params["image"])?$params["image"]:'';
		$data ['profile_image'] = isset($params["profile_image"])?$params["profile_image"]:'';
		$data ['profile_name'] = isset($params["profile_name"])?$params["profile_name"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('content', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$slug = isset($params["slug"])?$params["slug"]:'';
		$id_category = isset($params["id_category"])?$params["id_category"]:'';
		$summary = isset($params["summary"])?$params["summary"]:'';
		$body = isset($params["body"])?$params["body"]:'';
		$id_user = isset($params["id_user"])?$params["id_user"]:'';
		$is_headline = isset($params["is_headline"])?$params["is_headline"]:'';
		$image = isset($params["image"])?$params["image"]:'';
		$profile_image = isset($params["profile_image"])?$params["profile_image"]:'';
		$profile_name = isset($params["profile_name"])?$params["profile_name"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,slug = '".$this->db->escape_str($slug)."'
			,id_category = '".$this->db->escape_str($id_category)."'
			,summary = '".$this->db->escape_str($summary)."'
			,body = '".$this->db->escape_str($body)."'
			,id_user = '".$this->db->escape_str($id_user)."'
			,is_headline = '".$this->db->escape_str($is_headline)."'
			,image = '".$this->db->escape_str($image)."'
			,profile_image = '".$this->db->escape_str($profile_image)."'
			,profile_name = '".$this->db->escape_str($profile_name)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE content
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
		$this->db->delete('content');
	}

	private function __getCategory($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id_category'] != '') {
					$result[$key]['category'] = $this->__getCategorySQL($value['id_category']);
				}else{
					$result[$key]['category'] = "";
				}
			}
		}

		return $result;
	}

	private function __getCategorySQL($id){
		$result = array();
		$query = $this->db->query("
			SELECT * FROM category WHERE status = 1 AND id=".$id."
		");
		$result = $query->result_array();
		return $result;
	}
}
?>
