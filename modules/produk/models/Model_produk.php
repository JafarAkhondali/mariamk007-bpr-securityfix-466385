<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'produk';
    public $field_search   = ['nama_produk', 'deskripsi_produk', 'photo', 'id_kategori', 'kategori_produk.nama_kategori'];
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
                $f_search = "produk.".$field;

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

            $where = '('.$where.')';
        } else {
            $where .= "(" . "produk.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "produk.".$field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .$f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "produk.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('kategori_produk', 'kategori_produk.id = produk.id_kategori', 'LEFT');
        
        $this->db->select('kategori_produk.nama_kategori,produk.*,kategori_produk.nama_kategori as kategori_produk_nama_kategori,kategori_produk.nama_kategori as nama_kategori');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

    public function get_by_kategori($id) {
        $query = $this->db->query('SELECT produk.id, produk.nama_produk, produk.photo, produk.deskripsi_produk FROM `produk`  WHERE produk.id_kategori = '.$id);
        return $query->result();
    }

    public function get_by_id($id) {
        $query = $this->db->query('SELECT produk.id, produk.nama_produk, produk.photo, produk.deskripsi_produk FROM `produk`  WHERE produk.id = '.$id);
        return $query->result();
    }

}

/* End of file Model_produk.php */
/* Location: ./application/models/Model_produk.php */