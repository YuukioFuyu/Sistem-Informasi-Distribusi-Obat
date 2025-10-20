<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('person_list')?></h6>
                                </div>
                                <div class="text-right">
                                    <?php if($permission->method('add_person','create')->access()){?>
                                   <a href="<?php echo base_url('loan/add_person')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_person')?></a>
                               <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" cellspacing="0" width="100%" id="LoanPersonList">
                        <thead>
                            <tr>
                        <th class="text-center"><?php echo lan('sl_no') ?></th>
                        <th class="text-center"><?php echo lan('name') ?></th>
                        <th class="text-center"><?php echo lan('phone') ?></th>
                        <th class="text-center"><?php echo lan('address') ?></th>
                        <th class="text-center"><?php echo lan('balance') ?></th>
                        <th class="text-center"><?php echo lan('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                        <tfoot>
                    <th colspan="5" class="text-right"><?php echo lan('total_balance')?>:</th>
                
            
                  <th></th> 
                                </tfoot>
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
   
</div>

