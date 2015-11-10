<?php 

class Display extends CI_model
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->session->sess_destroy();
	}

	public function get_products($offset, $order)
	{
		return $this->db->query("SELECT products.id, name, type_id, price FROM products ORDER BY price " . $order . " LIMIT 16 OFFSET " . $offset)->result_array();
	}

	public function sort_by_category($cat_id, $order)
	{
		return $this->db->query("SELECT products.id, name, type_id, price FROM products JOIN types ON products.type_id = types.id 
								WHERE types.id = " . $cat_id . " ORDER BY price " . $order . " LIMIT 16 OFFSET 0")->result_array();
	}

	public function sort_by_search($string)
	{
		$query = "SELECT products.id, name, type_id, price FROM products WHERE name LIKE '" . $string . "%'";
		$value = $string;
		return $this->db->query($query, $value)->result_array();
	}

}