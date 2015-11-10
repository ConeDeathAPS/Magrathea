<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function add_order($planet_id)
	{
		if($this->session->userdata('order_id') === null)
		{
			$this->order->create_new_order($planet_id);
		}
		else
		{
			$this->order->add_to_order($planet_id);
		}
	}
	public function admin_show_all_orders()
	{
		// $this->output->enable_profiler(true);
		$orders = $this->order->admin_get_all_orders();
		$this->load->view('orders', array('orders'=>$orders));
	}

	public function update_status()
	{
		$status = $this->input->post("status");
		$order = $this->input->post("order");
		$this->order->update_status($order, $status);
	}

	public function update_order()
	{	
		$order_id = $this->session->userdata("order_id");
		if ($this->order->update_order($order_id, $this->input->post())) {
			$messgae = "Order #".$order_id." is ready for payment.";
			echo json_encode($messgae);
		}
	}	
}