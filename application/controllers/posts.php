<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Postit_model");
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function index_html() 
	{
		$data['posts'] = $this->Postit_model->get_all_notes();
		$this->load->view("partials/posts", $data);
	}

	public function add_note()
	{
		// Add new post to db
		$new_post = $this->input->post();
		$this->Postit_model->add_note($new_post);

		// Reload partial of posts
		$data["posts"] = $this->Postit_model->get_all_notes();
		$this->load->view("partials/posts", $data);
	}

	public function delete_note($id)
	{
		// Remove post from db
		$this->Postit_model->delete_note($id);

		// Reload partial of posts NOT WORKING :(
		$data["posts"] = $this->Postit_model->get_all_notes();
		$this->load->view("partials/posts", $data);
	}
	
}