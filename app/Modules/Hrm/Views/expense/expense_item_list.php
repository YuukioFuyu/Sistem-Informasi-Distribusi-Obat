<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('expense_item_list')?></h6>
                                </div>
                                <div class="text-right">
                                  <?php if($permission->method('add_expense_item','create')->access()){?>  
                                   <a href="<?php echo base_url('expense/add_expense_item')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_expense_item')?></a>
                                 <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" id="example">
                        <thead>
                            <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th><?php echo lan('expense_item_name') ?></th>
                            <th><?php echo lan('action') ?>
                              
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sl = 1;
                           if($items){?>
                            <?php foreach($items as $item){?>
                            <tr>
                              <td><?php echo $sl;?></td>
                              <td><?php echo $item->expense_item_name;?></td>
                           
                              <td>
                                <?php if($permission->method('expense_item_list','update')->access()){?>  
                                <a href="<?php echo base_url().'/expense/edit_expense_item/'.$item->id?>" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>
                              <?php }?>
                               <?php if($permission->method('expense_item_list','delete')->access()){?> 
                               <a href="<?php echo base_url().'/expense/delete_expense_item/'.$item->id?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Delete"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                             <?php }?>
                              </td>
                            </tr>
                          <?php $sl++;}?>
                          <?php }else{?>
                   <tr><td colspan="3" class="text-center"><b>No Data Found</b></td></tr>
                          <?php }?>
                        </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

  