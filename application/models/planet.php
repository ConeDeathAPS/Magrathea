<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planet extends CI_Model {

	public function get_planet($planet_id){

		$query = "SELECT * FROM products WHERE id = ?";
		$values = $planet_id;
		return $this->db->query($query, $values)->row_array();
	}

	public function get_similar($type_id, $planet_id)
	{	
		$query = "SELECT name, id from products where type_id = ? AND id != ?";
		$values = array("type_id" => $type_id, "planet_id" => $planet_id);
		return $this->db->query($query, $values)->result_array();
	}

	public function add($post){
		//if order_id/cart exists in session, adds item to orders_has_products with current order id
		if($this->session->userdata('order_id')) {
			$query="INSERT INTO orders_has_products(product_id, quantity, order_id) VALUES (?,?,?)";
			$values = array($post['product_id'], $post['quantity'], $this->session->userdata['order_id']);	
	 		$this->db->query($query, $values);
		}
		else{
			//if order_id does not exist, creates new order number 
			$query= "INSERT INTO orders(created_at, updated_at, status) VALUES(NOW(), NOW(), 'pending payment')";	
			$this->db->query($query);
			$order_id = $this->db->insert_id();
			//saves order_id to session
			$this->session->set_userdata('order_id', $order_id);
			//adds order number, product id, quantity to orders_has_products
			$query="INSERT INTO orders_has_products(product_id, quantity, order_id) VALUES(?,?,?)";
			$values = array($post['product_id'], $post['quantity'], $this->session->userdata['order_id']);	
	 		$this->db->query($query, $values);
		}
	}
	public function update_if_exists($order_id, $post)
	{
		$query ="SELECT quantity FROM orders_has_products WHERE order_id = ? AND product_id = ?";
		$values = array("order_id" => $order_id, "product_id" => $post['product_id']);
		$prev_quan = $this->db->query($query, $values)->row_array();
		// var_dump($prev_quan);
		// die();
		$new_quantity = $prev_quan['quantity'] + $post['quantity'];
		$query = "UPDATE orders_has_products SET quantity = ? WHERE order_id = ? AND product_id = ?";
		$values = array("quantity" => $new_quantity, "order_id" => $order_id, "product_id" => $post['product_id']);
		$this->db->query($query, $values);
	}

	public function update_from_cart($order_id, $post) 
	{
		$query ="SELECT quantity FROM orders_has_products WHERE order_id = ? AND product_id = ?";
		$values = array("order_id" => $order_id, "product_id" => $post['product_id']);
		$prev_quan = $this->db->query($query, $values)->row_array();
		//get current quantity and the difference between the new and old quantity. Add this difference (whether positive or negative) to the overall quantity
		$current_quantity = $this->session->userdata("quantity");
		$difference = $post["new_quantity"] - $prev_quan['quantity'];
		$this->session->set_userdata("quantity", $current_quantity + $difference);
		$query = "UPDATE orders_has_products SET quantity = ? WHERE order_id = ? AND product_id = ?";
		$values = array("quantity" => $post['new_quantity'], "order_id" => $order_id, "product_id" => $post['product_id']);
		$this->db->query($query, $values);
	}
}