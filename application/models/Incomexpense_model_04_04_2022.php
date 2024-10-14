<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomexpense_model extends CI_Model{
	
//	public function add_incomexpense($data) { 
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 
	
/*    function create($data){
        if($this->db->insert('meetings', $data))
            return $this->db->insert_id();
        else
            return false; 
    }	
	*/
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
	
	public function get_incomexpensedetails($ie_id) { 
			
	//$where = " ie_banque_emettrice_id=ieb_id OR ie_banque_receptrice_id=ieb_id AND ie_id='$ie_id'";
		$where = "ie_transitaire_id=tra_id AND ie_id='$ie_id'";

		return $this->db->select('*')->from('incomeexpense,transitaire')->where($where)->get()->result_array();
		
//		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$ie_id)->get()->result_array();
		
		
//		return $this->db->select('*')->from('incomeexpense,incomeexpense_banque')->where('ie_id',$ie_id)->get()->result_array();
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
	public function getall_transitairelist() { 
		return $this->db->select('*')->from('transitaire')->get()->result_array();
	}    
 /* Fin transitaire*/	

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

		if(($from!='') || ($to!='')){
	$where .= " AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
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
			$where .= " AND t_transitaire='$transitaire'";
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
		$dateif=0;

		if(($from!='') || ($to!='')){
	$where .= " AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
	}	
		
/*		if($facture!=''){
		$afacture=array('ie_date>='=>$facture);
//			$fromif=1;
		}*/
		$numeroif=0;
		if($numero!=''){

			$where .= " AND ie_numero='$numero'";

		}
		
		if($numero!=''){

			$where .= " AND ie_numero_enregistrement='$numero_enregistrement'";

		}		
		
		$emettriceif=0;
		if($emettrice!=''){
/*		$aemettrice=$emettrice;
		
			if(($dateif==1) ||($numeroif==1)) {*/
			$where .= " AND ie_banque_emettrice_id='$emettrice'";
/*			}else{
			$where = "ie_banque_emettrice_id='$emettrice'";
				}						   
						   $emettriceif=1;*/
		}
		
		if($compte!=''){
			$where .= " AND ie_compte_id='$compte'";
//			$where .= " AND iec_id=ie_compte_id AND ie_compte_id='$compte'";
		}		

		if($reglement_id!=''){
			$where .= " AND ie_reglement_id='$reglement_id'";
		}			

/*		if($compte!=''){
			$incomexpense = $this->db->select('*')->from('incomeexpense,incomeexpense_compte')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			}else{*/
			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
	/*	}*/
		
		
//	}
		
		

		
		
		
//$where = array('ie_date>='=>$from,'ie_date<='=>$to);		
/*    $incomexpense = $this->db->select ('*'); 
    $this->db->from ('incomeexpense');
	$this->db->where($where);
	 $this->db->order_by('ie_id','desc')->get()->result_array();	*/	
		
/*$where = array('ie_date>='=>$from,'ie_date<='=>$to);		
    $incomexpense = $this->db->select ( '*' ); 
    $this->db->from ( 'incomeexpense' );
	$this->db->where($where);
	$this->db->order_by('ie_id','desc')->get()->result_array();	*/
/*    $this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
    $this->db->join ( 'Soundtrack', 'Soundtrack.album_id = Album.album_id' , 'left' );
    $query = $this->db->get ();	*/	//$where = "ie_date>='$from' AND ie_date<='$to' AND ie_numero_enregistrement='$numero' AND ie_banque_emettrice_id='$emettrice' AND ie_banque_receptrice_id='$receptrice'";
		
/*		if($facture=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_ieb_id'=>$facture);
		}*/
		
//$where = array_merge($afrom,$ato,$anumero,$aemettrice,$areceptrice);
//$where = $afrom + $ato + $anumero + $aemettrice + $areceptrice;
	
/*    $this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
    $this->db->join ( 'Soundtrack', 'Soundtrack.album_id = Album.album_id' , 'left' );
    $query = $this->db->get ();	*/	
		
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
	public function caisse_facture_reports($from,$to,$facture,$numero,$emettrice,$receptrice,$customer,$transitaire,$reference,$conteneur,$ie_numero) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
$afrom='';
$ato='';
$anumero='';
$aemettrice='';
$areceptrice='';

		$reglement='CAISSE';
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

		if(($from!='') || ($to!='')){
	$where .= " AND ie_date>='$from' || ie_date<='$to'";
	//	$dateif=1;
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
		
		if($ie_numero!=''){
			$where .= " AND ie_numero='$ie_numero'";
		}		
		
	

			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;

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

	
    	public function get_paiementdetails($t_id) { 
		//$conteneur =  $this->db->select('*')->from('trip_payments')->get()->result_array();
 // 		$conteneur =  $this->db->select('*')->from('trips,trip_payments')->where('tp_ie_id',$t_id)->get()->result_array();

			$requete= "t_id=tp_trip_id AND tp_ie_id='$t_id'";
  		$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount')->from('trips,trip_payments')->where($requete)->get()->result_array();
			
			
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
		
		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
	}	
	
	public function getall_banque() { 
		$ie_type_mouvement="BANQUE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";
  		//$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount')->from('trips,trip_payments')->where($requete)->get()->result_array();	->where($requete)	
		
		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
	}
	
	public function getall_caisse() { 
		$ie_type_mouvement="CAISSE";
			$requete= "ie_type_mouvement='$ie_type_mouvement'";
  		//$conteneur =  $this->db->select('t_id,t_trip_amount,t_num_facture,tp_ie_id,tp_trip_id,t_num_facture,t_type_facturation,tp_type,t_transitaire,t_customer_id,tp_amount')->from('trips,trip_payments')->where($requete)->get()->result_array();	->where($requete)	
		
		return $this->db->select('*')->from('incomeexpense')->get()->result_array();
	}	
	
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
	
    public function get_incomexpense_caisse() { 
		$reglement='CAISSE';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
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
			return false;
		}
	} 	
	
/*FIN BANQUE*/	
	

} 