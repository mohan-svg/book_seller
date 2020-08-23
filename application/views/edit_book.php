	<div class="col-lg-6" style="margin:0px auto;">
		<h2 class="text-center">Update Book</h2>
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
	
		<form action="<?php echo site_url('update_book') ?>" method="post">
			<div class="form-group">
						<input type="hidden" name="book_id" value="<?php echo $data['book_id'] ?>">
                        <label for="book_name">Book Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="book_name" name="book_name" value="<?php echo $data['book_name'] ?>" required>           
                      </div>
                      <div class="form-group">
                        <label for="author_name">Author Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="author_name" name="author_name" value="<?php echo $data['author'] ?>" required>  
                            
                      </div>
                      <div class="form-group">

                        <label for="price">Price<span class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">RS</div>
                          </div>
                          <input type="text" class="form-control" id="price" name="price" value="<?php echo $data['price'] ?>" required> 
                        </div>
                        
                            
                      </div>
                      <div class="form-group">
                        <label for="no_of_books">No. of Books<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="no_of_books" name="no_of_books" value="<?php echo $data['no_of_books'] ?>" required> 
                            
                      </div>
                      <a type="button" class="btn btn-secondary" href="<?php echo site_url('dashboard') ?>">Back</a>
                      <button type="submit" class="btn btn-primary float-right">Update Book</button>
		</form>
	</div>