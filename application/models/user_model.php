<?php
class User_model extends CI_Model
{

    public function save($data)
    {
       
        $id = $this->input->post('id');
        // $username = $this->input->post('username');
        // $password = $this->input->post('password');
        // $email = $this->input->post('email');
              
        $data2 = array(

            'username' =>$data['username'],
            'password' =>$data['password'],
            'email' =>$data['email']
                   		
        
        );
        if($id==0){
            $this->db->insert('user',$data2);
    
           }
           else
           {
            $this->db->where('user_id', $id);
            $this->db->update('user', $data2);
        
           }
          
            $response = array(
                'valid' => false,
                'type' => 1,
                'message' => 'Saved Successfully.'
            );
    
            echo json_encode($response);
    
        }    

    
   
    public function delete($id)
    {
        $qry = "delete from user where user_id=$id";
        $this->db->Query($qry);
    }

    public function edit($id)
    {
        $qry = "select * from user where user_id=$id";
        print_r($qry);
        $this->db->Query($qry);
    }

    var $table = "user";
    var $select_column = array("user_id", "	username","password","email");
    var $order_column = array('user_id', "	username","password","email");
    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("user_id", $_POST["search"]["value"]);
            $this->db->or_like("username", $_POST["search"]["value"]);
            $this->db->or_like("email", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('user_id', 'DESC');
        }
    }
    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function getdetails($id){
        $qry = 'SELECT * FROM user as a where user_id='.$id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
}
?>