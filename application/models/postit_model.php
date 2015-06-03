<?php  
	class Postit_model extends CI_Model{
		function get_all_notes()
		{
			return $this->db->query("SELECT * FROM posts ORDER BY id DESC")->result_array();
		}

		function add_note($description)
		{
			return $this->db->query("INSERT INTO posts (description, created_at, updated_at) VALUES (?, NOW(), NOW())", $description);
		}

		function delete_note($id)
		{
			return $this->db->query("DELETE FROM posts WHERE id = ?", $id);
		}
	}

?>