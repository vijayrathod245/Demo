<?php $this->load->view('admin/header'); ?>
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6">
              </div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Add Admin
                  </h6>
                  <div class="mT-30">
                    <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name
                        </label> 
                        <input type="text" name="name" value="<?php echo @$data['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name"> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email
                        </label> 
                        <input type="email" name="email" value="<?php echo @$data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password
                        </label> 
                        <input type="password" name="password" value="<?php echo @$data['password']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" name="image"  class="form-control-file" id="exampleFormControlFile1">
							<img src="<?php echo base_url('image/'.@$data['image']); ?>" width="80px" height="80px"/>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                      
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2017 Designed by 
            <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib
            </a>. All rights reserved.
          </span>
        </footer>
      </div>
    </div>
    <?php $this->load->view('admin/footer'); ?>