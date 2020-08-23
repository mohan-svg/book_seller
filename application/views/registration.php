	<div class="col-lg-6" style="margin:0px auto;">
		<h2 class="text-center">Registration Form</h2>
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
	
		<form action="<?php echo site_url('registration') ?>" method="post">
			<div class="form-group">
		    <label for="name">Name<span class="text-danger">*</span></label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>			      
		  </div>
		  <div class="form-group">
		    <label for="email_id">Email ID<span class="text-danger">*</span></label>
		    <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter Your Email ID" required>	
		        
		  </div>
		  <div class="form-group">
		    <label for="mobileNo">Mobile No.<span class="text-danger">*</span></label>
		    <input type="text" class="form-control" id="mobileNo" name="mobile_no" placeholder="Enter Your Mobile No." required>	
		        
		  </div>
		  <div class="form-group">
		    <label for="address">Address<span class="text-danger">*</span></label>
		    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required>	
		        
		  </div>
		  <div class="form-group">
		    <label for="password">Password<span class="text-danger">*</span></label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>		    
		  </div>
		  <div class="form-group">
		    <label for="confirmPassword">Confirm Password<span class="text-danger">*</span></label>
		    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>		    
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Register</button>
		  <a class="float-right" href="<?php echo site_url('login') ?>">Already Registered | Login</a>
		</form>
	</div>