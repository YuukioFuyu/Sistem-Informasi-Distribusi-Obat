<link href="<?php echo base_url()?>/assets/dist/css/customcheckbox.min.css" rel="stylesheet" >

 <div class="row">
            <div class="col-sm-12">
                <div class="card card-bd lobidrag">
                      <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center"> 
                 <?php echo $title;?> 
                                    </div>
                                    </div>
                    <?php echo form_open("role/save_role") ?>
                    <div class="card-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo lan('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="role_id" id="type" placeholder="<?php echo lan('role_name') ?>" required />
                            </div>
                        </div>
             <?php
              $this->db = db_connect();
            $m=0;
            foreach($accounts as $key=>$value) {
                $account_sub = $this->db->table('sub_module')
                        ->select("*")
                        ->where('mid', $value['id'])
                        ->get()
                        ->getResult();
                ?>
                <table class="table table-bordered">
                    <h2 class=""><?php echo lan($value['name']);?></h2>
                    <thead>
                    <tr>
                        <th class="text-center"><?php echo lan('sl_no');?></th>
                        <th class="text-center"><?php echo lan('menu_name');?></th>
                        <th class="text-center"><?php echo lan('create');?>(<label for="checkAllcreate<?php echo $m?>"><input type="checkbox" onclick="checkallcreate(<?php echo $m?>)" id="checkAllcreate<?php echo $m?>"  name="" > All)</label> </th>
                        <th class="text-center"><?php echo lan('read');?> (<label for="checkAllread<?php echo $m?>"><input type="checkbox" onclick="checkallread(<?php echo $m?>)" id="checkAllread<?php echo $m?>"  name="" > All)</label></th>
                        <th class="text-center"><?php echo lan('update');?>  (<label for="checkAlledit<?php echo $m?>"><input type="checkbox" onclick="checkalledit(<?php echo $m?>)" id="checkAlledit<?php echo $m?>"  name="" > All)</label></th>
                        <th class="text-center"><?php echo lan('delete');?> (<label for="checkAlldelete<?php echo $m?>"><input type="checkbox" onclick="checkalldelete(<?php echo $m?>)" id="checkAlldelete<?php echo $m?>"  name="" > All)</label></th>
                    </tr>
                    </thead>
                    <?php

                     $sl = 0 ?>
                    <?php if (!empty($account_sub)) { ?>
                        <?php foreach ($account_sub as $key1 => $module_name) { ?>

                            <?php
                            $createID = 'id="create'.$m.''.$sl.'" class="create'.$m.' custom-control-input"';
                            $readID   = 'id="read'.$m.''.$sl.'" class="read'.$m.' custom-control-input"';
                            $updateID = 'id="update'.$m.''.$sl.'" class="edit'.$m.' custom-control-input"';
                            $deleteID = 'id="delete'.$m.''.$sl.'" class="delete'.$m.' custom-control-input"';
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo ($sl+1) ?></td>
                                <td>
                                    <?php echo lan($module_name->name)?>
                                    <input type="hidden" name="fk_module_id[<?php echo $m?>][<?php echo $sl?>][]"  value="<?php echo $module_name->id ?>" id="id_<?php echo $module_name->id ?>">

                                </td>
                                <td class="text-center">
                                    
                                  
                                    <div class="checkbox-success checked text-center text-green">
                                         <label for="create<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                         <input type="checkbox" name="create[<?php echo $m?>][<?php echo $sl?>][]" value="1"  <?php echo $createID?>>
                                          <span class="custom-control-indicator"></span>  
                                       </label>
                         
                                   
                            </div>
                                </td>
                                <td class="text-center">
                                    
                                    <div class="checkbox-success checked text-center">
                                        <label for="read<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                         <input type="checkbox" name="read[<?php echo $m?>][<?php echo $sl?>][]" value="1"  <?php echo $readID?>>
                                         <span class="custom-control-indicator"></span>
                                        </label>
                                   
                            </div>
                                </td>
                                <td class="text-center">
                                    
                                    <div class="checkbox-success checked text-center">
                                        <label for="update<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                        <input type="checkbox" name="update[<?php echo $m?>][<?php echo $sl?>][]" value="1"  <?php echo $updateID?>>
                                         <span class="custom-control-indicator"></span>
                                        </label>
                                   
                            </div>
                                </td>
                                <td class="text-center">
                                   
                                    <div class="checkbox-success checked text-center">
                                        <label for="delete<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                         <input type="checkbox" name="delete[<?php echo $m?>][<?php echo $sl?>][]" value="1"  <?php echo $deleteID?>>
                                        <span class="custom-control-indicator"></span>
                                        </label>
                                   
                            </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php $sl++ ?>
                        <?php } ?>
                    <?php } //endif ?>
                </table>
                <?php $m++; } ?>
                <div class="form-group text-right">
                <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo lan('reset') ?></button>
                <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('save') ?></button>
            </div>
            <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>
  