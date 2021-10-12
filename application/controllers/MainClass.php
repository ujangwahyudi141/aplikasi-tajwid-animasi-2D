<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainClass extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

//Fungsi menampilkan Halaman Utama
    public function index()
	{
        $this->load->view('templates/navbar.php');
        $this->load->view('halaman/home.php');
        $this->load->view('templates/footer.php');
	}
// Akhir Fungsi Halaman Utama

// Fungsi menampilkan halaman Login
    public function login()
    {
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',[
            'required' => "Email harus di isi",
            'valid_email' => "Format email salah"
        ]);
        $this->form_validation->set_rules('password','Password','required|trim',[
            'required' => "Password harus di isi"
        ]);

        if($this->form_validation->run()==false){
            $data['judul'] = "Login";
            $this->load->view('templates/login_header.php', $data);
            $this->load->view('halaman/login.php');
            $this->load->view('templates/login_footer.php');
        }
        else{
            // validasi sukses
            $this->_login();
        }
    }
// Akhir fungsi halaman Login

private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('pengguna',['email' => $email])->row_array();
    // jika user ada
    if ($user)
    {
        // jika user aktif
        if ($user['is_aktif']==1)
        {
            if(password_verify($password, $user['password']))
            {
                $data = [
                    'user_id' => $user['user_id'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                redirect('pengguna');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('MainClass/login');
            }
        }
        else
        {

            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum di aktifasi!</div>');
            redirect('MainClass/login');
        }
    }else
    {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
        redirect('MainClass/login');
    }
}


    public function membuatAkun($key){
        if ($key==2){
                $role = $this->input->post('role_id');
                $data =[
                    'nama' =>htmlspecialchars($this->input->post('nama',true)),
                    'email' => htmlspecialchars($this->input->post('email',true)),
                    'image' => 'smile.GIF',
                    'password' =>password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    'role_id' => $role ,
                    'is_aktif' => 1,
                    'tgl_dibuat' => time()
                ];
              $tambah = $this->db->insert('pengguna',$data);
               if($tambah){
                    echo"
                    <script>
                        alert('pengguna berhasil di tambahkan');
                    </script>
                    ";
                    redirect('pengguna/murabbi_kelola');
               }else{
                   echo"Gagal menambahkan pengguna";
               }

        }
        else{
        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required' => "Nama harus di isi"
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[pengguna.email]',[
            'required' => "Email harus di isi",
            'is_unique' => "Email sudah terdaftar",
            'valid_email' => "Format email salah"
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]|matches[password2]',[
            'required' => "Password harus diisi",
            'matches' => "Password tidak sama",
            'min_length' => "Password terlalu pendek",
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
        if ($this->form_validation->run()==false)
        {

            $data['judul'] = "Membuat akun";
            $this->load->view('templates/login_header.php',$data);
            $this->load->view('halaman/buatakun.php');
            $this->load->view('templates/login_footer.php');
        }
        else{
            $slug = strtolower($this->input->post('nama',true));
            $data =[
                'nama' =>htmlspecialchars($this->input->post('nama',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'smile.GIF',
                'password' =>password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id' => 2 ,
                'is_aktif' => 1,
                'tgl_dibuat' => time()
            ];
            $this->db->insert('pengguna',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun berhasil dibuat, silakan Login!</div>');
            redirect('MainClass/login');
        }
    }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect('MainClass/login');
    }

    public function post()
	{
		// data user
		$user = $this->db->get_where('pengguna', ['user_id' => $this->session->userdata('user_id')])->row_array();

		$text = htmlspecialchars($this->input->post('text'));
		$slug = strtolower(str_replace(' ', '-', $text));
		// validate text input
		$this->form_validation->set_rules('text', 'Text', 'required');
		// check validate
		if ($this->form_validation->run() === FALSE)
		{
			// back to main page and send error
			redirect('pengguna');
		} else {
			// cek if file is exists
			if (isset($_FILES['video']['name']) || @$_FILES['video']['name'] !== null)
			{
				$config['upload_path'] = 'asset/user/video/';
				$config['allowed_types'] = 'gif|jpg|png|mp4|mp3|wav|m4v|mpg';
				$config['max_size'] = 500024;
				$config['encrypt_name'] = TRUE;

				// get upload library
				$this->load->library('upload', $config);

				// run it
				if (! $this->upload->do_upload('video'))
				{
					// if false
					$this->load->view('halaman/diskusi', ['error' => $this->upload->display_errors()]);
				}

				$video_name = $this->upload->data('file_name');
				$video_tipe = $this->upload->data('file_type');
			} else {
				$video_name = 'empty';
			}

			if ($video_tipe == '')
			{
				$file_type = 'empty';
			} elseif($video_tipe == 'image/jpeg' || $video_tipe == 'image/jpg' || $video_tipe == 'image/png' ){
                $file_type = 'image';
            }else {
                $file_type = 'video';
            }

			$this->db->insert('postingan', [
				'text' => $text,
				'slug' => $slug,
				'file_tipe' => $file_type,
				'file' => $video_name,
				'user_id' => $user['user_id']
			]);

			redirect('pengguna');
		}
	}

    public function cari()
	{
		$key = $this->input->get('key');
		$this->db->like('text', $key);
		$data = $this->db->get('postingan')->result_array();
		$dataVideo = $this->db->get_where('postingan', ['file_tipe' => 'video'])->result_array();
        $this->load->view('templates/header_diskusi', ['title' => 'Belajar Tajwid']);
		$this->load->view('halaman/diskusi', ['dataContent' => $data, 'video' => $dataVideo]);
        $this->load->view('templates/sidebar-kanan',$data);
        $this->load->view('templates/footer_diskusi');
	}

    public function comment()
	{
		$post_id = $this->input->post('post_id');
		$user_id = $this->session->userdata('user_id');
		$post_user_id = $this->input->post('user_id');
		$text = htmlspecialchars($this->input->post('text'));

		$userData = $this->db->get_where('pengguna', ['user_id' => $user_id])->row_array();

		$this->db->insert('pemberitahuan', [
			'dari' => $user_id,
			'ke' => $post_user_id,
			'text' => '<b>'.$userData['nama'].'</b> telah mengomentari postingan anda!'
		]);

		$this->db->insert('komentar', [
			'post_id' => $post_id,
			'user_id' => $user_id,
			'text' => $text
		]);

		redirect('pengguna');
	}

    public function clearNotif()
	{
		$this->db->like('text', '');
		$this->db->delete('pemberitahuan');
		redirect('pengguna');
	}

	public function deletePost($id)
	{
		$post = $this->db->get_where('postingan', ['post_id' => $id])->row_array();
		if ($post['post_id'] == $id) {
			if ($id !== null) {
				unlink(base_url('asset/user/video/'.$post['file']));
				$this->db->delete('postingan', ['post_id' => $id]);
				$this->db->delete('komentar', ['post_id' => $id]);
				redirect('pengguna');
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

    public function kelola_pengguna($key){
        if($key == 'edit'){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $foto = $_FILES['fotoProfil'];
            if ($foto['name'] !== null)
            {
                $config['upload_path'] = 'asset/user/foto_profile/';
                $config['allowed_types'] = 'gif|jpg|png';
    
                // get upload library
                $this->load->library('upload', $config);
    
                // run it
                if (! $this->upload->do_upload('fotoProfil'))
                {
                    // if false
                    $edit = $this->db->update('pengguna',[
                        'nama' => $nama,
                        'email'=> $email
                ], ['user_id' => $id]);
                    if ($edit){
                        redirect('Pengguna/edit_profil');
                    }
                }
                    $foto = $this->upload->data('file_name');
                
                    $edit = $this->db->update('pengguna',[
                            'nama' => $nama,
                            'email'=> $email,
                            'image'=> $foto
                    ], ['user_id' => $id]);
                        if ($edit){
                            redirect('pengguna/murabbi_kelola');
                        }
                    }
    
            
       }
       elseif ($key == 'editolehAdmin')
       {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $role = $this->input->post('roleid');
        $foto = $_FILES['fotoProfil'];
        if ($foto['name'] !== null)
        {
            $config['upload_path'] = 'asset/user/foto_profile/';
            $config['allowed_types'] = 'gif|jpg|png';

            // get upload library
            $this->load->library('upload', $config);

            // run it
            if (! $this->upload->do_upload('fotoProfil'))
            {
                // if false
                $edit = $this->db->update('pengguna',[
                    'nama' => $nama,
                    'email'=> $email,
                    'role_id'=> $role
            ], ['user_id' => $id]);
                if ($edit){
                    redirect('pengguna/murabbi_kelola');
                }
            }
                $foto = $this->upload->data('file_name');
            
                $edit = $this->db->update('pengguna',[
                        'nama' => $nama,
                        'email'=> $email,
                        'image'=> $foto,
                        'role_id'=> $role
                ], ['user_id' => $id]);
                    if ($edit){
                        redirect('pengguna/murabbi_kelola');
                    }
                }
       }elseif($key == 'hapuspengguna'){
           $id = $this->input->post('id');
           $userlogin = $this->db->get_where('pengguna',['user_id'=>$this->session->userdata('user_id')])->row_array(); 
           
           if($userlogin['user_id']==$id){
               echo "
               <script>
                    alert('".$userlogin['nama']." merupakan user pada session, tidak dapat dihapus!'); history.go(-1);
               </script>
               
               ";
           }
           else{
               $hapus =  $this->operasi_dataBase->hapusdata_pengguna($id);
                    if($hapus){
                        redirect('pengguna/murabbi_kelola');
                    }

           }
       }
    }

public function kelolaVideo($key)
{
    $idvideo = $this->input->post('idvideo');
    $judul = $this->input->post('judul');
    $kategori = $this->input->post('kategori');
    $keterangan = $this->input->post('keterangan');
    if($key == 'edit'){
        $animasi = $_FILES['vidio'];
        if ($animasi['name'] !== null)
        {
            $config['upload_path'] = 'asset/user/video/animasi';
            $config['allowed_types'] = 'gif|jpg|png|mp4|mp3|wav|m4v|mpg';

            // get upload library
            $this->load->library('upload', $config);

            // run it
            if (! $this->upload->do_upload('vidio'))
            {
                // if false
                $data['namafile'] = $this->upload->data('file_name');
               $edit = $this->db->update('video_animasi',[
                'judul' => $judul,
                'kategori' => $kategori,
                'keterangan' => $keterangan
               ],['id' => $idvideo]);
                if ($edit){
                    redirect('pengguna/murabbi_kelola');
                }
            }
                $namafile = $this->upload->data('file_name');
            
                $edit = $this->db->update('video_animasi',[
                    'judul' => $judul,
                    'kategori' => $kategori,
                    'nama_video' => $namafile,
                    'keterangan' => $keterangan
                   ],['id' => $idvideo]);
                    if ($edit){
                        redirect('pengguna/murabbi_kelola');
                    }
                }
       }
    elseif($key=='hapus'){
        $this->db->delete('video_animasi',['id'=>$idvideo]);
        redirect('pengguna/murabbi_kelola');
    }
    else {
        $animasi = $_FILES['video'];
        if ($animasi['name'] !== "")
        {
            $config['upload_path'] = 'asset/user/video/animasi';
            $config['allowed_types'] = 'mp4';

        // get upload library
        $this->load->library('upload', $config);

        // run it
        if (! $this->upload->do_upload('video'))
        {
            // if false
            echo "gagal";
        }
            $namafile = $this->upload->data('file_name');
           
            $edit = $this->db->insert('video_animasi',[
                'judul' => $judul,
                'kategori' => $kategori,
                'nama_video' => $namafile,
                'keterangan' => $keterangan
               ]);
            redirect('pengguna/murabbi_kelola');
            
        }
    }
}

}