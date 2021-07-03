<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function getTotalPenjualan(){
        $query = "SELECT SUM(`qty`) FROM `order`";
        return $this->db->query($query)->row_array();
    }

    public function getPesan()
    {
        $query = "SELECT `user`.`nama`,`order`.`orderid`,`order`.`userid`,`order`.`qty`
        FROM `order`
        INNER JOIN `user` on `order`.`userid`=`user`.`userid`
        WHERE `order`.`status`='Menungu konfirmasi'";
        return $this->db->query($query)->result_array();
    }

    public function getPesanProses()
    {
        $query = "SELECT `user`.`nama`,`order`.`orderid`,`order`.`userid`,`order`.`qty`,`order`.`status`
        FROM `order`
        INNER JOIN `user` on `order`.`userid`=`user`.`userid`
        WHERE `order`.`status`='Diproses'";
        return $this->db->query($query)->result_array();
    }
    
    public function getPesanTerkirim()
    {
        $query = "SELECT `user`.`nama`,`order`.`orderid`,`order`.`userid`,`order`.`qty`,`order`.`status`
        FROM `order`
        INNER JOIN `user` on `order`.`userid`=`user`.`userid`
        WHERE `order`.`status`='Dikirim'";
        return $this->db->query($query)->result_array();
    }

    public function getTotalQty($id)
    {
        $query = "SELECT SUM(`qty`) FROM chartview 
                WHERE `userid`= '$id'";
        return $this->db->query($query)->row_array();
    }

    public function ordermenunggu($id)
    {
        $query = "SELECT `order`.`orderid` ,`order`.`buktipembayaran` ,`order`.`total` ,`user`.`nama`as `namacustomer`,`produk`.`produkid`,`produk`.`nama`,`produk`.`stok`,`pesan`.`qty`,`pesan`.`biayaid`,`biaya`.`jenis`,`biaya`.`kurir`,`kota`.`namakota`,`biaya`.`harga`,`user`.`tlp`,`user`.`alamat`,`user`.`kota`,`user`.`kodepos`,`order`.`status`,`order`.`tglorder`,`order`.`buktipembayaran`
        FROM `pesan` 
        INNER JOIN `user`ON `pesan`.`userid`= `user`.`userid`
        INNER JOIN `produk`ON `pesan`.`produkid`=`produk`.`produkid`
        INNER JOIN `biaya`ON `pesan`.`biayaid`=`biaya`.`biayaid`
        INNER JOIN `kota`ON `biaya`.`kota`=`kota`.`idkota`
        INNER JOIN `order`ON `pesan`.`orderid`= `order`.`orderid`
        WHERE `order`.`status`= 'Menungu konfirmasi'AND `order`.`orderid`='$id'";
        return $this->db->query($query)->result_array();
    }

    public function orderProses($id)
    {
        $query = "SELECT `order`.`orderid` ,`order`.`buktipembayaran` ,`order`.`total` ,`user`.`nama`as `namacustomer`,`produk`.`produkid`,`produk`.`nama`,`produk`.`stok`,`pesan`.`qty`,`pesan`.`biayaid`,`biaya`.`jenis`,`biaya`.`kurir`,`kota`.`namakota`,`biaya`.`harga`,`user`.`tlp`,`user`.`alamat`,`user`.`kota`,`user`.`kodepos`,`order`.`status`,`order`.`tglorder`,`order`.`buktipembayaran`
        FROM `pesan` 
        INNER JOIN `user`ON `pesan`.`userid`= `user`.`userid`
        INNER JOIN `produk`ON `pesan`.`produkid`=`produk`.`produkid`
        INNER JOIN `biaya`ON `pesan`.`biayaid`=`biaya`.`biayaid`
        INNER JOIN `kota`ON `biaya`.`kota`=`kota`.`idkota`
        INNER JOIN `order`ON `pesan`.`orderid`= `order`.`orderid`
        WHERE `order`.`status`= 'Diproses'AND `order`.`orderid`='$id'";
        return $this->db->query($query)->result_array();
    }

    public function orderTerkirim($id)
    {
        $query = "SELECT `order`.`orderid` ,`order`.`buktipembayaran` ,`order`.`total` ,`user`.`nama`as `namacustomer`,`produk`.`produkid`,`produk`.`nama`,`produk`.`stok`,`pesan`.`qty`,`pesan`.`biayaid`,`biaya`.`jenis`,`biaya`.`kurir`,`kota`.`namakota`,`biaya`.`harga`,`user`.`tlp`,`user`.`alamat`,`user`.`kota`,`user`.`kodepos`,`order`.`status`,`order`.`tglorder`,`order`.`buktipembayaran`
        FROM `pesan` 
        INNER JOIN `user`ON `pesan`.`userid`= `user`.`userid`
        INNER JOIN `produk`ON `pesan`.`produkid`=`produk`.`produkid`
        INNER JOIN `biaya`ON `pesan`.`biayaid`=`biaya`.`biayaid`
        INNER JOIN `kota`ON `biaya`.`kota`=`kota`.`idkota`
        INNER JOIN `order`ON `pesan`.`orderid`= `order`.`orderid`
        WHERE `order`.`status`= 'Dikirim'AND `order`.`orderid`='$id'";
        return $this->db->query($query)->result_array();
    }

    

   
}
