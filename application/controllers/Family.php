<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Family extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('family_model', 'family');
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

        $family = $this->family->getfamily();
        $data['family'] = $family;
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('family/listall', $data);
        $this->load->view('layout/footer');
    }
    public function create($id = 0,$fid=0, $view = "")
    {
        $data['id'] = $id;
        $data['fid'] = $fid;
        $data['option'] = $view;
        $data['view'] = "create";
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('family/create', $data);
        $this->load->view('layout/footer');
    }   

    public function view($id = 0,$fid=0, $view = "")
    {

        $data['id'] = $id;
        $data['fid'] = $fid;
        $data['view'] = "view";
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('family/create', $data);
        $this->load->view('layout/footer');
    }
    public function family_view($id = 0,$fid=0, $view = "")
    {

        $data['id'] = $id;
        $data['fid'] = $fid;
        $data['view'] = "view";
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('family/family_view', $data);
        $this->load->view('layout/footer');

    }

   
    function fetch_user()
    {

        $fetch_data = $this->family->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();

            $sub_array[] = $row->family_id;
            $sub_array[] = $row->house_name;
            $sub_array[] = $row->parish_name;

            // $sub_array[] = '<button type="button" name="update" id="' . $row->id . '" class="btn btn-warning btn-xs">Update</button>';
            // $sub_array[] = '<button type="button" name="delete" id="' . $row->id . '" class="btn btn-danger btn-xs">Delete</button>';
            $sub_array[] = '<a href="' . base_url() .'familymembers/index/' . $row->family_id . '"  class="btn btn-sm btn-primary">Add members</a>';
            $sub_array[] = '<a href="' . base_url() .'family/create/' . $row->family_id . '" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i></a>';
            $sub_array[] = '<a href="' . base_url() .'family/family_view/' . $row->family_id . '"class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
            $sub_array[] = '<button onclick="deleteFun('.$row->family_id.')"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->family->get_all_data(),
            "recordsFiltered" => $this->family->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function save()
    {
        $pic_file = "noimage";
        print_r($_FILES['file']);
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];

            $type = 'image';
            //upload file  
            $fileid = 'file';
            $new_name = time() . str_replace(' ', '_', $_FILES['file']['name']);
            $_FILES['file']['name'] = $new_name;
            $imgname[0] = $new_name;
            $pic_file = $new_name;
            $this->itemuploads($file, $type, $fileid);
            $fileid = 'file';
            print_r($new_name);
        } else {
            $picture = '';
        }

        $id = $this->input->post('id');
        $fid = $this->input->post('fid');

        $membername = $this->input->post('membername');
        $dependency = $this->input->post('dependency');
        $designation = $this->input->post('designation');
        $bloodgroup = $this->input->post('bloodgroup');
        $dob = $this->input->post('dob');
        $emailid = $this->input->post('emailid');
        $contactno = $this->input->post('contactno');
        $whtasapp = $this->input->post('whattsapp');
        $cprno = $this->input->post('cprno');
       
        $data4 = array(

            'fname' => $membername,
            'date_of_birth' => $dob,
            'cpr_no' => $cprno,
            'dependency' => $dependency,
            'photo' => $pic_file,
            'designation'=>$designation,
            'bloodgroup'=>$bloodgroup,
            'contact_no'=>$contactno,
            'whatsapp'=>$whtasapp,
            'emailid'=>$emailid
           
        );
        print_r($data4);

        return $this->family->save($data4, $id,$fid);

    }

    public function saveprofile()
    {

        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $type = 'image';
            //upload file  
            $fileid = 'document';

            $new_name = time() . str_replace(' ', '_', $_FILES['file']['name']);
            $_FILES['file']['name'] = $new_name;
            $imgname[0] = $new_name;
            $this->itemuploads($file, $type, $fileid);
            $fileid = 'file';
            print_r($new_name);
        } else {
            print_r('');
        }
    }

    function itemuploads($file, $type, $fileid)
    {

        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['max_size'] = '6024'; //1 MB
        $this->load->library('upload', $config);
        $this->upload->do_upload($fileid);
    }

    public function delete($id)
    {
        $id = $this->input->post('id');
       // $this->family->delete($id);
        $dataDelete =  $this->family->delete($id);
        
          if($dataDelete==true)
          {
              echo 1;
          }
          else
          {
              echo 2;
          }
    }

    public function getdetails($id)
    {

        return $this->family->getdetails($id);
    }

    public function getfamilyview($id){
        return $this->family->getfamilyview($id);
    }
    public function getfamilymembers($id){
        return $this->family->getfamilymembers($id);
    }
    
    public function getcountry()
    {
        return $this->family->getcountry();
    }

    public function getdependency()
    {
        return $this->family->getdependency();
    }

}
?>