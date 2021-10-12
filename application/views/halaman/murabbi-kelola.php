<div class="row">
	<div class="col-md-12 mb-3">
  <section>
  <div class="form-post mb-3">
			<button class="form-post-title" type="button"><h3>Tambahkan Video animasi<span class="plus-btn">+</span></h3></button>
			<form action="<?php echo base_url('MainClass/kelolaVideo/'.$key='tambah'); ?>" id="form" method="POST" enctype="multipart/form-data">
      <select class="form-input" aria-label="Default select example" name="kategori" required>
          <option selected>Pilih Kategori Video</option>
          <option value="hukum nun mati/tanwin">Hukum Nun Mati Atau Tanwin</option>
          <option value="hukum mim mati">Hukum Mim Mati</option>
          <option value="ahkamul maddi wal qasr">Ahkamul Maddi Wal Qasr</option>
      </select>
        <label for="judul">Judul Video</label>
				<input type="text" name="judul" id="judul" class="form-input" required>
				<label for="text">Keterangan</label>
				<textarea id="text" name="keterangan" class="form-input" required></textarea>
				<label for="video">Pilih Video</label>
				<input type="file" name="video" id="video" class="form-input" required>

				<button type="submit" class="btn btn-success">Tambahkan Video</button>
			</form>
		</div>
  </section>
  <section>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kelola Video Animasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>keterangan</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $dataVideo = $this->db->get('video_animasi')->result_array();
                      $no = 1 ;
                      foreach ($dataVideo as $vid):?>
                  <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $vid['judul'];?></td>
                      <td><?= $vid['kategori'];?></td>
                      <td><?= $vid['keterangan'];?></td>
                      <td>
                          <button class="badge badge-warning" data-toggle='modal' data-target='#vid<?=$vid['id']?>'>
                            Detail
                          </button>
                  <!-- modal detail -->
                          <div class="modal fade" id="vid<?=$vid['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Detail video <?= $vid['judul']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                     <label>Id video : <?= $vid['id']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label> Judul Video : <?= $vid['judul']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Kategori Video : <?= $vid['kategori']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Nama Video : <?= $vid['nama_video']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Keterangan Video : <?= $vid['keterangan']?></label>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Upload : <?= $vid['tgl_upload']?></label>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- akhir modal detail video -->
                          |
                          <!-- modal Edit video -->
                          <button class="badge badge-primary" data-toggle='modal' data-target='#editvideo<?= $vid['id']?>'>
                            Edit
                          </button>
                          <div class="modal fade" id="editvideo<?= $vid['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Edit video <?= $vid['judul']?></h5>
                                    <?php $key = 'edit';?>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                    <form method="POST" action="<?=base_url('MainClass/kelolaVideo/'.$key)?>" enctype="multipart/form-data">
                                     
                                        <input type="hidden" name="idvideo" class="form-control" value="<?= $vid['id']?>">
                                      
                                      <div class="form-group">
                                        <label>Judul Video</label>
                                        <input type="text" name="judul" class="form-control" value="<?= $vid['judul']?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Kategori :</label>
                                        <select name="kategori">
                                        <?php
                                          if ($vid['kategori']=="hukum nun mati/tanwin"):?>
                                            <option value="hukum nun mati/tanwin">Hukum Nun Mati atau tanwin</option>
                                            <option value="hukum mim mati">Hukum Mim Mati</option>
                                            <option value="ahkamul maddi wal qasr">Ahkamul Maddi Wal Qasr</option>
                                        <?php
                                          elseif ($vid['kategori']=="hukum mim mati"):?>
                                            <option value="hukum mim mati">Hukum Mim Mati</option>
                                            <option value="hukum nun mati/tanwin">Hukum Nun Mati atau tanwin</option>
                                            <option value="ahkamul maddi wal qasr">Ahkamul Maddi Wal Qasr</option>
                                          <?php
                                          else : ?>
                                            <option value="ahkamul maddi wal qasr">Ahkamul Maddi Wal Qasr</option>
                                            <option value="hukum nun mati/tanwin">Hukum Nun Mati atau Tanwin</option>
                                            <option value="hukum mim mati">Hukum Mim Mati</option>
                                        <?php endif;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Nama Video : <?= $vid['nama_video']?></label>
                                        <label>Rubah Video :<input type="file" name="vidio" id="vidio" class="form-input"></label> 
                                      </div>                                    
                                      <div class="form-group">
                                        <label>keterangan : </label>
                                      </div>                                    
                                      <div class="form-group">
                                        <textarea name="keterangan" style='width: 100%;' rows="4" ><?= $vid['keterangan']?></textarea>
                                      </div>                                    
                                  <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Akhir modal edit -->
                          |
                          <!-- Modal Hapus -->
                          <button class="badge badge-danger" data-toggle='modal' data-target='#hapusvideo<?=$vid['id']?>'>
                            Hapus
                          </button>
                          <div class="modal fade" id="hapusvideo<?=$vid['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Hapus video <?= $vid['judul']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                      <h5>Apakah yakin akan menghapus video <?=$vid['judul']?> ??</h5>
                                  </div>
                                  <div class="modal-footer">
                                  <form method="POST" action="<?php $key='hapus';echo base_url('MainClass/kelolaVideo/'.$key);?>">
                                  <input type="hidden" name="idvideo" value="<?= $vid['id']?>">
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                  <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Akihr Modal Hapus -->
                      </td>
                 </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              </div>
  </section>
  <section>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <button class="btn btn-success" data-toggle='modal' data-target='#tambah' style="margin-top: -10px; margin-bottom :10px;">Tambahkan Pengguna</button>
                <table class="table table-bordered" id="table_id2">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $no = 1 ;
                      foreach ($dataPengguna as $pengguna):?>
                  <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $pengguna['nama'];?></td>
                      <td><?= $pengguna['email'];?></td>
                      <td>
                      <button class="badge badge-warning" data-toggle='modal' data-target='#detail<?=$pengguna['user_id']?>'>
                            Detail
                          </button>
                  <!-- modal detail pengguna -->
                          <div class="modal fade" id="detail<?=$pengguna['user_id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Detail pengguna <?= $pengguna['nama']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                     <label>No Id Pengguna : <?= $pengguna['user_id']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Nama Lengkap : <?= $pengguna['nama']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Email : <?= $pengguna['email']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Hak Akses Pengguna : <?php 
                                      if ($pengguna['role_id']== 1){
                                     echo "Murabbi";}
                                     else {
                                       echo "Santri";
                                     }?></label>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- akhir modal detail pengguna -->
                          |
                          <!-- modal edit pengguna -->
                          <button class="badge badge-primary" data-toggle='modal' data-target='#editpengguna<?= $pengguna['user_id']?>'>
                            Edit
                          </button>
                          <div class="modal fade" id="editpengguna<?= $pengguna['user_id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Edit data <?= $pengguna['nama']?></h5>
                                    <?php $key = 'editolehAdmin';?>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                    <form method="POST" action="<?= base_url('MainClass/kelola_pengguna/'.$key)?>" enctype="multipart/form-data">
                                     
                                        <input type="hidden" name="id" class="form-control" value="<?= $pengguna['user_id']?>">
                                      
                                      <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $pengguna['nama']?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Email :</label>
                                        <input type="email" name="email" class="form-control" value="<?= $pengguna['email']?>">
                                      </div>
                                      <?php if ($pengguna['role_id']==1):?>
                                      <div class="form-group">
                                        <p>Role Id :</p>
                                          <select name="roleid">
                                            <option value="1">Murabbi</option>
                                            <option value="2">Santri</option>
                                          </select>
                                      </div>
                                      <?php else :?>
                                      <div class="form-group">
                                        <p>Role Id :</p>
                                          <select name="roleid">
                                            <option value="2">Murabbi</option>
                                            <option value="1">Santri</option>
                                          </select>
                                      </div>
                                      <?php endif?>

                                      <div class="form-group">
                                        <label>Ganti Foto Profile :</label>
                                      </div>                                    
                                      <div class="form-group">
                                        <input type="file" name="fotoProfil" id="fotoProfil" class="form-control">
                                      </div>                                                                      
                                  <button  class="btn btn-success">Simpan Perubahan</button>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Akhir modal edit pengguna -->
                          |
                          <!-- Modal Hapus pengguna -->
                          <button class="badge badge-danger" data-toggle='modal' data-target='#hapusdata<?=$pengguna['user_id']?>'>
                            Hapus
                          </button>
                          <div class="modal fade" id="hapusdata<?=$pengguna['user_id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Hapus data <?= $pengguna['nama']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                      <h5>Apakah yakin akan menghapus data <?=$pengguna['nama']?> ??</h5>
                                  </div>
                                  <div class="modal-footer">
                                  <form method="POST" action="<?php $key='hapuspengguna';echo base_url('MainClass/kelola_pengguna/'.$key);?>">
                                  <input type="hidden" name="id" value="<?= $pengguna['user_id']?>">
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                  <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Akihr Modal Hapus -->
                      </td>
                 </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
  </section>
  <section class="mt-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Postingan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="data_table3">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Pemosting</th>
                      <th>postingan</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $datapost=$this->operasi_dataBase->tampildataPostingan();
                    
                       $no = 1 ;
                      foreach ($datapost as $datpost):?>
                  <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $datpost['name'];?></td>
                      <td><?= $datpost['text'];?></td>
                      <td>
                      <button class="badge badge-warning" data-toggle='modal' data-target='#detailpost<?=$no?>'>
                            Detail
                      </button>
                      <!-- modal detail postingan -->
                      <div class="modal fade" id="detailpost<?=$no?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Detail postingan <?= $datpost['name']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                     <label>No Id Postingan : <?= $datpost['post_id']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Nama Pemosting : <?= $datpost['name']?></label>
                                    </div>
                                    <div class="form-group">
                                     <label>Postingan : <?= $datpost['text']?></label>
                                    </div>
                                    <?php if ($datpost['file_tipe'] =='video'):?>
                                      <br>
                                      <hr>
                                      <div class="form-group">
                                       <video controls="" class="post-video">
								                          <source src="<?php echo base_url('asset/user/video/'.$datpost['file']); ?>" type="video/mp4">
							                         </video>
                                      </div>
                                      <?php elseif ($datpost['file_tipe'] =='image'):?>
                                      <br>
                                      <hr>
                                      <div class="form-group">
                                        <img src="<?php echo base_url('asset/user/video/'.$datpost['file']); ?>" alt="" width="100%">
                                      </div>
                                    <?php endif?>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- akhir modal detail postingan -->
                          |
                          <!-- Modal Hapus -->
                          <button class="badge badge-danger" data-toggle='modal' data-target='#hapuspost<?= $no?>'>
                            Hapus
                          </button>
                          <div class="modal fade" id="hapuspost<?= $no?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Hapus Postingan<?= $datpost['name']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                      <h5>Apakah postingan ini akan dihapus ??</h5>                            
                                  </div>
                                  <div class="modal-footer">
                                    <form method="POST" action="<?php $key='hapus'; echo base_url('pengguna/kelolaPostingan/'.$key)?>"> 
                                      <div class="form-group">
                                        <input type="hidden" name="idpostingan" class="form-control" value="<?= $datpost['post_id']?>">
                                      </div>        
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="close">Close</button>
                                    </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Akihr Modal Hapus -->
                      </td>
                 </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- modal tambah pengguna -->
              <?php
               $key = 2;
              ?>
              <div class="modal fade" id="tambah" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5>Tambahkan Pengguna</h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                  <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <form class="user" method="POST" action="<?=base_url('MainClass/membuatAkun/'.$key);?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" required placeholder="Nama Lengkap" name="nama" value="<?=set_value('nama');?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" required placeholder="Alamat Email" name="email" value="<?=set_value('email');?>"> 
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" required placeholder="Password" name="password1">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                  </div>
                  <div class="col-sm-6">
                      <label>Pilih Role Pengguna</label>
                  </div>
                  <div class="col-sm-6">
                      <select name="role_id">
                              <option value="0">--Pilih Role--</option>
                              <option value="1">Murabbi</option>
                              <option value="2">Santri</option>
                      </select>
                  </div>

                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Simpan
                </button>
              </form>
            </div>
          </div>
        </div>                        
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- akhir modal tambah pengguna -->
  </section>
	</div>
  </div>
<?php $this->load->view('sources/script'); ?>
<script>
$(document).ready( function () {
  $('#table_id').DataTable();
} );
$(document).ready( function () {
  $('#table_id2').DataTable();
} );
$(document).ready( function () {
  $('#table_id3').DataTable();
} );
</script>
</body>
</html>