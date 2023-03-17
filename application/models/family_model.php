<?php
class Family_model extends CI_Model
{

    public function save($data4)
    { 
        $id = $this->input->post('id');
        $fid = $this->input->post('fid');

        $housename = $this->input->post('housename');
        $city = $this->input->post('city');
        $mobno = $this->input->post('mobno');       
        $email = $this->input->post('email');
        $contactnumber = $this->input->post('contactnumber');
        $flat = $this->input->post('flat');
        $block = $this->input->post('block');
        $parishname = $this->input->post('parishname');
        $country = $this->input->post('country');
        $zone = $this->input->post('zone');
        $whatsapp = $this->input->post('whattsapp');
        $road = $this->input->post('road');
        $building = $this->input->post('building');
        $place = $this->input->post('place');
        $familycellname = $this->input->post('familycellname'); 
        $area = $this->input->post('area');
        $commaddr = $this->input->post('commaddr');
        $permaddr = $this->input->post('permaddr');
      
                     
       
        $data= array(
            'house_name'=>$housename,
            'parish_name' =>$parishname,
            'permanent_addr'=>$permaddr,
            'place' =>$place,
            'city' =>$city,
            'country' =>$country,
            'flat'=>$flat,
            'building'=>$building,
            'road'=>$road,
            'block'=>$block,
            'comm_addr'=>$commaddr,
            'contact_number'=>$contactnumber,
            'mobile'=>$mobno,
            'whatsapp'=>$whatsapp,
            'email'=>$email,
            'family_cell_name'=>$familycellname,
            'zone'=>$zone,
            'area'=>$area,
           
           
        );

        if($id==0){
            $this->db->insert('family',$data);
            $insert_id = $this->db->insert_id();
           }
           else
           {
            $this->db->where('family_id',$id);
           $this->db->update('family', $data);
        
           }
if($fid==0 && $id==0){
      $data2 = array(

        'family_id'=> $insert_id,
            'fname' =>$data4['fname'],
            'date_of_birth'=>$data4['date_of_birth'],
            'cpr_no'=>$data4['cpr_no'],
            'dependency'=>$data4['dependency'],
            'family_head'=>1,
            'designation'=>$data4['designation'],
            'bloodgroup'=>$data4['bloodgroup'],
            'contact_no'=>$data4['contact_no'],
            'whatsapp'=>$data4['whatsapp'],
            'emailid'=>$data4['emailid']         		
        
        );
    
        if($data2['photo'] != 'noimage'){
            $data2['photo'] = $data4['photo'];
        }
             
      
        
        $this->db->insert('family_member',$data2);

       }
       else{
$family_hed=0;
        $data2 = array(

            'family_id'=> $fid,
                'name' =>$data4['name'],
                'date_of_birth'=>$data4['date_of_birth'],
                'cpr_no'=>$data4['cpr_no'],
                'dependency'=>$data4['dependency'],
                'family_head'=>0,
                'designation'=>$data4['designation'],
                'bloodgroup'=>$data4['bloodgroup'],
                'contact_no'=>$data4['contact_no'],
                'whatsapp'=>$data4['whatsapp'],
                'emailid'=>$data4['emailid']  
                            
            
            );

        if($data4['photo'] != 'noimage' && $data4['photo'] != ''){
            $data2['photo'] = $data4['photo'];
        } 
        $this->db->where('id', $id);
        $this->db->update('family_member', $data2);
    
       }
                 
      
        $response = array(
            'valid' => false,
            'type' => 1,
            'message' => 'Saved Successfully.'
        );

        echo json_encode($response);

    }
    

   
    public function getfamily()
    {
        $this->db->select('a.id,a.country');
        $this->db->from('country as a');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete($id)
    {
        $qry = "delete from family where family_id=".$id;
        $this->db->Query($qry);
        $qry="delete from family_member where family_id=".$id;
        $this->db->Query($qry);
    }

    public function edit($id)
    {
        $qry = "select * from family where family_id=".$id;
        print_r($qry);
        $this->db->Query($qry);
    }

    var $table = "family";
    var $select_column = array("family_id", "house_name","parish_name");
    var $order_column = array('family_id', "house_name","parish_name", null);
    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("family_id", $_POST["search"]["value"]);
            $this->db->or_like("house_name", $_POST["search"]["value"]);
            $this->db->or_like("parish_name", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('family_id', 'DESC');
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

    var $table1 = "family_member";
    var $select_column1 = array("id","family_id", "name","date_of_birth","cpr_no","dependency");
    var $order_column1 = array('id', "name","date_of_birth","cpr_no","dependency", null);
    function make_query1()
    {
        $this->db->select($this->select_column1);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("id", $_POST["search"]["value"]);
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->or_like("name", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }
    function make_datatables1()
    {
        $this->make_query1();
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
        $qry = 'SELECT a.*,a.whatsapp as whtattsapp ,b.*,c.country as countryname,d.name as depname FROM family as a inner join family_member as b on a.family_id=b.family_id inner join country as c on a.country=c.id inner join dependency as d on b.dependency=d.id WHERE a.family_id='.$id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
    function getfamilyview($id){
        $qry = 'SELECT a.*,a.whatsapp as whtattsapp ,b.*,c.country as countryname,d.name as depname FROM family as a inner join family_member as b on a.family_id=b.family_id inner join country as c on a.country=c.id inner join dependency as d on b.dependency=d.id WHERE  b.family_head=1 and a.family_id='.$id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
    function getfamilymembers($id){
        $qry = 'SELECT a.*,a.whatsapp as whtattsapp ,b.*,c.country as countryname,d.name as depname FROM family as a inner join family_member as b on a.family_id=b.family_id inner join country as c on a.country=c.id inner join dependency as d on b.dependency=d.id WHERE  b.family_head=0 and a.family_id='.$id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
    
    public function getcountry(){

        $qry = "select * from country";
        $result = $this->db->query($qry);
        $result = $result->result_array();
        $option = '<option value=""> Select</option>';
        foreach ($result as $row) {
            $option .= '<option value="' . $row["id"] . '">' . $row["country"] . '</option>';
        }
        print_r($option);
    }
    public function getdependency(){

        $qry = "select * from dependency";
        $result = $this->db->query($qry);
        $result = $result->result_array();
        $option = '<option value=""> Select</option>';
        foreach ($result as $row) {
            $option .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
        }
        print_r($option);
    }
           
}
?>