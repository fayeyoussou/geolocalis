<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_type extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('customer_type_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['customer_typelist'] = $this->customer_type_model->getall_customer_type();
		$this->template->template_render('customer_type_management',$data);
	}
	public function addcustomer_type()
	{
		$this->template->template_render('customer_type_add');
	}
	public function insertcustomer_type()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('customer_type')->where('typc_name',$this->input->post('typc_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->customer_type_model->add_customer_type($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New customer_type added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un customer_type du même nom existe déjà.');
			}
			redirect('customer_type');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('customer_type');
		}
	}
	public function editcustomer_type()
	{
		$c_id = $this->uri->segment(3);
		$data['customer_typedetails'] = $this->customer_type_model->get_customer_typedetails($c_id);
		$this->template->template_render('customer_type_add',$data);
	}

	public function updatecustomer_type()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->customer_type_model->update_customer_type($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'customer_type modifiée avec succés..');
				    redirect('customer_type');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('customer_type');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('customer_type');
		}
	}
    
/*Debut supp customer_type*/    
	public function customer_type_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('customer_type', array('typc_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'customer_type supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! customer_type non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('customer_type');
	}    
/* Fin supp customer_type*/     
    
    
    
}
