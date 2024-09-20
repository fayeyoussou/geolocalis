<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('invoice_model');
          $this->load->model('customer_model');	//ajouter client
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['invoicelist'] = $this->invoice_model->getall_invoice();
		$this->template->template_render('invoice_management',$data);
	}
	public function addinvoice()
	{
		$this->template->template_render('invoice_add');
		$data['customerlist'] = $this->invoice_model->getall_customer();//ajouter client
        
	}
	public function insertinvoice()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('invoice')->where('i_customer',$this->input->post('i_customer'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->invoice_model->add_invoice($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New invoice added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('invoice');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('invoice');
		}
	}
	public function editinvoice()
	{
		$cp_id = $this->uri->segment(3);
		$data['invoicedetails'] = $this->invoice_model->get_invoicedetails($cp_id);
		$this->template->template_render('invoice_add',$data);
		$data['customerlist'] = $this->invoice_model->getall_customer();// ajouter client

    }

	public function updateinvoice()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->invoice_model->update_invoice($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'invoice updated successfully..');
				    redirect('invoice');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('invoice');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('invoice');
		}
	}
}
