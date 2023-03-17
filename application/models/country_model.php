<?php
class Country_model extends CI_Model
{

    public function save($data)
    {
       
        $id = $this->input->post('id');
              
        $data2 = array(

            'country' =>$data['country']
                   		
        
        );
        if($id==0){
            $this->db->insert('country',$data2);
    
           }
           else
           {
            $this->db->where('id', $id);
            $this->db->update('country', $data2);
        
           }
          
            $response = array(
                'valid' => false,
                'type' => 1,
                'message' => 'Saved Successfully.'
            );
    
            echo json_encode($response);
    
        }
    

    // public function get_states(){

    //     $query="select * from state";
    //     $result = $this->db->query($query);
    //     echo json_encode($result->row_array()); 
    // }
    public function getcountry()
    {
        $this->db->select('a.id,a.country');
        $this->db->from('country as a');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete($id)
    {
        $qry = "delete from country where id=$id";
        $this->db->Query($qry);
    }

    public function edit($id)
    {
        $qry = "select * from country where id=$id";
        print_r($qry);
        $this->db->Query($qry);
    }

    var $table = "country";
    var $select_column = array("id", "country");
    var $order_column = array('id', "country",  null, null);
    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("id", $_POST["search"]["value"]);
            $this->db->or_like("country", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
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
        $qry = 'SELECT * FROM country as a where id='.$id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
}
?>