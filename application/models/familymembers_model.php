<?php
class Familymembers_model extends CI_Model
{

    public function save($data4)
    {
        $id = $this->input->post('id');
        $fid = $this->input->post('fid');
        $data2 = array(

            'family_id' => $id,
            'fname' => $data4['fname'],
            'date_of_birth' => $data4['date_of_birth'],
            'cpr_no' => $data4['cpr_no'],
            'dependency' => $data4['dependency'],

            'designation' => $data4['designation'],
            'bloodgroup' => $data4['bloodgroup'],
            'contact_no' => $data4['contact_no'],
            'whatsapp' => $data4['whatsapp'],
            'emailid' => $data4['emailid']


        );

        if ($id > 0 && $fid == 0) {
            $data2['photo'] = $data4['photo'];
            $data2['family_head'] = 0;
            $this->db->insert('family_member', $data2);
        } else {
            if ($data4['photo'] != 'noimage' && $data4['photo'] != '') {
                $data2['photo'] = $data4['photo'];
            }
            $this->db->where('id', $fid);
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
        $qry = "delete from family_member where fam_id=$id";
        $this->db->Query($qry);
    }

    public function edit($id)
    {
        $qry = "select * from country where fam_id=$id";
        print_r($qry);
        $this->db->Query($qry);
    }


    var $table = "family_member ";
    var $select_column = array("family_member.fam_id", "family_member.family_id", "family_member.fname", "family_member.date_of_birth", "family_member.cpr_no", "family_member.photo", "dependency.name as dependency", "family_member.designation", "family_member.bloodgroup", "family_member.contact_no", "family_member.whatsapp", "family_member.emailid");
    var $order_column = array('family_member.fam_id', "family_member.fname", "family_member.date_of_birth", "family_member.cpr_no", "dependency.name");

    function make_query($id)
    {

        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join('dependency', 'family_member.dependency= dependency.id');
        $this->db->where("family_id", $id);


        // if (isset($_POST["search"]["value"])) {
        //     $this->db->like("fam_id", $_POST["search"]["value"]);
        //     $this->db->or_like("fname", $_POST["search"]["value"]);
        // }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('fam_id', 'DESC');
        }
    }
    function make_datatables($id)
    {
        $this->make_query($id);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        $executedQuery = $this->db->last_query();
       // print_r($executedQuery);

        return $query->result();
    }
    function get_filtered_data($id)
    {
        $this->make_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function getdetails($id)
    {
        $qry = 'SELECT a.*,b.name as depend FROM family_member as a inner join dependency as b on a.dependency=b.id WHERE a.fam_id=' . $id;
        $result = $this->db->query($qry);
        echo json_encode($result->row_array());

    }
    public function getcountry()
    {

        $qry = "select * from country";
        $result = $this->db->query($qry);
        $result = $result->result_array();
        $option = '<option value=""> Select</option>';
        foreach ($result as $row) {
            $option .= '<option value="' . $row["id"] . '">' . $row["country"] . '</option>';
        }
        print_r($option);
    }
    public function getdependency()
    {

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