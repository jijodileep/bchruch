<?php
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->database();  
    }




    public function login($data)
    {

        $email = $data['email'];
        $query = "select user_id,username,password,email from user where email='$email'";
        $dat = $this->db->query($query);
        // $rows=$dat->num_rows();
        if ($dat->num_rows() == 1) {
            return (1);
        } else {
            return (0);

        }



    }

    // Read data from database to show data in admin page
    public function read_user_information($usrname)
    {
        $query = "select user_id,username,password,email from user where email='$usrname'";
        $dat = $this->db->query($query);
       return $dat;
       


    }



}

?>