<section class="body-sign">
  <div class="center-sign"> <a href="<?=base_url()?>" class="logo pull-left"> <img src="<?=Assets?>images/logo.png" height="54" alt="Porto Admin" /> </a>
    <div class="panel panel-sign">
      <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
      </div>
      <div class="panel-body">
        <?php
	  $errors = $this->session->flashdata('validation_errors'); 
	  if(!empty($errors)):?>
        <div class="alert alert-danger">
          <?=$errors?>
        </div>
        <?php endif;?>
        <?php
	  $message = $this->session->flashdata('message'); 
	  if(!empty($message)):?>
        <div class="alert alert-warning">
          <?=$message?>
        </div>
        <?php endif;?>
        <form action="<?=base_url()?>user/signup" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-lg">
                <label>First Name</label>
                <input name="first_name" type="text" class="form-control input-lg" value="<?=set_value('first_name');?>"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-lg">
                <label>Last Name</label>
                <input name="last_name" type="text" class="form-control input-lg" value="<?=set_value('last_name');?>"/>
              </div>
            </div>
          </div>
          <div class="form-group mb-lg">
            <label>E-mail Address</label>
            <input name="email" type="email" class="form-control input-lg" value="<?=set_value('email');?>"/>
          </div>
          <div class="form-group mb-none">
            <div class="row">
              <div class="col-sm-6 mb-lg">
                <label>Password</label>
                <input name="password" type="password" class="form-control input-lg" />
              </div>
              <div class="col-sm-6 mb-lg">
                <label>Password Confirmation</label>
                <input name="confirm_password" type="password" class="form-control input-lg" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="checkbox-custom checkbox-default">
                <input id="terms" name="agreeterms" type="checkbox"/>
                <label for="terms">I agree with <a href="#">terms of use</a></label>
              </div>
            </div>
            <div class="col-sm-4 text-right">
              <button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
              <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
            </div>
          </div>
          <span class="mt-lg mb-lg line-thru text-center text-uppercase"> <span>or</span> </span>
          <p class="text-center">Already have an account? <a href="<?=base_url()?>user/login">Sign In!</a></p>
        </form>
      </div>
    </div>
    <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All Rights Reserved.</p>
  </div>
</section>
