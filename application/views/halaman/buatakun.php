<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
              </div>
              <form class="user" method="POST" action="<?=base_url('MainClass/membuatAkun/'.$key=4);?>">
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
              <hr>
              <div class="text-center">
                <a class="small text-success" href="forgot-password.html">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small text-success" href="<?=base_url('MainClass/');?>login">Sudah Punya Akun? Login!</a>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>

  </div>