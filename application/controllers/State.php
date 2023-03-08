<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('State_model','state');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$states=$this->state->get_states();
		$data['state']=$states;
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
		$this->load->view('state/listall',$data);
		$this->load->view('layout/footer');
		
	}
	public function create()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
		$this->load->view('state/create');
		$this->load->view('layout/footer');
		
	}

	public function save($id=0){

		$state = $this->input->post('state'); 

		$data= array(
            'state' =>$state           
        );
		if($id==0){

		 $this->db->insert('state', $data);
		}
		else{

			$this->db->where('id', $id);
            return $this->db->update('state', $data);
		}
		 redirect('State'); 

	}

	public function delete($id) {
         $this->state->delete($id);
		 redirect('State');
		
      }

	  public function edit($id){
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
		$this->load->view('state/edit',$id);
		$this->load->view('layout/footer');
	//return	$this->state->edit($id);
	  }
	
}
?>
