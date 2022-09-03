<div class="container">


    <br>
    <br>
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto my-3">
        <div class="card-body p-5">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-13">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4 font-weight-bolder">Buat Akun Admin Baru</h1>
                        </div>

                        <hr>
                        <br>
                        <br>

                        <form class="user" method="post" action="<?= base_url('auth/registration')?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Nama Lengkap" value="<?= set_value('name')?>">
                                <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                    placeholder="Alamat Email mu" value="<?= set_value('name')?>">
                                <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?></small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1"
                                        name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?></small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2"
                                        name="password2" placeholder="Ulangi Password">
                                </div>
                
                            </div>
                
                            <br>
                            
                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                        style="background: #2e7856; border:#57AD9E; color:white; ">
                                Buat Akun
                            </button>

                        </form>
                        <hr>
                        <!--   
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        -->
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>