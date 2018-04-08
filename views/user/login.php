<section class="body-sign">
  <div class="center-sign"> <a href="<?=base_url()?>" class="logo pull-left"> <img src="<?=Assets?>images/logo.png" height="54" alt="Porto Admin" /> </a>
    <div class="panel panel-sign">
      <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
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
        <?php
	  $message = $this->session->flashdata('success'); 
	  if(!empty($message)):?>
        <div class="alert alert-success">
          <?=$message?>
        </div>
        <?php endif;?>
        <form action="<?=base_url()?>user/login" method="post">
          <div class="form-group mb-lg">
            <label>Email</label>
            <div class="input-group input-group-icon">
              <input name="email" type="email" class="form-control input-lg" />
              <span class="input-group-addon"> <span class="icon icon-lg"> <i class="fa fa-user"></i> </span> </span> </div>
          </div>
          <div class="form-group mb-lg">
            <div class="clearfix">
              <label class="pull-left">Password</label>
              <a href="#" class="pull-right">Lost Password?</a> </div>
            <div class="input-group input-group-icon">
              <input name="password" type="password" class="form-control input-lg" />
              <span class="input-group-addon"> <span class="icon icon-lg"> <i class="fa fa-lock"></i> </span> </span> </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="checkbox-custom checkbox-default">
                <input id="RememberMe" name="rememberme" type="checkbox"/>
                <label for="RememberMe">Remember Me</label>
              </div>
            </div>
            <div class="col-sm-4 text-right">
              <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
              <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
            </div>
          </div>
          <span class="mt-lg mb-lg line-thru text-center text-uppercase"> <span>or</span> </span>
          <p class="text-center">Don't have an account yet? <a href="<?=base_url()?>user/signup">Sign Up!</a></p>
        </form>
      </div>
    </div>
    <p class="text-center">&copy; Copyright 2018. All Rights Reserved.</p>
  </div>
</section>
<!-- end: page --> 