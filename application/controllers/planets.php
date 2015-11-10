<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class planets extends CI_Controller 
{
	 public function show_planet($planet_id, $type_id)
	 {
		$planet = $this->planet->get_planet($planet_id);
		$similars = $this->planet->get_similar($type_id, $planet_id);
		// var_dump($similars);
		// die();
		$this->load->view('planet', array("planet"=>$planet, "similars"=>$similars));
	}

	public function add()
	{
	$this->form_validation->set_rules("product_id", "product_id", "is_unique[orders_has_products.product_id]");		
	//var_dump($this->input->post());
	$this->load->model('planet');
	//if the planet exists then update the quantity, otherwise add a new row
	if (!$this->form_validation->run()) 
	{
		$this->planet->update_if_exists($this->session->userdata("order_id"), $this->input->post());
	} 
	else 
	{
		$this->planet->add($this->input->post());		
	}
		//update quantity in session
		$quantity = $this->session->userdata("quantity");
		$quantity += $this->input->post("quantity");
		$this->session->set_userdata("quantity", $quantity);
		redirect('/displays/go_to_shop');
	}

}