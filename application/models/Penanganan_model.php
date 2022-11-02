<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan_model extends CI_Model
{
    private $_table = 'penanganan_jalan';
    private $column_order = array('bulan', 'jenis_pengadaan', 'nama_paket');
    private $column_search = array('tahun', 'jenis_pengadaan', 'nama_paket');
    private $order = array('created_at' => 'desc'); 

    private function _get_datatables_query()
    {
        $this->db->from($this->_table);

        if ($this->input->post('year')) {
            $this->db->where('tahun', $this->input->post('year'));
        }

        $i = 0;

        foreach ($this->column_search as $item) 
        {
            if ($_POST['search']['value'])
            {

                if ($i === 0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function get_years()
    {
        $this->db->select('tahun');
        $this->db->from($this->_table);
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get()->result();
    }

    public function check_duplicate($tahun, $bulan, $jenis_pengadaan)
    {
        $this->db->select('id');
        $this->db->from($this->_table);
        $this->db->where('tahun', $tahun);
        $this->db->where('bulan', $bulan);
        $this->db->where('jenis_pengadaan', $jenis_pengadaan);
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
