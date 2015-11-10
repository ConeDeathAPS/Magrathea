<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function show_cart()
	{
		$this->output->enable_profiler(true);
		if (!$this->session->userdata('order_id')) {
			$this->load->view('cart');		
		} else {
			$order = $this->order->get_order_by_id($this->session->userdata('order_id'));
			$this->load->view('cart', array('order'=>$order));				
		}
	}

	public function delete($product_id, $quantity){
		//reseting total quantity in cart to new quantity subtracting amount deleted
		$prev_quan = $this->session->userdata('quantity');
		$new_quan = $prev_quan - $quantity;
		$this->session->set_userdata('quantity', $new_quan);
		//sending to model to delete from db
		$this->cart->delete_item($product_id);
		redirect("/carts/show_cart");
	}

	public function update()
	{
		$this->planet->update_from_cart($this->session->userdata("order_id"), $this->input->post());
		redirect("/carts/show_cart");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */