<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'users');
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
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('user/listall');
		$this->load->view('layout/footer');
	}
	public function create($id=0,$view="")
	{
        $data['id'] = $id;
        $data['option'] = $view;
        $data['view'] = "create";
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('user/create',$data);
		$this->load->view('layout/footer');
	}
    public function view($id = 0,$view="") {
       
        $data['id'] = $id;       
        $data['view'] = "view";
        $this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('user/create',$data);
		$this->load->view('layout/footer');
    }   

	function fetch_user()
	{ 
		 
		$fetch_data = $this->users->make_datatables();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->user_id;
			$sub_array[] = $row->username;
            $sub_array[] = $row->password;
            $sub_array[] = $row->email;
			// $sub_array[] = '<button type="button" name="update" id="' . $row->id . '" class="btn btn-warning btn-xs">Update</button>';
			// $sub_array[] = '<button type="button" name="delete" id="' . $row->id . '" class="btn btn-danger btn-xs">Delete</button>';
            $sub_array[]='<a href="' . base_url() .'user/create/'.$row->user_id .'" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i></a>';
            $sub_array[]='<a href="' . base_url() .'user/view/'.$row->user_id .'"class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
            $sub_array[]='<button onclick="deleteFun('.$row->user_id.')"class="btn btn-danger btn-sm btndelete"><i class="fas fa-trash"></i></button>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->users->get_all_data(),
			"recordsFiltered"     =>     $this->users->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}
	public function save($id = 0)
	{
        $id = $this->input->post('id');
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

		$data = array(
			'username' => $username,
            'password'=>$password,
            'email'=>$email
		);
        return $this->users->save($data, $id);
	
	}

	public function delete()
	{
		$id = $this->input->post('id');
	  // $this->country->delete($id);
	   $dataDelete = $this->users->delete($id);
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

        return $this->users->getdetails($id);
        }
    
}
?>