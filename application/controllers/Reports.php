<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller {
	function __construct()   {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
          $this->load->model('vehicle_model');
          $this->load->model('incomexpense_model');
           $this->load->model('fuel_bon_carburant_model');
         $this->load->model('fuel_model');
          $this->load->model('trips_model');
          $this->load->model('mission_model');
          $this->load->library('session');
}
	public function validation()	{


		
			$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_non_valide();
		
			$data['fuel_bon_carburant_tab_paiement_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_paiement_non_valide();
		
		$data['validation_missionlist'] = $this->mission_model->get_demande_annulationlist();
		$this->template->template_render('report_validation',$data);
	}
	
	
	public function bon_carburant()	{
		
			$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_non_valide();
			$data['list_fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_list_manager();
		
			$data['fuel_bon_carburant_tab_paiement_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_paiement_non_valide();
		
			$data['validation_missionlist'] = $this->mission_model->get_demande_annulationlist();

		
/*DEBUT JOURNAL*/
				if(isset($_POST['journal_bon_carburant'])) {
			$data['fuel_bon_carburant_tab_journal_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_journal_list_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));//exit;

		}			
			else{
		
			$data['fuel_bon_carburant_tab_journal_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_journal_list();
	}
/*FIN JOURNAL*/		
		
		
		
		$this->template->template_render('report_bon_carburant',$data);
	}	
	
	public function mission()	{

			$data['mission'] = $this->mission_model->getall_mission_non_valide();
		
			$data['fuel_bon_carburant_tab_paiement_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_paiement_non_valide();
		
		$data['validation_missionlist'] = $this->mission_model->get_demande_annulationlist();
		
		$data['mission_validee'] = $this->mission_model->getall_mission_validee();	
		
		
		
		$this->template->template_render('report_mission',$data);
	}	
	
	public function booking()	{
		if(isset($_POST['bookingreport'])) {
			$triplist = $this->trips_model->trip_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
				$data['triplist'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['triplist'] = $triplist;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_booking',$data);
	}	
	
	
	public function incomeexpense()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_incomeexpense',$data);
	}
	
	
	public function fuels()	{
		if(isset($_POST['fuelreport'])) {
			$fuelreport = $this->fuel_model->fuel_reports($this->input->post('fuel_from'),$this->input->post('fuel_to'),$this->input->post('fuel_vechicle'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['fuel'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['fuel'] = $fuelreport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_fuel',$data);
	}
	
	
	public function fuel_peage()	{
		if(isset($_POST['fuelreport'])) {
			$fuelreport = $this->fuel_model->fuel_reports($this->input->post('fuel_from'),$this->input->post('fuel_to'),$this->input->post('fuel_vechicle'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['fuel'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['fuel'] = $fuelreport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_fuel_peage',$data);
	}
	
/*BEGIN AGS*/
	public function ags()	{
		if(isset($_POST['fuelreport'])) {
			$fuelreport = $this->mission_model->ags_reports($this->input->post('fuel_from'),$this->input->post('fuel_to'),$this->input->post('fuel_vechicle'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['fuel'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['fuel'] = $fuelreport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_ags',$data);
	}	
/*END AGS*/	
	
}
