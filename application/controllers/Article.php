<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('article_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['articlelist'] = $this->article_model->getall_article();
		$this->template->template_render('article_management',$data);
	}
	public function addarticle()
	{
		$this->template->template_render('article_add');
	}
	public function insertarticle()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('trip_article')->where('art_name',$this->input->post('art_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->article_model->add_article($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New article added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un article du même nom existe déjà.');
			}
			redirect('article');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('article');
		}
	}
	public function editarticle()
	{
		$c_id = $this->uri->segment(3);
		$data['articledetails'] = $this->article_model->get_articledetails($c_id);
		$this->template->template_render('article_add',$data);
	}

	public function updatearticle()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->article_model->update_article($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'article modifiée avec succés..');
				    redirect('article');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('article');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('article');
		}
	}
    
/*Debut supp article*/    
	public function article_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trip_article', array('art_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'article supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! article non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('article');
	}    
/* Fin supp article*/     
    
    
    
}
