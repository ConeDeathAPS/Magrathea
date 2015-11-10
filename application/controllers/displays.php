<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Displays extends CI_controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		// $this->session->sess_destroy();
	}

	public function index()
	{
		$this->load->view("main");
	}

	public function go_to_shop()
	{
		if (!$this->session->userdata("quantity")) {
			$this->session->set_userdata("quantity", 0);
		}

		$this->load->view("index");
	}

	public function get_products_by_page($offset)
	{
		$this->load->model("Display");

		$order = "ASC";
		$this->session->set_userdata("order", $order);
		//get items from database, passing in the offset and storing the results in an array
		$products = $this->Display->get_products($offset, $order);
		//load the partial with the information required
		// var_dump($products);
		// die();
		$this->load->view("Partials/index_partial", array("products" => $products));
	}	

	public function sort_products($sort)
	{
		$this->load->model("Display");
		//check the value of sort and set the order accordingly
		if ($sort == "A") {
			$order = "ASC";
		} else {
			$order = "DESC";
		}
		$offset = 0;
		$this->session->set_userdata("order", $order);
		//query the database with the correct sort, store in array
		$products = $this->Display->get_products($offset, $order);
		//load partial with correct data
		$this->load->view("Partials/index_partial", array("products" => $products));
	}

	public function sort_by_category($cat_id)
	{
		$this->load->Model("Display");
		// echo $cat_id . "<br>";
		// die();
		$order = $this->session->userdata("order");
		//get sorted products and store in array
		$products = $this->Display->sort_by_category($cat_id, $order);
		//load partial with correct data
		$this->load->view("Partials/index_partial", array("products" => $products));
	}

	public function sort_by_search($value)
	{
		$this->load->Model("Display");
		// echo $value;
		// die();
		$products = $this->Display->sort_by_search($value);
		$this->load->view("Partials/index_partial", array("products" => $products));
	}
	
	public function sort_by_type_and_price()
	{
		$this->load->model("display");
	}

	public function reset()
	{
		$this->session->unset_userdata("quantity");
		$this->session->unset_userdata("order_id");
		redirect("/");
	}
}