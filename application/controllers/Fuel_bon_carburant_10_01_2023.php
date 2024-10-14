<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_bon_carburant extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_bon_carburant_model');
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$this->template->template_render('fuel_bon_carburant',$data);
	}
	public function addfuel_bon_carburant()
	{
		$this->load->model('trips_model');
		
		if(isset($_POST['journal_bon_carburant'])) {
			$triplist = $this->fuel_bon_carburant->journal($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
				$data['triplist'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['triplist'] = $triplist;
			}
		}else{
			$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();

		}		
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();	
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant();
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['paiement_fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getpaiement_fuel_bon_carburant();
		$data['paiement_fuel_bon_carburantlist'] = $this->fuel_bon_carburant_model->getallpaiement_fuel_bon_carburant();

		$this->template->template_render('fuel_bon_carburant_add',$data);
	}
	
	public function insertfuel_bon_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
		$bon_carburant = $this->input->post();
		/*echo "quantite=".*/ $bc_quantite = $bon_carburant['bc_quantite'];			
			$response = $this->fuel_bon_carburant_model->add_fuel_bon_carburant($this->input->post());

/* BEGIN */			
	           /*echo "id=". */ $id_bon_carburant = $this->db->insert_id(); //exit;

/*echo "bc_carte_id=".*/ $bc_carte_id = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_carte_id;
			
			
//echo "restant=". $bc_restant = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_restant;
$bc_restant = 0;
/*echo "restant REQUETE=". */$bc_restant = $this->db->select_sum('bc_restant')->from('fuel_bon_carburant')->where('bc_carte_id', $bc_carte_id)->get()->row()->bc_restant;
			
			
/*$this->db->select_sum('bc_restant');
$this->db->select('bc_restant');
$this->db->from('fuel_bon_carburant');
$this->db->where('bc_id', $id_bon_carburant);
$this->db->order_by('price desc');
$this->db->limit(3);
$this->db->get();	*/		
			
			
/*SELECT SUM(column_name)
FROM table_name
WHERE condition;*/			
		//bc_carte_id
$bc_qte_restant = '';
			

	//	$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];			
			
/*echo "bc_restant=".$bc_restant;
echo "bc_quantite=".$bc_quantite;*/
			
$bc_qte_restant = $bc_restant+$bc_quantite;	//exit;		
			
$data_restant = array(
   
   'bc_restant' => $bc_qte_restant
);	 
	 
		$this->db->where('bc_id',$id_bon_carburant);
		        $this->db->update('fuel_bon_carburant',$data_restant); 			
			//exit;
/*$bc_restant = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_restant;*/			

/* END AJOUT */			
			
	$addincome = array('bc_carte_id'=>$this->input->post('bc_carte_id'),'bc_numero'=>$this->input->post('bc_numero'),'bc_vehicule_id'=>$this->input->post('bc_vehicule_id'),'bc_quantite'=>$this->input->post('bc_quantite'),'bc_desc'=>$this->input->post('bc_desc'),'bc_created_date'=>$this->input->post('bc_created_date'));
					$this->db->insert('incomeexpense',$addincome);			
			
			
			if($response) {
/*				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel_bon_carburant - '.$this->input->post('v_fuel_bon_carburantcomments'),'ie_amount'=>$this->input->post('v_fuel_bon_carburantprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}*/
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}
	}

/*BEGIN PAIEMENT*/	
	
	public function insert_paiementfuel_bon_carburant()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
		//$bon_carburant = $this->input->post();
		//$bc_quantite = $bon_carburant['bc_quantite'];			

/*		$role = $this->roles_model->create([
			'ccrp_carte_carburant_id' => $this->input->post('ccrp_carte_carburant_id'),
			'ccrp_bc_id' => $this->input->post('ccrp_bc_id'),
			'ccrp_date' => $this->input->post('ccrp_date'),
		]);*/
			
	
		
		$bon_carburant = $this->input->post();
		//$permissionD = $bon_carburant['permission'];		
		$ccrp_carte_carburant_id = $bon_carburant['ccr_carte_id'];
		$ccrp_date = $bon_carburant['ccrp_date'];
		$ccrp_incomeexpense_id = $bon_carburant['ccr_incomeexpense_id'];
	
		$Data = [];
		//foreach ($permissionD as $permission) {
		//echo $permission;exit();
		foreach ($this->input->post('permission') as $permission) {
			array_push($Data, [
				'ccrp_carte_carburant_id' => $ccrp_carte_carburant_id,
				'ccrp_incomeexpense_id' => $ccrp_incomeexpense_id,
				'ccrp_date' => $ccrp_date,
				'ccrp_bc_id' => $permission,
			]);}//exit;
					$this->db->insert_batch('fuel_carte_carburant_recharge_payments',$Data);
			//exit;
		
	
			//		$pyment = $this->input->post();
		
//		$this->db->insert('fuel_carte_carburant_recharge_payments',$Data);

/* END AJOUT */			
			
	/*$addincome = array('bc_carte_id'=>$this->input->post('bc_carte_id'),'bc_numero'=>$this->input->post('bc_numero'),'bc_vehicule_id'=>$this->input->post('bc_vehicule_id'),'bc_quantite'=>$this->input->post('bc_quantite'),'bc_desc'=>$this->input->post('bc_desc'),'bc_created_date'=>$this->input->post('bc_created_date'));
	
			$this->db->insert('incomeexpense',$addincome);	*/		
		
			if($response) {
/*				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel_bon_carburant - '.$this->input->post('v_fuel_bon_carburantcomments'),'ie_amount'=>$this->input->post('v_fuel_bon_carburantprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}*/
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
/*		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}*/
	}	
/*END PAIEMENT*/	
	
	
	public function editfuel_bon_carburant()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fuel_bon_carburantdetails'] = $this->fuel_bon_carburant_model->editfuel_bon_carburant($f_id);
		$this->template->template_render('fuel_bon_carburant_add',$data);
	}

	public function updatefuel_bon_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_bon_carburant_model->updatefuel_bon_carburant($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('fuel_bon_carburant/addfuel_bon_carburant');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('fuel_bon_carburant/addfuel_bon_carburant');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}
	}
	

	public function journal($from,$to,$v_id) { 
		$fuel_bon_carburant = array();
		if($v_id=='all') {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to);
		} else {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to,'bc_vehicule_id'=>$v_id);
		}
		
		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['bc_vehicule_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['bc_driver_id'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else 
		{
			return array();
		}
	}	
	
/*	public function journal()	{
		if(isset($_POST['bookingreport'])) {
			$triplist = $this->fuel_bon_carburant->journal($this->input->post('booking_from'),$this->input->post('booking_to'),$this->input->post('booking_vechicle'));
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
				$data['triplist'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['triplist'] = $triplist;
			}
		}
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_bon_carburant_add',$data);
	}*/	
	
}
