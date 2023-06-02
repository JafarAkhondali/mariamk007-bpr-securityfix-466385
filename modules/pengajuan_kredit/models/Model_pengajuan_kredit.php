<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengajuan_kredit extends MY_Model
{

    private $primary_key    = 'id';
    private $table_name     = 'pengajuan_kredit';
    public $field_search   = ['nama_lengkap', 'file_ktp', 'no_hp', 'jumlah_pinjaman', 'jangka_waktu', 'jenis_pinjaman', 'jaminan', 'created_at', 'updated_at', 'updated_by', 'status'];
    public $sort_option = ['id', 'DESC'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
            'sort_option'   => $this->sort_option,
        );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "pengajuan_kredit." . $field;

                if (strpos($field, '.')) {
                    $f_search = $field;
                }
                if ($iterasi == 1) {
                    $where .=  $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "pengajuan_kredit." . $field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "pengajuan_kredit." . $field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "pengajuan_kredit." . $field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'desc');

        $this->sortable();

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function getUser($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "pengajuan_kredit." . $field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "pengajuan_kredit." . $field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where('username', get_user_data('username'));
        $this->db->limit($limit, $offset);

        $this->sortable();

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable()
    {

        $this->db->select('pengajuan_kredit.*');


        return $this;
    }

    public function filter_avaiable()
    {

        if (!$this->aauth->is_admin()) {
        }

        return $this;
    }

    public function get_by_status()
    {
        $query = $this->db->query("SELECT * FROM `pengajuan_kredit` WHERE pengajuan_kredit.status = 'diterima'");
        return $query->result();
    }

    public function data_dashboard($startdate, $enddate)
    {
        $query = $this->db->query("SELECT created_at, jumlah_pinjaman as jumlah FROM `pengajuan_kredit` WHERE pengajuan_kredit.status = 'diterima' AND pengajuan_kredit.created_at BETWEEN '". $startdate ." 00:00:00' AND '".$enddate
        ." 23:59:59'");
        return $query->result();
    }
    public function total_pengajuan_terima($startdate, $enddate) {
        $query = $this->db->query("SELECT created_at, SUM(jumlah_pinjaman) as jumlah FROM `pengajuan_kredit` WHERE pengajuan_kredit.status = 'diterima' AND pengajuan_kredit.created_at BETWEEN '" . $startdate . " 00:00:00' AND '" . $enddate
            . " 23:59:59'");
        return $query->result();
    }
    public function filterT($awal, $akhir)
    {
        $query = $this->db->query("SELECT * FROM `pengajuan_kredit` WHERE pengajuan_kredit.status='diterima' AND pengajuan_kredit.created_at BETWEEN '" . $awal . " 00:00:00' AND '" . $akhir
            . " 23:59:59'");
        return $query->result();
    }
}

/* End of file Model_pengajuan_kredit.php */
/* Location: ./application/models/Model_pengajuan_kredit.php */