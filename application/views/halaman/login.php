

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?=$this->session->flashdata('message');?>
                  <form class="user" method="POST" action="<?=base_url('MainClass/')?>login">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Email..." name="email" value="<?= set_value('email')?>">
                      <?=form_error('email','<small class="text-danger pl-3">','</small>');?>  
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name= "password"
                        placeholder="Password">
                        <?=form_error('password','<small class="text-danger pl-3">','</small>');?>  
                    </div>
                   
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Login
                    </button>
                    <hr>
                   
                  </form>
                  <div class="text-center mb-2">
                    <a class="small text-success" href="forgot-password.html">Lupa Password?</a>
                  </div>
                  <div class="text-center mb-2">
                    <a class="small text-success" href="<?=base_url('MainClass/membuatAkun/'.$key=4);?>">Membuat Akun</a>
                  </div>
                  <div class="text-center">
                    <a class="btn btn-success tombol" href="<?=base_url('MainClass');?>">Home</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  