<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('credit_customer')?></h6>
                                </div>
                                <div class="text-right">
                                    <?php if($permission->method('add_customer','create')->access()){?>  
                                   <a href="<?php echo base_url('customer/add_customer')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_customer')?></a>
                               <?php }?>
                               <?php if($permission->method('customer_list','read')->access()){?>  
                                   <a href="<?php echo base_url('customer/customer_list')?>" class="btn btn-info btn-sm"><i class="fas fa-align-justify mr-1"></i><?php echo lan('customer_list')?></a>
                                   <a href="<?php echo base_url('customer/paid_customer')?>" class="btn btn-purple btn-sm"><i class="fas fa-align-justify mr-1"></i><?php echo lan('paid_customer')?></a>
                               <?php }?>
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" cellspacing="0" width="100%" id="CustomerListCredit">
                        <thead>
                            <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th width="220px;"><?php echo lan('customer_name') ?></th>
                            <th width="90px;"><?php echo lan('address1'); ?></th>
                            <th><?php echo lan('mobile_no') ?></th>
                            <th><?php echo lan('email'); ?></th>
                            <th><?php echo lan('city'); ?></th>
                            <th><?php echo lan('state'); ?></th>
                            <th><?php echo lan('zip'); ?></th>
                            <th><?php echo lan('country'); ?></th>
                            <th><?php echo lan('balance') ?></th>
                            <th width="30px;"><?php echo lan('action') ?>
                              
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                          <tfoot>
                        <tr>
                           <th colspan="9" class="text-right"><?php echo lan('total') ?>:</th>
                          <th id="stockqty"></th>
                          <th></th>
                        </tr>
                                            
                        </tfoot>
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

  