<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('country_model', 'country');
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

		$states = $this->country->getcountry();
		$data['country'] = $states;
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('country/listall', $data);
		$this->load->view('layout/footer');
	}
	public function create($id=0,$view="")
	{
        $data['id'] = $id;
        $data['option'] = $view;
        $data['view'] = "create";
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('country/create',$data);
		$this->load->view('layout/footer');
	}
    public function view($id = 0,$view="") {
       
        $data['id'] = $id;       
        $data['view'] = "view";
        $this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('country/create',$data);
		$this->load->view('layout/footer');
    }   

	function fetch_user()
	{ 
		 
		$fetch_data = $this->country->make_datatables();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->id;
			$sub_array[] = $row->country;
			// $sub_array[] = '<button type="button" name="update" id="' . $row->id . '" class="btn btn-warning btn-xs">Update</button>';
			// $sub_array[] = '<button type="button" name="delete" id="' . $row->id . '" class="btn btn-danger btn-xs">Delete</button>';
            $sub_array[]='<a href="' . base_url() .'country/create/'.$row->id .'" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i></a>';
            $sub_array[]='<a href="' . base_url() .'country/view/'.$row->id .'"class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
            $sub_array[]='<button onclick="deleteFun('.$row->id.')"class="btn btn-danger btn-sm btndelete"><i class="fas fa-trash"></i></button>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->country->get_all_data(),
			"recordsFiltered"     =>     $this->country->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}
	public function save($id = 0)
	{
        $id = $this->input->post('id');
		$country = $this->input->post('country');

		$data = array(
			'country' => $country
		);
        return $this->country->save($data, $id);
	
	}

	public function delete()
	{
		$id = $this->input->post('id');
	  // $this->country->delete($id);
	   $dataDelete = $this->country->delete($id);
	  // print_r($dataDelete);
		if($dataDelete==true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	  
	}

	

    public function getdetails($id) {

        return $this->country->getdetails($id);
        }
    
}
?>