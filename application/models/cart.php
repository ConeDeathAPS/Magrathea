<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Model {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

	public function getOrderInfo()
	{
		$query = "SELECT * FROM orders JOIN orders_has_products ON orders.id = orders_has_products.order_id";
	}
	public function add_order($post)
	{
	    $query = "INSERT INTO orders (first_name, last_name, email, billing_address_1, billing_address_2, billing_city, billing_state, billing_zip, shipping_first_name, shipping_last_name, shipping_address_1, shipping_address_2, shipping_city, shipping_state, shipping_zip) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
        $values = array($post['first_name'], $post['last_name'], $post['email'], $post['billing_address_1'], $post['billing_address_2'], $post['billing_city'], $post['billing_state'], $post['billing_zip'], $post['shipping_first_name'], $post['shipping_last_name'], $post['shipping_address_1'], $post['shipping_address_2'], $post['shipping_city'], $post['shipping_state'], $post['shipping_zip']);
        return $this->db->query($query, $values);
    }
    public function add_product($post)
    {
        $query = "INSERT INTO products (name, type_id, description, price, inventory, created_at, updated_at) VALUES (?,?,?,?,?,NOW(), NOW())";
        $values = array($post['name'], $post['type_id'], $post['description'], $post['price'], $post['inventory']);
        return $this->db->query($query, $values);
	}

	public function delete_item($product_id){
		$query = "DELETE from orders_has_products WHERE product_id = ? AND order_id = ?";
		$values = array('product_id'=>$product_id, 'order_id'=>$this->session->userdata('order_id'));
		$this->db->query($query, $values);
	}

}
