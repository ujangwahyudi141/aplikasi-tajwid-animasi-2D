<div class="col-md-5">
		<h1 class="medium-font">Video</h1>
		<hr>
		<?php foreach ($video as $key) : ?>
			<?php $userProfile = $this->db->get_where('pengguna', ['user_id' => $key['user_id']])->row_array(); ?>
			<section class="video-wrapper">
				<div class="content-video">
					<video controls="">
						<source src="<?php echo base_url('asset/user/video/'.$key['file']); ?>" type="video/mp4">
					</video>
				</div>
				<a href="<?= base_url('MainClass/cari');?>" class="content-description">
					<h1><?php echo $key['text']; ?></h1>
					<h3><?php echo $userProfile['nama']; ?></h3>
					<h3><?php echo date('d M Y', strtotime($key['tgl_dibuat'])); ?></h3>
				</a>
			</section>
		<?php endforeach; ?>
	</div>
    </div>
