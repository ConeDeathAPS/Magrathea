<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function enter(){
		$this->load->model("admin");
		if($this->admin->enter($this->input->post())){ 
			if (null !== $this->session->userdata("order_id")) {
				$this->admin->delete_order($this->session->userdata("order_id"));
				$this->session->unset_userdata("order_id");
				$this->session->set_userdata("quantity", 0);
				redirect("/orders/admin_show_all_orders"); 
			} else {
				redirect("/orders/admin_show_all_orders"); 
			}
		}
		else{
			redirect("/Admins"); //redirects back to login page if login fails
		}
	}

	public function logout() {

		$this->load->view('index');
	}
}