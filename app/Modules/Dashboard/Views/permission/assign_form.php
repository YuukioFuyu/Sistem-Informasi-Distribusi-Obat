
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-bd lobidrag">
                    <div class="card-header">
                     <div class="d-flex justify-content-between align-items-center"> 
                     <?php echo $title;?> 
                     </div>
                    </div>
                   
                    <div class="card-body">
          <?php echo form_open("role/add_roleto_user") ?>
                   <div class="form-group row">
                        <label for="blood" class="col-sm-3 col-form-label">
                            <?php echo lan('user') ?> <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="user_id" id="user_type" onchange="userRole(this.value)">
                                <option value=""><?php echo lan('select_one') ?></option>
                                <?php
                              
                                foreach($user as $udata){
                                    ?>
                                    <option value="<?php echo $udata['id'] ?>"><?php echo $udata['firstname'].' '.$udata['lastname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                     </div>
                      <div class="form-group row">
                        <label for="blood" class="col-sm-3 col-form-label">
                            <?php echo lan('role_name') ?> <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="user_type" id="user_type">
                                <option value=""><?php echo lan('select_one') ?></option>
                                <?php
                                foreach($role_list as $data){
                                    ?>
                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['type'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3><?php echo lan('exsisting_role') ?></h3>
                        <div id="existrole">

                        </div>
                        
                    </div>
                     <div class="form-group row text-right">
                              <div class="col-sm-12">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo lan('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('save') ?></button>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>

