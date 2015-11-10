<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Model { 

	public function get_order_by_id($order_id)
	{
		$query = "SELECT * FROM orders_has_products JOIN products ON orders_has_products.product_id = products.id WHERE orders_has_products.order_id = ?";
		$values = $order_id;
		return $this->db->query($query, $values)->result_array();
	}
	public function admin_get_all_orders()
	{
		$query = "SELECT * FROM orders";
		return $this->db->query($query)->result_array();
	}
	public function update_status($order, $status)
	{
		$query = "UPDATE orders SET status = ? WHERE orders.id = ?";
		$values = array($status, $order);
		$this->db->query($query, $values);
	}

	public function update_order($order_id, $post)
	{
		$query = "UPDATE orders SET first_name=?, last_name=?, email=?, billing_address_1=?, billing_address_2=?, billing_city=?, billing_state=?, billing_zip=?, shipping_first_name=?, shipping_last_name=?, shipping_address_1=?, shipping_address_2=?, shipping_city=?, shipping_state=?, shipping_zip=?, updated_at=NOW() WHERE orders.id = ?";
        $values = array($post['first_name'], $post['last_name'], $post['email'], $post['billing_address_1'], $post['billing_address_2'], $post['billing_city'], $post['billing_state'], $post['billing_zip'], $post['shipping_first_name'], $post['shipping_last_name'], $post['shipping_address_1'], $post['shipping_address_2'], $post['shipping_city'], $post['shipping_state'], $post['shipping_zip'], $order_id);
        return $this->db->query($query, $values);
	}
}