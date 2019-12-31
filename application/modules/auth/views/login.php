

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
                    <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                  </div>
                  <?= $this->session->flashdata('message');?>
                  <form class="user"method="post"action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="username" class="form-control form-control-user" id="username"name="username"  placeholder="Enter Username..."value="<?= set_value('username'); ?>">
                      <?= form_error('username','<small class="text-danger pl-3">','</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password"name="password" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>

                  <div class="text-center">
<?php if ($forgot_password['is_active']=='1') 
{
?>
<a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
<?php 
}
?>
                    </div>
                    <div class="text-center">
                    <?php if ($signup_member['is_active']=='1') 
{
?>                    
                    <a class="small" href="<?= base_url('auth/registration');?>">Create an Account!</a>
                    <?php 
}
?>                    
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


