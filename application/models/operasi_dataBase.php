<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operasi_dataBase extends CI_Model {
    public function data_pengguna()
    {
        return $this->db->get('pengguna')->result_array();
    }
    public function hapusdata_pengguna($key)
    { 
        return $this->db->delete('pengguna',['user_id'=>$key]);
    }

    public function tampildataPostingan()
    {
       $this->db->select('postingan.*,pengguna.user_id as idpeng, pengguna.nama as name');
       $this->db->join('pengguna','pengguna.user_id = postingan.user_id');
       $this->db->from('postingan');
       $query = $this->db->get();
       return $query->result_array();
    }

    public function tampilData($batas,$mulai)
    {
        return $this->db->get('peoples',$batas,$mulai)->result_array();
    }

    public function hitungData()
    {
        return $this->db->get('peoples')->num_rows();
    }
   
    public function hapusvideo_animasi($key)
    {
        return $this->db->delete('video_animasi',['id'=> $key]);      
    }
    public function hapuspost($key)
    {
        $this->db->delete('postingan',['post_id'=>$key]);
      return   $this->db->delete('komentar',['post_id'=>$key]);
    }

}