<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('medicine_list')?></h6>
                                </div>
                                <div class="text-right">
                                      <?php if($permission->method('add_medicine','create')->access()){?>  
                                   <a href="<?php echo base_url('medicine/add_medicine')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_medicine')?></a>
                               <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" cellspacing="0" width="100%" id="MedicineList">
                        <thead>
                            <tr>
                        <th><?php echo lan('sl_no') ?></th>
                        <th><?php echo lan('medicine_name') ?></th>
                        <th><?php echo lan('generic_name') ?></th>
                        <th><?php echo lan('category') ?></th>
                        <th><?php echo lan('manufacturer') ?></th>
                        <th><?php echo lan('product_location') ?></th>
                        <th><?php echo lan('price') ?></th>
                        <th><?php echo lan('manufacturer_price') ?></th>
                        <th><?php echo lan('strength') ?></th>
                        <th><?php echo lan('image') ?>s</th>
                        <th><?php echo lan('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

