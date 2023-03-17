<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('login_model', 'loginmodel');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        //$this->load->helper(array('url', 'html', 'form'));
        //$this->user_id = $this->session->userdata('user_id');
    }
    // public function index()
    // {

    //     $this->load->view('login/login');
    // }
    // public function post_login()
    // {


    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');
    //     $user = $this->db->get_where('user', ['email' => $email])->row();


    //     if (!$user) {
    //         $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
    //        //redirect(uri_string());
    //     }


    //     if (!password_verify($password, $user->password)) {
    //         $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
    //        //redirect(uri_string());
    //     }

    //     $data = array(
    //         'user_id' => $user->user_id,
    //         'username' => $user->username,
    //         'password' => $user->password,
    //         'email' => $user->email,
    //     );


    //     $this->session->set_userdata($data);

    //     //redirect(base_url('home'));
    //     echo 'Login success!'; exit;

    // }




    public function index()
    {
        /*Load the login screen, if the user is not log in*/
        if (isset($_SESSION['login']['email'])) {
            /*check the session of user, if it is available, it means the user is already log in*/
            $this->load->view('home');
        } else {
            /*if not, display the login window*/
            $this->load->view('login/login');
        }
    }



    public function user_login_process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'email' => $email,
            'password' => $password

        );
        //print_r($data);

        $results = $this->loginmodel->login($data);
        //print_r($result);
        if ($results == 1) {
            $usrname = $this->input->post('email');
            $result = $this->loginmodel->read_user_information($usrname);
           
            if($result->num_rows() > 0){
                $result = $result->row_array();
               $userid= $result['user_id'];
               $username=$result['username'];
               $uemail=$result['email'];
                
               $session_data = array(
                'user_id'=>$userid,
                'username' =>$username,
                'email' =>$uemail,
                );
                //print_r($session_data);
                $this->session->set_userdata('logged_in', $session_data);
                print_r(1);
                // $this->load->view('home/index');
            }else {

                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );    
    
                $this->load->view('login/login', $data);   
                print_r(0);
            }
            
           
        } 
        else {

            $data = array(
                'error_message' => 'Invalid Username or Password'
            );    

            $this->load->view('login/login', $data);   
            print_r(0);
        }

       
    }
    public function logout()
    {

        // Removing session data
        $sess_array = array(
            'email' => '',
            
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login/login', $data);
    }

}