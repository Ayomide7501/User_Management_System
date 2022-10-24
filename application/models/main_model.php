<?php
class Main_model extends CI_Model{
    function insert_data($data){
        $this->db->insert("users", $data);
    }
    
    function fetch_data(){
        //$query = $this->db->get("users");
        //$query = $this->db->query("SELECT * from users ORDER BY id DESC");
        $this->db->select("*");
        $this->db->from("users");
        $query = $this->db->get();
        return $query;
    }
    function delete_data($id){
        $this->db->where("id", $id);
        $this->db->delete("users");
    }
    function fetch_single_data($id){
        $this->db->where("id", $id);
        $query = $this->db->get("users");
        return $query;
    }
    function update_data($data, $id){
        $this->db->where("id", $id);
        $this->db->update("users", $data);
    }
}
?>