<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class CatalogModel extends CI_Model {

  public function __construct() {
    parent::__construct(); 
  }

  // Fetch records
  public function getData($rowno,$rowperpage,$search="",$sort="") {
    $this->db->select('*');
    $this->db->from('produk');
    if($sort!=''){
    $this->db->order_by('harga',$sort);
    }

    if($search != ''){
      $this->db->like('nama', $search);

    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '',$sort='') {

    $this->db->select('count(*) as allcount');
    $this->db->from('produk');
    if($sort!=''){
        $this->db->order_by('harga',$sort);
        }
 
    if($search != ''){
      $this->db->like('nama', $search);

    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
  public function populer(){

    $query = "SELECT * FROM `produk` INNER JOIN `populer`
    ON `produk`.`produkid` = `populer`.`produkid`";
        return $this->db->query($query)->result_array();
  }
}