<?php $user = $this->db->get_where('pengguna', ['user_id' => $this->session->userdata('user_id')])->row_array(); ?>
<aside class="sidebar">
	<div class="sidebar-header" style="background-color: green;">
		<a class="sidebar-logo" href="<?php base_url(); ?>">Belajar Tajwid</a>
	</div>
	<div class="sidebar-body">
		<ul class="sidebar-list">
			<li>
				<a class="sidebar-link" href="<?= base_url('pengguna'); ?>">
					<i class="fa fa-home"></i> <span>Beranda</span>
				</a>
			</li>
			<li>
				<a class="sidebar-link" href="<?= base_url('pengguna/videoAnimasi');?>">
					<i class="fa fa-play-circle"></i> <span>Video Animasi</span>
				</a>
			</li>
			<?php if ($user['role_id']== 1){?>
				<li>
				<a class="sidebar-link" href="<?= base_url('pengguna/murabbi_kelola');?>">
					<i class="fa fa-tasks"></i> <span>Pengelolaan Murabbi</span>
				</a>
				</li>
			<?php } ?>
			<li>
				<a class="sidebar-link" href="<?= base_url('pengguna/edit_profil');?>">
					<i class="fa fa-gear"></i> <span>Edit Profil</span>
				</a>
			</li>
			<li>
				<a class="sidebar-link" href="<?php echo base_url('logout'); ?>" onclick="return confirm('Logout ?')">
					<i class="fa fa-sign-out"></i> <span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
</aside>