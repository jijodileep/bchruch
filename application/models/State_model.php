<?php
class State_model extends CI_Model {

    // public function get_states(){

    //     $query="select * from state";
    //     $result = $this->db->query($query);
    //     echo json_encode($result->row_array()); 
    // }
    public function get_states() {
        $this->db->select('a.id,a.state');
        $this->db->from('state as a');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete($id)
    {
        $qry = "delete from state where id=$id";
        $this->db->Query($qry);
    }   

    public function edit($id){
        $qry="select * from state where id=$id";
        print_r($qry);
        $this->db->Query($qry);

    }

    }
?>