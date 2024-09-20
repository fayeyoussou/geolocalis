<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomexpense_model extends CI_Model{
	
//	public function add_incomexpense($data) { 
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 
	

	public function add_incomexpense_piece_rechange($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 	
	
/*    function create($data){
        if($this->db->insert('meetings', $data))
            return $this->db->insert_id();
        else
            return false; 
    }	
	*/
	
		public function getall_categorie_piece_rechange() { 
		return $this->db->select('*')->from('incomeexpense_categorie_piece_rechange')->get()->result_array();
	} 	
	
	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} 
	
	public function getall_compte() { 
		return $this->db->select('*')->from('incomeexpense_compte')->get()->result_array();
	} 	
	
	public function getall_facture_validee() { //Lister toutes les factures validées
		$t_validation='valide';
		return $this->db->select('*')->from('trips')->where('t_validation',$t_validation)->get()->result_array();
	}	
	
	public function getall_facture_entree() { //Lister toutes les factures validées
		$ie_type='income';
		return $this->db->select('ie_amount')->from('incomeexpense')->where('ie_type',$ie_type)->get()->result_array();

	}

public function getsolde_caisse()	
	{   $caisse = 'CAISSE';
	    $reglement = 'REGLEMENT';
		$where = "ie_type_mouvement='$caisse' || ie_type_mouvement='$reglement'";		
return $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id desc')->limit(1)->get()->row()->ie_solde;		
	}
	
	public function getall_facture_sortie() { //Lister toutes les factures validées
/*SELECT SUM(ie_amount) AS sortie
FROM incomeexpense
WHERE ie_type = "expense"*/

/*$this->db->select_sum('price');
$this->db->select('price');
$this->db->from('items');
$this->db->order_by('price desc');
$this->db->limit(3);
$this->db->get();*/	
		
/* $data=$this->db
    ->select_sum('price')
    ->from('items')
     ->order_by('price desc')
    ->limit(3)
    ->get();
return $data->result_array();*/		
		
		$ie_type='expense';
		return $this->db->select('ie_amount')->from('incomeexpense')->where('ie_type',$ie_type)->get()->result_array();
//return $data->result_array();		
		
	}	
	
	
/**/     public function get_numero_reglement_facture() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('incomeexpense_compteur_reglement_facture');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}	


/**/     public function get_numero_compteur_banque() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('incomeexpense_compteur_banque');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}	
	
/**/     public function get_numero_compteur_caisse() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('incomeexpense_compteur_caisse');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}	
	
    public function getall_incomexpense() { 
		$incomexpense = $this->db->select('*')->from('incomeexpense')->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 

    public function getall_incomexpense_piece_rechange() { 
		
		$piece_rechange=1;
		$where = "ie_piece_rechange='$piece_rechange'";		
		
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();			
				$newincomexpense[$key]['categorie'] =  $this->db->select('icpr_name')->from('incomeexpense_categorie_piece_rechange')->where('icpr_id',$incomexpenses['categorie_piece_rechange_id'])->get()->row();					
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
	
    public function get_incomexpense_reglementfacture() { 
		
		$reglement='REGLEMENT';
		$where = "ie_transitaire_id=tra_id AND ie_type_mouvement='$reglement'";

//		$reglement='REGLEMENT';
//		$incomexpense = $this->db->select('*')->from('incomeexpense,transitaire')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
		$incomexpense = $this->db->select('*')->from('incomeexpense,transitaire')->where($where)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
	
    public function get_incomexpense_banque() { 
		$reglement='BANQUE';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/*			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
*/			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
/* END SHOW BANQUE*/	
	
/*BEGIN SHOW CAISSE*/	
/*	
  public function get_incomexpense_caisse() { 
		$reglement='CAISSE';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 		
*/	
/*END SHOW CAISSE*/	
	
	
	

 	public function get_paymentdetails($t_id) { 
		return $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();
	}	

 	public function get_banquedetails($ieb_id) { 
		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_id',$ieb_id)->get()->result_array();
	}	

	// Show formarding agent list for anvoice
	public function get_facturetransitaire($ie_transitaire_id) { 
		return $this->db->select('*')->from('trips')->where('t_transitaire',$ie_transitaire_id)->get()->result_array();
	}	

	public function get_incomexpensedetails_simple($ie_id) { 
			

		$where = "ie_id='$ie_id'";
		
		return $this->db->select('*')->from('incomeexpense')->where($where)->get()->result_array();

	}	
	
	
	public function get_incomexpensedetails($ie_id) { 
			
	//$where = " ie_banque_emettrice_id=ieb_id OR ie_banque_receptrice_id=ieb_id AND ie_id='$ie_id'";
		$where = "ie_transitaire_id=tra_id AND ie_id='$ie_id'";
		
		return $this->db->select('*')->from('incomeexpense,transitaire')->where($where)->get()->result_array();
/*	

12 08 2022
$where = "ie_transitaire_id='$ie_id'";

		return $this->db->select('*')->from('incomeexpense,transitaire')->where($where)->get()->result_array();
		
*/
		
//		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$ie_id)->get()->result_array();
		
		
//		return $this->db->select('*')->from('incomeexpense,incomeexpense_banque')->where('ie_id',$ie_id)->get()->result_array();
	}
	
	public function get_incomexpensedetails_banque($ie_id) { 
			
	//$where = " ie_banque_emettrice_id=ieb_id OR ie_banque_receptrice_id=ieb_id AND ie_id='$ie_id'";
		$where = "ie_id='$ie_id'"; //12 08 2022

	//	$where = "ie_transitaire_id=tra_id AND ie_id='$ie_id'";
		
		
		return $this->db->select('*')->from('incomeexpense')->where($where)->get()->result_array();
		
//		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$ie_id)->get()->result_array();
		
		
//		return $this->db->select('*')->from('incomeexpense,incomeexpense_banque')->where('ie_id',$ie_id)->get()->result_array();
	}	

	public function get_incomexpensedetails_caisse($ie_id) { 
			
		$where = "ie_id='$ie_id'"; //12 08 2022
		return $this->db->select('*')->from('incomeexpense')->where($where)->get()->result_array();
	}
	
	public function get_incomexpensedetails_caisse_suite($ie_id) { 
			
		//$where = "ioc_ie_id=ie_id AND ioc_id='$ie_id'"; //12 08 2022
		$where = "ioc_ie_id=ie_id AND ioc_id='$ie_id'"; //12 08 2022
		return $this->db->select('*')->from('incomeexpense,incomeexpense_operation_caisse')->where($where)->get()->result_array();
	}	
		
	
	
/*ADD ISSUNG BANK*/	
	
	public function get_incomexpensedetails_banqueemettrice($ie_banque_emettrice_id) { 
			
//	$where = " ie_banque_emettrice_id=ieb_id AND ie_id='$ie_id'";

		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_id',$ie_banque_emettrice_id)->get()->result_array();
//		return $this->db->select('*')->from('incomeexpense,incomeexpense_banque')->where('ie_id',$ie_id)->get()->result_array();
	}	
/*END ISSUNG BANK*/	

/* BENGING receiving bank*/	
	public function get_incomexpensedetails_banquereceptrice($ie_banque_receptrice_id) { 
			
	//$where = " ie_banque_receptrice_id=ieb_id AND ie_id='$ie_id'";

		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_id',$ie_banque_receptrice_id)->get()->result_array();
//		return $this->db->select('*')->from('incomeexpense,incomeexpense_banque')->where('ie_id',$ie_id)->get()->result_array();
	}	

/* END receiving bank*/	
	
	
	public function editincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}
	
	public function editbanqueincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}	
	
	public function updateincomexpense() { 
		$this->db->where('ie_id',$this->input->post('ie_id'));
		return $this->db->update('incomeexpense',$this->input->post());
	}
	public function getvechicle_incomexpense($v_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_v_id',$v_id)->order_by('ie_id','DESC')->get()->result_array();
	} 

  /* debut transitaire*/   
/**/	public function getall_transitairelist() { 
		return $this->db->select('*')->from('transitaire')->get()->result_array();
	}    
 /* Fin transitaire*/	

 function getall_transitairelist_ajax()
 {
/*		return $this->db->select('*')->from('trip_pregate')->get()->result_array();	*/ 
	 
  $this->db->order_by("tra_name", "ASC");
  $query = $this->db->get("transitaire");
  return $query->result();	 
 }	

 function fetch_facture_transitaire($mi_trip_id)
 { 
	//echo "ext";exit; 
	 
   $this->db->where('t_transitaire', $mi_trip_id);

	 
  //$this->db->where('co_trip_id', $mi_trip_id);
  $this->db->order_by('t_id', 'ASC');
  $query = $this->db->get('trips');
  $output = '<option value="">Selectionnez la facture</option>';
  foreach($query->result_array() as $row)
  {
   $output .= '<option value="'.$row['t_id'].'">'.$row['t_num_facture'].'</option>';
  }

	 
  return $output;
 }		
	
	
	
  /* debut transitaire*/   
	public function get_transitairereglement($ie_transitaire_id) { 
		return $this->db->select('tra_name')->from('transitaire')->where('tra_id',$ie_transitaire_id)->order_by('tra_name','ASC')->get()->result_array();
	}    
 /* Fin transitaire*/		
	
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_name','asc')->get()->result_array();
	}	
	
/* DEBUT JOURNAL REGLEMENT*/
	public function journalreglement_facture_reports($from,$to,$facture,$numero,$emettrice,$receptrice,$customer,$transitaire,$reference,$conteneur,$ie_numero) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
$afrom='';
$ato='';
$anumero='';
$aemettrice='';
$areceptrice='';

		$reglement='REGLEMENT';
	$where = "";	
	$where = "ie_type_mouvement='$reglement'";
		
		if($from!=''){
		$afrom=$from;
//		$where=array('ie_date'=>$from);
			$fromif=1;
		}

		if($to!=''){
		$ato=$to;
//		$where=array('ie_date'=>$from,'ie_date'=>$to);
			$toif=1;
		}		
		//$dateif=0;

/*		if(($from!='') || ($to!='')){
	$where .= " AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
	}*/
		
		if(($from!='') AND ($to!='')){
	$where .= " AND ie_date BETWEEN '$from' AND '$to'";		
		}
	//	$numeroif=0;
		if($numero!=''){
			$where .= " AND ie_numero_enregistrement='$numero'";
		}
		//$emettriceif=0;
		if($emettrice!=''){

			$where .= " AND ie_banque_emettrice_id='$emettrice'";
		}
		
		if($receptrice!=''){

			$where .= " AND ie_banque_receptrice_id='$receptrice'";

		}	
		
		
		if($customer!=''){
			$where .= " AND t_customer_id='$customer'";
		}
		
		if($transitaire!=''){
			$where .= " AND ie_transitaire_id='$transitaire'";
		}
		
		if($reference!=''){
			$where .= " AND t_reference='$reference'";
		}
/**/		
		if($conteneur!=''){
			$where .= " AND co_numero_conteneur='$conteneur'";
		}
		
		if($ie_numero!=''){
			$where .= " AND ie_numero='$ie_numero'";
		}		
		
		
		
		
		
		if(($facture!='')){
			
			$where .= " AND ie_id=tp_ie_id AND tp_trip_id='$facture'";
			$incomexpense = $this->db->select('*')->from('incomeexpense,trip_payments')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			
		}else
		{ //exit;
			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			
		}
		
	
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
/* FIN JOURNAL REGLEMENT*/	
	
	

/* DEBUT JOURNAL BANQUE*/
	public function journalbanque_reports($from,$to,$reglement_id,$numero_enregistrement,$emettrice,$compte,$numero) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
$afrom='';
$ato='';
$anumero='';
$aemettrice='';
$areceptrice='';
$numero_enregistrement='';
$emettrice='';
$compte='';
$reglement='';



		$reglement='BANQUE';
	$where = "";	
    	$where= "ie_type_mouvement='$reglement'";//exit;
		
		if($from!=''){
		$afrom=$from;
//		$where=array('ie_date'=>$from);
			$fromif=1;
		}

		if($to!=''){
		$ato=$to;
//		$where=array('ie_date'=>$from,'ie_date'=>$to);
			$toif=1;
		}		
		//$dateif=0;

		if(($from!='') AND ($to!='')){
	$where .= " AND ie_date BETWEEN '$from' AND '$to'";
	//AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
	}	
		if($reglement_id!=''){
			$where .= " AND ie_reglement_id='$reglement_id'";
		}

		$numeroif=0;
		if($numero!=''){

			$where .= " AND ie_numero='$numero'";

		}
		
		if($numero!=''){

			$where .= " AND ie_numero_enregistrement='$numero_enregistrement'";

		}		
		
		$emettriceif=0;
		if($emettrice!=''){
			$where .= " AND ie_banque_emettrice_id='$emettrice'";
		}
		
		if($compte!=''){
			$where .= " AND ie_compte_id='$compte'";
//			$where .= " AND iec_id=ie_compte_id AND ie_compte_id='$compte'";
		}		

		if($reglement_id!=''){
			$where .= " AND ie_reglement_id='$reglement_id'";
		}			


			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
		
		
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['reglement'] =  $this->db->select('ie_numero_enregistrement')->from('incomeexpense')->where('ie_id',$incomexpenses['ie_reglement_id'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
/* FIN JOURNAL BANQUE*/	
	
	
/* DEBUT JOURNAL CAISSE*/
public function 	caisse_reports($from,$to,$facture,$numero,$emettrice,$customer,$transitaire,$reference,$conteneur,$ie_numero) 
	
		{ 

			//$incomeexpensereport = $this->Incomexpense_model->caisse_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_numero_enregistrement'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('t_customer_id'),$this->input->post('t_transitaire'),$this->input->post('t_reference'),$this->input->post('co_numero_conteneur'),$this->input->post('ie_numero')); 
//ie_compte_id		
		
//	public function caisse_facture_reports($from,$to,$facture,$numero,$emettrice,$receptrice,$customer,$transitaire,$reference,$conteneur,$ie_numero) { 
		
		
		//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
$afrom='';
$ato='';
$anumero='';
$aemettrice='';
//$areceptrice='';

//	$reglement="CAISSE";
	$where = "";	
//	$where = "ie_type_mouvement='$reglement'";
	
	
			$ie_type_mouvement="CAISSE";
//			$where= "ie_type_mouvement='CAISSE'";
			$where= "ie_type_mouvement='$ie_type_mouvement'";//exit;
		
		if($from!=''){
		$afrom=$from;
//		$where=array('ie_date'=>$from);
			$fromif=1;
		}

		if($to!=''){
		$ato=$to;
//		$where=array('ie_date'=>$from,'ie_date'=>$to);
			$toif=1;
		}		
		//$dateif=0;

		if(($from!='') AND ($to!='')){
	$where .= " AND ie_date BETWEEN '$from' AND '$to'";
	//AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
	}	

	//	$numeroif=0;
		if($numero!=''){
			$where .= " AND ie_numero_enregistrement='$numero'";
		}

	if($emettrice!=''){

			$where .= " AND ie_banque_emettrice_id='$emettrice'";
		}
		
		if($ie_numero!=''){
			$where .= " AND ie_numero='$ie_numero'";
		}
	
			if($transitaire!=''){
			$where .= " AND ie_transitaire_id='$transitaire'";
		}

	if($emettrice!=''){

			$where .= " AND ie_banque_emettrice_id='$emettrice'";
		}
		
		if($customer!=''){
			$where .= " AND t_customer_id='$customer'";
		}
	
	if($facture!=''){

			$where .= " AND tp_trip_id='$facture'";
		}
		
		if($reference!=''){
			$where .= " AND t_reference='$reference'";
		}	
	
		if(($facture!='') || ($customer!='') || ($conteneur!='') || ($reference!=''))
		{
			
			$where .= " AND ie_ieb_id=t_id"; //exit;
			$incomexpense = $this->db->select('*')->from('incomeexpense,trips')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			
		}else
		{
			//echo $where;//exit;
			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;			
		}
	


		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

/*				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();*/// pour afficher les noms des banques receptrices
				
				$newincomexpense[$key]['ie_tansitaire'] =  $this->db->select('tra_name')->from('transitaire')->where('tra_id',$incomexpenses['ie_transitaire_id'])->get()->row();// pour afficher les noms des banques receptrices
			
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
	
/*FIN JOURNAL CAISSE*/	
	
	
	public function incomexpense_reports($from,$to,$facture) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
		
		if($facture=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_ieb_id'=>$facture);
		}
		
		
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}

/* DEBUT DETAILS DEPENSE CAISSE*/	
    	public function get_depensecaissedetails($t_id) { 

//ie_id,ioc_designation,ioc_type,ie_type,ie_amount,ioc_id,ioc_amount,iec_name,iec_code')
			
/*		$requete= "iec_id=ioc_compte_id AND ie_id=ioc_ie_id AND ioc_ie_id='$t_id'";
  		$conteneur =  $this->db->select('*')->from('incomeexpense,incomeexpense_operation_caisse,incomeexpense_compte')->where($requete)->get()->result_array();*/

		$requete= "ie_id=ioc_ie_id AND ioc_ie_id='$t_id'";
  		$conteneur =  $this->db->select('*')->from('incomeexpense,incomeexpense_operation_caisse')->where($requete)->get()->result_array();			
			
		if(!empty($conteneur)) {
			//exit;
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['compte'] =  $this->db->select('*')->from('incomeexpense_compte')->where('iec_id',$conteneurs['ioc_compte_id'])->get()->row();                
 
				$newconteneur[$key]['incomeexpense'] =  $this->db->select('*')->from('incomeexpense')->where('ie_id',$conteneurs['ioc_ie_id'])->get()->row(); 
		
			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/  	
/*FIN DETAILS DEPENSE CAISSE*/
	
/* DEBUT DETAILS DEPENSE CAISSE SUITE*/	
    	public function get_depensecaisse_suitedetails($t_id) { 

		$requete= " ioc_caisse_id=$t_id";
  		$conteneur =  $this->db->select('*')->from('incomeexpense_operation_caisse')->where($requete)->get()->result_array();			
		/*$requete= "ie_id=ioc_ie_id AND ioc_ie_id='$t_id'";
  		$conteneur =  $this->db->select('*')->from('incomeexpense,incomeexpense_operation_caisse')->where($requete)->get()->result_array();	*/		
		if(!empty($conteneur)) {
			//exit;
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['compte'] =  $this->db->select('*')->from('incomeexpense_compte')->where('iec_id',$conteneurs['ioc_compte_id'])->get()->row();                
 
				$newconteneur[$key]['incomeexpense'] =  $this->db->select('*')->from('incomeexpense')->where('ie_id',$conteneurs['ioc_ie_id'])->get()->row(); 
		
			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/  	
/*FIN DETAILS DEPENSE CAISSE SUITE*/	

	
	
    	public function get_paiementdetails($t_id) { 
		//$conteneur =  $this->db->select('*')->from('trip_payments')->get()->result_array();
 // 		$conteneur =  $this->db->select('*')->from('trips,trip_payments')->where('tp_ie_id',$t_id)->get()->result_array();

			$requete= "t_id=tp_trip_id AND tp_ie_id='$t_id'";
  		$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount,tp_id')->from('trips,trip_payments')->where($requete)->get()->result_array();
			
			
			//		$conteneur =  $this->db->select('*')->from('trip_payments')->where('tp_ie_id',$t_id)->get()->result_array();
		if(!empty($conteneur)) {
			//exit;
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
                
				$newconteneur[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$conteneurs['tp_ie_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newconteneur[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$conteneurs['tp_ie_id'])->get()->row();// pour afficher les noms des banques receptrices				
 					
/*				$tp_trip_id=$conteneurs['tp_trip_id'];
				$customer_id=$conteneurs['t_customer_id'];
				
				$where = "
				t_customer_id=customer_id AND t_transitaire=tra_id AND t_id='$tp_trip_id' AND ie_id=tp_ie_id AND customer_id='$customer_id'";
				
				$newconteneur[$key]['facture_name'] =  $this->db->select('t_id,t_trip_amount,c_name,tra_name,t_num_facture,t_type_facturation')->from('trips,customers,transitaire')->where($where)->get()->row();  
				
				->group by('tp_id')
				*/
				
/*				$newconteneur[$key]['facture_name'] =  $this->db->select('t_id,t_trip_amount,c_name,tra_name,t_num_facture,t_type_facturation')->from('trips,customers,transitaire')->where('t_id',$conteneurs['tp_trip_id'],'customer_id',$conteneurs['t_customer_id'])->get()->row(); */
					//$newconteneur[$key]['facture_name'] =  $this->db->select('t_id,t_trip_amount,c_name,tra_name,t_num_facture,t_type_facturation')->from('trips,customers,transitaire')->where('t_id',$conteneurs['tp_trip_id'])->get()->row(); 		
				
				$newconteneur[$key]['transitaire'] =  $this->db->select('*')->from('transitaire')->where('tra_id',$conteneurs['t_transitaire'])->get()->row();                

				$newconteneur[$key]['client'] =  $this->db->select('*')->from('customers')->where('c_id',$conteneurs['t_customer_id'])->get()->row();                
 
				$newconteneur[$key]['facture'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['t_id'])->get()->row();  /**/				
				

/*			$newconteneur[$key]['facture_name'] =  $this->db->select('t_id,t_trip_amount,c_name,tra_name,t_num_facture,t_type_facturation')->from('trips')->where('t_id',$conteneurs['tp_trip_id'])->get()->row(); 				
*/					
			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/   	

	
//    	public function get_conteneurdetails($t_id) { 
//    	public function get_trip_paymentsdetails($t_id) { 
    	public function get_conteneurdetails($t_id) { 
		$conteneur =  $this->db->select('*')->from('incomeexpense')->get()->result_array();
//		$conteneur =  $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();
 		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
/*				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$conteneurs['co_nature'])->get()->row();
                
//				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['co_trip_id'])->get()->row();                
				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['tp_ie_id'])->get()->row();                
                
				$newconteneur[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$conteneurs['co_zone'])->get()->row();                

				$newconteneur[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$conteneurs['co_zone'])->get()->row();                
 
				$newconteneur[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$conteneurs['co_zone'])->get()->row();                  
       */         

			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/	
	
/* DEBUT BANQUE*/
	
	public function getall_reglement() { 
		$ie_type_mouvement="REGLEMENT";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";
  		//$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount')->from('trips,trip_payments')->where($requete)->get()->result_array();	->where($requete)	
		
//		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
		return $this->db->select('*')->from('incomeexpense')->where($requete)->get()->result_array();	
	}	
	
/* a la demande de Mme DIAYE, ce 1erjuillet 2022

public function getall_banque() { 
		$ie_type_mouvement="BANQUE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";
		return $this->db->select('*')->from('incomeexpense')->where($requete)->get()->result_array();
	}*/
	
	
	public function getall_banque() { 
/* a la demande de Mme DIAYE, ce 1erjuillet 2022

$ie_type_mouvement="BANQUE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";*/
		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
	}	
	
	public function getall_caisse() { 
		$ie_type_mouvement="CAISSE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";
  		//$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount')->from('trips,trip_payments')->where($requete)->get()->result_array();	->where($requete)	
		
//		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
		return $this->db->select('*')->from('incomeexpense')->where($requete)->get()->result_array();	}	
	
	public function incomexpense_banque_reports($from,$to,$facture) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
		
		if($facture=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_ieb_id'=>$facture);
		}
		
		
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	

	
/*DEBUT ALIMENTATION CAISSE*/
    public function get_incomexpense_alimentation_caisse() { 

		
	
		$ie_type_mouvement="CAISSE";
		$ie_espece_cheque="ESPECE";
		$ie_type="income";
			$requete= "ie_type_mouvement='$ie_type_mouvement' AND ie_espece_cheque='$ie_espece_cheque' AND ie_type='$ie_type'";

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($requete)->order_by('ie_id','desc')->get()->result_array();	
		
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['ie_tansitaire'] =  $this->db->select('tra_name')->from('transitaire')->where('tra_id',$incomexpenses['ie_transitaire_id'])->get()->row();// pour afficher les noms des banques receptrices

				
				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
/*FIN ALIMENTATION CAISSE*/	
	
	
/*DEBUT DEPENSES CAISSE JOURNALIERE*/
    public function get_incomexpense_depense_caisse() { 

		
	
		$ie_type_mouvement="CAISSE";
		$ie_espece_cheque="ESPECE";
		$ie_type="expense";
			$requete= "ie_type_mouvement='$ie_type_mouvement' AND ie_espece_cheque='$ie_espece_cheque' AND ie_type='$ie_type'";

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($requete)->order_by('ie_id','desc')->get()->result_array();	
		
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['ie_tansitaire'] =  $this->db->select('tra_name')->from('transitaire')->where('tra_id',$incomexpenses['ie_transitaire_id'])->get()->row();// pour afficher les noms des banques receptrices

				
				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
	
/*FIN BANQUE*/	
/*FIN DEPENSES CAISSE JOURNALIERES*/	
	
	
    public function get_incomexpense_caisse() { 
/*		$reglement='CAISSE';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();*/
		
	
		$ie_type_mouvement="CAISSE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($requete)->get()->result_array();	
		
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['ie_tansitaire'] =  $this->db->select('tra_name')->from('transitaire')->where('tra_id',$incomexpenses['ie_transitaire_id'])->get()->row();// pour afficher les noms des banques receptrices

				
				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	
	
/*FIN BANQUE*/	
	

  function fetch_transitaire($ie_compte_id)
 { 
	 
	 $query = $this->db->get('transitaire');
	 

	  $output = '<option value="">Selectionnez le transitaire</option>';
 foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->tra_id.'">'.$row->tra_name.'</option>';
  }
  return $output;
 //}
} 
	// END fetch_transitaire 

	
 function fetch_bon_carburant($mi_vehicle_id)
 { 
//  $this->db->where('bc_vehicule_id', $mi_vehicle_id);
//  $this->db->order_by('bc_id', 'ASC');
  $query = $this->db->get('trips');
  $output = '<option value="">le bon de carburant</option>';
  foreach($query->result() as $row)
  {
 //  $output .= '<option value="'.$row->bc_id.'">'.$row->bc_numero.' - Quantité: '.$row->bc_restant.'</option>';
   $output .= '<option value="'.$row->t_id.'">'.$row->t_num_facture.' - Type: '.$row->t_type_facturation.'</option>';
  }
  return $output;
 }	
	
 function fetch_ristourne($ie_transitaire_id)
 { 
  //$this->db->where('t_transitaire', $ie_transitaire_id);
  //$this->db->order_by('t_id', 'ASC');
  $query = $this->db->get('trips');
  $output = '<option value="">la facture</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->t_id.'">'.$row->t_num_facture.' - Type: '.$row->t_type_facturation.'</option>';
  }
  return $output;
 }	
	
	 
} 