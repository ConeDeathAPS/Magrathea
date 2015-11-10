<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {

	public function enter($post)
	{
		$query = "SELECT id FROM users WHERE email = ? AND password =?";
			 	$values = array($post["email"], $post["password"]);
			 	$user = $this->db->query($query, $values)->row_array();
			 	// var_dump($user);
			 	// die();
			 	//if user not in db, query will come back empty, set error and redirect to display on login page
			 	if(empty($user)){ 
			 		$this->session->set_flashdata("errors", "No admin with that email or password.");
			 		redirect("/Admins"); 
			 		return false;
			 	}
			 	//if user is found,
			 	else{ 
			 		return true;
		 	 	}
	}


	public function delete_order($order_id)
	{
		$query = "DELETE from orders_has_products WHERE order_id = ?";
		$values = array('order_id'=> $order_id);
		$this->db->query($query, $values);

		$query = "DELETE from orders WHERE id = ?";
		$values = array('id'=> $order_id); 
		$this->db->query($query, $values);
	}
}