<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class invoice extends CI_Controller {
	function __construct()
    {
          parent::__construct();
          $this->load->database();
          $this->load->model('invoice_model');
          $this->load->model('incomexpense_model');
          $this->load->model('geofence_model');
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
	//	$data['v_group'] = $this->invoice_model->get_invoicegroup();
	//	$this->template->template_render('invoice_add',$data);
		$this->template->template_render('invoice_add');
    }
    
/*Fin insert */    
/*	public function insertinvoice()
	{
		$this->form_validation->set_rules('i_nom_navire','Registration Number','required|trim|is_unique[invoice.i_nom_navire]');
		$this->form_validation->set_message('is_unique', '%s is already exist');
		$this->form_validation->set_rules('i_reference','Model','required|trim');
		$this->form_validation->set_rules('i_nature','Chassis No','required|trim');
       // $this->form_validation->set_rules('v_engine_no', 'Engine No', 'required|trim');
		//$this->form_validation->set_rules('v_manufactured_by','Manufactured By','required|trim');
		//$this->form_validation->set_rules('v_type','invoice Type','required|trim');
		$this->form_validation->set_rules('v_color','invoice Color','required|trim');
		$testxss = xssclean($_POST);
		if($this->form_validation->run()==TRUE && $testxss){
			$response = $this->invoice_model->add_invoice($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New invoice added successfully..');
			    redirect('invoice');
			}
		} else	{
			$errormsg = validation_errors();
			if(!$testxs) {
				$errormsg = 'Error! Your input are not allowed.Please try again';
			}
			$this->session->set_flashdata('warningmessage',$errormsg);
			redirect('invoice/addinvoice');
		}
	}
*/
    
	public function insertinvoice()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('invoice')->where('i_id',$this->input->post('i_id'))->get()->result_array();

//			$exist = $this->db->select('*')->from('invoice')->where('cp_numero',$this->input->post('cp_numero'))->get()->result_array();
                     
                     
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
    
    
/*Fin insert */   
	public function editinvoice()
	{
		$i_id = $this->uri->segment(3);
		$data['v_group'] = $this->invoice_model->get_invoicegroup();
		$data['invoicedetails'] = $this->invoice_model->get_invoicedetails($i_id);
		$this->template->template_render('invoice_add',$data);
	}

	public function updateinvoice()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->invoice_model->edit_invoice($this->input->post());
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
	public function viewinvoice()
	{
		$i_id = $this->uri->segment(3);
		$invoicedetails = $this->invoice_model->get_invoicedetails($i_id);
		$bookings = $this->invoice_model->getall_bookings($i_id);
		$vgeofence = $this->geofence_model->getvechicle_geofence($i_id);
		$vincomexpense = $this->incomexpense_model->getvechicle_incomexpense($i_id);
		$geofence_events = $this->geofence_model->countinvoicengeofence_events($i_id);
		if(isset($invoicedetails[0]['i_id'])) {
			$data['invoicedetails'] = $invoicedetails[0];
			$data['bookings'] = $bookings;
			$data['vechicle_geofence'] = $vgeofence;
			$data['vechicle_incomexpense'] = $vincomexpense;
			$data['geofence_events'] = $geofence_events;
			$this->template->template_render('invoice_view',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}
	public function invoicegroup()
	{
		$data['invoicegroup'] = $this->invoice_model->get_invoicegroup();
		$this->template->template_render('invoice_group',$data);
	}
	public function invoicegroup_delete()
	{
		$gr_id = $this->uri->segment(3);
		$returndata = $this->invoice_model->invoicegroup_delete($gr_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Group deleted successfully..');
			redirect('invoice/invoicegroup');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Some vechicle are mapped with this group. Please remove from vechicle management');
		    redirect('invoice/invoicegroup');
		}
	}
	public function addgroup()
	{
		$response = $this->db->insert('invoice_group',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('invoice/invoicegroup');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('invoice/invoicegroup');
		}
	}
}
