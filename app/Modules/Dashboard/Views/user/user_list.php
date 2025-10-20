<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('user_list')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('add_user','create')->access()){ ?>
                   <a href="<?php echo base_url('user/add_user')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_user')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
            <div class="card-body">
 
                <div class="">
                    <table class="datatable table table-bordered table-hover custom-table" id="example">
                        <thead>
                            <tr>
                                <th><?php echo lan('sl_no'); ?></th>
                                <th><?php echo lan('image'); ?></th>
                                <th><?php echo lan('username'); ?></th>
                                <th><?php echo lan('email'); ?></th>
                                <th><?php echo lan('about'); ?></th>
                                <th><?php echo lan('last_login'); ?></th>
                                <th><?php echo lan('last_logout'); ?></th>
                                <th><?php echo lan('ip_address'); ?></th>
                                <th width="70px;"><?php echo lan('action'); ?></th>
                              
                            </tr>
                        </thead>
                        <tbody>
                          
                            <?php
                         
                             $sl = 1; ?>
                            <?php foreach ($user as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><img src="<?php echo base_url().$value->image; ?>" height="80px" width="70px"></td>
                                <td><?php echo $value->fullname; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->about; ?></td>
                                <td><?php echo $value->last_login; ?></td>
                                <td><?php echo $value->last_logout; ?></td>
                                <td><?php echo $value->ip_address; ?></td>
                                 <td>
                                    <?php if (session('isAdmin')) { ?>
                                    
                                 
                                   <a href="<?php echo base_url('user/edit_user/'.$value->id)?>" class="btn btn-info-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="far fa-edit" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url('user/delete_user/'.$value->id)?>" onclick="return confirm('<?php echo lan("are_you_sure") ?>')" class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                               
                                    <?php } else { ?> 
                                    
                                    <button class="btn btn-info btn-sm" title="<?php if($value->is_admin ==1){echo 'Admin';}else{echo 'user';}?>"><?php if($value->is_admin ==1){echo 'Admin';}else{echo 'user';}?></button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

 