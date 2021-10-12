<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
public function index()
    {
        $data ['video'] = $this->db->get_where('postingan', ['file_tipe' => 'video'])->result_array();
        $this->load->view('templates/header_diskusi', ['title' => 'Belajar Tajwid']);
        $this->load->view('halaman/diskusi');
        $this->load->view('templates/sidebar-kanan',$data);
        $this->load->view('templates/footer_diskusi');
    }
    public function kelola_pengguna($key){
        if($key == 'edit'){
            $foto = $_FILES['fotoProfil'];
            if ($foto !== null)
			{
                $id = $this->input->post('id');
                $nama = $this->input->post('nama');
                $slug = strtolower($this->input->post('nama',true));
                $email = $this->input->post('email');
                $roleid = $this->input->post('roleid');
				$config['upload_path'] = 'asset/user/'.$slug.'/foto_profile/';
				$config['allowed_types'] = 'gif|jpg|png';

				// get upload library
				$this->load->library('upload', $config);

				// run it
				if (! $this->upload->do_upload('fotoProfil'))
				{
					// if false
					redirect('pengguna/admin_kelola');
				}
                    $foto = $this->upload->data('file_name');
                
            }
        $edit = $this->db->update('pengguna',[
                'nama' => $nama,
                'email'=> $email,
                'image'=> $foto
        ], ['id' => $id]);
            if ($edit){
                redirect('pengguna/admin_kelola');
            }
       }
    }
    public function edit_profil(){
        $data ['video'] = $this->db->get_where('postingan', ['file_tipe' => 'video'])->result_array();
        $this->load->view('templates/header_diskusi', ['title' => 'Belajar Tajwid | Edit Profile']);
        $this->load->view('halaman/edit_profil');
        $this->load->view('templates/sidebar-kanan',$data);
        $this->load->view('templates/footer_diskusi');
    }
    public function murabbi_kelola()
    {
        $data['dataPengguna'] = $this->operasi_dataBase->data_pengguna();
        $data ['video'] = $this->db->get_where('postingan', ['file_tipe' => 'video'])->result_array();
        $this->load->view('templates/header_diskusi', ['title' => 'Belajar Tajwid | Murabbi Kelola']);
        $this->load->view('halaman/murabbi-kelola',$data);
       
    }
    public function datapeoples()
    {
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/app_tajwid/pengguna/datapeoples';
        $config['total_baris'] = $this->operasi_dataBase->hitungData();
        $config['per_page'] = '12';
        
        $this->pagination->initialize($config);
        
        $data['peoples'] = $this->operasi_dataBase->tampilData(5,0);
        $this->load->view('templates/header_diskusi', ['title' => 'Lis data peolples']);
        $this->load->view('peoples/index',$data);
        
    }
    public function videoAnimasi()
    {
        $this->load->view('templates/header_diskusi', ['title' => 'Belajar Tajwid | Video Pembelajaran Animasi']);
        $this->load->view('halaman/videoAnimasi');
        $this->load->view('templates/footer_diskusi');

    }
    public function kelolaVideo($key)
    {
        $data['judul'] = $this->input->post('judul');
        $data['kategori'] = $this->input->post('kategori');
        $data['keterangan'] = $this->input->post('keterangan');
        if($key == 'edit'){
            echo 'ini edit';
        }elseif($key=='hapus'){
            $idvideo = $this->input->post('idvideo_hapus');
            return $this->operasi_dataBase->hapusvideo_animasi($idvideo);
            
        }
        else {
            $animasi = $_FILES['video'];
            if ($animasi['name'] !== "")
			{
				$config['upload_path'] = 'asset/user/video/animasi';
                $config['allowed_types'] = 'gif|jpg|png|mp4|mp3|wav|m4v|mpg';

            // get upload library
            $this->load->library('upload', $config);

            // run it
            if (! $this->upload->do_upload('video'))
            {
                // if false
                echo "gagal";
            }
                $namafile = $this->upload->data('file_name');
                var_dump($namafile); die;
                
			}
            else{
                echo "kosong";
            }
        }
}
    public function kelolaPostingan($key)
    {
        if ($key == 'hapus')
        {
            $idpost = $this->input->post('idpostingan');
            $cek = $this->operasi_dataBase->hapuspost($idpost);
            if($cek){
            echo"
                <script>
                    history.go(-1);
                </script>
            ";
            }

        }
    }

}