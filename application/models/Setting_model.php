<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model {

    private $_table = 'settings';

    public function fetch_data()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        return $this->db->get()->row();    
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->_table, $data, $where);
        return $this->db->affected_rows();
    }
}
