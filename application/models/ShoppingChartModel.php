<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ShoppingChartModel extends CI_Model
{
    public function getTotal($id)
    {
        $query = "SELECT SUM(`total`) FROM chartview 
                WHERE `userid`= '$id'";
        return $this->db->query($query)->row_array();
    }
    
    public function getTotalQty($id)
    {
        $query = "SELECT SUM(`qty`) FROM chartview 
                WHERE `userid`= '$id'";
        return $this->db->query($query)->row_array();
    }

    public function getTotalMassa($id)
    {
        $query = "SELECT SUM(`massatotal`) FROM chartview 
                WHERE `userid`= '$id'";
        return $this->db->query($query)->row_array();
    }

    public function getKurir($qty,$kota)
    {
        
        if($qty<=5){
            $jenis1='n';
            $jenis2='s';
        }elseif($qty<=10){
            $jenis1='n';
            $jenis2='m';
        }elseif($qty<=15){
            $jenis1='n';
            $jenis2='l';
        }else{
            $jenis1='n';
            $jenis2='n';
        }
        // $query = "SELECT `user`.`kota`,`kota`.`namakota`,`biaya`.`biayaid`,`biaya`.`jenis`,`biaya`.`kurir`,`biaya`.`kota`,`biaya`.`harga` 
        // FROM `biaya` 
        // INNER JOIN `user` ON `biaya`.`kota`= `user`.`kota`
        // INNER JOIN `kota` ON `biaya`.`kota`= `kota`.`idkota`
        // WHERE `biaya`.`jenis`='$jenis1' AND `biaya`.`kota`='$kota'
        // OR `biaya`.`jenis`='$jenis2' AND `biaya`.`kota`='$kota'";

        $query = "SELECT * FROM `biaya` 
        WHERE `biaya`.`jenis`='$jenis1' AND `biaya`.`kota`='$kota'
        OR `biaya`.`jenis`='$jenis2' AND `biaya`.`kota`='$kota'";
    
        return $this->db->query($query)->result_array();
    }
}
