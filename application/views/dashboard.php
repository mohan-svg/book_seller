
        <span class="float-right text-success" style="font-size: 20px;">Hi <?php echo $this->session->userdata('name')?></span>
        <div style="clear:right;"></div>
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

         <?php if($this->session->flashdata('success')){ ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
              </div>

        <?php 
          }
         ?>
         <div class="col-md-12 mb-3">
          
            <button class="btn btn-primary float-left" data-toggle="modal" data-target="#addBook">Add Book</button>
            <button class="btn btn-danger float-right" data-toggle="modal" data-target="#logout">Logout</button>
            <div style="clear:both;"></div>
                     
         </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Book Name</th>
              <th scope="col">Author</th>
              <th scope="col">Price</th>
              <th scope="col">No. of Books</th>
              <th scope="col">Created</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 0;
            foreach($books as $row=>$value): ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?php echo $value['book_name'] ?></td>
                  <td><?php echo $value['author'] ?></td>
                  <td><?php echo $value['price'] ?></td>
                  <td><?php echo $value['no_of_books'] ?></td>
                  <td><?php echo date('d-M-Y',strtotime($value['created'])) ?></td>
                  <td><a href="<?php echo base_url('edit_book/'.$value['book_id'])?>" class="btn btn-info">Edit</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBook<?php echo $value['book_id'] ?>">Delete</button>
                  </td>
                </tr>

                <div class="modal fade" id="deleteBook<?php echo $value['book_id'] ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title ">Delete Book</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo site_url('delete_book') ?>" method="post">
                              <input type="hidden" name="book_id" value="<?php echo $value['book_id'] ?>">
                              <input type="hidden" name="book_name" value="<?php echo $value['book_name'] ?>">
                              <h4 class="text-center">Do you really want to Delete <?php echo $value['book_name'] ?> Book</h4>
                              <br>  
                              <hr>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                      </div>
                     
                    </div>
                  </div>
                </div>
            <?php endforeach; ?>
            
          </tbody>
        </table>


        <div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title ">Add Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo site_url('add_book') ?>" method="post">
                      <div class="form-group">
                        <label for="book_name">Book Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name" required>           
                      </div>
                      <div class="form-group">
                        <label for="author_name">Author Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter Author Name" required>  
                            
                      </div>
                      <div class="form-group">

                        <label for="price">Price<span class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">RS</div>
                          </div>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Enter Book Price" required> 
                        </div>
                        
                            
                      </div>
                      <div class="form-group">
                        <label for="no_of_books">No. of Books<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="no_of_books" name="no_of_books" placeholder="No. of Books" required> 
                            
                      </div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary float-right">Add Book</button>
                    </form>
              </div>
             
            </div>
          </div>
        </div>

        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title ">Logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo site_url('logout') ?>" method="post">
                      <h4 class="text-center">Do you really want to logout</h4>
                      <br>  
                      <hr>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger float-right">Logout</button>
                    </form>
              </div>
             
            </div>
          </div>
        </div>