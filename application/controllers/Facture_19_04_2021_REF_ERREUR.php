<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class facture extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('facture_model');
          $this->load->model('customer_model');	
          $this->load->model('drivers_model');	
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['facturelist'] = $this->facture_model->getall_facture();
		$this->template->template_render('facture_management',$data);
	}
	public function addfacture()
	{
		$data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();
		$data['zonelist'] = $this->facture_model->getall_zonelist();   //ajouter
		$data['transitairelist'] = $this->facture_model->getall_transitairelist(); //ajouter
		$this->template->template_render('facture_add',$data);
	}
	public function insertfacture() 
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->facture_model->add_facture($this->input->post());
			$bookingemail = $this->input->post('bookingemail');
			if(isset($bookingemail)) {
				$this->sendfactureemail($this->input->post());
			}
			if($response) {
				$this->session->set_flashdata('successmessage', 'New facture added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('facture');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('facture');
		}
	}
	public function editfacture()
	{
		$data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();
		$t_id = $this->uri->segment(3);
		$data['facturedetails'] = $this->facture_model->get_facturedetails($t_id);
		$data['zonelist'] = $this->facture_model->getall_zonelist();
		$data['transitairelist'] = $this->facture_model->getall_transitairelist(); //ajouter
		
		$this->template->template_render('facture_add',$data);
	}

	public function updatefacture()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->facture_model->update_facture($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New facture added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('facture');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('facture');
		}
	}
	public function details()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($facturedetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
			$data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		$this->template->template_render('facture_details',$data);
	}
	public function facture_generation()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($facturedetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['t_driver']);
/* debut zone*/
            
			$zonedetails = $this->zone_model->get_zonedetails($facturedetails[0]['t_zone']);
			$transitairedetails = $this->transitaire_model->get_transitairedetails($facturedetails[0]['t_transitaire']);
/* debut zone*/
            
            
            
            $data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
			$data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
/* debut zone*/
            $data['zonedetails'] =  (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
            $data['transitairedetails'] =  (isset($transitairedetails[0]['t_id']))?$zonedetails[0]:'';
/* Fin zone*/
        }
		$this->load->view('facture_generation',$data);
	}
	public function facturepayment()
	{
		$pyment = $this->input->post();
		$this->db->insert('facture_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from facture and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('facture/details/'.$pyment['tp_facture_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('facture/details/'.$pyment['tp_facture_id']);
		}
	}
	public function facturepayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('facture_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$this->uri->segment(4));
	}
	public function addfactureexpense() 	{
		$addfactureexpense = $this->input->post();
		$facture_id = $addfactureexpense['addfactureexpense_facture_id'];
		unset($addfactureexpense['addfactureexpense_facture_id']);
		$response =  $this->db->insert('incomeexpense',$addfactureexpense);
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$facture_id);
	}
	public function sendfactureemail($data) {
		$this->load->model('email_model');	
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$value = '<b>facture Details :</b><br><br> '.$data['t_trip_fromlocation']. ' <br><b>to</b><br> ' . $data['t_trip_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
			$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email;
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
		}
	}
	public function sendtracking() {
		$this->load->model('email_model');
		$custemail = urldecode($_GET['email']);
		$url = base_url().'facturetracking/'.$_GET['trackingcode'];
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
			redirect('facture/details/'.$_GET['t_id']);
		}
	}
}
