<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Controller {

	public function index()
	{
		redirect('/products/show_products');
	}
	public function show_orders()
	{
		$this->load->view('orders');
	}
	public function show_products()
	{
		$products = $this->product->get_all_products();
		$this->load->view('products', array("products"=>$products));
	}
	public function product_entry()
	{
		$this->cart->add_product($this->input->post());
		redirect('/products/show_products');
	}
	public function edit_product($product_id)
	{
		$types = $this->product->get_all_types();
		$product = $this->product->get_product_by_id($product_id);
		$this->load->view('edit_product', array("product"=>$product, "types"=>$types));
	}
	public function update_product()
	{
		$product_info = $this->input->post();
		$this->product->update_product($product_info);
		redirect("/products/show_products");
	}
	public function delete_product($product_id)
	{
		$types = $this->product->get_all_types();
		$product = $this->product->get_product_by_id($product_id);
		$this->load->view('delete_product', array("product"=>$product, "types"=>$types));
	}
	public function confirm_delete($product_id)
	{
		$this->product->delete($product_id);
		redirect('/products/show_products');
	}

}
