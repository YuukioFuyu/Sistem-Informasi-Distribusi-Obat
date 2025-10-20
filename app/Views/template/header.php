       
        <nav class="navbar-custom-menu navbar navbar-expand-xl m-0">
                        <div class="sidebar-toggle-icon" id="sidebarCollapse">
                            sidebar toggle<span></span>
                        </div><!--/.sidebar toggle icon-->
                        <!-- Collapse -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Toggler -->
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="true" aria-label="Toggle navigation"><span></span> <span></span></button>
                           <?php if($segment_3 == 'pos_invoice'){?>
                         <ul class="nav nav-pills ml-3 d-none d-lg-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New Sale</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Todays sale </a>
                            </li>
                        </ul>
<?php }?>
                        </div>
                        <div class="navbar-icon d-flex">
                            <ul class="navbar-nav flex-row align-items-center">
                        <?php if($max_version > $current_version && $settings_info->update_notification == 1){?>
                            <?php  if(session('isAdmin') == 1){?> 
                <li> <blink><a href="<?php echo base_url('autoupdate/autoupdate')?>" class="text-black  btn-warning update-btn"> <?php echo $max_version.' Version Available'; ?></a></blink>
                </li>
                         <?php }?>
              <?php }?>
                  <?php if($segment_3 == 'pos_invoice'){?>  
                                     <button type="button" class="btn btn-info font-weight-600 md-trigger" data-modal="calculator-modal">
                                <i class="fa fa-calculator" aria-hidden="true"></i> 
                          
                            </button>
                                 <?php }?>
                              <li class="nav-item dropdown notification">
                                <?php if($permission->method('stock_report','read')->access()){?>
                                    <a class="nav-link" href="<?php echo base_url('dashboard/expired_medicine')?>"  title="Expired">
                                        <i class="typcn typcn-bell"></i>
                                        <span class="notification-badge"><?php echo $expired_medicine;?></span>
                                    </a>
                                <?php }?>
                                  
                                </li><!--/.dropdown-->
                                 <li class="nav-item dropdown notification">
                                    <?php if($permission->method('stock_report','read')->access()){?>
                                     <a class="nav-link" href="<?php echo base_url('dashboard/stockout_medicine')?>"  title="Stock Out">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <span class="notification-badge"><?php echo $stock_out_medicine;?></span>
                                    </a>
                                   <?php }?>
                                </li><!--/.dropdown-->
                                <li class="nav-item dropdown user-menu">
                                    <a class="nav-link dropdown-toggle material-ripple" href="#" data-toggle="dropdown">
                                        <!--<img src="assets/dist/img/user2-160x160.png" alt="">-->
                                        <i class="typcn typcn-user-add-outline"></i>
                                    </a>
                                    <div class="dropdown-menu" >
                                        <div class="dropdown-header d-sm-none">
                                            <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                        </div>
                                   <div class="user-header">
                                            <div class="img-user">
                                                <img src="<?php echo base_url().session('image')?>" alt="">
                                            </div><!-- img-user -->
                                            <h6><?php echo session('fullname')?></h6>
                                            <span><?php echo session('email')?></span>
                                        </div><!-- user-header -->
                                        <a href="<?php echo base_url('dashboard/my_profile')?>" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                                        <a href="<?php echo base_url('user/edit_user/'.session('id'))?>" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                                        <a href="<?php echo base_url('logout')?>" class="dropdown-item"><i class="typcn typcn-key-outline"></i> Sign Out</a>
                                    </div><!--/.dropdown-menu -->
                                </li>
                            </ul><!--/.navbar nav-->
                           
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="typcn typcn-th-menu-outline"></i>
                        </button>
                    </nav>
                    