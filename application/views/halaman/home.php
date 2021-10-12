 <?php
  $key = 3;
 ?>
 <!-- Jumbotron -->
 <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Learn Tajweed <span>faster</span> <br />and <span>better</span> with us</h1>
        <a href="<?= base_url('MainClass/')?>login" class="btn btn-success tombol">Let's Go</a>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Container -->
    <div class="container">
      <!-- Info Panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="asset/img/information.png" alt="informasi" class="float-left" />
              <h4>About</h4>
              <p>Aplikasi pembelajaran Ilmu Tajwid Dengan Animasi Interaktif Untuk Penguasaan Hukum Tajwid</p>
            </div>
            <div class="col-lg">
              <img src="asset/img/animation.png" alt="animasi" class="float-left" />
              <h4>Animasi</h4>
              <p>Animasi yang disajikan merupakan animasi 2 Dimensi</p>
            </div>
            <div class="col-lg">
              <img src="asset/img/discussion.png" alt="diskusi" class="float-left" />
              <h4>Diskusi</h4>
              <p>Dilengkapi dengan fitur diskusi dengan sesama pengguna aplikasi</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Info Panel -->
      <!-- alqur'an ilmu dan ilmu tajwid -->
        <div class="row keterangan">
          <div class="col">
            <img src="asset/img/t5.jpeg" alt="alqur'an" class="img-fluid">
          </div>
          <div class="col">
            <h3>Assalamualaikum Wr Wb</h3>
            <p>Al-Quran adalah Kalamullah (firman Allah SWT), merupakan mukjizat yang diturunkan kepada Nabi Muhammad SAW dengan perantara Malaikat Jibril.
Di dalam surah Muzzammil ayat 5, Allah SWT berfirman:

"... dan bacalah olehmu Al-Quran ini dengan pelan/tartil (bertajwid)."

Hukum orang yang mempelajari Ilmu Tajwid adalah Fardhu Kifayah. Dan hukum mengamalkannya adalah Fardhu Ain.
Dan umat Islam yang dapat membaca Al-Quran, wajib hukumnya belajar Tajwid, supaya terpelihara bacaannya.

Mari kita belajar dan tidak bosan membaca dan menggali isi Al-Quran, serta mengamalkannya.
"... dan katakanlah: 'Ya Tuhanku, tambahkanlah kepadaku ilmu pengetahuan'." (QS. Thaahaa: 114).</p>
          </div>
        </div>
      <!-- akhir alquran dan ilmu tajwid -->
      <!-- join -->
      <div class="card o-hidden border-0 shadow-lg my-5 col-lg">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Join !</h1>
          </div>
          <form class="user" method="POST" action="<?=base_url('MainClass/membuatAkun/'.$key);?>">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?=set_value('nama');?>">
              <?=form_error('nama','<small class="text-danger pl-3">','</small>');?>  
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="email" placeholder="Alamat Email" name="email" value="<?=set_value('email');?>">
              <?=form_error('email','<small class="text-danger pl-3">','</small>');?>  
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                <?=form_error('password1','<small class="text-danger pl-3">','</small>');?>  
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block">
              Buat Akun
            </button>
          </form>
        </div>
      </div>
    </div> 
  </div>
</div>
      <!-- akhir join -->
    </div>
    <!-- Akhir Container -->
   
   