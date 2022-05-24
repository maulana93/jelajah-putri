<?php
Class M_home extends CI_Model
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

	public function getArticleCover()
	{
		$mysql = "
			SELECT ct.id, ct.title, ct.id_category, cg.title category, ct.summary, ct.image FROM category cg
			INNER JOIN content ct ON cg.id = ct.id_category
			WHERE ct.is_headline = 1 ORDER BY ct.id DESC
		";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}

	public function listCategory()
	{
		$mysql = "
			SELECT * FROM category WHERE status = 1
		";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		$result = $this->__getContent($result);
		$result = $this->__getHeadlineContent($result);
		return $result;
	}

	public function listBanner()
	{
		$mysql = "
			SELECT * FROM banner WHERE status = 1
		";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}

	private function __getContent($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id'] != '') {
					$result[$key]['content'] = $this->__getContentSQL($value['id']);
				}else{
					$result[$key]['content'] = "";
				}
			}
		}

		return $result;
	}

	private function __getContentSQL($id_category){
		$result = array();
		$limit = 6;
		if($id_category == $this->config->item('kanal-id-bertualang')){
			$limit = 9;
		}
		if($id_category == $this->config->item('kanal-id-berbakti')){
			$limit = 3;
		}
		$query = $this->db->query("
			SELECT * FROM content WHERE status = 1 AND id_category=".$id_category." order by id desc LIMIT 0,".$limit."
		");
		$result = $query->result_array();
		$result = $this->__getPenulisContent($result);
		return $result;
	}

	private function __getHeadlineContent($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id'] != '') {
					$result[$key]['headline'] = $this->__getHeadlineContentSQL($value['id']);
				}else{
					$result[$key]['headline'] = "";
				}
			}
		}

		return $result;
	}

	private function __getHeadlineContentSQL($id_category){
		$result = array();
		$query = $this->db->query("
			SELECT * FROM content WHERE status = 1 AND is_headline = 1 AND id_category=".$id_category." ORDER BY id DESC LIMIT 0,1
		");
		$result = $query->result_array();
		return $result;
	}

	private function __getPenulisContent($result){
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				if ($value['id_user'] != '') {
					$result[$key]['penulis'] = $this->__getPenulisContentSQL($value['id_user']);
				}else{
					$result[$key]['penulis'] = "";
				}
			}
		}

		return $result;
	}

	private function __getPenulisContentSQL($id_user){
		$result = array();
		$query = $this->db->query("
			SELECT * FROM user WHERE status = 1 AND id=".$id_user."
		");
		$result = $query->result_array();
		return $result;
	}
}
?>
