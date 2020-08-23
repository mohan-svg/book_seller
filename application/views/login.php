
  <div class="col-lg-6" style="margin:0px auto;">
        <h2 class="text-center">Login</h2>
        <br>
        <?php 
          if($this->session->flashdata('error')){ ?>

          <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?>
                </div>

        <?php 
          }
         ?>
        <form action="<?php echo site_url('login_verification') ?>" method="post">
          
         
              <div class="form-group">
                <label for="username">Username<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="username" name="username" placeholder="Username" >  
                    
              </div>
              
              <div class="form-group">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">       
              </div>      
              
              <button type="submit" class="btn btn-primary">Login</button>
              <a class="float-right" href="<?php echo site_url('register_page') ?>">New user register here</a>
        </form>
    </div>