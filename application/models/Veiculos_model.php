<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Veiculos_Model extends CI_Model {

    public function get($table, $id=false) {
        
        $this->db->select();
        $this->db->from($table);

        if($id){
            $this->db->where('id', $id);
        }

        if(isset($_GET['q'])){
            $this->db->like(substr($table,0,-1), $_GET['q']);
        }
        
        $query=$this->db->get();

        return $query->result_array();

    }

    public function add($table, $data) {

        $result = $this->db->insert($table, $data);
    
        return $this->db->insert_id();

    }

    public function update($table, $data, $id){
        
        $result = $this->db->where('id', $id)->set($data)->update($table);   
        
        return $result;

    }

    public function delete($table, $id){
        
        $result = $this->db->where('id', $id)->delete($table);   
        
        return $result;

    }

}

