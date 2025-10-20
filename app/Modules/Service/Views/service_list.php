<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('service_list')?></h6>
                                </div>
                                <div class="text-right">
                                  <?php if($permission->method('add_service','create')->access()){?>  
                                   <a href="<?php echo base_url('service/add_service')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_service')?></a>
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
                            <th><?php echo lan('service_name') ?></th>
                            <th><?php echo lan('charge') ?></th>
                             <?php 
                $i=0;
                foreach ($taxfield as $taxss) {?>
                  <th><?php echo $taxss['tax_name']; ?></th>
                   <?php $i++;}?>
                            <th><?php echo lan('action') ?>
                              
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sl = 1;
                           if($service_list){?>
                            <?php foreach($service_list as $service){?>
                            <tr>
                              <td><?php echo $sl;?></td>
                              <td><?php echo $service['service_name'];?></td>
                              <td><?php echo $service['charge'];?></td>
                               <?php 
                $i=0;
                foreach ($taxfield as $taxss) {?>
                  <td><?php
                  $txf = 'tax'.$i;
                   echo $service[$txf]*100; ?></td>
                   <?php $i++;}

?>
                              <td>
                                <a href="<?php echo base_url().'/service/edit_service/'.$service['id']?>" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>
                               <a href="<?php echo base_url().'/service/delete_service/'.$service['id']?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Delete"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
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
</div>

  