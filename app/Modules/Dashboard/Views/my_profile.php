    <div class="row">
        <div class="col-md-12 col-lg-4">
        </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card mb-4">
                                    <img src="<?php echo base_url()?>/assets/dist/img/profile-cover.jpg" alt="..." class="card-img-top">
                                    <div class="card-body text-center">
                                        <a href="javascript:void(0)" class="avatar avatar-xl card-avatar card-avatar-top mb-4">
                                            <img src="<?php echo base_url().session('image')?>" class="avatar-img rounded-circle border-card" alt="...">
                                        </a>
                                        <h5 class="card-title font-weight-600 mb-2">
                                            <a href="profile-posts.html"><?php echo session('fullname')?></a>
                                        </h5>
                                        <p class="card-text text-muted mb-2"><?php if(session('isAdmin') == 1){echo 'Admin';}else{
                                            echo 'User';
                                        }?></p>
                                      
                                        <hr>
                                         <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                                <span class="">First Name :</span>
                                            </div>
                                            <div class="col-auto">
                                              
                                                    <?php echo session('firstname')?>
                                                
                                            </div>
                                        </div> 

                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                                <span class="">Last Name :</span>
                                            </div>
                                            <div class="col-auto">
                                              
                                                    <?php echo session('lastname')?>
                                                
                                            </div>
                                        </div> 

                                    <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                                <span class="">Email :</span>
                                            </div>
                                            <div class="col-auto">
                                              
                                                    <?php echo session('email')?>
                                                
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>