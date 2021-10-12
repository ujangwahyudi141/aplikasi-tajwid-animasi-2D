<div class="row">
	<div class="col-md-12 mb-3">
  <section>
            <div class="card">
              <div class="card-header">
              <h5>Hukum Num Mati atau Tanwin</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              <div class="row" >
              <?php
                $tmplvideo = $this->db->get_where('video_animasi',['kategori'=> 'hukum nun mati/tanwin'])->result_array();
              foreach ($tmplvideo as $tampil) :
              ?>
              <div class="card" style="width: 16rem;">
                <video controls="" class="post-video">
								  <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							  </video>
                 <div class="card-body">
                    <h5 class="card-title"><?= $tampil['judul'] ?></h5>
                    <p class="card-text"><?= $tampil['keterangan'] ?></p>
                    <button type="button" class="btn btn-success" data-toggle='modal' data-target='#detail<?=$tampil['id']?>'>
                            Lihat Video
                    </button>
                  <!-- modal detail -->
                          <div class="modal fade" id="detail<?=$tampil['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5><?= $tampil['judul']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                  <video controls="" class="post-video">
								                       <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							                    </video>
                                  </div>
                                  <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                <!-- akhir modal detail video -->
                </div>
              </div>
              <?php endforeach;?>
              </div>
                </div>               
              </div>               
  </div>               
</div>                    
  </section>
  <section class="mb-3">
            <div class="card">
              <div class="card-header">
              <h5>Hukum Mim Mati</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              <div class="row" >
              <?php
                $tmplvideo = $this->db->get_where('video_animasi',['kategori'=> 'hukum mim mati'])->result_array();
              foreach ($tmplvideo as $tampil) :
              ?>
              <div class="card" style="width: 16rem;">
                <video controls="" class="post-video">
								  <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							  </video>
                 <div class="card-body">
                    <h5 class="card-title"><?= $tampil['judul'] ?></h5>
                    <p class="card-text"><?= $tampil['keterangan'] ?></p>
                    <button type="button" class="btn btn-success" data-toggle='modal' data-target='#detail<?=$tampil['id']?>'>
                            Lihat Video
                    </button>
                  <!-- modal detail -->
                          <div class="modal fade" id="detail<?=$tampil['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5><?= $tampil['judul']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                  <video controls="" class="post-video">
								                       <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							                    </video>
                                  </div>
                                  <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                <!-- akhir modal detail video -->
                  </div>
              </div>
              <?php endforeach;?>
              </div>
                </div>               
              </div>                                
  </section>
  <section>
            <div class="card">
              <div class="card-header">
              <h5>Ahkamul Maddi Wal Qasr</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              <div class="row" >
              <?php
                $tmplvideo = $this->db->get_where('video_animasi',['kategori'=> 'Ahkamul Maddi Wal Qasr'])->result_array();
                foreach ($tmplvideo as $tampil) :
                  ?>
              <div class="card" style="width: 16rem;">
              <video controls="" class="post-video">
								  <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							  </video>
                 <div class="card-body">
                    <h5 class="card-title"><?= $tampil['judul'] ?></h5>
                    <p class="card-text"><?= $tampil['keterangan'] ?></p>
                    <button type="button" class="btn btn-success" data-toggle='modal' data-target='#detail<?=$tampil['id']?>'>
                            Lihat Video
                    </button>
                  <!-- modal detail -->
                          <div class="modal fade" id="detail<?=$tampil['id']?>" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="modal-title">
                                    <h5><?= $tampil['judul']?></h5>
                                  </div>
                                </div>
                                  <div class="modal-body">
                                  <video controls="" class="post-video">
								                       <source src="<?=base_url('asset/user/video/animasi/'.$tampil['nama_video'])?>" type="video/mp4">
							                    </video>
                                  </div>
                                  <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                <!-- akhir modal detail video -->
                  </div>
              </div>
              <?php endforeach;?>
              </div>
                </div>               
              </div>                                
  </section>
  