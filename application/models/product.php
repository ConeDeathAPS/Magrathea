<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Model {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

    public function add_product($post)
    {
        $query = "INSERT INTO products (name, type_id, description, price, inventory, created_at, updated_at) VALUES (?,?,?,?,?,NOW(), NOW())";
        $values = array($post['name'], $post['type_id'], $post['description'], $post['price'], $post['inventory']);
        return $this->db->query($query, $values);
	}
	public function get_all_products()
	{
		$query = "SELECT products.id, name, description, price, inventory, type_id, products.created_at, products.updated_at, type_name FROM products JOIN types ON types.id = products.type_id";
		return $this->db->query($query)->result_array();
	}
	public function get_product_by_id($product_id)
	{
		$query = "SELECT products.id, name, description, price, inventory, type_id, products.created_at, products.updated_at, type_name FROM products JOIN types ON types.id = products.type_id WHERE products.id = ?";
		$values = $product_id;
		return $this->db->query($query, $values)->row_array();
	}
	public function get_all_types()
	{
		$query = "SELECT * FROM types";
		return $this->db->query($query)->result_array();
	}
	public function update_product($product_info)
	{
		$query = "UPDATE products SET name=?, description=?, type_id=? WHERE products.id = ?";
		$values = array($product_info['name'], $product_info['description'], $product_info['type_id'], $product_info['id']);
		return $this->db->query($query, $values);
	}
	public function delete($product_id)
	{
		$query = "DELETE FROM products WHERE products.id = ?";
		$values = $product_id;
		return $this->db->query($query, $values);
	}

}