<div class="row">
	<div class="col-md-7 mb-3">
		<div class="form-post mb-3">
			<button class="form-post-title" type="button">Add new post <span class="plus-btn">+</span></button>
			<form action="<?php echo base_url('upload'); ?>" id="form" method="POST" enctype="multipart/form-data" <?php if (form_error('text', '<small class="text-danger">', '</small>') != null || @$error != null) { echo 'style="display: block;"'; }  ?>>
				<label for="text">Text postingan</label>
				<textarea id="text" name="text" class="form-input"><?php echo set_value('text'); ?></textarea>
				<?php echo form_error('text', '<small class="text-danger">', '</small>'); ?>
				<label for="video">Video . optional</label>
				<input type="file" name="video" id="video" class="form-input">
				<?php echo '<small class="text-danger">'.@$error.'</small>'; ?>
				<button class="btn btn-success">Posting</button>
			</form>
		</div>
		<?php $this->db->order_by('post_id', 'desc'); ?>
		<?php $data = @$dataContent ? @$dataContent : $this->db->get('postingan')->result_array(); ?>
		<section class="post-wrapper">
			<?php foreach ($data as $key) : ?>
				<?php $userProfile = $this->db->get_where('pengguna', ['user_id' => $key['user_id']])->row_array(); ?>
				<div class="post">
					<div class="post-header">
						<div class="post-dropdown">
							<button type="button" class="post-dropdown-btn"><i class="fa fa-ellipsis-v"></i></button>
							<div class="post-dropdown-item">
								<!-- <button type="button" data-link="" id="copyBtn">Salin link</button> -->
								<a href="" class="openComment">Tanggapi postingan</a>
								
									<a href="<?php echo base_url('delete/'.$key['post_id']); ?>">Hapus Post Ini</a>
								
							</div>
						</div>
						<img src="<?php echo base_url('asset/user/foto_profile/'.$userProfile['image']); ?>">
						<div class="text">
							<p class="post-profile-name"><?php echo $userProfile['nama']; ?></p>
							<p class="post-date"><?php echo date('D M Y', strtotime($key['tgl_dibuat'])); ?></p>
						</div>
					</div>
					<div class="post-body">
						<p><?php echo $key['text']; ?></p>
						<?php if ($key['file_tipe'] == 'empty') : ?>
						<?php elseif ($key['file_tipe']=='video') : ?> 
							<video controls="" class="post-video">
								<source src="<?php echo base_url('asset/user/video/'.$key['file']); ?>" type="video/mp4">
							</video>
						<?php else :?>
							<center><img src="<?php echo base_url('asset/user/video/'.$key['file']); ?>" alt="" height="auto;" width="100%"></center>
						<?php endif; ?>
					</div>
					<?php $this->db->order_by('id', 'desc'); ?>
					<?php $comment = $this->db->get_where('komentar', ['post_id' => $key['post_id']])->result_array(); ?>
					<button type="button" class="openComment comment-btn">
						<i class="fa fa-comment-o"></i> <?php echo count($comment); ?>
					</button>
					<div class="comment">
						<section class="data-comment">
							<?php foreach ($comment as $q) : ?>
								<?php $userComment = $this->db->get_where('pengguna', ['user_id' => $q['user_id']])->row_array(); ?>
								<div class="comment-wrapper">
									<p class="date-comment">
										<?php echo date('d M Y', strtotime($q['tgl_dibuat'])); ?>
									</p>
									<div class="comment-item">
										<img src="<?= base_url('asset/user/foto_profile/'.$userComment['image']); ?>">
										<div class="comment-user">
											<p class="user-name"><?php echo $userComment['nama']; ?></p>
											<p class="comment-text"><?php echo $q['text']; ?></p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</section>
						<form action="<?php echo base_url('comment'); ?>" method="POST">
							<input type="hidden" name="post_id" value="<?php echo $key['post_id']; ?>">
							<input type="hidden" name="user_id" value="<?php echo $key['user_id']; ?>">
							<input type="text" name="text" placeholder="Ketik komentar enter" required="">
						</form>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
	</div>
	