<div class="container" ;>
<br>
<div class="copyright text-center my-auto">
            <marquee scrollamount="5" style="color:#c1d6c7">
            <span>Sistem Keuangan SIPLah Toko Ladang <?= date('Y'); ?></span>
            </marquee>
</div>

    <!-- Outer Row -->
    
    <div class=" row justify-content-center">

        <div class="col-lg-6">
            <div class="card o-hidden border-2 shadow my-5">

                <!-- image @login -->
                <br>
                <br>
                <div class="text-center">
                    <img src="<?= base_url('assets/img/profile/tokoladang3.png')?>" alt="..." class="img-circle" width="400"
                    height="80">       
                    
                </div>
                <br>
                <hr>


                <div class="card-body p-1">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        
                        <div class="col-lg mx=auto">
                            <div class="p-5">
                    
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-1 font-weight-bolder">SISTEM ADMINISTRASI</h1>
                                    <h4 class="h4 text-gray-900 mb-1 font-weight-200">SIPLah Toko Ladang Cabang Lampung</h1>
                                </div>
                    
  
                    
                    <br>
                                <?= $this->session->flashdata('message'); ?>

                                <!-- FORM LOGIN -->
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Masukan Email"
                                            value="<?= set_value('email')?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Masukkan Kata Sandi">
                                        <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?></small>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-user btn-block"
                                        style="background: #2e7856; border:#57AD9E; color:white; ">
                                        Masuk
                                    </button>
                                </form>
                                
                                <div class="text-center">
                                <!--
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                                -->
                                <br>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration')?>">Buat Akun !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

