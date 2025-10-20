<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('leaf_list')?></h6>
                                </div>
                                <div class="text-right">
                                  <button class="client-add-btn btn btn-success md-trigger" type="button" aria-hidden="true" data-toggle="modal" data-target="#leaf_modal" id="leafsettingmodal-link"><i class="fas fa-plus"></i></button>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" id="example">
                        <thead>
                            <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th><?php echo lan('leaf_type') ?></th>
                            <th><?php echo lan('total_number') ?></th>
                            <th><?php echo lan('action') ?>
                              
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sl = 1;
                           if($leaf_list){?>
                            <?php foreach($leaf_list as $leafs){?>
                            <tr>
                              <td><?php echo $sl;?></td>
                              <td><?php echo $leafs->leaf_type;?></td>
                              <td><?php echo $leafs->total_number?></td>
                              <td>
                                <a href="<?php echo base_url().'/medicine/add_leaf_setting/'.$leafs->id?>" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>
                               <a href="<?php echo base_url().'/medicine/delete_leaf/'.$leafs->id?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Delete"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                              </td>
                            </tr>
                          <?php $sl++;}?>
                          <?php }else{?>
                   <tr><td colspan="4" class="text-center"><b>No Data Found</b></td></tr>
                          <?php }?>
                        </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
       <div class="modal fade" id="leaf_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                           
                            <h3 class="modal-title"><?php echo lan('leaf_setting') ?></h3>
                             <a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                        </div>
                        
                        <div class="modal-body">
                            
                       <?php echo form_open('medicine/add_leaf_setting', array('class' => 'form-vertical', 'id' => 'leaf_setting')) ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="leaf_type" class="col-sm-4 col-form-label"><?php echo lan('leaf_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="leaf_type" id="leaf_type" type="text" placeholder="<?php echo lan('leaf_type') ?>"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_number" class="col-sm-4 col-form-label"><?php echo lan('total_number') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="total_number" id="total_number" type="number" placeholder="<?php echo lan('total_number') ?>" tabindex="2" required=""> 
                            </div>
                        </div>

                       

                    
                      
                    </div>
                    
                        </div>

                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                        <?php echo form_close() ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
</div>

  