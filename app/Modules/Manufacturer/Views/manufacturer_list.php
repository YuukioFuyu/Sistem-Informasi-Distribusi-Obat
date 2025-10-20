<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('manufacturer_list')?></h6>
                                </div>
                                <div class="text-right">
                                  <?php if($permission->method('add_manufacturer','create')->access()){?>  
                                   <a href="<?php echo base_url('manufacturer/add_manufacturer')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_manufacturer')?></a>
                                 <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" width="100%" id="ManufacturerList">
                        <thead>
                            <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th width="220px;"><?php echo lan('manufacturer_name') ?></th>
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
                <th class="text-right"></th>
                   <th></th>
            </tr>
                                            
                                        </tfoot>
                    </table>
                    <input type="hidden" id="total_manufacturer" value="<?php echo $total_manu;?>">
                </div>
            </div> 
        </div>
    </div>
</div>
