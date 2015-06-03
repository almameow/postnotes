<?php  
	class Postit_model extends CI_Model{
		function get_all_notes()
		{
			return $this->db->query("SELECT * FROM posts ORDER BY id DESC")->result_array();
		}

		function add_note($new_note)
		{
			// prevent adding empty note to db on load
			if(strlen($new_note['description'])<1)
				return;

			return $this->db->query("INSERT INTO posts (description, color, created_at, updated_at) VALUES (?, ?, NOW(), NOW())", array($new_note['description'], $new_note['color']));
		}

		function delete_note($id)
		{
			return $this->db->query("DELETE FROM posts WHERE id = ?", $id);
		}
	}

?>