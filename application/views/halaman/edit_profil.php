<?php 
$data = $this->db->get_where('pengguna',['user_id'=>$this->session->userdata('user_id')])->row_array(); 
$key = 'edit'; 
?>
<div class="row">
	<div class="col-md-7 mb-3">
  <div class="card">
  <div class="card-header">
    Edit Profil
  </div>
  <div class="card-body">
  <form action="<?= base_url('MainClass/kelola_pengguna/'.$key);?>" id="form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$data['user_id'];?>">
                <input type="hidden" name="roleid" value="<?=$data['role_id'];?>">
            </div>
            <div class="form-group">
            <label for="nama">Nama :</label>
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?=$data['nama'];?>">  
                </div>
                <div class="form-group">
                <label for="email">email :</label>
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Alamat Email" name="email" value="<?=$data['email']?>">
                </div>
                <div class="form-group">
				<label for="fotoProfil">Foto Profil . optional</label>
				<input type="file" name="fotoProfil" id="fotoProfil" class="form-input">
				<button class="btn btn-success">Simpan Perubahan</button>
                </div>
			</form>
  </div>
</div>
	</div>
