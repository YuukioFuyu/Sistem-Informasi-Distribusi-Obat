<link href="<?php echo base_url()?>/assets/dist/css/customcheckbox.min.css" rel="stylesheet" >
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-bd lobidrag">
                     <div class="card-header">
                     <div class="d-flex justify-content-between align-items-center"> 
                     <?php echo $title;?> 
                     </div>
                    </div>
                   
                    <div class="card-body">
                         <?php echo form_open("role/update_role") ?>
                          <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label"><?php echo lan('role_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input type="text" value="<?php echo  $role['0']->type;?>" tabindex="2" class="form-control" name="role_id" id="type" placeholder="<?php echo lan('role_name') ?>" required />
                                </div>
                            </div>
                            <input type="hidden" name="rid" value="<?php echo $role['0']->id?>">

                          <?php
                          $hidden_ids = [
                              
                          ];
                          $this->db = db_connect();
                          $m=0;
            foreach($modules as $key=>$value) {
                 $account_sub = $this->db->table('sub_module')
                        ->select("*")
                        ->where('mid', $value->id)
                        ->get()
                        ->getResult();

                ?>
                <br>
                <table class="table table-bordered hidetable">
                    <h4 class="hidetable"><?php echo lan($value->name);?></h4>
                    <thead>
                    <tr>
                        <th class="text-center"><?php echo lan('sl_no');?></th>
                        <th class="text-center"><?php echo lan('menu_name');?></th>

                        <!--
                        <th class="text-center"><?php echo lan('create');?>(<label for="checkAllcreate<?php echo $m?>"><input type="checkbox" onclick="checkallcreate(<?php echo $m?>)" id="checkAllcreate<?php echo $m?>"  name="" > All)</label> </th>
                        <th class="text-center"><?php echo lan('read');?> (<label for="checkAllread<?php echo $m?>"><input type="checkbox" onclick="checkallread(<?php echo $m?>)" id="checkAllread<?php echo $m?>"  name="" > All)</label></th>
                        <th class="text-center"><?php echo lan('update');?>  (<label for="checkAlledit<?php echo $m?>"><input type="checkbox" onclick="checkalledit(<?php echo $m?>)" id="checkAlledit<?php echo $m?>"  name="" > All)</label></th>
                        <th class="text-center"><?php echo lan('delete');?> (<label for="checkAlldelete<?php echo $m?>"><input type="checkbox" onclick="checkalldelete(<?php echo $m?>)" id="checkAlldelete<?php echo $m?>"  name="" > All)</label></th>
                        -->

                        <th class="text-center"><?php echo lan('create');?><label for="checkAllcreate<?php echo $m?>"></label> </th>
                        <th class="text-center"><?php echo lan('read');?><label for="checkAllread<?php echo $m?>"></label></th>
                        <th class="text-center"><?php echo lan('update');?><label for="checkAlledit<?php echo $m?>"></label></th>
                        <th class="text-center"><?php echo lan('delete');?><label for="checkAlldelete<?php echo $m?>"></label></th>
                        
                    </tr>
                    </thead>
                    <?php $sl = 0 ?>
                    <?php if (!empty($account_sub)) { ?>
                        <?php
                        // Define an array of IDs to be hidden
                        $hidden_ids = [
                            24, 25, 26, 122, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44,
                            46, 47, 48, 49, 50, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73,
                            74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 92, 93, 94, 95,
                            51, 52, 90, 91, 101, 111, 112
                        ];
                        
                        foreach ($account_sub as $key1 => $module_name){
                        // Skip rendering if the module ID is in the hidden IDs array
                        if (in_array($module_name->id, $hidden_ids)){
                            if (in_array($module_name->id, $hidden_ids)) {
                            echo '<input type="hidden" name="fk_module_id['.$m.']['.$sl.'][]" value="'.$module_name->id.'">';
                            $sl++;
                            continue;
                            }
                        }

                        $ck_data = $this->db->table('role_permission')
                        ->select("*")
                        ->where('fk_module_id',$module_name->id)
                        ->where('role_id',$role['0']->id)
                        ->get()
                        ->getRow();
                            ?>
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
                                    <input type="hidden" name="fk_module_id[<?php echo $m?>][<?php echo $sl?>][]" value="<?php echo $module_name->id ?>" id="id_<?php echo $module_name->id ?>">
                                </td>
                                <td>
                                     
                      

                            <div class="checkbox-success checked text-center text-green">
                                         <label for="create<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                        <input type="checkbox" name="create[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->create==1)?"checked":null) ?>  <?php echo $createID?>>
                                          <span class="custom-control-indicator"></span>  
                                       </label>
                         
                                   
                            </div>
                                </td>
                                <td>
                                     
                             <div class="checkbox-success checked text-center">
                                        <label for="read<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                          <input type="checkbox" name="read[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->read==1)?"checked":null) ?>  <?php echo $readID?>>
                                         <span class="custom-control-indicator"></span>  
                                        </label>
                                   
                            </div>
                                </td>
                                <td>
                                     
                                   

                            <div class="checkbox-success checked text-center">
                                        <label for="update<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                      <input type="checkbox" name="update[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->update==1)?"checked":null) ?> <?php echo $updateID?>>
                                       <span class="custom-control-indicator"></span>  
                                       
                                        </label>
                                   
                            </div>
                                </td>
                                <td>
                                    
                             <div class="checkbox-success checked text-center">
                                        <label for="delete<?php echo $m ?><?php echo $sl ?>" class="custom-control custom-checkbox">
                                          <input type="checkbox" name="delete[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->delete==1)?"checked":null) ?> <?php echo $deleteID?>>
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

    


