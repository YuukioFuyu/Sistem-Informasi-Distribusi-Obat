
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-bd lobidrag">
                    <div class="card-header">
                     <div class="d-flex justify-content-between align-items-center"> 
                     <?php echo $title;?> 
                     </div>
                    </div>
                   
                    <div class="card-body">

                     <div class="table-responsive">
                    <table id="" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th class="text-center"><?php echo lan('role_name') ?></th>
                          
                             <th class="text-center"><?php echo lan('action') ?></th>
                         
                        </tr>
                        </thead>
        <tbody>
                         <?php
                           if($user_count >0){
                                  foreach($user_list as $key=>$row){
                                    ?>
                                    <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td class="text-center"><?php echo $row['type']; ?></td>

                                    <td class="text-center">
                                       
                    <?php if($permission->method('role_list','update')->access()){?>                     
                                            <a href="<?php echo base_url().'/role/edit_role/'.$row['id']; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="<?php echo lan('update') ?>"><i class="far fa-edit" aria-hidden="true"></i></a>
                                      <?php }?>
                    <?php if($permission->method('role_list','delete')->access()){?>
                                               <a href="<?php echo base_url().'/role/delete_role/'.$row['id']; ?>" onClick="return confirm('Are You Sure to Want to Delete?')" class=" btn btn-danger btn-xs" name="pidd" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo lan('delete') ?> "><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                               <?php }?>
                                       
                                    </td>
                                 

                                </tr>
                                    <?php
                                  }
                           }
                           else{
                            ?>
                              <tr>
                                <td></td>
                                <td><?php echo lan('data_not_found')?></td>
                                <td></td>
                            </tr>
                            <?php
                           }
                           ?>



                        </tbody>
                           
                    </table>
                </div>
                    </div>
                   
                </div>
            </div>
        </div>


