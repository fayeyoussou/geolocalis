<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('invoice_model');
          $this->load->model('customer_model');	
          $this->load->model('drivers_model');	
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
		$data['customerlist'] = $this->invoice_model->getall_customer();
		$data['vechiclelist'] = $this->invoice_model->getall_vechicle();
		$data['driverlist'] = $this->invoice_model->getall_driverlist();
/*ajout pour liste deroulante*/
		$data['zonelist'] = $this->invoice_model->getall_zonelist();
/*fon pour liste deroulante*/
		$this->template->template_render('invoice_add',$data);
	}
	public function insertinvoice() 
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->invoice_model->add_invoice($this->input->post());
			$bookingemail = $this->input->post('bookingemail');
			if(isset($bookingemail)) {
				$this->sendinvoiceemail($this->input->post());
			}
			if($response) {
				$this->session->set_flashdata('successmessage', 'New invoice added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('invoice');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('invoice');
		}
	}
	public function editinvoice()
	{
		$data['customerlist'] = $this->invoice_model->getall_customer();
		$data['vechiclelist'] = $this->invoice_model->getall_vechicle();
		$data['driverlist'] = $this->invoice_model->getall_driverlist();
		$t_id = $this->uri->segment(3);
		$data['invoicedetails'] = $this->invoice_model->get_invoicedetails($t_id);
		
		$this->template->template_render('invoice_add',$data);
	}

	public function updateinvoice()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->invoice_model->update_invoice($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New invoice added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('invoice');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('invoice');
		}
	}
	public function details()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$invoicedetails = $this->invoice_model->get_invoicedetails($b_id);
		if(isset($invoicedetails[0]['i_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($invoicedetails[0]['i_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($invoicedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->invoice_model->get_paymentdetails($invoicedetails[0]['i_id']);
			$data['invoicedetails'] = $invoicedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		$this->template->template_render('invoice_details',$data);
	}
	public function invoice()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$invoicedetails = $this->invoice_model->get_invoicedetails($b_id);
		if(isset($invoicedetails[0]['i_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($invoicedetails[0]['i_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($invoicedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->invoice_model->get_paymentdetails($invoicedetails[0]['i_id']);
			$data['invoicedetails'] = $invoicedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		$this->load->view('invoice',$data);
	}
	public function invoicepayment()
	{
		$pyment = $this->input->post();
		$this->db->insert('invoice_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from invoice and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('invoice/details/'.$pyment['tp_invoice_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('invoice/details/'.$pyment['tp_invoice_id']);
		}
	}
	public function invoicepayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('invoice_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('invoice/details/'.$this->uri->segment(4));
	}
	public function addinvoiceexpense() 	{
		$addinvoiceexpense = $this->input->post();
		$invoice_id = $addinvoiceexpense['addinvoiceexpense_invoice_id'];
		unset($addinvoiceexpense['addinvoiceexpense_invoice_id']);
		$response =  $this->db->insert('incomeexpense',$addinvoiceexpense);
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('invoice/details/'.$invoice_id);
	}
	public function sendinvoiceemail($data) {
		$this->load->model('email_model');	
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$value = '<b>invoice Details :</b><br><br> '.$data['t_invoice_fromlocation']. ' <br><b>to</b><br> ' . $data['t_invoice_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
			$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email;
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
		}
	}
	public function sendtracking() {
		$this->load->model('email_model');
		$custemail = urldecode($_GET['email']);
		$url = base_url().'invoicetracking/'.$_GET['trackingcode'];
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','tracking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$body = str_replace('{{url}}', $url, $emailcontent);
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
			if($email) {
				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('invoice/details/'.$_GET['t_id']);
		}
	}
}
